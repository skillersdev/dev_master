<?php
header( "refresh:3;url=pacsettings.php" );
session_start(); //starting session
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$pname=mysqli_real_escape_string($con,$_POST['pckname']); //fetching details through post method
$pdetail = mysqli_real_escape_string($con,$_POST['pckdetail']);
$pprice = mysqli_real_escape_string($con,$_POST['pckprice']);
$pcurid = mysqli_real_escape_string($con,$_POST['currency']);
$pckmpay = mysqli_real_escape_string($con,$_POST['pckmpay']);
$pcksbonus = mysqli_real_escape_string($con,$_POST['pcksbonus']);
$pcktax = mysqli_real_escape_string($con,$_POST['pcktax']);
$pact = mysqli_real_escape_string($con,$_POST['pckact']);
$pidmain = mysqli_real_escape_string($con,$_POST['pckmainid']);
$p1 = mysqli_real_escape_string($con,$_POST['lev1']);
$p2 = mysqli_real_escape_string($con,$_POST['lev2']);
$p3 = mysqli_real_escape_string($con,$_POST['lev3']);
$p4 = mysqli_real_escape_string($con,$_POST['lev4']);
$p5 = mysqli_real_escape_string($con,$_POST['lev5']);
$p6 = mysqli_real_escape_string($con,$_POST['lev6']);
$p7 = mysqli_real_escape_string($con,$_POST['lev7']);
$p8 = mysqli_real_escape_string($con,$_POST['lev8']);
$p9 = mysqli_real_escape_string($con,$_POST['lev9']);
$p10 = mysqli_real_escape_string($con,$_POST['lev10']);
$p11 = mysqli_real_escape_string($con,$_POST['lev11']);
$p12 = mysqli_real_escape_string($con,$_POST['lev12']);
$p13 = mysqli_real_escape_string($con,$_POST['lev13']);
$p14 = mysqli_real_escape_string($con,$_POST['lev14']);
$p15 = mysqli_real_escape_string($con,$_POST['lev15']);
$p16 = mysqli_real_escape_string($con,$_POST['lev16']);
$p17 = mysqli_real_escape_string($con,$_POST['lev17']);
$p18 = mysqli_real_escape_string($con,$_POST['lev18']);
$p19 = mysqli_real_escape_string($con,$_POST['lev19']);
$p20 = mysqli_real_escape_string($con,$_POST['lev20']);


$p21 = mysqli_real_escape_string($con,$_POST['lev21']);
$p22 = mysqli_real_escape_string($con,$_POST['lev22']);
$p23 = mysqli_real_escape_string($con,$_POST['lev23']);
$p24 = mysqli_real_escape_string($con,$_POST['lev24']);
$p25 = mysqli_real_escape_string($con,$_POST['lev25']);
$p26 = mysqli_real_escape_string($con,$_POST['lev26']);
$p27 = mysqli_real_escape_string($con,$_POST['lev27']);
$p28 = mysqli_real_escape_string($con,$_POST['lev28']);
$p29 = mysqli_real_escape_string($con,$_POST['lev29']);
$p30 = mysqli_real_escape_string($con,$_POST['lev30']);

$p31 = mysqli_real_escape_string($con,$_POST['lev31']);
$p32 = mysqli_real_escape_string($con,$_POST['lev32']);
$p33 = mysqli_real_escape_string($con,$_POST['lev33']);
$p34 = mysqli_real_escape_string($con,$_POST['lev34']);
$p35 = mysqli_real_escape_string($con,$_POST['lev35']);
$p36 = mysqli_real_escape_string($con,$_POST['lev36']);
$p37 = mysqli_real_escape_string($con,$_POST['lev37']);
$p38 = mysqli_real_escape_string($con,$_POST['lev38']);
$p39 = mysqli_real_escape_string($con,$_POST['lev39']);
$p40 = mysqli_real_escape_string($con,$_POST['lev40']);

