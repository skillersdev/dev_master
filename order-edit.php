<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header_includes'); ?>
</head>
<body >
<!-- Order detail page start -->
<div data-role="page" >
<header data-role="header" data-position="fixed" class="header">
<?php $this->load->view('includes/header_menu'); ?>
</header>
<?php echo get_template('includes/search_result'); ?>
<?php 
/*echo "<pre>";
print_r($orders[0]);
* 
*/
?>
<div data-role="main" class="content_sec"> 
<div class="alert alert-success alert-fixed alert-custom"><?php echo $this->session->flashdata('success'); ?></div>
<div class="alert alert-success alert-fixed"></div>
<div class="alert alert-danger alert-fixed"></div>
<div class="toporder_ttsec top_wizard">
<div class="container">
<div class="toporder_info text-center">
<h1 class="title1"><a href="" title=""><?php echo output_val($orders[0]->supplier); ?></a></h1>
<span class="small_text">Order #<?php echo order_format($orders[0]->order_ref_no).' • '.date('d M Y', strtotime($orders[0]->order_created_on)).$orders[0]->order_status;?></span>
</div>
    
   

<div class="toporder_btsec buyer_toporder_btsec text-center">
<?php
if($orders[0]->order_status=='pending' && ($orders[0]->order_updated_on=='NULL' || $orders[0]->order_updated_on=='') )
$create=$orders[0]->order_created_on;
else
$create=$orders[0]->order_updated_on;

$created_time=date("H:i", strtotime($create));

$cutoff=$orders[0]->cut_off_time;
if($create<$cutoff)
$date_cutoff=date("d M", strtotime($create));
else
$date_cutoff=date("d M", strtotime($create.' +1 day'));

$c_date=date('Y-m-d', strtotime($date_cutoff));

$cut_time=$cutoff.":00";
$cutoff_time= strtotime($c_date." ".$cut_time);
$orderplace_time= strtotime($create);
$current_time= strtotime(date("Y-m-d H:i:s"));
if($current_time<$cutoff_time && $orders[0]->order_status=='pending')
{

$cutoff_status='cutoff';
}
elseif($current_time>$cutoff_time && $orders[0]->order_status=='pending')
$cutoff_status="crossed";


else
$cutoff_status="";

echo $cutoff_status;
if($orders[0]->order_status != 'cancelled_buyer' && $orders[0]->order_status != 'declined' && $orders[0]->order_status != 'approval_declined' && $orders[0]->order_status != 'cancelled_supplier' && $orders[0]->order_status != 'cancelled_request') {
?>          

<div class="container">
<div class="row bs-wizard text-center" style="border-bottom:0;">
<div class="col-xs-2-5 bs-wizard-step <?php if($orders[0]->order_status == 'waiting_for_approval') echo 'active'; else echo 'complete';?> ">
<div class="progress">
<div class="progress-bar"></div>
</div>
<a href="#" class="bs-wizard-dot"></a>
<div class="text-center bs-wizard-stepnum">Approval</div>
</div>
<div class="col-xs-2-5 bs-wizard-step <?php if($orders[0]->order_status == 'pending' && $cutoff_status=="cutoff") echo 'active';elseif($orders[0]->order_status == 'pending' && $cutoff_status=="crossed") echo 'active'; elseif($orders[0]->order_status=='confirmed') echo 'complete';elseif($orders[0]->order_status=='cutoff') echo 'complete';elseif($orders[0]->order_status=='delivered') echo 'complete';elseif($orders[0]->order_status=='cancelled_request') echo 'active';elseif($orders[0]->order_status == 'closed') echo 'complete';else echo 'disabled'; ?>">
<!-- complete -->
<div class="progress">
<div class="progress-bar"></div>
</div>
<a href="#" class="bs-wizard-dot"></a>
<div class="text-center bs-wizard-stepnum">Order placed</div>
</div>
<div class="col-xs-2-5 bs-wizard-step <?php if($orders[0]->order_status == 'confirmed') echo 'active';elseif($orders[0]->order_status == 'delivered') echo 'complete';elseif($orders[0]->order_status == 'closed') echo 'complete';else echo 'disabled';?>">
<!-- complete -->
<div class="progress">
<div class="progress-bar"></div>
</div>
<a href="#" class="bs-wizard-dot"></a>
<div class="text-center bs-wizard-stepnum">Cutoff</div>
</div>
<div class="col-xs-2-5 bs-wizard-step <?php if($orders[0]->order_status == 'delivered') echo 'active';elseif($orders[0]->order_status == 'closed') echo 'complete';else echo "disabled";?>">
<!-- active -->
<div class="progress">
<div class="progress-bar"></div>
</div>
<a href="#" class="bs-wizard-dot"></a>
<div class="text-center bs-wizard-stepnum">Delivered</div>
</div>
<div class="col-xs-2-5 bs-wizard-step <?php if($orders[0]->order_status == 'closed') echo 'active';else echo "disabled";?>">
<!-- active -->
<div class="progress">
<div class="progress-bar"></div>
</div>
<a href="#" class="bs-wizard-dot"></a>
<div class="text-center bs-wizard-stepnum <?php if($orders[0]->order_status == 'closed') echo 'active';else echo "disabled";?>">Closed</div>
</div>
</div>

</div>
<?php
}
?>
    
    
         	

