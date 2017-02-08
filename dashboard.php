<?php
include_once ("z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
}
$payto=$_SESSION['username'];

/* Code by karthikeyan starts */
// Display warning message of package expire from before 7 days onwards
// Here we will find the balance package expire days for current user
// If it expired, balance package expire days considered as 0
$package_check_sql = mysqli_query($con, "SELECT CASE WHEN CURDATE() < `expiry` THEN DATEDIFF(`expiry`, CURDATE()) ELSE 0 END AS tot_days FROM `affiliateuser` WHERE username='$payto'");
$package_check_row = mysqli_fetch_assoc($package_check_sql);
$tot_days = $package_check_row['tot_days'];
$package_expired = true;
$show_expire_bf_7 = false;
if ($tot_days != 0)
{
	$package_expired = false;
	if ($tot_days <= 7)
	{
		$show_expire_bf_7 = true;
	}
}
/* Code by karthikeyan ends */



if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo']) && (($_POST['todo'])=="paymentpost"))
{

$username=mysqli_real_escape_string($con,$_SESSION['username']);

$status = "OK"; //initial status
$msg="";



$rr=mysqli_query($con,"SELECT Id FROM affiliateuser WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$uid = $r[0];

$rr=mysqli_query($con,"SELECT pcktaken FROM affiliateuser WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$pc = $r[0];

$rr=mysqli_query($con,"SELECT mpay FROM packages WHERE id='$pc'");
$r = mysqli_fetch_row($rr);
$mpay = $r[0];

$rr=mysqli_query($con,"SELECT tamount FROM affiliateuser WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$nr = $r[0];

if($nr<$mpay){
$msg=$msg."You are not eligible for payment!!!! Contact support for more info.<BR>";
$status= "NOTOK";
}

if($status=="OK")
{
$res11=mysqli_query($con,"update affiliateuser set tamount=0 where username='$username'");
$res1=mysqli_query($con,"INSERT INTO payments (userid, payment_amount, createdtime) VALUES ('$uid', '$nr', NOW())");

if($res1)
{
$errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your Payment Request Has Been Sent! Payment Will be Processed After Successful Verification On Time.</div>"; //printing error if found in validation

}
else
{
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help. </div>"; //printing error if found in validation
				
	 
}


} 
else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
	 
}

}


?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Roodabatoz</title>
<meta name="description" content="MLM, Earning online, multi level marketing,roodab" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />






<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->


<script  type="text/javascript" src="dist/js/jquery-1.7.1.min.js"></script>

<script type="text/javascript" src="dist/js/select2.js"></script>
<link href="dist/css/select2.min.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>

</head>
<body class="" >
<section class="vbox">
  <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm"><?php $query="SELECT header from settings where sno=0"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$header="$row[header]";
	print $header;
	}
  ?></a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
  
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}

   
	   
	   ?>
	   <b class="caret"></b> </a>
        <ul class="dropdown-menu animated fadeInRight">
          <span class="arrow top"></span>
          
          <li> <a href="profile.php">Profile</a> </li>
          <!--<li> <a href="notifications.php"> Notifications </a> </li>
          <li> <a href="contact.php">Help</a> </li>
          <li class="divider"></li>-->
          <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-light aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php
		  $sql="SELECT fname,country,pcktaken FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
		$coun=$row[1];
		$pcktaken=$row[2];
		 $sql2="SELECT name FROM packages WHERE id=$pcktaken";
		 if ($result2 = mysqli_query($con, $sql2)) {
		  while ($row2 = mysqli_fetch_row($result2)) {
		 
		 $pkname=$row2[0];
		 }
		 }
		
    }

}

   
	   
	   ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block"><?php print "$pkname Member"; ?></span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    
                    <li> <a href="profile.php">Profile</a> </li>
                    <li class="divider"></li>
                    <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <?php require("user_nav.php"); ?>
              <!-- / nav -->
            </div>
          </section>
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="logout.php" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="hbox stretch">
          <section>
            <section class="vbox">
              <section class="scrollable padder" style="background-image: url('images/bg17.jpg');">
                <section class="row m-b-md">
                  <div class="col-sm-6">
				  
                    <h3 class="m-b-xs text-black">Dashboard</h3>
                    <small style="color: black;">Welcome back, <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}