$p41 = mysqli_real_escape_string($con,$_POST['lev41']);
$p42 = mysqli_real_escape_string($con,$_POST['lev42']);
$p43 = mysqli_real_escape_string($con,$_POST['lev43']);
$p44 = mysqli_real_escape_string($con,$_POST['lev44']);
$p45 = mysqli_real_escape_string($con,$_POST['lev45']);
$p46 = mysqli_real_escape_string($con,$_POST['lev46']);
$p47 = mysqli_real_escape_string($con,$_POST['lev47']);
$p48 = mysqli_real_escape_string($con,$_POST['lev48']);
$p49 = mysqli_real_escape_string($con,$_POST['lev49']);
$p50 = mysqli_real_escape_string($con,$_POST['lev50']);

$p51 = mysqli_real_escape_string($con,$_POST['lev51']);
$p52 = mysqli_real_escape_string($con,$_POST['lev52']);
$p53 = mysqli_real_escape_string($con,$_POST['lev53']);
$p54 = mysqli_real_escape_string($con,$_POST['lev54']);
$p55 = mysqli_real_escape_string($con,$_POST['lev55']);
$p56 = mysqli_real_escape_string($con,$_POST['lev56']);
$p57 = mysqli_real_escape_string($con,$_POST['lev57']);
$p58 = mysqli_real_escape_string($con,$_POST['lev58']);
$p59 = mysqli_real_escape_string($con,$_POST['lev59']);
$p60 = mysqli_real_escape_string($con,$_POST['lev60']);

$p61 = mysqli_real_escape_string($con,$_POST['lev61']);
$p62 = mysqli_real_escape_string($con,$_POST['lev62']);
$p63 = mysqli_real_escape_string($con,$_POST['lev63']);
$p64 = mysqli_real_escape_string($con,$_POST['lev64']);
$p65 = mysqli_real_escape_string($con,$_POST['lev65']);
$p66 = mysqli_real_escape_string($con,$_POST['lev66']);
$p67 = mysqli_real_escape_string($con,$_POST['lev67']);
$p68 = mysqli_real_escape_string($con,$_POST['lev68']);
$p69 = mysqli_real_escape_string($con,$_POST['lev69']);
$p70 = mysqli_real_escape_string($con,$_POST['lev70']);

$p71 = mysqli_real_escape_string($con,$_POST['lev71']);
$p72 = mysqli_real_escape_string($con,$_POST['lev72']);
$p73 = mysqli_real_escape_string($con,$_POST['lev73']);
$p74 = mysqli_real_escape_string($con,$_POST['lev74']);
$p75 = mysqli_real_escape_string($con,$_POST['lev75']);
$p76 = mysqli_real_escape_string($con,$_POST['lev76']);
$p77 = mysqli_real_escape_string($con,$_POST['lev77']);
$p78 = mysqli_real_escape_string($con,$_POST['lev78']);
$p79 = mysqli_real_escape_string($con,$_POST['lev79']);
$p80 = mysqli_real_escape_string($con,$_POST['lev80']);

$p81 = mysqli_real_escape_string($con,$_POST['lev81']);
$p82 = mysqli_real_escape_string($con,$_POST['lev82']);
$p83 = mysqli_real_escape_string($con,$_POST['lev83']);
$p84 = mysqli_real_escape_string($con,$_POST['lev84']);
$p85 = mysqli_real_escape_string($con,$_POST['lev85']);
$p86 = mysqli_real_escape_string($con,$_POST['lev86']);
$p87 = mysqli_real_escape_string($con,$_POST['lev87']);
$p88 = mysqli_real_escape_string($con,$_POST['lev88']);
$p89 = mysqli_real_escape_string($con,$_POST['lev89']);
$p90 = mysqli_real_escape_string($con,$_POST['lev90']);

$p91 = mysqli_real_escape_string($con,$_POST['lev91']);
$p92 = mysqli_real_escape_string($con,$_POST['lev92']);
$p93 = mysqli_real_escape_string($con,$_POST['lev93']);
$p94 = mysqli_real_escape_string($con,$_POST['lev94']);
$p95 = mysqli_real_escape_string($con,$_POST['lev95']);
$p96 = mysqli_real_escape_string($con,$_POST['lev96']);
$p97 = mysqli_real_escape_string($con,$_POST['lev97']);
$p98 = mysqli_real_escape_string($con,$_POST['lev98']);
$p99 = mysqli_real_escape_string($con,$_POST['lev99']);
$p100 = mysqli_real_escape_string($con,$_POST['lev100']);