<?php 
$logged_buyer_details = $this->session->userdata('logged_buyer'); 
if($orders[0]->order_status == 'waiting_for_approval' && $_SESSION['logged_buyer']['buyer_id'] == $orders[0]->order_approver_id) { ?>
<!--<div class="toporder_btsec buyer_toporder_btsec text-center">                        
<a href="#popup_approval" id="open_popup_approval" data-rel="popup" data-transition="fade" class="ui-btn btn_bluebr" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Approve/decline order">Approve/decline order</a>                        
</div> -->
<div class="approvebox"> 
<div class="container">
<h2>This order requires your approval to proceed</h2>
<p>Approve this order (Placed by <?php echo $orders[0]->buyer_firstname;?>) and send to the supplier?</p>  
<ul>
<li>
<!-- <a href="#popup_respondorder" id="open_popup_respondorder" class="ui-btn btn_white btn_lg btn-block " title="Decline">Decline </a> -->
<a href="#popup_respondorder" id="open_popup_respondorder" data-rel="popup" class="ui-btn btn_white btn_lg btn-block " data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Decline">Decline </a>

</li>

<li>
<a href="#popup_approval" id="open_popup_approval" data-rel="popup" data-transition="fade" class="btn-block approve_btn" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Approve"><i class="fa fa-check"> </i> Approve </a></li>
</ul>
</div>
</div>
<?php } ?>
</div>
    
    
</div>
</div>
<?php
if($orders[0]->order_status=='delivered')
{
        ?>

<div class="order_cancelbox">
         	<div class="container">
            	<div class="row">
                <div class="col-xs-12">
                <h5>THANKS FOR ORDERING VIA ZEEMART</h5>
            	<h2>Reconcile your order now</h2>
                <p>As your order contains item(s) with unspecified price, the order must be reconciled before it can be closed</p>   
                     
                    
                  <ul>
                    <li><a href="#close_order" data-rel="popup" class="btn-block approve_btn ui-link" title="Close order" aria-haspopup="true" aria-owns="close_order" aria-expanded="false">Close order</a></li>
                    <li><a href="#popup_approve_order" data-rel="popup" class="btn-block btn_yellow ui-link" title="Approve" aria-haspopup="true" aria-owns="popup_approve_order" aria-expanded="false"> Reconcile </a></li>
                </ul>  
             </div>
         </div>
         </div>
         </div>
<?php
}
?>

<?php 


$status_class = '';
$status_msg = '';
if($orders[0]->order_status == 'pending') {
$status_class = 'notconfirmed_status';
$status_msg = "Sent to Supplier - Pending Confirmation";
if($orders[0]->buyer_modified==1)
    $edits=0;
else
    $edits=1;

$status_msg = "Live order - cutoff : ".$cutoff." ,".$date_cutoff."";
if($edits!=0)
$sub_msg = "Edits remaining : 1";
else
$sub_msg="Edits remaining : ".$edits." - Last edited by you 2 mins ago";
$order_bg="success_order_status";
} else if($orders[0]->order_status == 'waiting_for_approval' && $_SESSION['logged_buyer']['buyer_id'] == $orders[0]->order_approver_id) {
$status_class = 'need_your_status';
$status_msg = 'Needs your approval';
$order_bg="awaiting_your_status";
} else if($orders[0]->order_status == 'waiting_for_approval') {
$status_class = 'need_your_status';
$status_msg = 'Awaiting internal approval';
//$status_msg1 = 'Awaiting internal approval';
$order_bg="awaiting_your_status";
} else if($orders[0]->order_status == 'declined') {
$status_class = 'decline_status';
$status_msg = 'Declined';
$order_bg="awaiting_your_status";
} else if($orders[0]->order_status == 'approval_declined') {
$status_class = 'decline_status';
$status_msg = 'Declined by Approver';
$order_bg="awaiting_your_status";
} else if($orders[0]->order_status == 'approved') {
$status_class = '';
$status_msg = '';
$order_bg="success_order_status";
} else if($orders[0]->order_status == 'confirmed') {
$status_class = 'accept_status';
$status_msg = '<i class="fa fa-check"></i> Accepted';
$order_bg="success_order_status";
} else if($orders[0]->order_status == 'approved_with_note') {
$status_class = 'accept_status';
$status_msg = '<i class="fa fa-check"></i> Accepted with note';
$order_bg="success_order_status";
} 

else if($orders[0]->order_status == 'delivered') {
$status_class = 'delivery_status';
$order_bg="success_order_status";
if($orders[0]->order_is_delivery_ontime == 'yes') {
$deliver_ontime = ' On-time';
} else if($orders[0]->order_is_delivery_ontime == 'no') {
$deliver_ontime = ' Not-on-time';
} else {
$deliver_ontime = '';
} 
$status_msg = 'Delivery was'.$deliver_ontime;
} else if($orders[0]->order_status == 'cancelled_buyer') {
$status_class = 'decline_status';
$status_msg = 'PO Voided';
$order_bg="cancel_order_status";
$cancel_bg="cancel_order_msg";
//$order_bg="success_order_status";
} 
else if($orders[0]->order_status == 'cancelled_supplier') {
$status_class = 'decline_status';
$status_msg = 'Order cancelled by supplier';
$order_bg="cancel_order_status";
$cancel_bg="cancel_order_msg";
//$order_bg="success_order_status";
} 

else if($orders[0]->order_status == 'cancelled_request') {
$status_class = 'decline_status';
$status_msg = 'Cancellation - pending approval';
$order_bg="cancel_order_status";
$cancel_bg="cancel_order_msg";
} else {}
?>
<!--<div class="order_statusbar text-center <?php echo $status_class; ?>">
<?php echo $status_msg; ?>
</div>-->

<div class="order_statusbar text-center <?php echo $order_bg;?>">
<h4><?php echo $status_msg; ?></h4>
<?php
if($orders[0]->order_status != 'cancelled_buyer' && $orders[0]->order_status != 'cancelled_supplier' && $orders[0]->order_status != 'cancelled_request' ) {
?>

<span class="small_text"><?php echo $sub_msg=($sub_msg!="") ? $sub_msg : "";?></span>
<?php
}
?>
</div>
<?php
if($orders[0]->order_status == 'cancelled_buyer' || $orders[0]->order_status == 'cancelled_supplier' || $orders[0]->order_status == 'cancelled_request' ) {
?>

<div class="order_statusbar text-center <?php echo $cancel_bg;?>">
<p><?php echo $orders[0]->order_buyer_cancel_msg; ?></p>
</div>
<?php
}
?>
<?php $sub_msg = $sub_status_msg = '';

if($orders[0]->order_status == 'declined')
{
$sub_status_msg = $orders[0]->order_supplier_note;
} else if($orders[0]->order_status == 'approval_declined') {
$sub_status_msg = $orders[0]->order_approver_dec_msg;
} else if($orders[0]->order_status == 'approved_with_note') {
$sub_status_msg = $orders[0]->order_supplier_note;
}

