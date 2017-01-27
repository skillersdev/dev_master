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
$upid = mysqli_real_escape_string($con,$_POST['upackage']);
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Roodabatoz MLM</title>
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
          
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> General Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab"> Settings</a></li>
                      <?php 
					  
					  $query="SELECT * FROM  packages where id=$upid"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	
	$pname="$row[name]";
	$pdetail="$row[details]";
	$pprice="$row[price]";
	$pcurid="$row[currency]";
	$pckmpay="$row[mpay]";
	$pcktax="$row[tax]";
	$pcksbonus="$row[sbonus]";
	$pckactive="$row[active]";
	$p1="$row[level1]";
	$p2="$row[level2]";
	$p3="$row[level3]";
	$p4="$row[level4]";
	$p5="$row[level5]";
	$p6="$row[level6]";
	$p7="$row[level7]";
	$p8="$row[level8]";
	$p9="$row[level9]";
	$p10="$row[level10]";
	$p11="$row[level11]";
	$p12="$row[level12]";
	$p13="$row[level13]";
	$p14="$row[level14]";
	$p15="$row[level15]";
	$p16="$row[level16]";
	$p17="$row[level17]";
	$p18="$row[level18]";
	$p19="$row[level19]";
	$p20="$row[level20]";

    $p21="$row[level21]";
	$p22="$row[level22]";
	$p23="$row[level23]";
	$p24="$row[level24]";
	$p25="$row[level25]";
	$p26="$row[level26]";
	$p27="$row[level27]";
	$p28="$row[level28]";
	$p29="$row[level29]";
	$p30="$row[level30]";
	
	$p31="$row[level31]";
	$p32="$row[level32]";
	$p33="$row[level33]";
	$p34="$row[level34]";
	$p35="$row[level35]";
	$p36="$row[level36]";
	$p37="$row[level37]";
	$p38="$row[level38]";
	$p39="$row[level39]";
	$p40="$row[level40]";
	
	$p41="$row[level41]";
	$p42="$row[level42]";
	$p43="$row[level43]";
	$p44="$row[level44]";
	$p45="$row[level45]";
	$p46="$row[level46]";
	$p47="$row[level47]";
	$p48="$row[level48]";
	$p49="$row[level49]";
	$p50="$row[level50]";
	
	$p51="$row[level51]";
	$p52="$row[level52]";
	$p53="$row[level53]";
	$p54="$row[level54]";
	$p55="$row[level55]";
	$p56="$row[level56]";
	$p57="$row[level57]";
	$p58="$row[level58]";
	$p59="$row[level59]";
	$p60="$row[level60]";
	
	$p61="$row[level61]";
	$p62="$row[level62]";
	$p63="$row[level63]";
	$p64="$row[level64]";
	$p65="$row[level65]";
	$p66="$row[level66]";
	$p67="$row[level67]";
	$p68="$row[level68]";
	$p69="$row[level69]";
	$p70="$row[level70]";
	
	$p71="$row[level71]";
	$p72="$row[level72]";
	$p73="$row[level73]";
	$p74="$row[level74]";
	$p75="$row[level75]";
	$p76="$row[level76]";
	$p77="$row[level77]";
	$p78="$row[level78]";
	$p79="$row[level79]";
	$p80="$row[level80]";
	
	$p81="$row[level81]";
	$p82="$row[level82]";
	$p83="$row[level83]";
	$p84="$row[level84]";
	$p85="$row[level85]";
	$p86="$row[level86]";
	$p87="$row[level87]";
	$p88="$row[level88]";
	$p89="$row[level89]";
	$p90="$row[level90]";

	$p91="$row[level91]";
	$p92="$row[level92]";
	$p93="$row[level93]";
	$p94="$row[level94]";
	$p95="$row[level95]";
	$p96="$row[level96]";
	$p97="$row[level97]";
	$p98="$row[level98]";
	$p99="$row[level99]";
	$p100="$row[level100]";
	
		
	
	
	$p1up="$row[stage1_up]";	
	$p2up="$row[stage2_up]";	
	$p3up="$row[stage3_up]";	
	$p4up="$row[stage4_up]";	
	$p5up="$row[stage5_up]";
	$p6up="$row[stage6_up]";
	$p7up="$row[stage7_up]";
	$p8up="$row[stage8_up]";
	$p9up="$row[stage9_up]";
	$p10up="$row[stage10_up]";
	
	
	$p11up="$row[stage11_up]";	
	$p12up="$row[stage12_up]";	
	$p13up="$row[stage13_up]";	
	$p14up="$row[stage14_up]";	
	$p15up="$row[stage15_up]";
	$p16up="$row[stage16_up]";
	$p17up="$row[stage17_up]";
	$p18up="$row[stage18_up]";
	$p19up="$row[stage19_up]";
	$p20up="$row[stage20_up]";
	
	
	$p21up="$row[stage21_up]";	
	$p22up="$row[stage22_up]";	
	$p23up="$row[stage23_up]";	
	$p24up="$row[stage24_up]";	
	$p25up="$row[stage25_up]";
	$p26up="$row[stage26_up]";
	$p27up="$row[stage27_up]";
	$p28up="$row[stage28_up]";
	$p29up="$row[stage29_up]";
	$p30up="$row[stage30_up]";
	
	$p31up="$row[stage31_up]";	
	$p32up="$row[stage32_up]";	
	$p33up="$row[stage33_up]";	
	$p34up="$row[stage34_up]";	
	$p35up="$row[stage35_up]";
	$p36up="$row[stage36_up]";
	$p37up="$row[stage37_up]";
	$p38up="$row[stage38_up]";
	$p39up="$row[stage39_up]";
	$p40up="$row[stage40_up]";
	
	$p41up="$row[stage41_up]";	
	$p42up="$row[stage42_up]";	
	$p43up="$row[stage43_up]";	
	$p44up="$row[stage44_up]";	
	$p45up="$row[stage45_up]";
	$p46up="$row[stage46_up]";
	$p47up="$row[stage47_up]";
	$p48up="$row[stage48_up]";
	$p49up="$row[stage49_up]";
	$p50up="$row[stage50_up]";
	
	$p51up="$row[stage51_up]";	
	$p52up="$row[stage52_up]";	
	$p53up="$row[stage53_up]";	
	$p54up="$row[stage54_up]";	
	$p55up="$row[stage55_up]";
	$p56up="$row[stage56_up]";
	$p57up="$row[stage57_up]";
	$p58up="$row[stage58_up]";
	$p59up="$row[stage59_up]";
	$p60up="$row[stage60_up]";
	
	$p61up="$row[stage61_up]";	
	$p62up="$row[stage62_up]";	
	$p63up="$row[stage63_up]";	
	$p64up="$row[stage64_up]";	
	$p65up="$row[stage65_up]";
	$p66up="$row[stage66_up]";
	$p67up="$row[stage67_up]";
	$p68up="$row[stage68_up]";
	$p69up="$row[stage69_up]";
	$p70up="$row[stage70_up]";
	
	$p71up="$row[stage71_up]";	
	$p72up="$row[stage72_up]";	
	$p73up="$row[stage73_up]";	
	$p74up="$row[stage74_up]";	
	$p75up="$row[stage75_up]";
	$p76up="$row[stage76_up]";
	$p77up="$row[stage77_up]";
	$p78up="$row[stage78_up]";
	$p79up="$row[stage79_up]";
	$p80up="$row[stage80_up]";
	
	$p81up="$row[stage81_up]";	
	$p82up="$row[stage82_up]";	
	$p83up="$row[stage83_up]";	
	$p84up="$row[stage84_up]";	
	$p85up="$row[stage85_up]";
	$p86up="$row[stage86_up]";
	$p87up="$row[stage87_up]";
	$p88up="$row[stage88_up]";
	$p89up="$row[stage89_up]";
	$p90up="$row[stage90_up]";
	
	$p91up="$row[stage91_up]";	
	$p92up="$row[stage92_up]";	
	$p93up="$row[stage93_up]";	
	$p94up="$row[stage94_up]";	
	$p95up="$row[stage95_up]";
	$p96up="$row[stage96_up]";
	$p97up="$row[stage97_up]";
	$p98up="$row[stage98_up]";
	$p99up="$row[stage99_up]";
	$p100up="$row[stage100_up]";
	
	
	
	
	$validity="$row[validity]";
	$indirect_ref_amt="$row[indirect_ref_amt]";
	}
					  
					  ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="updatepcksettings.php" method="post">
					 <input type="hidden" value="<?php print $upid ?>" name="pckmainid">
					<div class="form-group">
                        <label>Package Active Status | 0 means unactive and 1 means active</label>
                        <input type="text" value="<?php print $pckactive ?>" class="form-control" placeholder="Enter Package Name" name="pckact">
                      </div>
                      <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" value="<?php print $pname ?>" class="form-control" placeholder="Enter Package Name" name="pckname">
                      </div>
                      <div class="form-group">
                        <label>Package Details</label>
                        <input type="textarea" value="<?php print $pdetail ?>" class="form-control" placeholder="Intro of package" name="pckdetail">
                      </div>
					  
					  <div class="form-group">
                        <label>Package Price ( Only Number )</label>
                        <input type="text" value="<?php print $pprice ?>" class="form-control" placeholder="Like 10,20" name="pckprice" >
                      </div>
					  
