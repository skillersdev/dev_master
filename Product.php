<?php
/**************************
Project Name	: Zeemart
Created on		: 27 Dec, 2016
Last Modified 	: 04 Jan, 2017
Description		: Page contains Buyer Product details.

***************************/
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Product extends CI_Controller {

	public function __construct() {

		parent::__construct ();

		$this->authentication->buyer_authenticated();

		$this->module = 'product';
		$this->module_label = 'product';
		$this->folder = 'product/';

	}

	public function cart_details($company_id = null) {

		$cart_product = $cart_time = $cart_item_ref =  array();

		$buyer = get_logged_buyer_details();

		if($company_id == null) {
			$company_id = $this->session->userdata('current_supplier_company');
		}

		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'company_id' => $company_id);
		$this->mcurl->add_call ( 'cart_response', 'GET', BUYER_API_URL . 'product/cart_details',$options);
		$curl_result = $this->mcurl->execute ();

		$response = json_decode($curl_result['cart_response']['response']);	
		if($response->status == 'ok') {

			$cart_product = $response->cart_product;
			$cart_time = $response->cart_time;
			$cart_item_ref = $response->cart_item_pair;

		}

		return array('cart_product' => $cart_product,'cart_time' => $cart_time, 'cart_item_ref'=>$cart_item_ref);

	}
	
	public function cart_details_product($company_id,$product_id) {

		$result_set = array();

		$buyer = get_logged_buyer_details();

		if($company_id == null) {
			$company_id = $this->session->userdata('current_supplier_company');
		}

		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'company_id' => $company_id,'product_id' => $product_id);

		$this->mcurl->add_call ( 'cart_response', 'GET', BUYER_API_URL . 'product/cart_details',$options);
		$curl_result = $this->mcurl->execute ();

		$response = json_decode($curl_result['cart_response']['response']);	
		if($response->status == 'ok') {

			$result_set = $response->result_set;

		}

		return $result_set;

	}

	/*Added to cart*/
	public function add_cart() {

		$status = '';	$msg = '';	$html = ''; 	$dis_btn = '';	$update_btn = '';

		$buyer = get_logged_buyer_details();

		$company_id = decode_value($this->input->post('company_id'));

		$mode = $this->input->post('mode');
		$product_id = decode_value($this->input->post('product_id'));

		$product_qty = $this->input->post('product_qty');
		$product_unit = $this->input->post('product_unit');
		$product_price = $this->input->post('product_price');

		$product_amount = floatval($product_qty) * floatval($product_price);

		/*Category and company wise list Product*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'], 'company_id' => $company_id,'product_id' => $product_id,'cart_mode'=> $mode,'product_qty'=> $product_qty,'product_unit'=> $product_unit,'product_price'=> $product_price,'product_amount'=> $product_amount);

		$this->mcurl->add_call ( 'cart_response', 'POST', BUYER_API_URL . 'product/added_cart',$options);
		$curl_result = $this->mcurl->execute ();
		
		$response = json_decode($curl_result['cart_response']['response']);
		if($response->status == 'ok') {

			$status = 'ok';
			$cart_item = $response->cart_item_id;
			if($mode == 'update-cart') {
				$msg = get_label('buy_qty_update');
			}  else {
				$msg = get_label('buy_qty_add');
				$update_btn = get_label('buy_qty_update_btn');
			}

			$dis_btn = get_label('buy_discard_btn');

		} else {
			$status = 'error';
		}

		echo json_encode(array('status' => $status, 'msg' => $msg, 'dis_btn' => $dis_btn, 'update_btn' => $update_btn, 'cart_item'=>encode_value($cart_item)));
		exit;

	}

	/* this method used to check login */
	public function detail() {

		$data = array ();

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;

		$data['pro_obj'] = '';
		$data['pro_saved_item'] = '';

		$data['cart_product_count'] = 0;
		$data['cart_product_detail'] = '';

		$pro_slug = trim($this->uri->segment(4));

		$buyer = get_logged_buyer_details();

		/*Cart details*/
		$cart_return = $this->cart_details();

		$data['cart_product_list'] = $cart_return['cart_product'];
		$data['cart_time'] = json_decode(json_encode($cart_return['cart_time']),true);
		$data['cart_item_ref'] = json_decode(json_encode($cart_return['cart_item_ref']),true);
		/*Category and company wise list Product*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'pro_slug' => $pro_slug);

		$this->mcurl->add_call ( 'product_response', 'GET', BUYER_API_URL . 'product/product_list',$options);
		$this->mcurl->add_call ( 'product_saved_response', 'GET', BUYER_API_URL . 'product/product_saved_item',$options);

		$curl_result = $this->mcurl->execute ();

		$response = json_decode($curl_result['product_response']['response']);

		if($response->status == 'ok') {

			if(isset($response->result_set)) {

				$data['pro_obj'] = $response->result_set[0];

				$company_id = $data['pro_obj']->company_id;
				$product_id = $data['pro_obj']->product_id;

				$data['image_source'] = $response->common->image_source;
				$data['image_path'] = $response->common->image_path;
				
				$options = array('secure_token'=> $buyer['buyer_access_token'], 'unit_type' => $data['pro_obj']->product_unit_type);
				$this->mcurl->add_call ( 'unittype', 'GET', BUYER_API_URL . 'product/allowDecimal',$options);
				$result = $this->mcurl->execute ();
				$response = json_decode($result['unittype']['response']);
				if($response->status == 'ok') {

					if(isset($response->result_set)) {
						$data['allow_decimal'] = $response->result_set->allow_decimal;
					}
				}

			}

			$response = json_decode($curl_result['product_saved_response']['response']);
			if($response->status == 'ok') {

				if(isset($response->result_set)) {
					$data['pro_saved_item'] = $response->result_set;
				}
			}

			/*Cart count basis supplier*/
			$cart_return =  $this->cart_details($company_id);
			$cart_product_list = $cart_return['cart_product'];
			$data['cart_product_count'] = count($cart_product_list);

			/*Cart product details*/
			$cart_product_detail  = $this->cart_details_product($company_id,$product_id);
			if(!empty($cart_product_detail[0]->product))
			{
				$data['cart_product_detail'] = $cart_product_detail[0]->product[0];
			} else {
				$data['cart_product_detail'] = '';
			}
		}

		$this->template->set_data ($data);
		$this->template->load($this->folder.'product_detail',$data);

	}

	public function saved_item() {

		$data = array ();

		$status = '';
		$msg = '';
		$html = '';

		$buyer = get_logged_buyer_details();

		$product_id = decode_value($this->input->post('product_id'));
		$remove_opt = $this->input->post('remove');

		/*Call Api*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'product_id' => $product_id, 'remove_opt' => $remove_opt);

		$this->mcurl->add_call ( 'product_response', 'POST', BUYER_API_URL . 'product/product_saved',$options);
		$curl_result = $this->mcurl->execute ();
		
		$response = json_decode($curl_result['product_response']['response']);
		if($response->status == 'ok') {

			$status = 'ok';

		} else {
			$status = 'error';
		}

		echo json_encode(array('status' => $status, 'msg' => $msg , 'html' => $html));
		exit;

	}

	public function category() {

		$data = array ();

		$buyer = get_logged_buyer_details();

		$company_id = $this->session->userdata('current_supplier_company');

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;

		$cat_slug = trim($this->uri->segment(4));

		$data['head_name'] = '';
		$data['page_from'] = 'product';
		$data['cat_count'] = 0;
		$data['product_list'] = '';

		$data['pro_saved_item'] = '';
		$data['bought_items_count'] = 0;
		$data['saved_items_count'] = 0;

		/*My supplier name*/
		$data['supplier_head_name'] = '';
		if($this->session->userdata('current_supplier_company_name')!= null) {
			$data['supplier_head_name'] = $this->session->userdata('current_supplier_company_name');
			$data['supplier_company_id'] = $company_id;
		}

		/*supplier if exist in my supplier*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'company_id' => $company_id);
		$this->mcurl->add_call ( 'company_response', 'GET', BUYER_API_URL . 'company/mysuppliers',$options);
		$this->mcurl->add_call ( 'supplier_response', 'GET', BUYER_API_URL . 'company/get_supplier_detail',$options);
		$curl_result = $this->mcurl->execute ();

		$response = json_decode($curl_result['company_response']['response']);	
		/*if($response->status == 'ok') {*/
			/*Cart details*/
			$cart_return = $this->cart_details();
			$data['cart_product_list'] = $cart_return['cart_product'];

			if($cat_slug != '') {

				$result_res = get_category_level(null, null, $cat_slug, $company_id);
				
				$product_categories = isset($result_res->result_set)?$result_res->result_set:array();

				if(!empty($product_categories)) {

					$data['cat_slug'] = $cat_slug;
					$data['head_name'] = $product_categories[0]->pr_cat_name;
					$data['cat_count'] = $product_categories[0]->product_count;
					$data['cat_id'] = $pr_cat_id = $product_categories[0]->pr_cat_id;

					/*Category and company wise list Product*/
					$options = array('cat_id' => $pr_cat_id,'secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'supplier_company_id' => $company_id);
					if(check_buyer_connection($buyer['buyer_company_id'], $company_id))
					{
						$this->mcurl->add_call ( 'product_response', 'GET', BUYER_API_URL . 'product/connected_product_list',$options);
					} else {
						$this->mcurl->add_call ( 'product_response', 'GET', BUYER_API_URL . 'product/product_list',$options);
					}
					$this->mcurl->add_call ( 'product_saved_response', 'GET', BUYER_API_URL . 'product/product_saved_item',$options);

					$this->mcurl->add_call ( 'product_savedresponse', 'GET', BUYER_API_URL . 'product/product_saved_count',$options);
					$this->mcurl->add_call ( 'product_bcount_response', 'GET', BUYER_API_URL . 'product/product_bought_before_count',$options);
					
					/* jump to category */
					if(check_buyer_connection($buyer['buyer_company_id'], $company_id))
					{
						$this->mcurl->add_call ( 'category_response', 'GET', BUYER_API_URL . 'product/connected_category_list',$options);
					} else {
						$this->mcurl->add_call ( 'category_response', 'GET', BUYER_API_URL . 'product/get_parent_category_list',$options);
					}
					/* jump to category */

					$curl_result = $this->mcurl->execute ();
					
					$response = json_decode($curl_result['product_response']['response']);
					if($response->status == 'ok') {

						$data['product_list'] = $response->result_set;

						$data['image_source'] = $response->common->image_source;
						$data['image_path'] = $response->common->image_path;

						$response = json_decode($curl_result['product_saved_response']['response']);
						if($response->status == 'ok') {

							if(isset($response->result_set)) {
								$data['pro_saved_item'] = $response->result_set;
							}
						}
						
						$response = json_decode($curl_result['product_saved_response']['response']);		
						if($response->status == 'ok') {
		
							if(isset($response->result_set)) {		
								$data['pro_saved_item'] = $response->result_set;		
							}		
						}


						$response = json_decode($curl_result['product_savedresponse']['response']);	
						if($response->status == 'ok') {
							$data['saved_items_count'] = $response->count;				
						}

						$response = json_decode($curl_result['product_bcount_response']['response']);
						if($response->status == 'ok') {
							$data['bought_items_count'] = $response->count;
						}
						
						/* jump to category */
						$categories = json_decode($curl_result['category_response']['response']);
						if(isset($categories->result_set)) {
							$data['jump_categories'] = $categories->result_set;
							$data['jump_common_images'] = $categories->common;
						} else {
							$data['jump_categories'] = array();
						}
						/* jump to category */

					}
				}
			}
		/*} else {
			redirect(buyer_url());
		} */
		
		$this->template->set_data ($data);
		$this->template->load($this->folder.'productlist',$data);

	}
	
	public function savedItems() {

		$data = array ();

		$buyer = get_logged_buyer_details();

		$company_id = $this->session->userdata('current_supplier_company');
	
		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;

		$data['head_name'] = 'Saved items';
		$data['page_from'] = 'saveditem';
		$data['cat_count'] = 0;
		$data['product_list'] = '';

		$data['pro_saved_item'] = '';
		$data['bought_items_count'] = 0;
		$data['saved_items_count'] = 0;

		/*My supplier name*/
		$data['supplier_head_name'] = '';
		if($this->session->userdata('current_supplier_company_name')!= null) {
			$data['supplier_head_name'] = $this->session->userdata('current_supplier_company_name');
			$data['supplier_company_id'] = $company_id;
		}

		/*supplier if exist in my supplier*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'company_id' => $company_id);
		$this->mcurl->add_call ( 'company_response', 'GET', BUYER_API_URL . 'company/mysuppliers',$options);
		$curl_result = $this->mcurl->execute ();
		$response = json_decode($curl_result['company_response']['response']);	

		if($response->status == 'ok') {

			/*Cart details*/
			$cart_return = $this->cart_details();
			$data['cart_product_list'] =  $cart_return['cart_product'];

			$options = array('secure_token'=> $buyer['buyer_access_token'],'buyer_id' => $buyer['buyer_id'],'supplier_company_id' => $company_id, 'saved_items' => 1);

			$this->mcurl->add_call ( 'product_response', 'GET', BUYER_API_URL . 'product/product_list',$options);
			$this->mcurl->add_call ( 'product_saved_response', 'GET', BUYER_API_URL . 'product/product_saved_item',$options);

			$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'supplier_company_id' => $company_id);

			$this->mcurl->add_call ( 'product_savedresponse', 'GET', BUYER_API_URL . 'product/product_saved_count',$options);
			$this->mcurl->add_call ( 'product_bcount_response', 'GET', BUYER_API_URL . 'product/product_bought_before_count',$options);
			
			/* jump to category */
			if(check_buyer_connection($buyer['buyer_company_id'], $company_id))
			{
				$this->mcurl->add_call ( 'category_response', 'GET', BUYER_API_URL . 'product/connected_category_list',$options);
			} else {
				$this->mcurl->add_call ( 'category_response', 'GET', BUYER_API_URL . 'product/get_parent_category_list',$options);
			}
			/* jump to category */

			$curl_result = $this->mcurl->execute ();

			$response = json_decode($curl_result['product_response']['response']);
			if($response->status == 'ok') {

				if(isset($response->result_set))
				{
					$data['product_list'] = $response->result_set;
					$data['image_source'] = $response->common->image_source;
					$data['image_path'] = $response->common->image_path;
				} else {
					$data['product_list'] = array();
				}

				$response = json_decode($curl_result['product_saved_response']['response']);
				if($response->status == 'ok') {

					if(isset($response->result_set)) {
						$data['pro_saved_item'] = $response->result_set;
					}
				}
				
				$response = json_decode($curl_result['product_savedresponse']['response']);	
				if($response->status == 'ok') {
					$data['saved_items_count'] = $response->count;				
				}

				$response = json_decode($curl_result['product_bcount_response']['response']);
				if($response->status == 'ok') {
					$data['bought_items_count'] = $response->count;
				}
				
				/* jump to category */
				$categories = json_decode($curl_result['category_response']['response']);
				if(isset($categories->result_set)) {
					$data['jump_categories'] = $categories->result_set;
					$data['jump_common_images'] = $categories->common;
				} else {
					$data['jump_categories'] = array();
				}
				/* jump to category */
			}

		} else {

			redirect(buyer_url());

		}

		$this->template->set_data ($data);
		$this->template->load($this->folder.'productlist',$data);

	}
	
	public function boughtBefore() {

		$data = array ();

		$buyer = get_logged_buyer_details();

		$company_id = $this->session->userdata('current_supplier_company');
	
		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;

		$data['head_name'] = 'Bought before';
		$data['page_from'] = 'boughtdefore';
		$data['cat_count'] = 0;
		$data['product_list'] = '';

		$data['pro_saved_item'] = '';
		$data['bought_items_count'] = 0;
		$data['saved_items_count'] = 0;

		/*My supplier name*/
		$data['supplier_head_name'] = '';
		if($this->session->userdata('current_supplier_company_name')!= null) {
			$data['supplier_head_name'] = $this->session->userdata('current_supplier_company_name');
			$data['supplier_company_id'] = $company_id;
		}

		/*supplier if exist in my supplier*/
		$options = array('secure_token'=> $buyer['buyer_access_token'], 'company_id' => $company_id);
		$this->mcurl->add_call ( 'company_response', 'GET', BUYER_API_URL . 'company/mysuppliers',$options);
		$curl_result = $this->mcurl->execute ();
		$response = json_decode($curl_result['company_response']['response']);	

		if($response->status == 'ok') {

			/*Cart details*/
			$cart_return = $this->cart_details();
			$data['cart_product_list'] = $cart_return['cart_product'];

			$options = array('secure_token'=> $buyer['buyer_access_token'],'buyer_id' => $buyer['buyer_id'],'supplier_company_id' => $company_id, 'bought_items' => 1);

			$this->mcurl->add_call ( 'product_response', 'GET', BUYER_API_URL . 'product/product_list',$options);
			$this->mcurl->add_call ( 'product_saved_response', 'GET', BUYER_API_URL . 'product/product_saved_item',$options);

			$options = array('secure_token'=> $buyer['buyer_access_token'], 'buyer_company_id' => $buyer['buyer_company_id'],'buyer_id' => $buyer['buyer_id'],'supplier_company_id' => $company_id);

			$this->mcurl->add_call ( 'product_savedresponse', 'GET', BUYER_API_URL . 'product/product_saved_count',$options);
			$this->mcurl->add_call ( 'product_bcount_response', 'GET', BUYER_API_URL . 'product/product_bought_before_count',$options);
			
			/* jump to category */
			if(check_buyer_connection($buyer['buyer_company_id'], $company_id))
			{
				$this->mcurl->add_call ( 'category_response', 'GET', BUYER_API_URL . 'product/connected_category_list',$options);
			} else {
				$this->mcurl->add_call ( 'category_response', 'GET', BUYER_API_URL . 'product/get_parent_category_list',$options);
			}
			/* jump to category */

			$curl_result = $this->mcurl->execute ();

			$response = json_decode($curl_result['product_response']['response']);
			if($response->status == 'ok') {

				if(isset($response->result_set))
				{
					$data['product_list'] = $response->result_set;
					$data['image_source'] = $response->common->image_source;
					$data['image_path'] = $response->common->image_path;
				} else {
					$data['product_list'] = array();
				}

				$response = json_decode($curl_result['product_saved_response']['response']);
				if($response->status == 'ok') {

					if(isset($response->result_set)) {
						$data['pro_saved_item'] = $response->result_set;
					}
				}

				$response = json_decode($curl_result['product_savedresponse']['response']);	
				if($response->status == 'ok') {
					$data['saved_items_count'] = $response->count;				
				}

				$response = json_decode($curl_result['product_bcount_response']['response']);
				if($response->status == 'ok') {
					$data['bought_items_count'] = $response->count;
				}
				
				/* jump to category */
				$categories = json_decode($curl_result['category_response']['response']);
				if(isset($categories->result_set)) {
					$data['jump_categories'] = $categories->result_set;
					$data['jump_common_images'] = $categories->common;
				} else {
					$data['jump_categories'] = array();
				}
				/* jump to category */

			}

		} else {

			redirect(buyer_url());

		}

		$this->template->set_data ($data);
		$this->template->load($this->folder.'productlist',$data);

	}

	public function all_items($supplier) {

		$data = array ();

		$buyer = get_logged_buyer_details();
		$supplier_id = decode_value($supplier);
		$this->session->set_userdata('current_supplier_company', $supplier_id);

		$data['module'] = $this->module;
		$data['module_label'] = $this->module_label;

		$data['head_name'] = '';
		$data['supplier_head_name'] = '';
		$data['cat_count'] = 0;
		$data['product_list'] = '';

		$data['pro_saved_item'] = '';

		/*Cart details*/
		$cart_return = $this->cart_details();
		$data['cart_product_list'] = $cart_return['cart_product'];

		$options = array('supplier_company_id' => $supplier_id, 'secure_token'=> $buyer['buyer_access_token'],'buyer_id' => $buyer['buyer_id']);

		$this->mcurl->add_call ( 'product_response', 'GET', BUYER_API_URL . 'product/product_list',$options);
		$this->mcurl->add_call ( 'product_saved_response', 'GET', BUYER_API_URL . 'product/product_saved_item',$options);
		
		$curl_result = $this->mcurl->execute ();
		
		$response = json_decode($curl_result['product_response']['response']);
		if($response->status == 'ok') {

			if(isset($response->result_set))
			{
				$data['product_list'] = $response->result_set;
				$data['image_source'] = $response->common->image_source;
				$data['image_path'] = $response->common->image_path;
			} else {
				$data['product_list'] = array();
			}

			$response = json_decode($curl_result['product_saved_response']['response']);
			if($response->status == 'ok') {

				if(isset($response->result_set)) {
					$data['pro_saved_item'] = $response->result_set;
				}
			}
		}

		$this->template->set_data ($data);
		$this->template->load($this->folder.'productlist',$data);

	}
	
	public function ajax_results() {		
		check_ajax_request (); /* skip direct access */		
		$data = array ();		
		
		$buyer = get_logged_buyer_details();		
				
		$data['module'] = $this->module;		
		$data['module_label'] = $this->module_label;		
				
		$this->form_validation->set_rules('search_content', 'Search Content Text', 'required|trim|strip_tags');		
				
		if($this->form_validation->run() == TRUE) {		
			$options = array(		
				'secure_token'=> $buyer['buyer_access_token'],		
				'supplier_company_id' => $this->input->post('company'),		
				'search_content' => $this->input->post('search_content'),		
				'buyer_id' => $buyer['buyer_id']		
			);		
					
			$this->mcurl->add_call ('product_response', 'GET', BUYER_API_URL . 'product/connected_product_list',$options);		
			$this->mcurl->add_call ( 'product_saved_response', 'GET', BUYER_API_URL . 'product/product_saved_item',$options);		
			$curl_result = $this->mcurl->execute();		
					
			$cart_return = $this->cart_details();		
			$pass['cart_product_list'] = $cart_return['cart_product'];		
					
			$all_res = json_decode($curl_result['product_response']['response']);		
					
			$pass['search_content'] = $this->input->post('search_content');		
			$pass['result'] = '';		
					
			if(isset($all_res->result_set))		
			{		
				$pass['product_list'] = $all_res->result_set;		
				$pass['image_source'] = $all_res->common->image_source;		
				$pass['image_path'] = $all_res->common->image_path;		
			} else {		
				$pass['product_list'] = array();		
			}		
					
			$response = json_decode($curl_result['product_saved_response']['response']);		
			if($response->status == 'ok') {		
				if(isset($response->result_set)) {		
					$pass['pro_saved_item'] = $response->result_set;		
				}		
			}		
		
			$data['status'] = $all_res->status;		
			//$data['message'] = $all_res->message;		
			$data['allproducts_append'] = $this->load->view($this->folder.'ajax_product_list', $pass, true);		
					
			echo json_encode($data); exit;		
		}		
	}
}