if($_SERVER['REQUEST_METHOD'] == 'POST')
						{
						print $errormsg;
						}
   
	   
	   ?>, <i class="fa fa-map-marker fa-lg text-primary"></i> <?php print $coun ?></small> </div>
	   
                  <div class="col-sm-6 text-right text-left-xs m-t-md">
				  
                    
                    <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a> <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a> </div>
                </section>
                
                
               
                <div class="row">
			<div class="col-sm-12">
				
                     		<div class="panel b-a">
                        		<div class="row m-n">
                        		
                        		
                	 <div class="col-md-2 green" style="  background-color: rgba(173, 255, 47, 0.31);">
                            <a href="dashboard.php" class="block padder-v hover">
                              
                              <span class="clear">
                              <i class="i i-home"></i>
                                <small>Dashboard</small>
                              </span>
                            </a>
                          </div>
                          <div class="col-md-2 b-b" style=" background-color: rgba(255, 0, 0, 0.25);">
                            <a href="downline.php" class="block padder-v hover">
                             
                              <span class="clear">
                                <i class="i i-user2"></i>
                                <small >Marketer</small>
                              </span>
                            </a>
                          </div>
                          
                          <div class="col-md-2 b-b" style=" background-color: rgba(255, 255, 0, 0.27);">
                            <a href="invoice.php" class="block padder-v hover">
                             
                              <span class="clear">
                                 <i class="i i-support"></i>
                                <small >Account Info</small>
                              </span>
                            </a>
                          </div>
                          
                          <div class="col-md-2 b-b" style=" background-color: rgba(0, 0, 255, 0.18);">
                            <a href="profile.php" class="block padder-v hover">
                             
                              <span class="clear">
                                  <i class="i i-list"></i>
                                <small >Profile</small>
                              </span>
                            </a>
                          </div>
                          
                           <div class="col-md-2 b-b" style=" background-color: rgba(252, 198, 51, 0.55);">
                            <a href="http://roodabatoz.com/products/" class="block padder-v hover">
                             
                              <span class="clear">
                                  <i class="i i-list"></i>
                                <small >Products</small>
                              </span>
                            </a>
                          </div>
                          
                          
                           <div class="col-md-2 b-b" style=" background-color: rgba(0, 255, 173, 0.18);">
                            <a href="http://roodabatoz.com/products/my-account/" class="block padder-v hover">
                             
                              <span class="clear">
                                  <i class="i i-list"></i>
                                <small >Seller Dashboard</small>
                              </span>
                            </a>
                          </div>
                          
                          <div class="col-md-2 b-b" style=" background-color: rgba(255, 165, 0, 0.31);">
                            <a href="http://www.neracagemilang.com/" class="block padder-v hover">
                             
                              <span class="clear">
                                  <i class="i i-cube"></i>
                                <small >Pay Bill</small>
                              </span>
                            </a>
                          </div>
						  
						  <!-- code added by karthikeyan starts -->
						  <div class="col-md-2 b-b" style=" background-color: rgba(255, 165, 0, 0.88);">
                            <a href="signup.php?aff=<?php echo $_SESSION['username'];?>&pack=new" class="block padder-v hover">
                             
                              <span class="clear">
                                  <i class="i i-cube"></i>
                                <small >Join Other Packages</small>
                              </span>
                            </a>
                          </div>
						  <!-- code added by karthikeyan ends -->
                          
                          <div class="col-md-2 b-b" style=" background-color: rgba(165, 42, 127, 0.19);">
                            <a href="logout.php" class="block padder-v hover">
                             
                              <span class="clear">
                                  <i class="i i-logout icon"></i>
                                <small >Logout</small>
                              </span>
                            </a>
                          </div>
                          
                   
                	
                          
                        </div>
                      </div>
                    </div> </div>
                
                
                
                
                <div class="row">
				<div class="col-sm-12">
				
                      <div class="panel b-a">
                        <div class="row m-n">
                        
                          <div class="col-md-6 b-b">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="i i-users2 i-sm text-white"></i>
                              </span>
                              <span class="clear">
							  <?php
							  $sqlquery="SELECT username,country,doj,pcktaken FROM affiliateuser where active='1' AND referedby='".$_SESSION['username']."' ORDER BY Id DESC LIMIT 1"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$referusername=$row2[0];