<div class="form-group">
                        <label>Package Tax( Only Number )</label>
                        <input type="text" value="<?php print $pcktax ?>" class="form-control" placeholder="Like 10,20" name="pcktax" >
                      </div>

<div class="form-group">
                        <label>Minimum Payout For User ( Only Number )</label>
                        <input type="text" value="<?php print $pckmpay ?>" class="form-control" placeholder="User should earn minimum this money to send payment request, Like 50 or 100 and should not be 0" name="pckmpay" >
                      </div>
					  
					   <div class="form-group">
                        <label>Signup Bonus( Only Number )</label>
                        <input type="text" value="<?php print $pcksbonus ?>" class="form-control" placeholder="User will receive bonus amount after signup. Like 10,20 or 0 to disable" name="pcksbonus" >
                      </div>
					  
					  <div class="form-group">
					  <label>
            Select Currency : 
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
                        <input type="text" class="form-control" placeholder="Enter indirect ref bonus amount" name="indir_ref_amt" value="<?php print $indirect_ref_amt?>"  >
                      </div>

<!-- code ends here-->

					 <div class="form-group">
                         <label>Stage 1 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p1 ?>" class="form-control" placeholder="Stage1 bonus amount" name="lev1">
						 <input type="text" value="<?php print $p1up ?>" class="form-control" placeholder="Stage1 upgradation amount" name="stage_uc1"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 2 ( Only Number )</label>                        
						<input type="text" value="<?php print $p2 ?>" class="form-control" placeholder="Stage2 bonus amount" name="lev2">
						<input type="text" value="<?php print $p2up ?>" class="form-control" placeholder="Stage2 upgradation amount" name="stage_uc2"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 3 ( Only Number )</label>                        
						<input type="text" value="<?php print $p3 ?>" class="form-control" placeholder="Stage3 bonus amount" name="lev3">
						<input type="text" value="<?php print $p3up ?>" class="form-control" placeholder="Stage3 upgradation amount" name="stage_uc3">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 4 ( Only Number )</label>                        
						<input type="text" value="<?php print $p4 ?>" class="form-control" placeholder="Stage4 bonus amount" name="lev4">	
						<input type="text" value="<?php print $p4up ?>" class="form-control" placeholder="Stage4 upgradation amount" name="stage_uc4"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 5 ( Only Number )</label>                        
						<input type="text" value="<?php print $p5 ?>" class="form-control" placeholder="Stage5 bonus amount" name="lev5">	
						<input type="text" value="<?php print $p5up ?>" class="form-control" placeholder="Stage5 upgradation amount" name="stage_uc5">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 6 ( Only Number )</label>
                        <input type="text" value="<?php print $p6 ?>" class="form-control" placeholder="Like 10,20" name="lev6">
						<input type="text" value="<?php print $p6up ?>" class="form-control" placeholder="Stage6 upgradation amount" name="stage_uc6"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 7 ( Only Number )</label>
                        <input type="text" value="<?php print $p7 ?>" class="form-control" placeholder="Like 10,20" name="lev7">
						<input type="text" value="<?php print $p7up ?>" class="form-control" placeholder="Stage7 upgradation amount" name="stage_uc7"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 8 ( Only Number )</label>
                        <input type="text" value="<?php print $p8 ?>" class="form-control" placeholder="Like 10,20" name="lev8">
						<input type="text" value="<?php print $p8up ?>" class="form-control" placeholder="Stage8 upgradation amount" name="stage_uc8"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 9 ( Only Number )</label>
                        <input type="text" value="<?php print $p9 ?>" class="form-control" placeholder="Like 10,20" name="lev9">
						<input type="text" value="<?php print $p9up ?>" class="form-control" placeholder="Stage9 upgradation amount" name="stage_uc9"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 10 ( Only Number )</label>
                        <input type="text" value="<?php print $p10 ?>" class="form-control" placeholder="Like 10,20" name="lev10">
						<input type="text" value="<?php print $p10up ?>" class="form-control" placeholder="Stage10 upgradation amount" name="stage_uc10"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 11 ( Only Number )</label>
                        <input type="text" value="<?php print $p11 ?>" class="form-control" placeholder="Like 10,20" name="lev11">
						<input type="text" value="<?php print $p11up ?>" class="form-control" placeholder="Stage11 upgradation amount" name="stage_uc11"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 12 ( Only Number )</label>
                        <input type="text" value="<?php print $p12 ?>" class="form-control" placeholder="Like 10,20" name="lev12">
						<input type="text" value="<?php print $p12up ?>" class="form-control" placeholder="Stage12 upgradation amount" name="stage_uc12"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 13 ( Only Number )</label>
                        <input type="text" value="<?php print $p13 ?>" class="form-control" placeholder="Like 10,20" name="lev13">
						<input type="text" value="<?php print $p13up ?>" class="form-control" placeholder="Stage13 upgradation amount" name="stage_uc13"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 14 ( Only Number )</label>
                        <input type="text" value="<?php print $p14 ?>" class="form-control" placeholder="Like 10,20" name="lev14">
						<input type="text" value="<?php print $p14up ?>" class="form-control" placeholder="Stage14 upgradation amount" name="stage_uc14"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 15 ( Only Number )</label>
                        <input type="text" value="<?php print $p15 ?>" class="form-control" placeholder="Like 10,20" name="lev15">
						<input type="text" value="<?php print $p15up ?>" class="form-control" placeholder="Stage15 upgradation amount" name="stage_uc15"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 16 ( Only Number )</label>
                        <input type="text" value="<?php print $p16 ?>" class="form-control" placeholder="Like 10,20" name="lev16">
						<input type="text" value="<?php print $p16up ?>" class="form-control" placeholder="Stage16 upgradation amount" name="stage_uc16"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 17 ( Only Number )</label>
                        <input type="text" value="<?php print $p17 ?>" class="form-control" placeholder="Like 10,20" name="lev17">
						<input type="text" value="<?php print $p17up ?>" class="form-control" placeholder="Stage17 upgradation amount" name="stage_uc17"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 18 ( Only Number )</label>
                        <input type="text" value="<?php print $p18 ?>" class="form-control" placeholder="Like 10,20" name="lev18">
						<input type="text" value="<?php print $p18up ?>" class="form-control" placeholder="Stage18 upgradation amount" name="stage_uc18"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 19 ( Only Number )</label>
                        <input type="text" value="<?php print $p19 ?>" class="form-control" placeholder="Like 10,20" name="lev19">
						<input type="text" value="<?php print $p19up ?>" class="form-control" placeholder="Stage19 upgradation amount" name="stage_uc19"> 
                      </div>
					  
					  <div class="form-group">
                       <label>Stage 20 ( Only Number )</label>
                        <input type="text" value="<?php print $p20 ?>" class="form-control" placeholder="Like 10,20" name="lev20">
						<input type="text" value="<?php print $p20up ?>" class="form-control" placeholder="Stage20 upgradation amount" name="stage_uc20"> 
                      </div>
					  
					  
					  
					  <div class="form-group">
                         <label>Stage 21 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p21 ?>" class="form-control" placeholder="Stage21 bonus amount" name="lev21">
						 <input type="text" value="<?php print $p21up ?>" class="form-control" placeholder="Stage21 upgradation amount" name="stage_uc21"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 22 ( Only Number )</label>                        
						<input type="text" value="<?php print $p22 ?>" class="form-control" placeholder="Stage22 bonus amount" name="lev22">
						<input type="text" value="<?php print $p22up ?>" class="form-control" placeholder="Stage22 upgradation amount" name="stage_uc22"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 23 ( Only Number )</label>                        
						<input type="text" value="<?php print $p23 ?>" class="form-control" placeholder="Stage23 bonus amount" name="lev23">
						<input type="text" value="<?php print $p23up ?>" class="form-control" placeholder="Stage23 upgradation amount" name="stage_uc23">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 24 ( Only Number )</label>                        
						<input type="text" value="<?php print $p24 ?>" class="form-control" placeholder="Stage24 bonus amount" name="lev24">	
						<input type="text" value="<?php print $p24up ?>" class="form-control" placeholder="Stage24 upgradation amount" name="stage_uc24"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 25 ( Only Number )</label>                        
						<input type="text" value="<?php print $p25 ?>" class="form-control" placeholder="Stage25 bonus amount" name="lev25">	
						<input type="text" value="<?php print $p25up ?>" class="form-control" placeholder="Stage25 upgradation amount" name="stage_uc25">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 26 ( Only Number )</label>
                        <input type="text" value="<?php print $p26 ?>" class="form-control" placeholder="Like 10,20" name="lev26">
						<input type="text" value="<?php print $p26up ?>" class="form-control" placeholder="Stage26 upgradation amount" name="stage_uc26"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 27 ( Only Number )</label>
                        <input type="text" value="<?php print $p27 ?>" class="form-control" placeholder="Like 10,20" name="lev27">
						<input type="text" value="<?php print $p27up ?>" class="form-control" placeholder="Stage27 upgradation amount" name="stage_uc27"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 28 ( Only Number )</label>
                        <input type="text" value="<?php print $p28 ?>" class="form-control" placeholder="Like 10,20" name="lev28">
						<input type="text" value="<?php print $p28up ?>" class="form-control" placeholder="Stage28 upgradation amount" name="stage_uc28"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 29 ( Only Number )</label>
                        <input type="text" value="<?php print $p29 ?>" class="form-control" placeholder="Like 10,20" name="lev29">
						<input type="text" value="<?php print $p29up ?>" class="form-control" placeholder="Stage29 upgradation amount" name="stage_uc29"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 30 ( Only Number )</label>
                        <input type="text" value="<?php print $p30 ?>" class="form-control" placeholder="Like 10,20" name="lev30">
						<input type="text" value="<?php print $p30up ?>" class="form-control" placeholder="Stage30 upgradation amount" name="stage_uc30"> 
                      </div>
					  
					  
					  
					  <div class="form-group">
                         <label>Stage 31 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p31 ?>" class="form-control" placeholder="Stage31 bonus amount" name="lev31">
						 <input type="text" value="<?php print $p31up ?>" class="form-control" placeholder="Stage31 upgradation amount" name="stage_uc31"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 32 ( Only Number )</label>                        
						<input type="text" value="<?php print $p32 ?>" class="form-control" placeholder="Stage32 bonus amount" name="lev32">
						<input type="text" value="<?php print $p32up ?>" class="form-control" placeholder="Stage32 upgradation amount" name="stage_uc32"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 33 ( Only Number )</label>                        
						<input type="text" value="<?php print $p33 ?>" class="form-control" placeholder="Stage33 bonus amount" name="lev33">
						<input type="text" value="<?php print $p33up ?>" class="form-control" placeholder="Stage33 upgradation amount" name="stage_uc33">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 4 ( Only Number )</label>                        
						<input type="text" value="<?php print $p34 ?>" class="form-control" placeholder="Stage34 bonus amount" name="lev34">	
						<input type="text" value="<?php print $p34up ?>" class="form-control" placeholder="Stage34 upgradation amount" name="stage_uc34"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 35 ( Only Number )</label>                        
						<input type="text" value="<?php print $p35 ?>" class="form-control" placeholder="Stage35 bonus amount" name="lev35">	
						<input type="text" value="<?php print $p35up ?>" class="form-control" placeholder="Stage35 upgradation amount" name="stage_uc35">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 36 ( Only Number )</label>
                        <input type="text" value="<?php print $p36 ?>" class="form-control" placeholder="Like 10,20" name="lev36">
						<input type="text" value="<?php print $p36up ?>" class="form-control" placeholder="Stage36 upgradation amount" name="stage_uc36"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 37 ( Only Number )</label>
                        <input type="text" value="<?php print $p37 ?>" class="form-control" placeholder="Like 10,20" name="lev37">
						<input type="text" value="<?php print $p37up ?>" class="form-control" placeholder="Stage37 upgradation amount" name="stage_uc37"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 38 ( Only Number )</label>
                        <input type="text" value="<?php print $p38 ?>" class="form-control" placeholder="Like 10,20" name="lev38">
						<input type="text" value="<?php print $p38up ?>" class="form-control" placeholder="Stage38 upgradation amount" name="stage_uc38"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 39 ( Only Number )</label>
                        <input type="text" value="<?php print $p39 ?>" class="form-control" placeholder="Like 10,20" name="lev39">
						<input type="text" value="<?php print $p39up ?>" class="form-control" placeholder="Stage39 upgradation amount" name="stage_uc39"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 40 ( Only Number )</label>
                        <input type="text" value="<?php print $p40 ?>" class="form-control" placeholder="Like 10,20" name="lev40">
						<input type="text" value="<?php print $p40up ?>" class="form-control" placeholder="Stage40 upgradation amount" name="stage_uc40"> 
                      </div>
					  
					  
					  <div class="form-group">
                         <label>Stage 41 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p41 ?>" class="form-control" placeholder="Stage41 bonus amount" name="lev41">
						 <input type="text" value="<?php print $p41up ?>" class="form-control" placeholder="Stage41 upgradation amount" name="stage_uc41"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 42 ( Only Number )</label>                        
						<input type="text" value="<?php print $p42 ?>" class="form-control" placeholder="Stage42 bonus amount" name="lev42">
						<input type="text" value="<?php print $p42up ?>" class="form-control" placeholder="Stage42 upgradation amount" name="stage_uc42"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 43 ( Only Number )</label>                        
						<input type="text" value="<?php print $p43 ?>" class="form-control" placeholder="Stage43 bonus amount" name="lev43">
						<input type="text" value="<?php print $p43up ?>" class="form-control" placeholder="Stage43 upgradation amount" name="stage_uc43">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 44 ( Only Number )</label>                        
						<input type="text" value="<?php print $p44 ?>" class="form-control" placeholder="Stage44 bonus amount" name="lev44">	
						<input type="text" value="<?php print $p44up ?>" class="form-control" placeholder="Stage44 upgradation amount" name="stage_uc44"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 45 ( Only Number )</label>                        
						<input type="text" value="<?php print $p45 ?>" class="form-control" placeholder="Stage45 bonus amount" name="lev45">	
						<input type="text" value="<?php print $p45up ?>" class="form-control" placeholder="Stage45 upgradation amount" name="stage_uc45">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 46 ( Only Number )</label>
                        <input type="text" value="<?php print $p46 ?>" class="form-control" placeholder="Like 10,20" name="lev46">
						<input type="text" value="<?php print $p46up ?>" class="form-control" placeholder="Stage46 upgradation amount" name="stage_uc46"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 47 ( Only Number )</label>
                        <input type="text" value="<?php print $p47 ?>" class="form-control" placeholder="Like 10,20" name="lev47">
						<input type="text" value="<?php print $p47up ?>" class="form-control" placeholder="Stage47 upgradation amount" name="stage_uc47"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 48 ( Only Number )</label>
                        <input type="text" value="<?php print $p48 ?>" class="form-control" placeholder="Like 10,20" name="lev48">
						<input type="text" value="<?php print $p48up ?>" class="form-control" placeholder="Stage48 upgradation amount" name="stage_uc48"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 49 ( Only Number )</label>
                        <input type="text" value="<?php print $p49 ?>" class="form-control" placeholder="Like 10,20" name="lev49">
						<input type="text" value="<?php print $p49up ?>" class="form-control" placeholder="Stage49 upgradation amount" name="stage_uc49"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 50 ( Only Number )</label>
                        <input type="text" value="<?php print $p50 ?>" class="form-control" placeholder="Like 10,20" name="lev50">
						<input type="text" value="<?php print $p50up ?>" class="form-control" placeholder="Stage50 upgradation amount" name="stage_uc50"> 
                      </div>
					  
					  
					  <div class="form-group">
                         <label>Stage 51 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p51 ?>" class="form-control" placeholder="Stage51 bonus amount" name="lev51">
						 <input type="text" value="<?php print $p51up ?>" class="form-control" placeholder="Stage51 upgradation amount" name="stage_uc51"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 52 ( Only Number )</label>                        
						<input type="text" value="<?php print $p52 ?>" class="form-control" placeholder="Stage52 bonus amount" name="lev52">
						<input type="text" value="<?php print $p52up ?>" class="form-control" placeholder="Stage52 upgradation amount" name="stage_uc52"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 53 ( Only Number )</label>                        
						<input type="text" value="<?php print $p53 ?>" class="form-control" placeholder="Stage53 bonus amount" name="lev53">
						<input type="text" value="<?php print $p53up ?>" class="form-control" placeholder="Stage53 upgradation amount" name="stage_uc53">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 54 ( Only Number )</label>                        
						<input type="text" value="<?php print $p54 ?>" class="form-control" placeholder="Stage54 bonus amount" name="lev54">	
						<input type="text" value="<?php print $p54up ?>" class="form-control" placeholder="Stage54 upgradation amount" name="stage_uc54"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 55 ( Only Number )</label>                        
						<input type="text" value="<?php print $p55 ?>" class="form-control" placeholder="Stage55 bonus amount" name="lev55">	
						<input type="text" value="<?php print $p55up ?>" class="form-control" placeholder="Stage55 upgradation amount" name="stage_uc55">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 56 ( Only Number )</label>
                        <input type="text" value="<?php print $p56 ?>" class="form-control" placeholder="Like 10,20" name="lev56">
						<input type="text" value="<?php print $p56up ?>" class="form-control" placeholder="Stage56 upgradation amount" name="stage_uc56"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 57 ( Only Number )</label>
                        <input type="text" value="<?php print $p57 ?>" class="form-control" placeholder="Like 10,20" name="lev57">
						<input type="text" value="<?php print $p57up ?>" class="form-control" placeholder="Stage57 upgradation amount" name="stage_uc57"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 58 ( Only Number )</label>
                        <input type="text" value="<?php print $p58 ?>" class="form-control" placeholder="Like 10,20" name="lev58">
						<input type="text" value="<?php print $p58up ?>" class="form-control" placeholder="Stage58 upgradation amount" name="stage_uc58"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 59 ( Only Number )</label>
                        <input type="text" value="<?php print $p59 ?>" class="form-control" placeholder="Like 10,20" name="lev59">
						<input type="text" value="<?php print $p59up ?>" class="form-control" placeholder="Stage59 upgradation amount" name="stage_uc59"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 60 ( Only Number )</label>
                        <input type="text" value="<?php print $p60 ?>" class="form-control" placeholder="Like 10,20" name="lev60">
						<input type="text" value="<?php print $p60up ?>" class="form-control" placeholder="Stage60 upgradation amount" name="stage_uc60"> 
                      </div>
					  
					  
					  <div class="form-group">
                         <label>Stage 61 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p61 ?>" class="form-control" placeholder="Stage61 bonus amount" name="lev61">
						 <input type="text" value="<?php print $p61up ?>" class="form-control" placeholder="Stage61 upgradation amount" name="stage_uc61"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 62 ( Only Number )</label>                        
						<input type="text" value="<?php print $p62 ?>" class="form-control" placeholder="Stage62 bonus amount" name="lev62">
						<input type="text" value="<?php print $p62up ?>" class="form-control" placeholder="Stage62 upgradation amount" name="stage_uc62"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 63 ( Only Number )</label>                        
						<input type="text" value="<?php print $p63 ?>" class="form-control" placeholder="Stage63 bonus amount" name="lev63">
						<input type="text" value="<?php print $p63up ?>" class="form-control" placeholder="Stage63 upgradation amount" name="stage_uc63">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 64 ( Only Number )</label>                        
						<input type="text" value="<?php print $p64 ?>" class="form-control" placeholder="Stage64 bonus amount" name="lev64">	
						<input type="text" value="<?php print $p64up ?>" class="form-control" placeholder="Stage64 upgradation amount" name="stage_uc64"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 65 ( Only Number )</label>                        
						<input type="text" value="<?php print $p65 ?>" class="form-control" placeholder="Stage65 bonus amount" name="lev65">	
						<input type="text" value="<?php print $p65up ?>" class="form-control" placeholder="Stage65 upgradation amount" name="stage_uc65">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 66 ( Only Number )</label>
                        <input type="text" value="<?php print $p66 ?>" class="form-control" placeholder="Like 10,20" name="lev66">
						<input type="text" value="<?php print $p66up ?>" class="form-control" placeholder="Stage66 upgradation amount" name="stage_uc66"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 67 ( Only Number )</label>
                        <input type="text" value="<?php print $p67 ?>" class="form-control" placeholder="Like 10,20" name="lev67">
						<input type="text" value="<?php print $p67up ?>" class="form-control" placeholder="Stage67 upgradation amount" name="stage_uc67"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 68 ( Only Number )</label>
                        <input type="text" value="<?php print $p68 ?>" class="form-control" placeholder="Like 10,20" name="lev68">
						<input type="text" value="<?php print $p68up ?>" class="form-control" placeholder="Stage68 upgradation amount" name="stage_uc68"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 69 ( Only Number )</label>
                        <input type="text" value="<?php print $p69 ?>" class="form-control" placeholder="Like 10,20" name="lev69">
						<input type="text" value="<?php print $p69up ?>" class="form-control" placeholder="Stage69 upgradation amount" name="stage_uc69"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 70 ( Only Number )</label>
                        <input type="text" value="<?php print $p70 ?>" class="form-control" placeholder="Like 10,20" name="lev70">
						<input type="text" value="<?php print $p70up ?>" class="form-control" placeholder="Stage70 upgradation amount" name="stage_uc70"> 
                      </div>
					  
					  
					  
					  <div class="form-group">
                         <label>Stage 71 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p71 ?>" class="form-control" placeholder="Stage71 bonus amount" name="lev71">
						 <input type="text" value="<?php print $p71up ?>" class="form-control" placeholder="Stage71 upgradation amount" name="stage_uc71"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 72 ( Only Number )</label>                        
						<input type="text" value="<?php print $p72 ?>" class="form-control" placeholder="Stage72 bonus amount" name="lev72">
						<input type="text" value="<?php print $p72up ?>" class="form-control" placeholder="Stage72 upgradation amount" name="stage_uc72"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 73 ( Only Number )</label>                        
						<input type="text" value="<?php print $p73 ?>" class="form-control" placeholder="Stage73 bonus amount" name="lev73">
						<input type="text" value="<?php print $p73up ?>" class="form-control" placeholder="Stage73 upgradation amount" name="stage_uc73">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 74 ( Only Number )</label>                        
						<input type="text" value="<?php print $p74 ?>" class="form-control" placeholder="Stage74 bonus amount" name="lev74">	
						<input type="text" value="<?php print $p74up ?>" class="form-control" placeholder="Stage74 upgradation amount" name="stage_uc74"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 75 ( Only Number )</label>                        
						<input type="text" value="<?php print $p75 ?>" class="form-control" placeholder="Stage75 bonus amount" name="lev75">	
						<input type="text" value="<?php print $p75up ?>" class="form-control" placeholder="Stage75 upgradation amount" name="stage_uc75">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 76 ( Only Number )</label>
                        <input type="text" value="<?php print $p76 ?>" class="form-control" placeholder="Like 10,20" name="lev76">
						<input type="text" value="<?php print $p76up ?>" class="form-control" placeholder="Stage76 upgradation amount" name="stage_uc76"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 77 ( Only Number )</label>
                        <input type="text" value="<?php print $p77 ?>" class="form-control" placeholder="Like 10,20" name="lev77">
						<input type="text" value="<?php print $p77up ?>" class="form-control" placeholder="Stage77 upgradation amount" name="stage_uc77"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 78 ( Only Number )</label>
                        <input type="text" value="<?php print $p78 ?>" class="form-control" placeholder="Like 10,20" name="lev78">
						<input type="text" value="<?php print $p78up ?>" class="form-control" placeholder="Stage78 upgradation amount" name="stage_uc78"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 79 ( Only Number )</label>
                        <input type="text" value="<?php print $p79 ?>" class="form-control" placeholder="Like 10,20" name="lev79">
						<input type="text" value="<?php print $p79up ?>" class="form-control" placeholder="Stage79 upgradation amount" name="stage_uc79"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 80 ( Only Number )</label>
                        <input type="text" value="<?php print $p80 ?>" class="form-control" placeholder="Like 10,20" name="lev80">
						<input type="text" value="<?php print $p80up ?>" class="form-control" placeholder="Stage80 upgradation amount" name="stage_uc80"> 
                      </div>
					  
					  
					  
					  <div class="form-group">
                         <label>Stage 81 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p81 ?>" class="form-control" placeholder="Stage81 bonus amount" name="lev81">
						 <input type="text" value="<?php print $p81up ?>" class="form-control" placeholder="Stage81 upgradation amount" name="stage_uc81"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 82 ( Only Number )</label>                        
						<input type="text" value="<?php print $p82 ?>" class="form-control" placeholder="Stage82 bonus amount" name="lev82">
						<input type="text" value="<?php print $p82up ?>" class="form-control" placeholder="Stage82 upgradation amount" name="stage_uc82"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 83 ( Only Number )</label>                        
						<input type="text" value="<?php print $p83 ?>" class="form-control" placeholder="Stage83 bonus amount" name="lev83">
						<input type="text" value="<?php print $p83up ?>" class="form-control" placeholder="Stage83 upgradation amount" name="stage_uc83">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 84 ( Only Number )</label>                        
						<input type="text" value="<?php print $p84 ?>" class="form-control" placeholder="Stage84 bonus amount" name="lev84">	
						<input type="text" value="<?php print $p84up ?>" class="form-control" placeholder="Stage84 upgradation amount" name="stage_uc84"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 85 ( Only Number )</label>                        
						<input type="text" value="<?php print $p85 ?>" class="form-control" placeholder="Stage85 bonus amount" name="lev85">	
						<input type="text" value="<?php print $p85up ?>" class="form-control" placeholder="Stage85 upgradation amount" name="stage_uc85">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 86 ( Only Number )</label>
                        <input type="text" value="<?php print $p86 ?>" class="form-control" placeholder="Like 10,20" name="lev86">
						<input type="text" value="<?php print $p86up ?>" class="form-control" placeholder="Stage86 upgradation amount" name="stage_uc86"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 87 ( Only Number )</label>
                        <input type="text" value="<?php print $p87 ?>" class="form-control" placeholder="Like 10,20" name="lev87">
						<input type="text" value="<?php print $p87up ?>" class="form-control" placeholder="Stage87 upgradation amount" name="stage_uc87"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 88 ( Only Number )</label>
                        <input type="text" value="<?php print $p88 ?>" class="form-control" placeholder="Like 10,20" name="lev88">
						<input type="text" value="<?php print $p88up ?>" class="form-control" placeholder="Stage88 upgradation amount" name="stage_uc88"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 89 ( Only Number )</label>
                        <input type="text" value="<?php print $p89 ?>" class="form-control" placeholder="Like 10,20" name="lev89">
						<input type="text" value="<?php print $p89up ?>" class="form-control" placeholder="Stage89 upgradation amount" name="stage_uc89"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 90 ( Only Number )</label>
                        <input type="text" value="<?php print $p90 ?>" class="form-control" placeholder="Like 10,20" name="lev90">
						<input type="text" value="<?php print $p90up ?>" class="form-control" placeholder="Stage90 upgradation amount" name="stage_uc90"> 
                      </div>
					  
					  
					  
					  <div class="form-group">
                         <label>Stage 91 ( Only Number )</label>                        
						 <input type="text" value="<?php print $p91 ?>" class="form-control" placeholder="Stage91 bonus amount" name="lev91">
						 <input type="text" value="<?php print $p91up ?>" class="form-control" placeholder="Stage91 upgradation amount" name="stage_uc91"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 92 ( Only Number )</label>                        
						<input type="text" value="<?php print $p92 ?>" class="form-control" placeholder="Stage92 bonus amount" name="lev92">
						<input type="text" value="<?php print $p92up ?>" class="form-control" placeholder="Stage92 upgradation amount" name="stage_uc92"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 93 ( Only Number )</label>                        
						<input type="text" value="<?php print $p93 ?>" class="form-control" placeholder="Stage93 bonus amount" name="lev93">
						<input type="text" value="<?php print $p93up ?>" class="form-control" placeholder="Stage93 upgradation amount" name="stage_uc93">   
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 94 ( Only Number )</label>                        
						<input type="text" value="<?php print $p94 ?>" class="form-control" placeholder="Stage94 bonus amount" name="lev94">	
						<input type="text" value="<?php print $p94up ?>" class="form-control" placeholder="Stage94 upgradation amount" name="stage_uc94"> 
					 </div>					  
					 <div class="form-group">                        
						<label>Stage 95 ( Only Number )</label>                        
						<input type="text" value="<?php print $p95 ?>" class="form-control" placeholder="Stage95 bonus amount" name="lev95">	
						<input type="text" value="<?php print $p95up ?>" class="form-control" placeholder="Stage95 upgradation amount" name="stage_uc95">  
  					 </div>
					 
					  <div class="form-group">
                        <label>Stage 96 ( Only Number )</label>
                        <input type="text" value="<?php print $p96 ?>" class="form-control" placeholder="Like 10,20" name="lev96">
						<input type="text" value="<?php print $p96up ?>" class="form-control" placeholder="Stage96 upgradation amount" name="stage_uc96"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 97 ( Only Number )</label>
                        <input type="text" value="<?php print $p97 ?>" class="form-control" placeholder="Like 10,20" name="lev97">
						<input type="text" value="<?php print $p97up ?>" class="form-control" placeholder="Stage97 upgradation amount" name="stage_uc97"> 
                      </div>
					  <div class="form-group">
                       <label>Stage 98 ( Only Number )</label>
                        <input type="text" value="<?php print $p98 ?>" class="form-control" placeholder="Like 10,20" name="lev98">
						<input type="text" value="<?php print $p98up ?>" class="form-control" placeholder="Stage98 upgradation amount" name="stage_uc98"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 99 ( Only Number )</label>
                        <input type="text" value="<?php print $p99 ?>" class="form-control" placeholder="Like 10,20" name="lev99">
						<input type="text" value="<?php print $p99up ?>" class="form-control" placeholder="Stage99 upgradation amount" name="stage_uc99"> 
                      </div>
					  <div class="form-group">
                        <label>Stage 100 ( Only Number )</label>
                        <input type="text" value="<?php print $p100 ?>" class="form-control" placeholder="Like 10,20" name="lev100">
						<input type="text" value="<?php print $p100up ?>" class="form-control" placeholder="Stage100 upgradation amount" name="stage_uc100"> 
                      </div>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  <div class="form-group">
                       <label>Renew Day(s) ( Only Number )</label>
                        <input type="hidden" value="<?php print $validity ?>" name="old_renewdays">
						<input type="text" value="<?php print $validity ?>" class="form-control" placeholder="Enter '0' for no expiry or enter no of days like 30 (1 month), 60 (2 months), 365 (1 year) - This would be the expiry date for user account" name="renewdays">
                      </div>
					  
					  
					  
					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">Update/Edit Details</button>
                    </form>
                  </div>
					  
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