if($orders[0]->order_like_product_quality != 'na' || $orders[0]->order_like_service != 'na' || $orders[0]->order_like_price != 'na' || $orders[0]->order_like_responsiveness != 'na') {
if($orders[0]->order_like_product_quality == 'yes')
{
$sub_msg = 'Good product quality';
} 
if($orders[0]->order_like_service == 'yes')
{
if($sub_msg != '')
{
$sub_msg = $sub_msg.', good services';
} else {
$sub_msg = 'Good Services';
}
}
if($orders[0]->order_like_price == 'yes')
{
if($sub_msg != '')
{
$sub_msg = $sub_msg.', good product price';
} else {
$sub_msg = 'Good Product price';
}
}
if($orders[0]->order_like_responsiveness == 'yes')
{
if($sub_msg != '')
{
$sub_msg = $sub_msg.', good responsiveness';
} else {
$sub_msg = 'Good Responsiveness';
}
}  

if($sub_msg != '')
{
$sub_status_msg = '&nbsp; '.$sub_msg;
}
} 

if($sub_status_msg != '') {?>
<div class="order_statusinfo text-center top_wizard">
<p>"<?php echo $sub_status_msg; ?>"</p>
</div>
<?php } ?>

<?php if($orders[0]->is_modified == 1) {?>
<div class="order_statusinfo text-center">
<div class="small_text green_text">Order details were adjusted by ZeeMart on <?php echo date('d/m/Y', strtotime($orders[0]->order_updated_on)); ?></div>
</div>
<?php } ?>
<div class="order_detsec<?php echo ($orders[0]->order_status == 'declined' || $orders[0]->order_status == 'cancelled_buyer' || $orders[0]->order_status == 'cancelled_supplier' || $orders[0]->order_status == 'cancelled_request')?' overlay_hide':''; ?>">

<div class="orderdet_enhancement">
<div class="orderdet_enhancementico">
<img src="<?php echo skin_url();?>images/hdelivery_ico.png" alt="" />
</div>
<div class="orderdet_enhancementinfo">
<div class="orderdet_enhancementinfotop">
<?php
if($orders[0]->order_status=="delivered")
$deliver_status="Delivered";
else
$deliver_status="Delivery on";
?>
<span class="small_text"><?php echo $deliver_status;?></span>
<h2><?php echo date('d M Y (l)', strtotime($orders[0]->order_delivery_date)); ?></h2>
</div>
</div>
</div>


<div class="orderdet_enhancement_content">
<?php
if($orders[0]->order_status=="delivered")
{
?>
<div class="orderdet_artical_list">
<div class="orderdet_enhancement_contentico">
<img src="<?php echo skin_url();?>images/point_icon.png" alt="" />
</div>
<div class="orderdet_info">
<div class="orderdet_enhancement_deliverynote">
<h4 class="title1"><?php echo $status_msg;?></h4>

<p>"<?php echo $sub_status_msg; ?>"</p>

</div>
</div>
</div>
<?php
}
?>
<div class="orderdet_artical_list">
<div class="orderdet_enhancement_contentico">
<img src="<?php echo skin_url();?>images/point_icon.png" alt="" />
</div>
<div class="orderdet_info">
<div class="orderdet_enhancement_deliverynote">
<h4 class="title1"><?php echo $orders[0]->br_str_name." , ".str_replace('-', ' - ', strtoupper($orders[0]->order_delivery_slot)); ?></h4>
<?php /*?>
<p class="price_color"> <a rel="external" href="<?php echo buyer_url().'/order/delivery_address_change'; ?>">View Address . Change</a></p>
<?php */?>

<span>
    <?php
    if($orders[0]->buyer_modified!=1 && ($orders[0]->order_status=="pending" || $orders[0]->order_status=="waiting_for_approval"))
        {
    ?>
    <a href="#popup_delivery" data-rel="popup" data-transition="fade" class="small_text price_color ui-link" title="Export" aria-haspopup="true" aria-owns="export_orders" aria-expanded="false">Change Address</a> •
    <?php
        }
        ?>
    <a href="#popup_view_address" data-rel="popup" data-transition="fade" class="small_text price_color enable_goto_popup_windows ui-link" title="Go to Date" aria-haspopup="true" aria-owns="custom_select_date_goto" aria-expanded="false">View</a>
   </span>                         

</div>
</div>
</div>
<?php
if($orders[0]->order_status!='waiting_for_approval' && $orders[0]->order_status!='pending')
{
    ?>
<div class="orderdet_artical_list">
<div class="orderdet_enhancement_contentico">
<img src="<?php echo skin_url();?>images/icon-tick-circled-mini.png" alt="" />
</div>
<div class="orderdet_info">
<div class="orderdet_enhancement_deliverynote">
    
    
<ul class="po_issued_text">


<li><a href="<?php echo base_url().'buyer/order/view_pdf/'.encode_value($orders[0]->order_id); ?>" target="_blank" class="" title="View PDF">PO issued (PDF)</a></li>

<?php  if(($orders[0]->order_buyer_id == $logged_buyer_details['buyer_id'] || $orders[0]->order_approver_id == $logged_buyer_details['buyer_id']) && $cutoff_status!="") {
if(($orders[0]->order_approver_id ==$logged_buyer_details['buyer_id'] || $orders[0]->order_buyer_id == $logged_buyer_details['buyer_id']) && $cutoff_status!="" && ($orders[0]->order_status!='delivered' && $orders[0]->order_status!='closed')) { ?>
<li><a class="text-uppercase click_check" href="#popup_cancelnote_order" data-rel="popup" title="Cancel">Void PO</a></li>
<?php } ?>
<?php } ?>
</ul>
<p class="price_color"></p>
</div>
</div>
</div>
<input type="hidden" name="order_name" id="order_no" value="<?php echo encode_value($orders[0]->order_id);?>" />
<?php
}
?>
<?php if($orders[0]->order_buyer_note != '') { ?>
<div class="orderdet_artical_list">
<div class="orderdet_enhancement_contentico">
<img src="<?php echo skin_url();?>images/ico_list1_grey.png" alt="" />
</div>
<div class="orderdet_info">
<div class="orderdet_enhancement_deliverynote"> 
<p class="orderdet_info_txt">"<?php echo stripslashes($orders[0]->order_buyer_note); ?>"</p>
</div>
</div>
</div>
<?php } ?>
</div>