$refcountry=$row2[1];
$refdate=$row2[2];
$refpckid=$row2[3];
$sqlquery11="SELECT name FROM packages where id = $refpckid"; //fetching no of days validity from package table from databse
$rec211=mysqli_query($con,$sqlquery11);
@$row211 = mysqli_fetch_row($rec211);
$refpckname=$row211[0]; //assigning we
							  
							  ?>
                                <span class="h3 block m-t-xs text-success"><?php print $referusername; ?></span>
                                <small class="text-muted text-u-c">Last Referral Username</small>
                              </span>
                            </a>
                          </div>
						    <div class="col-md-6 b-b b-r">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                                <i class="i i-plus2 i-1x text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-danger"><?php print $refpckname; ?></span>
                                <small class="text-muted text-u-c">Package Purchased</small>
                              </span>
                            </a>
                          </div>
                          <div class="col-md-6 b-b b-r">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                                <i class="i i-location i-sm text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-info"><?php print $refcountry; ?><span class="text-sm"></span></span>
                                <small class="text-muted text-u-c">location</small>
                              </span>
                            </a>
                          </div>
                          <div class="col-md-6 b-b">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                <i class="i i-alarm i-sm text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-primary"><?php print $refdate; ?></span>
                                <small class="text-muted text-u-c">Date</small>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      <!-- balance transfer code starts here-->
		    <div class="col-lg-12">
                <section class="panel panel-default">
                  <div class="panel-body">
					 
					 <?php /* Code by karthikeyan starts */
					 if ($show_expire_bf_7){
					?>
					<h4>Your package is about to expire in <?php echo $tot_days;?> day(s). <a href="renewaccount.php">Upgrade package</a></h5>
					 <?php } ?>
					 
					 <?php
					 if ($package_expired){
					?>
					<h4>Your package was expired. You could not transfer your balance to other marketer until you upgrade your package. <a href="renewaccount.php">Upgrade package</a></h5>
					 <?php }else{
					/* Code by karthikeyan ends */ ?>
					 <h4>Share Balance to Marketer</h4><h5>(to share the balance. you should have more than 50 credit balance)</h5>
					 <form action="dashboard.php" method="post">
						 <div class="form-group">
							<?php /* Code by karthikeyan starts */
							/*$query_marketer="SELECT username,tamount FROM  affiliateuser";
								   $result_marketer= mysqli_query($con,$query_marketer);
							?>
	 
							<select class="col-xs-4 js-example-basic-single" name="marketer" id="marketer-sel" required >
								<option value="">--select marketer--</option>
								<?php while($row = mysqli_fetch_array($result_marketer))
																  {
																   $marketer_name="$row[username]";
																   
															 ?>     
										<option vallue="<?php echo $marketer_name; ?>"><?php echo $marketer_name; ?></option>
								<?php } ?>
							</select>*/
							/* Code by karthikeyan ends */?>
							<input type="text" name="marketer" id="marketer-sel" required class="col-xs-4 js-example-basic-single" placeholder="Enter Marketer">
						 </div>
						 <br/> <br/>
						 
						 <div class="form-group">
							<input type="text" name="amt" id="amt" placeholder="Enter Amount to share" class="col-xs-4" required />
							
						 </div>
						 <br/>
						 <div class="form-group">
							<button type="submit" class="btn btn-primary col-xs-4" name="transfer" id="transfer">Transfer</button>
						 </div>
					 </form>
					 <?php /* Code by karthikeyan starts */}/* Code by karthikeyan ends */ ?>
				  </div>
				  
				  <?php
				  if(isset($_POST['transfer'])){
				  
				
				  
				  	$amount=$_POST['amt'];
				  	$transfer_to=$_POST['marketer'];
				  	$transfer_form=$_SESSION['username'];
				  	
				  	$query6=mysqli_query($con,"SELECT  COUNT(*) FROM affiliateuser WHERE username = '$transfer_to'");
				        $row6 = mysqli_fetch_row($query6);
				         $numrows = $row6[0];
				        
				  	if($numrows==1)
				  	{
				  	$query5=mysqli_query($con,"SELECT  tamount As TotalAmt1 FROM affiliateuser WHERE username = '$transfer_form'");
					$row5=$query5->fetch_array(MYSQLI_ASSOC);
				        $tot_bal_avail=($row5['TotalAmt1']); 
						/* Code by karthikeyan starts */
						$tot_amt=$tot_bal_avail-intval($amount);
				  	
				  					  	
				  	if($tot_amt>50){
					/* Code by karthikeyan ends */
					  	
					  	$up_query1=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt."' where username='".$transfer_form."'");
					  	$query_trans=mysqli_query($con,"insert into transfer_history values ('','$transfer_form','$transfer_to','$amount')");
					  	$query4=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$transfer_to'");
						$row4=$query4->fetch_array(MYSQLI_ASSOC);
						$tot_amt2=($row4['TotalAmt']+$amount); 
					  	$up_query2=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt2."' where username='".$transfer_to."'");
					  	
					  	print "
				<script language='javascript'>
				        alert('Balance shared to marketer successfully!');
				        window.location = 'dashboard.php';
					
				</script>
			"; 		
			
					  }
					  else
					  { 
					  	print "
				<script language='javascript'>
				        alert('Insufficient Balance to Transfer!');
					
				</script>
			"; 		
					//window.location = 'dashboard.php';  
					   }
					   
					   
					   
					   
					   }
					   else
					   {
					   
					   print "<script language='javascript'>  alert('Enter Valid Marketer!');</script>"; 		
					   
					   }	
				  }
				  ?>
				  
				  
				 </section>
			</div>
