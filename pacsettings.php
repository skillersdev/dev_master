<?php
include_once ("z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Roodabatoz Packages Settings</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->

        
</head>
<body class="">
<section class="vbox">
  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm">Roodabatoz</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
  
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}

   
	   
	   ?> <b class="caret"></b> </a>
       <ul class="dropdown-menu animated fadeInRight">
          <span class="arrow top"></span>
          <li> <a href="profile.php">Profile</a> </li>
          <li class="divider"></li>
          <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-black aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}

   
	   
	   ?></strong> <b class="caret"></b> </span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    <li> <a href="profile.php">Profile</a> </li>
                    <li class="divider"></li>
                    <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <?php require("nav.php"); ?>
              <!-- / nav -->
            </div>
          </section>
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="logout.php" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="vbox">
          <header class="header bg-white b-b b-light">
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. <b>2.</b> Enter amounts in integer (1) or decimal (1.0).</p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Packages Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Create Packages</a></li>
                      <li><a href="#profile" data-toggle="tab">Update Packages</a></li>
                      <li><a href="#messages" data-toggle="tab">Deactivate Packages</a></li>
                      
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="createpac.php" method="post">
                      <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" class="form-control" placeholder="Enter Package Name" name="pckname">
                      </div>
                      <div class="form-group">
                        <label>Package Details</label>
                        <input type="textarea" class="form-control" placeholder="Intro of package" name="pckdetail">
                      </div>
					  
					  <div class="form-group">
                        <label>Package Price ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="pckprice" >
                      </div>
					  <div class="form-group">
                        <label>Package Tax( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="pcktax" >
                      </div>
					  <div class="form-group">
					  <label>
            Select Currency : <br/>
		  <select name="currency">
		  <?php $query="SELECT id,name,code FROM  currency"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$curname="$row[name]";
	$curcode="$row[code]";
	
  print "<option value='$curcode'>$curname - $curcode </option>";
  
  }
  ?>
 
</select>
</label> 