<div class="orderdet_enhancement">
<div class="orderdet_enhancementico">
<img src="<?php echo skin_url();?>images/hcart_ico.png" alt="" />
</div>
<div class="orderdet_info">
<div class="orderdet_delivery_infotop">
<div class="row">
<div class="col-xs-7">
<span class="small_text"><?php echo count($orders[0]->items); ?> item(s)</span>
<h2><?php echo get_currency().price_format($orders[0]->order_total_amt); ?></h2>
</div>
<div class="col-xs-5 text-right">
<span class="delivery_gatetextordered"><?php echo strtoupper($orders[0]->order_payment_method); ?></span>
</div>
</div>
</div>
</div>
</div>
    <form action="<?php echo base_url().'buyer/order/buyer_update_order';?>" method="POST" id="order_update">
<div class="orderdet_enhancement_content">
<?php if(!empty($orders[0]->items)) { 
foreach($orders[0]->items as $item) { 
    ?>
    

    <?php
if($item->oi_product_id!=0)
{
?>
    
    <input type="hidden" class="product_id" name="sup_company" value="<?php echo $orders[0]->supplier_company_id;?>">
    <input type="hidden" class="product_id" name="itemid[]" value="<?php echo $item->oi_id;?>">
    <input type="hidden" class="product_id" name="ordersid" value="<?php echo $orders[0]->order_id;?>">
    <input type="hidden" class="product_id" name="proprice[]" value="<?php echo $item->oi_product_price;?>">
    <input type="hidden" class="product_id" name="order_status" value="<?php echo $orders[0]->order_status;?>">
    <input type="hidden" class="delivery" name="delivery" value="<?php echo $orders[0]->company_delivery_charge;?>">
    <input type="hidden" class="delivery" name="minval" value="<?php echo $orders[0]->company_minimum_order_value;?>">
    
<div class="orderdet_artical_list">
<div class="orderdet_enhancement_itemleft"></div>
<div class="orderdet_enhancement_itemright">
<div class="row">
<div class="col-xs-8">
<div class="orderdet_enhancement_deliverynote">

<h4 class="title1">
<?php
if($item->oi_status=="D")
echo "<del>".output_val($item->product_name)."</del>"; 
else
echo output_val($item->product_name); 
?></h4>
<a class="small_text" href="#"><span class="small-text"><?php echo get_currency().price_format($item->oi_product_price).'/'.$item->oi_product_unit;?></span> &nbsp; 
<?php if($item->oi_product_note == '' || $item->oi_product_note == NULL) { 
if( ($orders[0]->order_status=='waiting_for_approval' || ($orders[0]->order_status=='pending' && $cutoff=='cutoff') ) && $orders[0]->buyer_modified!=1)
{
?>
<a class="cart_product_add_note" href="#addnote_item" data-rel="popup" data-transition="pop" data-note="" data-product="<?php echo encode_value($item->oi_product_id); ?>" data-cart="<?php echo encode_value($item->oi_id); ?>"><span class="small_text add_note_text_<?php echo encode_value($item->oi_product_id).'_'.encode_value($item->oi_id); ?>"><i class="fa fa-pencil"></i> Add note</span></a>
<?php 

}
}
?>


<?php if($item->adjusted > 0) { ?>
<i class="price_adjusttext fa fa-pencil">...</i>
<?php } ?>
</div>

</div>
<?php
if($item->oi_status!='D')
{

if( ($orders[0]->order_status=='waiting_for_approval' || ($orders[0]->order_status=='pending' && $cutoff=='cutoff') ) && $orders[0]->buyer_modified!=1)
{

?>

<div class="col-xs-4 text-right item_sub_amt" id="sub_amount_<?php echo encode_value($item->oi_id); ?>">
<a title="Remove" class="oi_item_del" data-id="<?php echo encode_value($item->oi_id); ?>">
<span class="small_text">&nbsp;<i class="fa fa-trash"></i></span>
</a>
</div>
<?php
}
}
else
{
?>
<div class="col-xs-5">
<a href="" class="ui-btn btn_bluebr btn_lg btn-block cart_btn add_back" title="" data-mode="new" data-id="<?php echo encode_value($item->oi_id); ?>">Add Back</a>
</div>
<?php
}
?>
</div>
<div class="clear-5">

</div>
<div class="row">
<div class="col-xs-4">
<div class="orderdet_enhancement_deliverynote">
<h3 class="price-title1"><?php 
$product_price+=$item->oi_product_price*$item->oi_product_qty;
echo get_currency().price_format($item->oi_product_price*$item->oi_product_qty); ?></h3>
</div>
</div>
<?php
if($item->oi_status!="D")
{

?>

<div class="col-xs-8 text-right">

<div id="np1" class="dpui-numberPicker">
<?php
if( ($orders[0]->order_status=='waiting_for_approval' || ($orders[0]->order_status=='pending' && $cutoff=='cutoff') ) && $orders[0]->buyer_modified!=1)
$button_status="onfocus='this.blur()"; 
?>
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<span id="<?php echo $item->oi_id; ?>" class="dpui-numberPicker-decrease qty_minus"></span>
</td>
<td>
    <input type="text" name="qty[]"  class="dpui-numberPicker-input qty_field" value="<?php echo $item->oi_product_qty;?>" <?php if($allow_decimal=='Y'){ ?> onkeypress="return isNumberKey(event)" <?php }else{ ?>  onkeypress="return isNumber(event)" <?php } ?> id="qty_field_<?php echo $item->oi_id;?>" data-id="<?php echo $item->oi_id; ?>" />
</td>
<td>
    <span id="<?php echo $item->oi_id; ?>" class="dpui-numberPicker-increase qty_plus"></span>

</td>
</tr>
</tbody>
</table>
</div>
</div>
<?php
}
?>
</div>
<?php
if($item->oi_product_note != '' || $item->oi_product_note != NULL) {
?>
<div class="row">
<div class="col-xs-12">
<span class="orderdet_info_txt">
<a class="cart_product_add_note" href="#addnote_item" data-rel="popup" data-transition="pop" data-note="<?php echo stripslashes($item->oi_product_note); ?>" data-product="<?php echo encode_value($item->oi_product_id); ?>" data-cart="<?php echo encode_value($item->oi_id); ?>"><span class="cartnote_added small_text add_note_text_<?php echo encode_value($item->oi_product_id).'_'.encode_value($item->oi_id); ?>"><?php echo stripslashes($item->oi_product_note); ?></span></a>
</span>

</div>
</div>      

<?php
}
?>
    
    <div class="border_underline"></div>
</div>
</div>
<?php
}
else if($item->oi_product_id==0 && ($item->oi_manual_product!='' || $item->oi_manual_product_qty!='') )
{
    
?>
<div class="orderdet_yellowbox">
<div class="orderdet_enhancement_itemleft"></div>
<div class="orderdet_yellowbox_itemright">
<p class="yellowbox_txt">Manually added-check price with supplier 
<input type="hidden" class="product_id" name="mid[]" value="<?php echo $item->oi_id;?>">
</p>
<div class="row">
<div class="col-xs-8">

<div class="text-input-wrapper text-right">
<?php 
if($item->oi_status=='D')
$manual_class="yellow_box";
else
$manual_class="";
?>
<input type="text" class="<?php echo $manual_class;?>" name="mproduct[]" value="<?php echo $item->oi_manual_product;?>" autocomplete="off" size="18"/><span title="Clear"><i class="fa fa-trash"></i></span>						
</div>
<?php
if($item->oi_status!='D')
{
?>

<div class="yellowbox_input">
<div class="yellowbox_inputleft">
<h2>Price TBC</h2>
</div>
<div class="yellowbox_inputright">
    <input type="text" class="form-control" name="mqty[]" id="" value="<?php echo $item->oi_manual_product_qty;?>">
</div>
</div>
<?php
}
?>
</div>
<?php
if($item->oi_status!='D')
{
    if( ($orders[0]->order_status=='waiting_for_approval' || ($orders[0]->order_status=='pending' && $cutoff=='cutoff') ) && $orders[0]->buyer_modified!=1)
{
?>

<div class="col-xs-4 text-right item_sub_amt" id="sub_amount_<?php echo encode_value($item->oi_id); ?>">
<a title="Remove" class="oi_item_del" data-id="<?php echo encode_value($item->oi_id); ?>">
<span class="small_text">&nbsp;<i class="fa fa-trash"></i></span>
</a>
</div>
<?php
}
}
else
{
?>
<div class="col-xs-5">
<a href="" class="ui-btn btn_bluebr btn_lg btn-block cart_btn add_back" title="" data-mode="new" data-id="<?php echo encode_value($item->oi_id); ?>">Add Back</a>
</div>
<?php
}
?>
</div>
<div class="border_underline"></div>
</div>
</div>

<?php
}
}
}
?>