$p1up=mysqli_real_escape_string($con,$_POST['stage_uc1']);
$p2up=mysqli_real_escape_string($con,$_POST['stage_uc2']);
$p3up=mysqli_real_escape_string($con,$_POST['stage_uc3']);
$p4up=mysqli_real_escape_string($con,$_POST['stage_uc4']);
$p5up=mysqli_real_escape_string($con,$_POST['stage_uc5']);
$p6up=mysqli_real_escape_string($con,$_POST['stage_uc6']);
$p7up=mysqli_real_escape_string($con,$_POST['stage_uc7']);
$p8up=mysqli_real_escape_string($con,$_POST['stage_uc8']);
$p9up=mysqli_real_escape_string($con,$_POST['stage_uc9']);
$p10up=mysqli_real_escape_string($con,$_POST['stage_uc10']);

$p11up=mysqli_real_escape_string($con,$_POST['stage_uc11']);
$p12up=mysqli_real_escape_string($con,$_POST['stage_uc12']);
$p13up=mysqli_real_escape_string($con,$_POST['stage_uc13']);
$p14up=mysqli_real_escape_string($con,$_POST['stage_uc14']);
$p15up=mysqli_real_escape_string($con,$_POST['stage_uc15']);
$p16up=mysqli_real_escape_string($con,$_POST['stage_uc16']);
$p17up=mysqli_real_escape_string($con,$_POST['stage_uc17']);
$p18up=mysqli_real_escape_string($con,$_POST['stage_uc18']);
$p19up=mysqli_real_escape_string($con,$_POST['stage_uc19']);
$p20up=mysqli_real_escape_string($con,$_POST['stage_uc20']);

$p21up=mysqli_real_escape_string($con,$_POST['stage_uc21']);
$p22up=mysqli_real_escape_string($con,$_POST['stage_uc22']);
$p23up=mysqli_real_escape_string($con,$_POST['stage_uc23']);
$p24up=mysqli_real_escape_string($con,$_POST['stage_uc24']);
$p25up=mysqli_real_escape_string($con,$_POST['stage_uc25']);
$p26up=mysqli_real_escape_string($con,$_POST['stage_uc26']);
$p27up=mysqli_real_escape_string($con,$_POST['stage_uc27']);
$p28up=mysqli_real_escape_string($con,$_POST['stage_uc28']);
$p29up=mysqli_real_escape_string($con,$_POST['stage_uc29']);
$p30up=mysqli_real_escape_string($con,$_POST['stage_uc30']);

$p31up=mysqli_real_escape_string($con,$_POST['stage_uc31']);
$p32up=mysqli_real_escape_string($con,$_POST['stage_uc32']);
$p33up=mysqli_real_escape_string($con,$_POST['stage_uc33']);
$p34up=mysqli_real_escape_string($con,$_POST['stage_uc34']);
$p35up=mysqli_real_escape_string($con,$_POST['stage_uc35']);
$p36up=mysqli_real_escape_string($con,$_POST['stage_uc36']);
$p37up=mysqli_real_escape_string($con,$_POST['stage_uc37']);
$p38up=mysqli_real_escape_string($con,$_POST['stage_uc38']);
$p39up=mysqli_real_escape_string($con,$_POST['stage_uc39']);
$p40up=mysqli_real_escape_string($con,$_POST['stage_uc40']);

