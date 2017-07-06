<?php
/**************************
Project Name	: Zeemart
Created on		: 16 Dec, 2016
Last Modified 	: 16 Dec, 2016
Description		: Page contains Buyer Directory and Price Request.

***************************/
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Order extends CI_Controller {

	public function __construct() {

		parent::__construct ();

		$this->authentication->buyer_authenticated();

		$this->module = 'order';
		$this->module_label = 'order';
		$this->folder = 'order/';
	}

	public function index() {

		$data = array ();

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;
		
		$buyer = get_logged_buyer_details();
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token']
		);
		$this->mcurl->add_call('company_response', 'GET', BUYER_API_URL . 'company/company_detail',$options);
		$curl_response = $this->mcurl->execute();
		
		$company_response = json_decode($curl_response['company_response']['response']);
		
		$company = $company_response->result_set[0];
		
		if($this->input->post('start_date') != '')
		{
			$start = $this->input->post('start_date');
		} else {
			$start = date('Y-m-d', strtotime($company->company_created_on));
		}
		
		if($this->input->post('end_date') != '')
		{
			$end = $this->input->post('end_date');
		} else {
			$end = date('Y-m-d');
		}
		
		
		$options['status'] = 'order_pending';
		$this->mcurl->add_call('pending_response', 'GET', BUYER_API_URL . 'order/orders',$options);
		/*if($buyer['buyer_is_approver']) {
			$options['status'] = 'approval_orders';
			$this->mcurl->add_call('approval_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		}*/
		$options['status'] = 'confirmed_orders';
		$this->mcurl->add_call('confirmed_response', 'GET', BUYER_API_URL . 'order/orders',$options);
		$options['status'] = 'delivered';
		$options['start_date'] = $start;
		$options['end_date'] = $end;
		if($this->input->post('supplier') != '')
		{
			$options['order_supplier_id'] = decode_value($supplier);
		}
		$this->mcurl->add_call('completed_response', 'GET', BUYER_API_URL . 'order/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$pending_orders = json_decode($curl_result['pending_response']['response']);
		$confirmed_orders = json_decode($curl_result['confirmed_response']['response']);
		$completed_orders = json_decode($curl_result['completed_response']['response']);
		$data['is_approver'] = 0;

		if($buyer['buyer_is_approver']) {
			/* $approval_orders = json_decode($curl_result['approval_response']['response']);
			$data['approval_orders'] = $approval_orders->orders; */
			$data['is_approver'] = 1;
		}
		
		$data['pending_orders'] = $pending_orders->orders;
		$data['confirmed_orders'] = $confirmed_orders->orders;
		$data['completed_orders'] = $completed_orders->orders;
		$data['common_folder'] = $completed_orders->common;
		$data['completed_start'] = $start;
		$data['completed_end'] = $end;
		$this->session->set_userdata('export_download_start', $start);
		$this->session->set_userdata('export_download_end', $end);
		
		$this->template->set_data ($data);
		$this->template->load($this->folder.'orders',$data);
	}
	
	public function show_transactions()
	{
		$data = array ();

		$buyer = get_logged_buyer_details();
		
		$start = date('Y-m-d', strtotime($this->input->post('export_order_start_date')));
		$end = date('Y-m-d', strtotime($this->input->post('export_order_end_date')));
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'status' => 'delivered',
			'start_date' => $start,
			'end_date' => $end,
		);
		$this->mcurl->add_call('confirmed_response', 'GET', BUYER_API_URL . 'order/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$confirmed_orders = json_decode($curl_result['confirmed_response']['response']);
		$data['completed_orders'] = $confirmed_orders->orders;
		$data['common_folder'] = $confirmed_orders->common;
		$data['start'] = date('Y-m-d', strtotime($this->input->post('export_order_start_date')));
		$data['end'] = date('Y-m-d', strtotime($this->input->post('export_order_end_date')));
		$this->session->set_userdata('export_download_start', $data['start']);
		$this->session->set_userdata('export_download_end', $data['end']);
		
		$result['appendData'] = $this->load->view('order/ajax_completed_transactions', $data, true);
		$result['status'] = 'ok';
		$result['message'] = 'Successfully reterived records';
		
		echo json_encode($result); exit;
	}
	
	public function export()
	{
		$data = array ();

		$buyer = get_logged_buyer_details();
		
		$start = $this->session->userdata('export_download_start');
		$end = $this->session->userdata('export_download_end');
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'status' => 'delivered',
			'start_date' => $start,
			'end_date' => $end,
		);
		$this->mcurl->add_call('confirmed_response', 'GET', BUYER_API_URL . 'order/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$confirmed_orders = json_decode($curl_result['confirmed_response']['response']);
		$orders = $confirmed_orders->orders;
		
		$export_array = array();
		$export_array[0][]= 'Order Reference';
		$export_array[0][]= 'Order Total Amount';
		$export_array[0][]= 'Buyer Company';
		$export_array[0][]= 'Buyer Storename';
		$export_array[0][]= 'Order Delivery Date';
		$export_array[0][]= 'Order Delivery Slot';
		$export_array[0][]= 'Order Payment';
		$export_array[0][]= 'Order Buyer Note';
		$export_array[0][]= 'Order Supplier Note';
		$export_array[0][]= 'Order Status';
		$export_array[0][]= 'Order Created';
		
		/*$csv = "Order Reference,Order Total Amount,Buyer Company,Buyer Storename, Order Delivery Date,Order Delivery Slot,Order Payment,Order Buyer Note,Order Supplier Note,Order Status,Order Created \n";//Column headers*/
		if(!empty($orders)) {
			$i = 1;
			foreach ($orders as $order){
				
				$export_array[$i][] = trim(str_replace('-', '', $order->order_ref_no));
				$export_array[$i][] = number_format($order->order_total_amt,2);
				$export_array[$i][] = output_val($order->buyer);
				$export_array[$i][] = output_val($order->br_str_name);
				$export_array[$i][] = date('Y-m-d', strtotime($order->order_delivery_date));
				$export_array[$i][] = strtoupper(str_replace('-',' - ', $order->order_delivery_slot));
				$export_array[$i][] = strtoupper($order->order_payment_method);
				$export_array[$i][] = stripslashes($order->order_buyer_note);
				$export_array[$i][] = stripslashes($order->order_supplier_note);
				$export_array[$i][] = strtoupper($order->order_status);
				$export_array[$i][] = $order->order_created_on;
				
				$i++;
				/*$csv .= (str_replace('-', '', $order->order_ref_no)).','.$order->order_total_amt.','.$order->buyer.','.$order->br_str_name.','.date('Y-m-d', strtotime($order->order_delivery_date)).','.strtoupper(str_replace('-',' - ', $order->order_delivery_slot)).','.strtoupper($order->order_payment_method).','.$order->order_buyer_note.','.$order->order_supplier_note.','.strtoupper($order->order_status).','.$order->order_created_on.'\n'; //Append data to csv*/
				
			}
		}
		$name = str_replace(' ', '_', get_company_name($buyer['buyer_company_id']));
		$this->outputCSV($export_array, $name); exit;
		/*$filename = 'temp_files/'.get_company_name($buyer['buyer_company_id']).'.csv';
		$download_name = get_company_name($buyer['buyer_company_id']).'.csv';
		$csv_handler = fopen ($filename,'w');
		fwrite ($csv_handler,$csv);
		fclose ($csv_handler);
		$data = file_get_contents($filename);
		
		force_download('sample.csv', $data); 
		//unlink($filename);
		exit;*/
	}
	
	function outputCSV($data, $name) 
	{
		
		$filename = "export_".$name.'_'.date("Y-m-d").".csv";
		// disable caching
		$now = gmdate("D, d M Y H:i:s");
		header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
		header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
		header("Last-Modified: {$now} GMT");
		 
		// force download  
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download"); 
		 
		// disposition / encoding on response body
		header("Content-Disposition: attachment;filename={$filename}");
		header("Content-Transfer-Encoding: binary");

		$outputBuffer = fopen("php://output", 'w');
		foreach($data as $val) {
			fputcsv($outputBuffer, $val);
		}
		fclose($outputBuffer);
		die();

	}

	public function change_status() {

		check_ajax_request();
		$data = array ();

		$buyer = get_logged_buyer_details();

		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $this->input->post('order'),
			'type' => $this->input->post('type'),
			'message' => $this->input->post('message')
		);
                
		if($this->input->post('note') != '')
		{
			$options['message'] = $this->input->post('note');
		}
		
		$this->mcurl->add_call('order_response', 'POST', BUYER_API_URL . 'order/change_order_status',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
		
		$data['status'] = $orders->status;
		$data['message'] = $orders->message;
		
		echo json_encode($data); exit;
	}
        
        public function delete_item() {
		
		check_ajax_request_buyer();

		$status = '';	$msg = '';	$html = ''; $redirect_url= '';

		$buyer = get_logged_buyer_details();

		$cart_item_id = decode_value($this->input->post('item_id'));
                $order_no = $this->input->post('order');
		/*Options*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'item_id' => $cart_item_id);

		$this->mcurl->add_call ( 'cart_response', 'POST', BUYER_API_URL . 'product/item_delete_singal',$options);
		$curl_result = $this->mcurl->execute ();
                
		$response = json_decode($curl_result['cart_response']['response']);
		if($response->status == 'ok') {

			$status = 'ok';
			$redirect_url = buyer_url().'/order/view/'.$order_no;
			$msg = get_label('cart_item_delete');
		} else {
			$status = 'error';
		}

		echo json_encode(array('status' => $status, 'msg' => $msg,'redirect_url' => $redirect_url));
		exit;

	}
        
        public function addback_item() {
		
		check_ajax_request_buyer();

		$status = '';	$msg = '';	$html = ''; $redirect_url= '';

		$buyer = get_logged_buyer_details();

		$cart_item_id = decode_value($this->input->post('item_id'));
		$order_no = $this->input->post('order');

		/*Options*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'item_id' => $cart_item_id);

		$this->mcurl->add_call ( 'cart_response', 'POST', BUYER_API_URL . 'product/item_addback',$options);
		$curl_result = $this->mcurl->execute ();
                
		$response = json_decode($curl_result['cart_response']['response']);
		if($response->status == 'ok') {
                    $order_id = trim($this->uri->segment(4));
			$status = 'ok';
			$redirect_url = buyer_url().'/order/view/'.$order_no;
			$msg = get_label('cart_item_delete');
		} else {
			$status = 'error';
		}

		echo json_encode(array('status' => $status, 'msg' => $msg,'redirect_url' => $redirect_url));
		exit;

	}
	
	public function change_delivery_status() {

		check_ajax_request();
		$data = array ();

		$buyer = get_logged_buyer_details();

		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $this->input->post('order'),
			'type' => $this->input->post('type')
		);
		
		$this->mcurl->add_call('order_response', 'POST', BUYER_API_URL . 'order/change_order_delivery_status',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
		
		$data['status'] = $orders->status;
		$data['message'] = $orders->message;
		
		echo json_encode($data); exit;
	}
	
        public function save_order_product_note() {
		check_ajax_request();
		$data = array ();
		
		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;

		$data['cart_res'] = array();

		$buyer = get_logged_buyer_details();
		
		$this->form_validation->set_rules('cart-note','Note','required|trim');
		
		if($this->form_validation->run() == true) {
			$options = array(
				'secure_token'=> $buyer['buyer_access_token'], 
				'oi-note' => $this->input->post('cart-note'), 
				'oi-product' => $this->input->post('product'), 
				'oi-id' => $this->input->post('cart')
			);
			
			$this->mcurl->add_call ( 'note_response', 'POST', BUYER_API_URL . 'order/save_order_product_note', $options);
			$curl_result = $this->mcurl->execute ();
			
			$response = json_decode($curl_result['note_response']['response']);
	
			$data['status'] = $response->status;
			$data['message'] = $response->message;
			
		} else {
			$data['status'] = 'error';
			$data['message'] = validation_erros();
		}
		
		echo json_encode($data); exit;
	}
        
	public function view($order) {
            
               

		$data = array ();

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;
		
		$buyer = get_logged_buyer_details();
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $order
		);
		
		$this->mcurl->add_call('order_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
                
		
		$data['orders'] = $orders->orders;
		$data['common_folder'] = $orders->common;
		$data['stores'] = $orders->stores;
		
		$this->template->set_data ($data);
		$this->template->load($this->folder.'order-edit',$data);
	}
        
        
	
	public function on_delivery($order) {

		$data = array ();

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;
		
		$buyer = get_logged_buyer_details();
		
		if($this->input->post('delivery_submit') == 'yes')
		{
			$options = array(
				'secure_token' => $buyer['buyer_access_token'],
				'order' => $this->input->post('order'),
				'option' => $this->input->post('option'),
			);
			
			$this->mcurl->add_call('ontime_response', 'POST', BUYER_API_URL . 'order/save_ontime_delivery_status',$options);
			$curl_result = $this->mcurl->execute();
			
			$ontime = json_decode($curl_result['ontime_response']['response'], TRUE);
			
			$data['status'] = $ontime['status'];
			$data['message'] = $ontime['message'];
			
			echo json_encode($data); exit;
		}
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $order
		);
		
		$this->mcurl->add_call('order_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
		
		$data['orders'] = $orders->orders;
		$data['common_folder'] = $orders->common;
		
		if($data['orders'][0]->order_is_delivery_ontime == 'na' || $data['orders'][0]->order_is_delivery_ontime == '')
		{
			$this->template->set_data ($data);
			$this->template->load($this->folder.'delivery_on_time',$data);
		} else {
			redirect(buyer_url().'/'.$this->folder.'view/'.$order);
		}
	}
	
	public function rate($order) {

		$data = array ();

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;
		
		$buyer = get_logged_buyer_details();
		
		if($this->input->post('anything_good_rate_hidden') == 'process')
		{
			$options = array(
				'secure_token' => $buyer['buyer_access_token'],
				'order' => $this->input->post('order'),
				'rate_product_quality' => ($this->input->post('like_quality') == 'yes')?'yes':'no',
				'rate_service' => ($this->input->post('like_service') == 'yes')?'yes':'no',
				'rate_price' => ($this->input->post('like_price') == 'yes')?'yes':'no',
				'rate_responsive' => ($this->input->post('like_responsive') == 'yes')?'yes':'no',
			);
			
			$this->mcurl->add_call('ontime_response', 'POST', BUYER_API_URL . 'order/order_rates',$options);
			$curl_result = $this->mcurl->execute();
			
			$ontime = json_decode($curl_result['ontime_response']['response'], TRUE);
			
			$data['status'] = $ontime['status'];
			$data['message'] = $ontime['message'];
			
			echo json_encode($data); exit;
		}
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $order
		);
		
		$this->mcurl->add_call('order_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
		
		$data['orders'] = $orders->orders;
		$data['common_folder'] = $orders->common;
		if($data['orders'][0]->order_is_delivery_ontime != 'na' || $data['orders'][0]->order_is_delivery_ontime != '')
		{
			$this->template->set_data ($data);
			$this->template->load($this->folder.'anything_good',$data);
		} else {
			redirect(buyer_url().'/'.$this->folder.'view/'.$order);
		}
	}
	
	public function favourites() {

		$data = array ();

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;
		
		$buyer = get_logged_buyer_details();
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'buyer_id' => encode_value($buyer['buyer_id']),
			'status' => 'delivered'
		);
		
		$this->mcurl->add_call('completed_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		
		$curl_result = $this->mcurl->execute();
		
		$completed_orders = json_decode($curl_result['completed_response']['response']);
		
		$data['completed_orders'] = $completed_orders->orders;
		$data['common_folder'] = $completed_orders->common;
		
		$this->template->set_data ($data);
		$this->template->load($this->folder.'favourites',$data);
	}
	
	/* this method used to check login */
	public function pdf($order) {
		$data = array ();
		$data['orders'] = '';
		$buyer = get_logged_buyer_details();
		if($buyer == ""){
			redirect(base_url().'buyer');
		}

		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $order
		);
		
		$this->mcurl->add_call('order_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
		
		$data['orders'] = $orders->orders;
		$data['common_folder'] = $orders->common;
		

		$data['header_menu'] = 'orders';
		$data['module_name'] = $this->module;
		$content = $this->load->view($this->folder . 'order-pdf',$data,true);
		include(FCPATH."pdf/html2pdf.class.php");
		$html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 3);
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->writeHTML($content);
		$html2pdf->Output(FCPATH.'samples/order_summary_'.$order.'.pdf','F');
		$params = array(
				'secure_token' => $buyer['buyer_access_token'],
				'pdf' =>'samples/order_summary_'.$order.'.pdf'
		);
		$this->mcurl->add_call ( "orders", "post", BUYER_API_URL . $this->module . "/send_order_pdf", $params);
		$results = $this->mcurl->execute ();
		$this->session->set_flashdata('success','Mail sent successfully');
		redirect(base_url().'buyer/order/view/'.$order);
	}
        
        public function view_pdf($order) {
		$data = array ();
		$data['orders'] = '';
		$buyer = get_logged_buyer_details();
		if($buyer == ""){
			redirect(base_url().'buyer');
		}

		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'order' => $order
		);
		
		$this->mcurl->add_call('order_response', 'GET', BUYER_API_URL . 'product/orders',$options);
		$curl_result = $this->mcurl->execute();
		
		$orders = json_decode($curl_result['order_response']['response']);
		
		$data['orders'] = $orders->orders;
		$data['common_folder'] = $orders->common;
		

		$data['header_menu'] = 'orders';
		$data['module_name'] = $this->module;
		$content = $this->load->view($this->folder . 'order-pdf',$data,true);
		include(FCPATH."pdf/html2pdf.class.php");
		$html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 3);
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->writeHTML($content);
		$html2pdf->Output(FCPATH.'samples/order_summary_'.$order.'.pdf','I');
	}
        
        public function buyer_update_order() {
            
		$data = array ();
                $itemid =$this->input->post('itemid');
                $mid =$this->input->post('mid');
                $orderid=$this->input->post('ordersid');
                $sup_company=$this->input->post('sup_company');
                $order_status=$this->input->post('order_status');
                $qty=$this->input->post('qty');
                $proprice=$this->input->post('proprice');
                $mproduct= $this->input->post('mproduct');
                $mqty= $this->input->post('mqty');
                $order_store_id= $this->input->post('order_store_id');
                $order_buyer_note= $this->input->post('order_buyer_note');
                $delivery= $this->input->post('delivery');
                $minval= $this->input->post('minval');

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;
		
		$buyer = get_logged_buyer_details();
		
		$options = array(
			'secure_token' => $buyer['buyer_access_token'],
			'qty' => $qty,
			'sup_company' => $sup_company,
			'order_status' => $order_status,
			'order' => $orderid,
                        'oi_id' => $itemid,
                        'pro_price' => $proprice,
                        'man_oi_id' => $mid,
                        'manual_product' => $mproduct,
                        'manual_qty' => $mqty,
                        'order_store_id' => $order_store_id,
                        'order_buyer_note' => $order_buyer_note,
                        'delivery' => $delivery,
                        'minval' => $minval
		);
		
		$this->mcurl->add_call('order_response', 'POST', BUYER_API_URL . 'product/update_buyer_order',$options);
		$curl_result = $this->mcurl->execute();
		$orders = json_decode($curl_result['order_response']['response']);
                
                //echo "<pre>"; print_r($orders); 
                 // echo $orderid= encode_value($orderid); 
                  $orderid= encode_value($orders->order_id);
                  $return_url=base_url().'buyer/order/view/'.$orderid;
                  
                    redirect($return_url);
                        
		
                //$this->view($order_val);
	}
        
        //public function
        
        public function changepassword(){
            
        }
}