<!----------- Delivery itmes end --------------->




<!----------- Add more from catalog Button Start --------------->
<div class="orderdet_artical_list">
<div class="orderdet_enhancement_itemleft"></div>
<div class="orderdet_info">
<div class="orderdet_carttable1">
<table class="table">

<tfoot>
    <tr>
            <td>
                    <b>Subtotal</b>
            </td>
            <td align="right" valign="top">
                    <b><?php echo get_currency().price_format($orders[0]->order_total_amt-$orders[0]->order_gst_amount-$orders[0]->order_delivery_amount); ?></b>
            </td>
    </tr>
    <?php if($orders[0]->order_gst_amount > 0){ ?>
    <!-- GST INTEGRATION -->
    <tr><td><?php $gstval =  $orders[0]->order_gst;  echo get_label('gst_text');  echo $gstval;?>%</td><td align="right" valign="top"><b><?php echo get_currency().price_format($orders[0]->order_gst_amount);?></b></td></tr>
    <?php } ?>
    <?php if($orders[0]->order_delivery_amount > 0){ ?>
    <!-- GST INTEGRATION -->
    <tr><td><b>Delivery charges</b></td><td align="right" valign="top"><b><?php echo get_currency().price_format($orders[0]->order_delivery_amount);?></b></td></tr>
    <?php } ?>

    <tr><td><b>Total </b></td><td align="right" valign="top"><b><?php echo get_currency().price_format($orders[0]->order_total_amt);?></b></td></tr>
    <!-- END GST INTEGRATION -->

</tfoot>
</table>
</div>
<?php if($item->oi_product_id==0)
{
?>

<p class="orderdet_carttxt">* Amount excludes items marked "Price TBC"</p>
<?php
}
?>
</div>
</div>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<!----------- Add more from catalog Button End--------------->
</div>
        
        <?php
        if($orders[0]->buyer_modified!=1 && ($orders[0]->order_status=="pending" || $orders[0]->order_status=="waiting_for_approval"))
        {
        ?>
    <button type="submit" class="ui-btn btn_lg btn_yellow btn-block" title="Save my edits">Save Edits</button>
        <?php
        }
        ?>
    </form>


    