$p41up=mysqli_real_escape_string($con,$_POST['stage_uc41']);
$p42up=mysqli_real_escape_string($con,$_POST['stage_uc42']);
$p43up=mysqli_real_escape_string($con,$_POST['stage_uc43']);
$p44up=mysqli_real_escape_string($con,$_POST['stage_uc44']);
$p45up=mysqli_real_escape_string($con,$_POST['stage_uc45']);
$p46up=mysqli_real_escape_string($con,$_POST['stage_uc46']);
$p47up=mysqli_real_escape_string($con,$_POST['stage_uc47']);
$p48up=mysqli_real_escape_string($con,$_POST['stage_uc48']);
$p49up=mysqli_real_escape_string($con,$_POST['stage_uc49']);
$p50up=mysqli_real_escape_string($con,$_POST['stage_uc50']);

$p51up=mysqli_real_escape_string($con,$_POST['stage_uc51']);
$p52up=mysqli_real_escape_string($con,$_POST['stage_uc52']);
$p53up=mysqli_real_escape_string($con,$_POST['stage_uc53']);
$p54up=mysqli_real_escape_string($con,$_POST['stage_uc54']);
$p55up=mysqli_real_escape_string($con,$_POST['stage_uc55']);
$p56up=mysqli_real_escape_string($con,$_POST['stage_uc56']);
$p57up=mysqli_real_escape_string($con,$_POST['stage_uc57']);
$p58up=mysqli_real_escape_string($con,$_POST['stage_uc58']);
$p59up=mysqli_real_escape_string($con,$_POST['stage_uc59']);
$p60up=mysqli_real_escape_string($con,$_POST['stage_uc60']);

$p61up=mysqli_real_escape_string($con,$_POST['stage_uc61']);
$p62up=mysqli_real_escape_string($con,$_POST['stage_uc62']);
$p63up=mysqli_real_escape_string($con,$_POST['stage_uc63']);
$p64up=mysqli_real_escape_string($con,$_POST['stage_uc64']);
$p65up=mysqli_real_escape_string($con,$_POST['stage_uc65']);
$p66up=mysqli_real_escape_string($con,$_POST['stage_uc66']);
$p67up=mysqli_real_escape_string($con,$_POST['stage_uc67']);
$p68up=mysqli_real_escape_string($con,$_POST['stage_uc68']);
$p69up=mysqli_real_escape_string($con,$_POST['stage_uc69']);
$p70up=mysqli_real_escape_string($con,$_POST['stage_uc70']);

$p71up=mysqli_real_escape_string($con,$_POST['stage_uc71']);
$p72up=mysqli_real_escape_string($con,$_POST['stage_uc72']);
$p73up=mysqli_real_escape_string($con,$_POST['stage_uc73']);
$p74up=mysqli_real_escape_string($con,$_POST['stage_uc74']);
$p75up=mysqli_real_escape_string($con,$_POST['stage_uc75']);
$p76up=mysqli_real_escape_string($con,$_POST['stage_uc76']);
$p77up=mysqli_real_escape_string($con,$_POST['stage_uc77']);
$p78up=mysqli_real_escape_string($con,$_POST['stage_uc78']);
$p79up=mysqli_real_escape_string($con,$_POST['stage_uc79']);
$p80up=mysqli_real_escape_string($con,$_POST['stage_uc80']);

$p81up=mysqli_real_escape_string($con,$_POST['stage_uc81']);
$p82up=mysqli_real_escape_string($con,$_POST['stage_uc82']);
$p83up=mysqli_real_escape_string($con,$_POST['stage_uc83']);
$p84up=mysqli_real_escape_string($con,$_POST['stage_uc84']);
$p85up=mysqli_real_escape_string($con,$_POST['stage_uc85']);
$p86up=mysqli_real_escape_string($con,$_POST['stage_uc86']);
$p87up=mysqli_real_escape_string($con,$_POST['stage_uc87']);
$p88up=mysqli_real_escape_string($con,$_POST['stage_uc88']);
$p89up=mysqli_real_escape_string($con,$_POST['stage_uc89']);
$p90up=mysqli_real_escape_string($con,$_POST['stage_uc90']);