<!-- code ends here -->
 			  
				<div class="col-lg-12">
                <section class="panel panel-default">
                  <div class="panel-body">
                    <?php $query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount FROM  affiliateuser where username = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $aid="$row[id]";
 $regdate="$row[doj]";
 $name="$row[fname]";
 $address="$row[address]";
 $acti="$row[active]";
 $pck="$row[pcktaken]";
 $ear="$row[tamount]";
 
 }
 ?> 
 <?php $query="SELECT * FROM  packages where id=$pck"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $pname="$row[name]";
 $pdetails="$row[details]";
 $pprice="$row[price]";
 $pcur="$row[currency]";
 $ptax="$row[tax]";
 $mpay="$row[mpay]";
 }
 @$left=$mpay-$ear; 
@$pro=(($ear/$mpay)*100);
 ?>
 
                  <footer class="panel-footer bg-info text-center">
                    <div class="row pull-out">
                      <div class="col-xs-6">
                        <div class="padder-v"> <span class="m-b-xs h3 block text-white"> credit <?php print $ear ?></span> <small class="text-muted">Earnings</small> </div>
                      </div>
                      <div class="col-xs-6 dk">
					  <?php
$result = mysqli_query($con,"SELECT count(*) FROM  affiliateuser where active='1' AND referedby = '".$_SESSION['username']."'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];

?>
                        <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php print $numrows ?></span> <small class="text-muted">Referrals (direct) </small> </div>
                      </div>



	 <!-- code for showing the upgradation earning--> 
					  <?php
			
$result = mysqli_query($con,"SELECT sum(upgrade_cost) AS up_tot FROM  affliate_stage_bonus where bonus_to = '".$_SESSION['username']."'");
$row = mysqli_fetch_row($result);
$tot = $row[0];
if($tot !=0){

?>
					  <div class="col-xs-6 dk">
					    <div class="padder-v"> 
							<span class="m-b-xs h3 block text-white">
								credits <?php print $tot ?>
							</span> 
							<small class="text-muted">Up-gradation Credit </small> 
						</div>
                      </div>
<?php } ?>					  
					   <!-- code ends here for showing the upgradation earning--> 






                      
                    </div>
                  </footer>
				     <section class="panel panel-default" id="progressbar">
                  <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                      
                    </ul>
					<div class="form-group">
					  <input type="hidden" name="todo" value="post">
                        <label>Your Referral Invite URL</label>
                        <input type="text" value="<?php $query121="SELECT * FROM  settings"; $result121 = mysqli_query($con,$query121);
$i=0;
while($row121 = mysqli_fetch_array($result121))
{
	
	
	$wlink="$row121[wlink]";
	
	}
				
					  
		$pathu="/members/signup.php?aff=";		 print $wlink.$pathu.$_SESSION['username'] ?>" class="form-control" placeholder="Your Invite URL" name="inviteurl" >
                      </div>
                    Next Payment Progress bar </header>
                  <ul class="list-group">
                    
                    <li class="list-group-item">
                      <div class="progress progress-sm m-t-sm">
                        <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="<?php print $pro ?>%" style="width: <?php print $pro ?>%">
						
						</div>
						
                      </div>
					  
                      
                    </li>
					<br/>
					<h3 align="center"><?php 
					
					
					if($left<=0)
					{
					$congomsg1="Congratulations you have reached minimum payout!!!! You can submit request for payment. </br>";
					print $congomsg1;
					$congomsg2="<form action='"; 
					print $congomsg2;
					echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8");
					$congomsg3="' method='post'></br><input type='hidden' name='todo' value='paymentpost'><button type='submit' class='btn btn-success btn-s-xs'>Click Here To Send Payment Request</button>  </form> ";
					print $congomsg3;
					}
					
					else
					{
					print " You need to have credit <b>$left</b> more to become eligible for use. ";
					}
					
					?></h3>
                    
                  </ul>
                </section>
                </section>
              </div>

                  
                  <div class="col-md-6 col-sm-6">
                    <div class="panel b-a">
						  <?php $query="SELECT * FROM  settings"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $fblink="$row[fblink]";
 $twilink="$row[twitterlink]";
 
 }
 ?>
                      <div class="panel-heading no-border bg-primary lt text-center"> <a href="<?php print $fblink ?>"> <i class="fa fa-facebook fa fa-3x m-t m-b text-white"></i> </a> </div>
                      <div class="padder-v text-center clearfix">
                        <div class="col-xs-6 b-r">
						<div class="h3 font-bold">Like</div>
                          <small class="text-muted">us on facebook</small> 
                          </div>
                        <div class="col-xs-6">
						<div class="h3 font-bold">Right</div>
                          <small class="text-muted">now</small>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="panel b-a">
                      <div class="panel-heading no-border bg-info lter text-center"> <a href="<?php print $twilink ?>"> <i class="fa fa-twitter fa fa-3x m-t m-b text-white"></i> </a> </div>
                      <div class="padder-v text-center clearfix">
                        <div class="col-xs-6 b-r">
                          <div class="h3 font-bold">Follow</div>
                          <small class="text-muted">us on twitter</small> </div>
                        <div class="col-xs-6">
                          <div class="h3 font-bold">Right</div>
                          <small class="text-muted">now</small> </div>
                      </div>
                    </div>
                  </div>
               
                </div>
                
                
              
            </section>
          </section>

        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>