<div class="contact_suppliersec">
<a href="#popup_contact" data-rel="popup" data-transition="fade" class="" title="" aria-haspopup="true" aria-owns="popup_contact" aria-expanded="false"><span><i class="fa fa-phone fa-lg"> </i></span> Contact Supplier</a>
</div>
<div class="contact_suppliersec">
<a href="#popup_terms_and_conditions" data-rel="popup" data-transition="fade" class="small_text text-uppercase" title="View Terms & Conditions"><span><i class="fa fa-list-alt fa-lg"> </i></span> View Terms & Conditions</a>                	
</div>
<?php if($orders[0]->order_status != 'waiting_for_approval' && $_SESSION['logged_buyer']['buyer_id'] != $orders[0]->order_approver_id){ ?>
<?php if(($orders[0]->order_status == 'confirmed' || $orders[0]->order_status == 'approved_with_note') && $logged_buyer_details['buyer_id'] == $orders[0]->order_buyer_id) { ?>
<!--<a href="" data-rel="popup" data-transition="fade" class="ui-btn btn_bluebr save_favourite <?php echo ($orders[0]->order_is_favourite)?'active remove_from_favourite':'add_to_favourite';?>" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title=""><i class="fa fa-heart-o"></i></a>
<a href="" class="ui-btn btn_bluebr reorder_this" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="">Repeat</a> -->
<div class="contact_suppliersec">

<a href="#" data-rel="popup" data-transition="fade" class="reorder_this" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title=""><span><i class="fa fa-repeat fa-lg"> </i></span> Repeat order</a>
</div>
<?php } ?>
<?php if($orders[0]->order_status == 'delivered' && $logged_buyer_details['buyer_id'] == $orders[0]->order_buyer_id) { ?>
<!--<a href="" data-rel="popup" data-transition="fade" class="ui-btn btn_bluebr save_favourite <?php echo ($orders[0]->order_is_favourite)?'active remove_from_favourite':'add_to_favourite';?>" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title=""><i class="fa fa-heart-o"></i></a>
<a href="" class="ui-btn btn_bluebr reorder_this" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="">Repeat</a> -->
<div class="contact_suppliersec">
<a href="#" data-rel="popup" data-transition="fade" class="reorder_this" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title=""><span><i class="fa fa-repeat fa-lg"> </i></span> Repeat order</a>
</div>
<?php } ?>
<?php if($orders[0]->order_status == 'delivered' && ($orders[0]->order_is_delivery_ontime == 'na' || $orders[0]->order_is_delivery_ontime == '')) { ?>
<a rel="external" href="<?php echo buyer_url().'/order/on-time-delivery/'.encode_value($orders[0]->order_id); ?>" data-transition="flow" class="ui-btn btn_blue" title="">Delivery on-time?</a>
<?php }  else if($orders[0]->order_is_delivery_ontime != 'na' && $orders[0]->order_like_product_quality == 'na') { ?>
<a rel="external" href="<?php echo buyer_url().'/order/rate/'.encode_value($orders[0]->order_id); ?>" data-transition="flow" class="ui-btn btn_blue" title="">How was the order?</a>
<?php } ?>
<?php /*if(($orders[0]->order_status == 'confirmed' || $orders[0]->order_status == 'approved_with_note') && check_passive_supplier($orders[0]->order_supplier_id) && $logged_buyer_details['buyer_id'] == $orders[0]->order_buyer_id) { */ ?>
<?php if(($orders[0]->order_status == 'confirmed' || $orders[0]->order_status == 'approved_with_note') && $logged_buyer_details['buyer_id'] == $orders[0]->order_buyer_id) { ?>
<div class="contact_suppliersec">
<a href="#delivery_confirm" data-rel="popup" data-transition="fade" title=""> <span><i class="fa fa-times fa-lg"> </i></span> Mark as delivered</a>
</div>
<?php } ?>
<?php }

if($orders[0]->order_buyer_id == $logged_buyer_details['buyer_id'] || $orders[0]->order_approver_id == $logged_buyer_details['buyer_id']) {
if(($orders[0]->order_approver_id ==$logged_buyer_details['buyer_id'] || $orders[0]->order_buyer_id == $logged_buyer_details['buyer_id']) && $cutoff_status=="") { ?>
<div class="orderd_cancelorder">
<a class="text-uppercase click_check" href="#popup_cancelnote_order" data-rel="popup" title="Cancel"> <span><i class="fa fa-times fa-lg"> </i></span> CANCEL ORDER</a>
</div>
<?php } ?>
<?php } ?>

</div>

<!-- Order terms and conditions popup start -->
<div class="overlay_popup" data-role="popup" id="popup_terms_and_conditions">
<div class="bottom_fixed">
<div class="popaction_list text-center">
<h3 class="title">Terms and Conditions</h3> 
<div>
<span><?php echo get_settings('settings_terms_conditions');?></span>
</div>
</div>
<a href="" data-rel="back" class="confirm_order_cancel_cancel ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel </a>  
</div>
</div>
<!-- Order terms and conditions popup end -->

<!-- Save favourite popup start -->
<div class="overlay_popup" data-role="popup" id="popup_savetofav">
<div class="bottom_fixed">
<a href="" class="ui-btn btn_white btn_lg btn-block" title="Save to Favourites">Save to Favourites </a>
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel </a>
</div>
</div>

<?php
if($orders[0]->order_status == 'approved_with_note' || $orders[0]->order_status == 'pending' || $orders[0]->order_status == 'confirmed' || ($orders[0]->order_status == 'waiting_for_approval' && ($orders[0]->order_approver_id ==$logged_buyer_details['buyer_id'] || $orders[0]->order_buyer_id == $logged_buyer_details['buyer_id']))) {

if($orders[0]->order_status == 'confirmed' || $orders[0]->order_status == 'approved_with_note')
$type_name = 'cancelled_request';
else
$type_name = 'cancelled_buyer';
?>

<!-- Cancel order notes popup start -->
<div class="overlay_popup" data-role="popup" id="popup_cancelnote_order" >
<div class="alert alert-danger alert-fixed error-order_note"></div>
<div class="bottom_fixed">
<div class="popaction_list text-center">  
<h3 class="title">
<div class="row">
<div class="col-xs-7 text-left">REASON FOR VOIDING PO</div>
<div class="col-xs-5 text-right"><a class="small_text remove_order_notes" href="">Remove</a></div>
</div>
</h3>
<?php echo form_open(base_url().'buyer/order/change_status', array('name' => 'cancel_with_note_form', 'method'=>'POST', 'id'=>'cancel_with_note_form')); ?>
<textarea id="order_note_val" name="note" placeholder="Reason" class="required"></textarea>
<input type="hidden" name="order" id="form_order_id" value="" />
<input type="hidden" name="type" id="type" value="<?php echo $type_name; ?>" />
</form>
</div>
<a href="" class="ui-btn btn_white btn_lg btn-block cancel_order_accept_with_note" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Accept order with this note added">Void PO & notify supplier</a>  
<a href="" data-rel="back" class="cancel_order_accept_with_note_cancel ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel </a>  
</div>
</div>		
<!-- Cancel order with notes popup end -->

<?php } ?>