$p91up=mysqli_real_escape_string($con,$_POST['stage_uc91']);
$p92up=mysqli_real_escape_string($con,$_POST['stage_uc92']);
$p93up=mysqli_real_escape_string($con,$_POST['stage_uc93']);
$p94up=mysqli_real_escape_string($con,$_POST['stage_uc94']);
$p95up=mysqli_real_escape_string($con,$_POST['stage_uc95']);
$p96up=mysqli_real_escape_string($con,$_POST['stage_uc96']);
$p97up=mysqli_real_escape_string($con,$_POST['stage_uc97']);
$p98up=mysqli_real_escape_string($con,$_POST['stage_uc98']);
$p99up=mysqli_real_escape_string($con,$_POST['stage_uc99']);
$p100up=mysqli_real_escape_string($con,$_POST['stage_uc100']);







$inref_bonus=mysqli_real_escape_string($con,$_POST['indir_ref_amt']);

$gateway = 0;
$old_renewdays = mysqli_real_escape_string($con,$_POST['old_renewdays']);
$renewdays = mysqli_real_escape_string($con,$_POST['renewdays']);

if ( strlen($pname) < 2 ){
$msg=$msg."Package Name Should Have Minimum 2 Characters.<BR>";
$status= "NOTOK";}

if ( strlen($pdetail) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Package details must contain more than 4 char length.<BR>";
$status= "NOTOK";}