<!-- indirect ref bonus code starts here-->
 <div class="form-group">
                        <label>Indirect Ref Bonus( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Enter indirect ref bonus amount" name="indir_ref_amt" >
                      </div>

<!-- code ends here-->

<br/>
 <div class="form-group">
                        <label>Minimum Payout For User ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="User should earn minimum this money to send payment request, Like 50 or 100 and should not be 0" name="pckmpay" >
                      </div>
					  
					   <div class="form-group">
                        <label>Signup Bonus( Only Number )</label>
                        <input type="text" class="form-control" placeholder="User will receive bonus amount after signup. Like 10,20 or 0 to disable" name="pcksbonus" >
                      </div>

					  <div class="form-group">
                        <label>Stage 1 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage1 bonus amount" name="lev1">
						<input type="text" class="form-control" placeholder="Stage1 upgradation amount" name="stage_uc1">
                      </div>
					  <div class="form-group">
                        <label>Stage 2 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage2 bonus amount" name="lev2">
						<input type="text" class="form-control" placeholder="Stage2 upgradation amount" name="stage_uc2">
                      </div>
					  <div class="form-group">
                        <label>Stage 3 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage3 bonus amount" name="lev3">
						<input type="text" class="form-control" placeholder="Stage3 upgradation amount" name="stage_uc3">
                      </div>
					  <div class="form-group">
                        <label>Stage 4 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage4 bonus amount" name="lev4">
						<input type="text" class="form-control" placeholder="Stage4 upgradation amount" name="stage_uc4">
                      </div>
					  <div class="form-group">
                        <label>Stage 5 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage5 bonus amount" name="lev5">
						<input type="text" class="form-control" placeholder="Stage5 upgradation amount" name="stage_uc5">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 6 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage6 bonus amount" name="lev6">
						<input type="text" class="form-control" placeholder="Stage6 upgradation amount" name="stage_uc6">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 7 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage7 bonus amount" name="lev7">
						<input type="text" class="form-control" placeholder="Stage7 upgradation amount" name="stage_uc7">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 8 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage8 bonus amount" name="lev8">
						<input type="text" class="form-control" placeholder="Stage8 upgradation amount" name="stage_uc8">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 9 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage9 bonus amount" name="lev9">
						<input type="text" class="form-control" placeholder="Stage9 upgradation amount" name="stage_uc9">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 10 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage10 bonus amount" name="lev10">
						<input type="text" class="form-control" placeholder="Stage10 upgradation amount" name="stage_uc10">
                      </div>
					  
					  
					  <!-- 11 to 20 -->
					  
					  <div class="form-group">
                        <label>Stage 11 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage11 bonus amount" name="lev11">
						<input type="text" class="form-control" placeholder="Stage11 upgradation amount" name="stage_uc11">
                      </div>
					  <div class="form-group">
                        <label>Stage 12 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage12 bonus amount" name="lev12">
						<input type="text" class="form-control" placeholder="Stage12 upgradation amount" name="stage_uc12">
                      </div>
					  <div class="form-group">
                        <label>Stage 13 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage13 bonus amount" name="lev13">
						<input type="text" class="form-control" placeholder="Stage13 upgradation amount" name="stage_uc13">
                      </div>
					  <div class="form-group">
                        <label>Stage 14 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage14 bonus amount" name="lev14">
						<input type="text" class="form-control" placeholder="Stage14 upgradation amount" name="stage_uc14">
                      </div>
					  <div class="form-group">
                        <label>Stage 15 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage15 bonus amount" name="lev15">
						<input type="text" class="form-control" placeholder="Stage15 upgradation amount" name="stage_uc15">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 16 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage16 bonus amount" name="lev16">
						<input type="text" class="form-control" placeholder="Stage16 upgradation amount" name="stage_uc16">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 17 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage17 bonus amount" name="lev17">
						<input type="text" class="form-control" placeholder="Stage17 upgradation amount" name="stage_uc17">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 18 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage18 bonus amount" name="lev18">
						<input type="text" class="form-control" placeholder="Stage18 upgradation amount" name="stage_uc18">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 19 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage19 bonus amount" name="lev19">
						<input type="text" class="form-control" placeholder="Stage19 upgradation amount" name="stage_uc19">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 20 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage20 bonus amount" name="lev20">
						<input type="text" class="form-control" placeholder="Stage20 upgradation amount" name="stage_uc20">
                      </div>
					  
					  <!--21-30 -->
					  
					  <div class="form-group">
                        <label>Stage 21 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage21 bonus amount" name="lev21">
						<input type="text" class="form-control" placeholder="Stage21 upgradation amount" name="stage_uc21">
                      </div>
					  <div class="form-group">
                        <label>Stage 22 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage22 bonus amount" name="lev22">
						<input type="text" class="form-control" placeholder="Stage22 upgradation amount" name="stage_uc22">
                      </div>
					  <div class="form-group">
                        <label>Stage 23 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage23 bonus amount" name="lev23">
						<input type="text" class="form-control" placeholder="Stage23 upgradation amount" name="stage_uc23">
                      </div>
					  <div class="form-group">
                        <label>Stage 24 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage24 bonus amount" name="lev24">
						<input type="text" class="form-control" placeholder="Stage24 upgradation amount" name="stage_uc24">
                      </div>
					  <div class="form-group">
                        <label>Stage 25 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage25 bonus amount" name="lev25">
						<input type="text" class="form-control" placeholder="Stage25 upgradation amount" name="stage_uc25">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 26 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage26 bonus amount" name="lev26">
						<input type="text" class="form-control" placeholder="Stage26 upgradation amount" name="stage_uc26">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 27 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage27 bonus amount" name="lev27">
						<input type="text" class="form-control" placeholder="Stage27 upgradation amount" name="stage_uc27">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 28 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage28 bonus amount" name="lev28">
						<input type="text" class="form-control" placeholder="Stage28 upgradation amount" name="stage_uc28">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 29 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage29 bonus amount" name="lev29">
						<input type="text" class="form-control" placeholder="Stage29 upgradation amount" name="stage_uc29">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 30 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage30 bonus amount" name="lev30">
						<input type="text" class="form-control" placeholder="Stage30 upgradation amount" name="stage_uc30">
                      </div>
					  
					  <!-- 31 to 40 -->
					   <div class="form-group">
                        <label>Stage 31 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage31 bonus amount" name="lev31">
						<input type="text" class="form-control" placeholder="Stage31 upgradation amount" name="stage_uc31">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 32 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage32 bonus amount" name="lev32">
						<input type="text" class="form-control" placeholder="Stage32 upgradation amount" name="stage_uc32">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 33 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage33 bonus amount" name="lev33">
						<input type="text" class="form-control" placeholder="Stage33 upgradation amount" name="stage_uc33">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 34 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage34 bonus amount" name="lev34">
						<input type="text" class="form-control" placeholder="Stage34 upgradation amount" name="stage_uc34">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 35 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage35 bonus amount" name="lev35">
						<input type="text" class="form-control" placeholder="Stage35 upgradation amount" name="stage_uc35">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 36 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage36 bonus amount" name="lev36">
						<input type="text" class="form-control" placeholder="Stage36 upgradation amount" name="stage_uc36">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 37 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage37 bonus amount" name="lev37">
						<input type="text" class="form-control" placeholder="Stage37 upgradation amount" name="stage_uc37">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 38 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage38 bonus amount" name="lev38">
						<input type="text" class="form-control" placeholder="Stage38 upgradation amount" name="stage_uc38">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 39 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage39 bonus amount" name="lev39">
						<input type="text" class="form-control" placeholder="Stage39 upgradation amount" name="stage_uc39">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 40 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage40 bonus amount" name="lev40">
						<input type="text" class="form-control" placeholder="Stage40 upgradation amount" name="stage_uc40">
                      </div>
					  
					  <!-- 41 to 50 -->
					  
					  <div class="form-group">
                        <label>Stage 41 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage41 bonus amount" name="lev41">
						<input type="text" class="form-control" placeholder="Stage41 upgradation amount" name="stage_uc41">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 42 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage42 bonus amount" name="lev42">
						<input type="text" class="form-control" placeholder="Stage42 upgradation amount" name="stage_uc42">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 43 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage43 bonus amount" name="lev43">
						<input type="text" class="form-control" placeholder="Stage43 upgradation amount" name="stage_uc43">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 44 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage44 bonus amount" name="lev44">
						<input type="text" class="form-control" placeholder="Stage44 upgradation amount" name="stage_uc44">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 45 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage45 bonus amount" name="lev45">
						<input type="text" class="form-control" placeholder="Stage45 upgradation amount" name="stage_uc45">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 46 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage46 bonus amount" name="lev46">
						<input type="text" class="form-control" placeholder="Stage46 upgradation amount" name="stage_uc46">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 47 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage47 bonus amount" name="lev47">
						<input type="text" class="form-control" placeholder="Stage47 upgradation amount" name="stage_uc47">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 48 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage48 bonus amount" name="lev48">
						<input type="text" class="form-control" placeholder="Stage48 upgradation amount" name="stage_uc48">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 49 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage49 bonus amount" name="lev49">
						<input type="text" class="form-control" placeholder="Stage49 upgradation amount" name="stage_uc49">
                      </div>
					  
					   <div class="form-group">
                        <label>Stage 50 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage50 bonus amount" name="lev50">
						<input type="text" class="form-control" placeholder="Stage50 upgradation amount" name="stage_uc50">
                      </div>
					  
					  <!-- 51 to 60 -->
					  <div class="form-group">
                        <label>Stage 51 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage51 bonus amount" name="lev51">
						<input type="text" class="form-control" placeholder="Stage51 upgradation amount" name="stage_uc51">
                      </div>
					  <div class="form-group">
                        <label>Stage 52 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage52 bonus amount" name="lev52">
						<input type="text" class="form-control" placeholder="Stage52 upgradation amount" name="stage_uc52">
                      </div>
					  <div class="form-group">
                        <label>Stage 53 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage53 bonus amount" name="lev53">
						<input type="text" class="form-control" placeholder="Stage53 upgradation amount" name="stage_uc53">
                      </div>
					  <div class="form-group">
                        <label>Stage 54 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage54 bonus amount" name="lev54">
						<input type="text" class="form-control" placeholder="Stage54 upgradation amount" name="stage_uc54">
                      </div>
					  <div class="form-group">
                        <label>Stage 55 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage55 bonus amount" name="lev55">
						<input type="text" class="form-control" placeholder="Stage55 upgradation amount" name="stage_uc55">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 56 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage56 bonus amount" name="lev56">
						<input type="text" class="form-control" placeholder="Stage56 upgradation amount" name="stage_uc56">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 57 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage57 bonus amount" name="lev57">
						<input type="text" class="form-control" placeholder="Stage57 upgradation amount" name="stage_uc57">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 58 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage58 bonus amount" name="lev58">
						<input type="text" class="form-control" placeholder="Stage58 upgradation amount" name="stage_uc58">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 59 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage59 bonus amount" name="lev59">
						<input type="text" class="form-control" placeholder="Stage59 upgradation amount" name="stage_uc59">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 60 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage60 bonus amount" name="lev60">
						<input type="text" class="form-control" placeholder="Stage60 upgradation amount" name="stage_uc60">
                      </div>
					  <!-- 61 to 70 -->
					  <div class="form-group">
                        <label>Stage 61 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage61 bonus amount" name="lev61">
						<input type="text" class="form-control" placeholder="Stage61 upgradation amount" name="stage_uc61">
                      </div>
					  <div class="form-group">
                        <label>Stage 62 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage62 bonus amount" name="lev62">
						<input type="text" class="form-control" placeholder="Stage62 upgradation amount" name="stage_uc62">
                      </div>
					  <div class="form-group">
                        <label>Stage 63 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage63 bonus amount" name="lev63">
						<input type="text" class="form-control" placeholder="Stage63 upgradation amount" name="stage_uc63">
                      </div>
					  <div class="form-group">
                        <label>Stage 64 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage64 bonus amount" name="lev64">
						<input type="text" class="form-control" placeholder="Stage64 upgradation amount" name="stage_uc64">
                      </div>
					  <div class="form-group">
                        <label>Stage 65 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage65 bonus amount" name="lev65">
						<input type="text" class="form-control" placeholder="Stage65 upgradation amount" name="stage_uc65">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 66 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage66 bonus amount" name="lev66">
						<input type="text" class="form-control" placeholder="Stage66 upgradation amount" name="stage_uc66">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 67 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage67 bonus amount" name="lev67">
						<input type="text" class="form-control" placeholder="Stage67 upgradation amount" name="stage_uc67">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 68 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage68 bonus amount" name="lev68">
						<input type="text" class="form-control" placeholder="Stage68 upgradation amount" name="stage_uc68">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 69 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage69 bonus amount" name="lev69">
						<input type="text" class="form-control" placeholder="Stage69 upgradation amount" name="stage_uc69">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 70 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage70 bonus amount" name="lev70">
						<input type="text" class="form-control" placeholder="Stage70 upgradation amount" name="stage_uc70">
                      </div>
					  
					  <!-- 71 to 80 -->
					  <div class="form-group">
                        <label>Stage 71 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage71 bonus amount" name="lev71">
						<input type="text" class="form-control" placeholder="Stage71 upgradation amount" name="stage_uc71">
                      </div>
					  <div class="form-group">
                        <label>Stage 72 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage72 bonus amount" name="lev72">
						<input type="text" class="form-control" placeholder="Stage72 upgradation amount" name="stage_uc72">
                      </div>
					  <div class="form-group">
                        <label>Stage 73 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage73 bonus amount" name="lev73">
						<input type="text" class="form-control" placeholder="Stage73 upgradation amount" name="stage_uc73">
                      </div>
					  <div class="form-group">
                        <label>Stage 74 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage74 bonus amount" name="lev74">
						<input type="text" class="form-control" placeholder="Stage74 upgradation amount" name="stage_uc74">
                      </div>
					  <div class="form-group">
                        <label>Stage 75 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage75 bonus amount" name="lev75">
						<input type="text" class="form-control" placeholder="Stage75 upgradation amount" name="stage_uc75">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 76 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage76 bonus amount" name="lev76">
						<input type="text" class="form-control" placeholder="Stage76 upgradation amount" name="stage_uc76">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 77 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage77 bonus amount" name="lev77">
						<input type="text" class="form-control" placeholder="Stage77 upgradation amount" name="stage_uc77">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 78 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage78 bonus amount" name="lev78">
						<input type="text" class="form-control" placeholder="Stage78 upgradation amount" name="stage_uc78">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 79 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage79 bonus amount" name="lev79">
						<input type="text" class="form-control" placeholder="Stage79 upgradation amount" name="stage_uc79">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 80 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage80 bonus amount" name="lev80">
						<input type="text" class="form-control" placeholder="Stage80 upgradation amount" name="stage_uc80">
                      </div>
					  
					  <!-- 81 to 90 -->
					  <div class="form-group">
                        <label>Stage 81 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage81 bonus amount" name="lev81">
						<input type="text" class="form-control" placeholder="Stage81 upgradation amount" name="stage_uc81">
                      </div>
					  <div class="form-group">
                        <label>Stage 82 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage82 bonus amount" name="lev82">
						<input type="text" class="form-control" placeholder="Stage82 upgradation amount" name="stage_uc82">
                      </div>
					  <div class="form-group">
                        <label>Stage 83 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage83 bonus amount" name="lev83">
						<input type="text" class="form-control" placeholder="Stage83 upgradation amount" name="stage_uc83">
                      </div>
					  <div class="form-group">
                        <label>Stage 84 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage84 bonus amount" name="lev84">
						<input type="text" class="form-control" placeholder="Stage84 upgradation amount" name="stage_uc84">
                      </div>
					  <div class="form-group">
                        <label>Stage 85 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage85 bonus amount" name="lev85">
						<input type="text" class="form-control" placeholder="Stage85 upgradation amount" name="stage_uc85">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 86 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage86 bonus amount" name="lev86">
						<input type="text" class="form-control" placeholder="Stage86 upgradation amount" name="stage_uc86">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 87 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage87 bonus amount" name="lev87">
						<input type="text" class="form-control" placeholder="Stage87 upgradation amount" name="stage_uc87">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 88 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage88 bonus amount" name="lev88">
						<input type="text" class="form-control" placeholder="Stage88 upgradation amount" name="stage_uc88">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 89 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage89 bonus amount" name="lev89">
						<input type="text" class="form-control" placeholder="Stage89 upgradation amount" name="stage_uc89">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 90 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage90 bonus amount" name="lev90">
						<input type="text" class="form-control" placeholder="Stage90 upgradation amount" name="stage_uc90">
                      </div>
					  
					  <!--91 to 100 -->
					  
					  <div class="form-group">
                        <label>Stage 91 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage91 bonus amount" name="lev91">
						<input type="text" class="form-control" placeholder="Stage91 upgradation amount" name="stage_uc91">
                      </div>
					  <div class="form-group">
                        <label>Stage 92 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage92 bonus amount" name="lev92">
						<input type="text" class="form-control" placeholder="Stage92 upgradation amount" name="stage_uc92">
                      </div>
					  <div class="form-group">
                        <label>Stage 93 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage93 bonus amount" name="lev93">
						<input type="text" class="form-control" placeholder="Stage93 upgradation amount" name="stage_uc93">
                      </div>
					  <div class="form-group">
                        <label>Stage 94 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage94 bonus amount" name="lev94">
						<input type="text" class="form-control" placeholder="Stage94 upgradation amount" name="stage_uc94">
                      </div>
					  <div class="form-group">
                        <label>Stage 95 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage95 bonus amount" name="lev95">
						<input type="text" class="form-control" placeholder="Stage95 upgradation amount" name="stage_uc95">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 96 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage96 bonus amount" name="lev96">
						<input type="text" class="form-control" placeholder="Stage96 upgradation amount" name="stage_uc96">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 97 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage97 bonus amount" name="lev97">
						<input type="text" class="form-control" placeholder="Stage97 upgradation amount" name="stage_uc97">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 98 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage98 bonus amount" name="lev98">
						<input type="text" class="form-control" placeholder="Stage98 upgradation amount" name="stage_uc98">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 99 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage99 bonus amount" name="lev99">
						<input type="text" class="form-control" placeholder="Stage99 upgradation amount" name="stage_uc99">
                      </div>
					  
					  <div class="form-group">
                        <label>Stage 100 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Stage100 bonus amount" name="lev100">
						<input type="text" class="form-control" placeholder="Stage100 upgradation amount" name="stage_uc100">
                      </div>
					  
					  <div class="form-group">
                       <label>Renew Day(s) ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Enter '99999' for no expiry or enter no of days like 30 (1 month), 60 (2 months), 365 (1 year) - This would be the expiry date for user account" name="renewdays">
                      </div>
					  <div class="form-group">
                       <label>Pay Via Voucher (The entered amount will be duducted from marketer account when using payment type as "Marketer Balance")</label>
                        <input type="text" class="form-control" name="pay_via_voucher">
                      </div>
					  <div class="list-group-item">
		   
</div>

					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">Create Package.</button>
                    </form>
                  </div>
					  
					  </div>
                      <div class="tab-pane" id="profile"><form action="updatepck.php" method="post">
                      <div class="form-group">
                        <label>
            Select Package To Update/Edit : 
		  <select name="upackage">
		  <?php $query="SELECT id,name,price,currency,tax FROM  packages"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
$total=$pprice+$ptax;
  print "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  ?>
 
</select>
                      
                      
					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">Update/Edit</button>
                    </form></div>
                      <div class="tab-pane" id="messages"><div class="list-group-item">
					  <form action="deletepackage.php" method="post">
		  <label>
            Select Package To Delete : 
		  <select name="packagedelid">
		  <?php $query="SELECT id,name,price,currency,tax FROM  packages where active=1"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
$total=$pprice+$ptax;
  print "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  ?>
 
</select>
</label> 

</div>

<button type="submit" class="btn btn-lg btn-primary btn-block">Deactivate This Package</button>
</form>
</div>
                      
                    </div>
                  </div>
                </section>
                </section>
                
              </div>
            </div>
          </section>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>