<!-- Save favourite popup end -->
<!-- popup start -->
<div class="overlay_popup" data-role="popup" id="popup_delivery">
<header data-role="header" data-position="fixed" class="header">
<div class="header_titlebar">
<a href="<?php echo buyer_url().'/settings'; ?>" data-rel="back" class="hleft_link small_text cancel_link_button"><i class="fa fa-chevron-left fa-lg"> </i> </a>
<h1 class="title1">Edit delivery details</h1>
</div>
</header>
<div data-role="main" class="content_sec delivery_section1">
<div style="margin: 100px 0; display:none;">
<a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn btn_blue btn_lg btn-block cart-confirm-box">Dialog Popup</a>
<a href="#removepopupDialog" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn btn_blue btn_lg btn-block remove-confirm-box">Dialog Popup</a>
<a href="#editDialog" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn btn_blue btn_lg btn-block save_edits">Dialog Popup</a>
<div class="popup_dialog" data-role="popup" id="popupDialog" data-dismissible="false">
<div class="popup_dialogtable">
<div class="popup_dialogin">
<div class="popup_dialogbx">
<div data-role="header" data-theme="a">
<h1>Confirmation</h1>
</div>
<div role="main" class="ui-content">
<h3 class="ui-title">Are you sure want to remove this item?</h3>
<?php /* <p>This action cannot be undone.</p> */ ?>
<a href="#" class="ui-btn btn_bluebr" data-rel="back">Cancel</a>
<a href="#" class="ui-btn btn_blue" id="cart-box-confirm" data-id="" data-rel="back" data-transition="flow">Delete</a>
</div>
</div>
</div>
</div>
</div>
<div class="popup_dialog" data-role="popup" id="removepopupDialog" data-dismissible="false">
<div class="popup_dialogtable">
<div class="popup_dialogin">
<div class="popup_dialogbx">
<div data-role="header" data-theme="a">
<h1>Confirmation</h1>
</div>
<div role="main" class="ui-content">
<h3 class="ui-title">Are you sure want to restore this item?</h3>
<?php /* <p>This action cannot be undone.</p> */ ?>
<a href="#" class="ui-btn btn_bluebr" data-rel="back">Cancel</a>
<a href="#" class="ui-btn btn_blue" id="remove-box-confirm" data-id="" data-rel="back" data-transition="flow">Restore</a>
</div>
</div>
</div>
</div>
</div>

</div>
<!---------- Delivery to start ---------->
<div class="step_sec ">
                  <div class="container">
                     <div class="step_toptt text-center">
                        <i class="step_no">1</i>
                        <h3 class="title">Deliver to:</h3>
                     </div>
					<form method="POST" action="<?php echo buyer_url().'/order/buyer_update_order';?>" >
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
					<input type="hidden" name="ordersid" value="<?php echo $orders[0]->order_id; ?>"> 
					<input type="hidden" name="order_status" value="<?php echo $orders[0]->order_status; ?>"> 
                    <div class="setp_controlsec">
					
					<?php
                                        
					foreach($stores as $sto){?>
                        <div class="ui-field-contain checkbox_sec select_pickup_store">
                           <div class="ui-checkbox">
                              <label class="ui-btn ui-checkbox-off ui-btn-icon-right checkbox_store_status load_store_time_slots" data-store="<?php echo $sto->br_str_id;?>"><?php echo $sto->br_str_name;?></label>
                              <input class="checkbx_right checkbx_pickup_store" id="delivery_store" name="order_store_id" <?php if($orders[0]->order_store_id==$sto->br_str_id){echo "checked";}?> data-enhanced="true" type="checkbox" value="<?php echo $sto->br_str_id;?>">
                           </div>
                        </div>
                    <?php }?>
						<div class="ui-field-contain">
                           <textarea id="delivery_spl_note" name="order_buyer_note" placeholder="Any special notes for the delivery?" class="ui-input-text ui-shadow-inset ui-body-inherit ui-corner-all ui-textinput-autogrow"><?php echo $orders[0]->order_buyer_note;?></textarea>
                        </div>
					</div>
					</div>
					<button type="submit" class="ui-btn btn_white btn_lg btn-block" title="Send to requester">Edit Details</button> 
					</form>
					<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel</a>
               </div>
<!---------- Delivery to end ---------->
<!---------- Delivery date start  ---------->

<!---------- Delivery date end ---------->
</div>
</div>
<!-- popup end -->
<!-- contact popup start -->
<div class="overlay_popup" data-role="popup" id="popup_contact">
<div class="bottom_fixed">
<div class="popaction_list text-center">
<h3 class="title">Contact Supplier (MR. <?php echo output_val($orders[0]->supplier_firstname).' '.stripslashes($orders[0]->supplier_lastname); ?>)</h3>
<ul>
<?php if($this->agent->is_mobile()) { ?>
<li><a href="tel:<?php echo $orders[0]->supplier_phone_no; ?>" title="Call" <?php echo (
$orders[0]->supplier_phone_no == '')?'style="display:none;"':''; ?> class="mybuyers_buyer_call">Call</a></li>
<li><a href="sms:<?php echo $orders[0]->supplier_phone_no; ?>" title="SMS" <?php echo ($orders[0]->supplier_phone_no == '')?'style="display:none;"':''; ?> class="mybuyers_buyer_sms">SMS</a></li>
<?php /* <li><a href="tel:<?php echo $orders[0]->supplier_phone_no; ?>" title="WhatsApp" <?php echo ($orders[0]->supplier_phone_no == '')?'style="display:none;"':''; ?> class="mybuyers_buyer_whatsapp">WhatsApp</a></li> */ ?>
<?php } else { ?>
<li><a href="" title="Call" <?php echo ($orders[0]->supplier_phone_no == '')?'style="display:none;"':''; ?> class="mybuyers_buyer_mobile">Call: <?php echo $orders[0]->supplier_phone_no; ?></a></li>
<li><a href="" title="Email Address" <?php echo ($orders[0]->supplier_email == '')?'style="display:none;"':''; ?> class="mybuyers_buyer_email">Email: <?php echo $orders[0]->supplier_email; ?></a></li>
<?php } ?>
</ul>
</div>
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel </a>
</div>
</div>
<!-- contact popup end -->

<!-- View address popup start -->
		<div class="overlay_popup" data-role="popup" id="popup_view_address">
			<div class="bottom_fixed">
				<div class="popaction_list text-center">
					<ul>
						<li><a href="" title="Delivery Location" class="mybuyers_buyer_mobile">Delivery Location: <?php echo $orders[0]->br_str_address1; ?></a></li>
					</ul>
				</div>
				<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel </a>
			</div>
		</div>
		<!-- View address popup end -->

<!-- place order popup start -->
<div class="overlay_popup" data-role="popup" id="popup_approval">
<div class="bottom_fixed">
<div class="alert alert-danger alert-fixed"></div>
<div class="popaction_list text-center">
<h3 class="title">APPROVE ORDER & SEND TO SUPPLIER?</h3>
<ul>
<li><a href="" class="approve_this_approval" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Confirm & submit order">Yes, approve this order</a></li>
<a href="#popup_respondorder" id="open_popup_respondorder" class="ui-btn btn_white btn_lg btn-block " title="Decline">Decline </a>
</ul>
</div>
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block cancel_this_approval" title="Cancel">Cancel </a>
</div>
</div>
<!-- place order popup end -->