if($status=="OK")
{
//$res1=mysqli_query($con,"update packages set name='$pname',price='$pprice',currency='$pcurid',details='$pdetail',tax='$pcktax',mpay='$pckmpay',sbonus='$pcksbonus',active='$pact',level1='$p1',level2='$p2',level3='$p3',level4='$p4',level5='$p5',level6='$p6',level7='$p7',level8='$p8',level9='$p9',level10='$p10',level11='$p11',level12='$p12',level13='$p13',level14='$p14',level15='$p15',level16='$p16',level17='$p17',level18='$p18',level19='$p19',level20='$p20',gateway='$gateway',validity='$renewdays' where id=$pidmain");
$res1=mysqli_query($con,"update packages set name='$pname',price='$pprice',currency='$pcurid',details='$pdetail',
tax='$pcktax',mpay='$pckmpay',sbonus='$pcksbonus',active='$pact',
level1='$p1',
level2='$p2',
level3='$p3',
level4='$p4',
level5='$p5',
level6='$p6',
level7='$p7',
level8='$p8',
level9='$p9',
level10='$p10',
level11='$p11',level12='$p12',level13='$p13',level14='$p14',level15='$p15',level16='$p16',level17='$p17',level18='$p18',level19='$p19',
level20='$p20',

level21='$p21',
level22='$p22',
level23='$p23',
level24='$p24',
level25='$p25',
level26='$p26',
level27='$p27',
level28='$p28',
level29='$p29',
level30='$p30',


level31='$p31',
level32='$p32',
level33='$p33',
level34='$p34',
level35='$p35',
level36='$p36',
level37='$p37',
level38='$p38',
level39='$p39',
level40='$p40',

level41='$p41',
level42='$p42',
level43='$p43',
level44='$p44',
level45='$p45',
level46='$p46',
level47='$p47',
level48='$p48',
level49='$p49',
level50='$p50',

level51='$p51',
level52='$p52',
level53='$p53',
level54='$p54',
level55='$p55',
level56='$p56',
level57='$p57',
level58='$p58',
level59='$p59',
level60='$p60',

level61='$p61',
level62='$p62',
level63='$p63',
level64='$p64',
level65='$p65',
level66='$p66',
level67='$p67',
level68='$p68',
level69='$p69',
level70='$p70',

level71='$p71',
level72='$p72',
level73='$p73',
level74='$p74',
level75='$p75',
level76='$p76',
level77='$p77',
level78='$p78',
level79='$p79',
level80='$p80',

level81='$p81',
level82='$p82',
level83='$p83',
level84='$p84',
level85='$p85',
level86='$p86',
level87='$p87',
level88='$p88',
level89='$p89',
level90='$p90',

level91='$p91',
level92='$p92',
level93='$p93',
level94='$p94',
level95='$p95',
level96='$p96',
level97='$p97',
level98='$p98',
level99='$p99',
level100='$p100',

stage1_up='$p1up',
stage2_up='$p2up',
stage3_up='$p3up',
stage4_up='$p4up',
stage5_up='$p5up',
stage6_up='$p6up',
stage7_up='$p7up',
stage8_up='$p8up',
stage9_up='$p9up',
stage10_up='$p10up',

stage11_up='$p11up',
stage12_up='$p12up',
stage13_up='$p13up',
stage14_up='$p14up',
stage15_up='$p15up',
stage16_up='$p16up',
stage17_up='$p17up',
stage18_up='$p18up',
stage19_up='$p19up',
stage20_up='$p20up',

stage21_up='$p21up',
stage22_up='$p22up',
stage23_up='$p23up',
stage24_up='$p24up',
stage25_up='$p25up',
stage26_up='$p26up',
stage27_up='$p27up',
stage28_up='$p28up',
stage29_up='$p29up',
stage30_up='$p30up',

stage31_up='$p31up',
stage32_up='$p32up',
stage33_up='$p33up',
stage34_up='$p34up',
stage35_up='$p35up',
stage36_up='$p36up',
stage37_up='$p37up',
stage38_up='$p38up',
stage39_up='$p39up',
stage40_up='$p40up',

stage41_up='$p41up',
stage42_up='$p42up',
stage43_up='$p43up',
stage44_up='$p44up',
stage45_up='$p45up',
stage46_up='$p46up',
stage47_up='$p47up',
stage48_up='$p48up',
stage49_up='$p49up',
stage50_up='$p50up',

stage51_up='$p51up',
stage52_up='$p52up',
stage53_up='$p53up',
stage54_up='$p54up',
stage55_up='$p55up',
stage56_up='$p56up',
stage57_up='$p57up',
stage58_up='$p58up',
stage59_up='$p59up',
stage60_up='$p60up',

stage61_up='$p61up',
stage62_up='$p62up',
stage63_up='$p63up',
stage64_up='$p64up',
stage65_up='$p65up',
stage66_up='$p66up',
stage67_up='$p67up',
stage68_up='$p68up',
stage69_up='$p69up',
stage70_up='$p70up',

stage71_up='$p71up',
stage72_up='$p72up',
stage73_up='$p73up',
stage74_up='$p74up',
stage75_up='$p75up',
stage76_up='$p76up',
stage77_up='$p77up',
stage78_up='$p78up',
stage79_up='$p79up',
stage80_up='$p80up',

stage81_up='$p81up',
stage82_up='$p82up',
stage83_up='$p83up',
stage84_up='$p84up',
stage85_up='$p85up',
stage86_up='$p86up',
stage87_up='$p87up',
stage88_up='$p88up',
stage89_up='$p8up',
stage90_up='$p90up',

stage91_up='$p91up',
stage92_up='$p92up',
stage93_up='$p93up',
stage94_up='$p94up',
stage95_up='$p95up',
stage96_up='$p96up',
stage97_up='$p97up',
stage98_up='$p98up',
stage99_up='$p99up',
stage100_up='$p100up',



gateway='$gateway',validity='$renewdays',indirect_ref_amt='$inref_bonus' where id=$pidmain");

if($res1)
{
	$renewdays = intval($renewdays);
	$old_renewdays = intval($old_renewdays);
	/* Check whether renewdays modified */
	if ($old_renewdays != $renewdays)
	{
		if ($old_renewdays < $renewdays)
		{
			$days_diff = $renewdays - $old_renewdays;
			mysqli_query($con, "UPDATE affiliateuser SET `expiry`=DATE_ADD(`expiry`,INTERVAL $days_diff DAY) WHERE `pcktaken` = $pidmain");
		}
		else
		{
			$days_diff = $old_renewdays - $renewdays;
			mysqli_query($con, "UPDATE affiliateuser SET `expiry`=DATE_SUB(`expiry`,INTERVAL $days_diff DAY) WHERE `pcktaken` = $pidmain");
		}
	}
	print "Package updated...!!! Redirecting...";
}
else
{
	print "error!!!! try again later or ask for help from your administrator!!!! Redirecting...";
}


} 
else {
        
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing errors
	 
}

?>