<!-- close order popup start -->
<div class="overlay_popup" data-role="popup" id="close_order">
<div class="bottom_fixed">
<div class="alert alert-danger alert-fixed"></div>
<div class="popaction_list text-center">
<h3 class="title">CLOSE THIS ORDER?</h3>
<p>Order CANNOT be reconciled after it is closed</p>
<ul>
<li><a href="" class="close_this_order" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Confirm & close order">Yes, close order now</a></li>
</ul>
</div>
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block cancel_this_approval" title="Cancel">Cancel </a>
</div>
</div>
<!-- close order popup end -->

<!-- Reject order popup start -->
<div class="overlay_popup" data-role="popup" id="popup_reject">
<div class="bottom_fixed">
<div class="alert alert-danger alert-fixed"></div>
<div class="popaction_list text-center">
<h3 class="title">APPROVE ORDER & SEND TO SUPPLIER?</h3>
<ul>
<li><a href="" class="approve_this_approval" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Confirm & submit order">Yes, approve this order</a></li>
</ul>
</div>
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block cancel_this_approval" title="Cancel">Cancel </a>
</div>
</div>
<!-- Reject order popup end -->


<!-- Respond to order popup start -->
<div class="overlay_popup" data-role="popup" id="popup_respondorder">
<div class="bottom_fixed">
<div class="alert alert-danger alert-fixed"></div>
<div class="popaction_list text-center">
<h3 class="title">Reason For Rejection</h3>  
<form>
<textarea id="decline_msg" name="decline_msg" class="decline_msg" placeholder=""></textarea>
</form>
</div>
<a href="" class="ui-btn btn_white btn_lg btn-block decline_this_approval" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Send to requester">Send to requester </a>   
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block" title="Cancel">Cancel </a>   
</div>
</div>
<!-- Respond to order popup end -->
<!-- Mark delivery popup start -->
<div class="overlay_popup" data-role="popup" id="delivery_confirm">
<div class="bottom_fixed">
<div class="popaction_list text-center">
<h3 class="title">Mark order as Delivered?</h3>  
<ul>
<li><a href="" class="confirm_delivered" data-order="<?php echo encode_value($orders[0]->order_id); ?>" title="Yes, Mark as Delivered">Yes, Mark as Delivered</a></li>
</ul>
</div>
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block confirm_delivered_cancel" title="Cancel">Cancel </a>   
</div>
</div>
<!-- Mark delivery popup end -->

<!-- Add notes start -->
<div class="overlay_popup" data-role="popup" id="addnote_item" >
<div class="bottom_fixed">
<div class="alert alert-fixed alert-danger error-cart-note" style="display:none;"></div>
<div class="popaction_list text-center">
<h3 class="title">
<div class="row">
<div class="col-xs-7 text-left">Add notes for this item</div> 
<div class="col-xs-5 text-right"><a class="small_text remove_note" data-cart="" data-product="" href="">Remove</a></div>
</div>
</h3>     
<?php echo form_open(base_url()."buyer/order/save_order_product_note", array('id' => "add_note", 'name'=>"add_note", 'method'=>"post")); ?>
<textarea id="cart-note" name="cart-note" placeholder="" class="required"></textarea>
<input type="hidden" id="cart-product" name="product" value="" />
<input type="hidden" id="cart-cart" name="cart" value="" />
</form>
</div>
<a href="" class="ui-btn btn_white btn_lg btn-block save_order_note" title="Save">Save</a>   
<a href="" data-rel="back" class="ui-btn btn_white btn_lg btn-block save_add_note_cancel" title="Cancel">Cancel</a>   
</div>
</div>              
<!-- Add notes end -->  

</div>
<?php if($orders[0]->order_status == 'approved_with_note' || $orders[0]->order_status == 'confirmed' || $orders[0]->order_status == 'delivered') { ?>
<footer class="footer footer_greybg" data-role="footer">
<a rel="external" href="<?php echo base_url().'buyer/order/view_pdf/'.encode_value($orders[0]->order_id); ?>" target="_blank" class="ui-btn btn_blue btn_lg btn-block" title="Create a PDF of this order summary">Create a PDF of this order summary</a>
</footer>
<?php } ?>
</div>
<!-- Order detail page end -->

<?php $this->load->view('includes/footer_includes');
echo load_js(array('buyer/reorder.js','buyer/cart.js')); ?>
<script>
$(document).ready(function() {
$('#open_popup_approval').click(function() {
$('#popup_approval').popup('open');
});
$('#open_popup_respondorder').click(function() {

$('#popup_approval').popup({
afterclose: function(){
setTimeout(function () {
$("#popup_respondorder").popup("open", {
positionTo: "#popup_approval"
})
}, 100);
}
});
$("#popup_approval").popup("close");
});
var return_val = "<?php echo $this->session->flashdata('success'); ?>";
if(return_val != '')
{
$('.alert-custom').text(return_val).show();
setTimeout(function() {
$('.alert-custom').hide();
}, 5000);
}

$('.save_order_note').click(function(){
$('#add_note').submit();
});


/* -------------- Append Yellow box --------------*/ 

$("#addCF2").click(function(){
$('.customFields2').each(function(){
$(this).append('<div class="col-xs-12"><p align="right"><a href="javascript:void(0);" class="remCF2"> <span><img src="<?php echo skin_url();?>images/icon-trash.png" alt="" /></span></a></p><form id="search-form" action="" method="get"><div class="text-input-wrapper text-right"><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input type="text" name="q" autocomplete="off" size="18"></div><span title="Clear"><i class="fa fa-trash"></i></span></div></form><div class="yellowbox_input"><div class="yellowbox_inputleft"><h2>Price TB</h2></div><div class="yellowbox_inputright"><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input type="email" class="form-" id=""></div></div></div></div>');
});
$(".remCF2").on('click',function(){
$(this).parent().parent().remove();
});


});

/* -------------- Append Yellow box --------------*/


});
</script>
<?php $this->load->view('includes/footer'); ?>
