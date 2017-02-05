<?php
header( "refresh:3;url=pacsettings.php" );
session_start(); //starting session
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$pname=mysqli_real_escape_string($con,$_POST['pckname']); //fetching details through post method
$pdetail =mysqli_real_escape_string( $con,$_POST['pckdetail']);
$pprice = mysqli_real_escape_string($con,$_POST['pckprice']);
$pcurid = mysqli_real_escape_string($con,$_POST['currency']);
$pckmpay =mysqli_real_escape_string($con, $_POST['pckmpay']);
$pcksbonus = mysqli_real_escape_string($con,$_POST['pcksbonus']);
$pcktax = mysqli_real_escape_string($con,$_POST['pcktax']);
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
$pay_via_voucher=mysqli_real_escape_string($con,$_POST['pay_via_voucher']);


$gateway = 0;
$renewdays = mysqli_real_escape_string($con,$_POST['renewdays']);


if ( strlen($pname) < 2 ){
$msg=$msg."Package Name Should Have Minimum 2 Characters.<BR>";
$status= "NOTOK";}

if ( strlen($pdetail) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Package details must contain more than 4 char length.<BR>";
$status= "NOTOK";}

if($status=="OK")
{
//$res1=mysqli_query($con,"INSERT INTO packages (name,price,currency,details,tax,mpay,sbonus,cdate,active,level1,level2,level3,level4,level5,level6,level7,level8,level9,level10,level11,level12,level13,level14,level15,level16,level17,level18,level19,level20,gateway,validity) VALUES ('$pname', '$pprice', '$pcurid', '$pdetail','$pcktax', '$pckmpay', '$pcksbonus', NOW(), 1, '$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$p17','$p18','$p19','$p20','$gateway','$renewdays')");
$res1=mysqli_query($con,"INSERT INTO packages 
(name,price,currency,details,tax,mpay,sbonus,cdate,active,level1,stage1_up,level2,stage2_up,level3,stage3_up,level4,stage4_up,level5,stage5_up,level6,level7,level8,level9,level10,level11,level12,level13,level14,level15,level16,level17,level18,level19,level20,
level21,
level22,
level23,
level24,
level25,
level26,
level27,
level28,
level29,
level30,

level31,
level32,
level33,
level34,
level35,
level36,
level37,
level38,
level39,
level40,

level41,
level42,
level43,
level44,
level45,
level46,
level47,
level48,
level49,
level50,

level51,
level52,
level53,
level54,
level55,
level56,
level57,
level58,
level59,
level60,

level61,
level62,
level63,
level64,
level65,
level66,
level67,
level68,
level69,
level70,

level71,
level72,
level73,
level74,
level75,
level76,
level77,
level78,
level79,
level80,

level81,
level82,
level83,
level84,
level85,
level86,
level87,
level88,
level89,
level90,

level91,
level92,
level93,
level94,
level95,
level96,
level97,
level98,
level99,
level100,

stage6_up,
stage7_up,
stage8_up,
stage9_up,
stage10_up,

stage11_up,
stage12_up,
stage13_up,
stage14_up,
stage15_up,
stage16_up,
stage17_up,
stage18_up,
stage19_up,
stage20_up,

stage21_up,
stage22_up,
stage23_up,
stage24_up,
stage25_up,
stage26_up,
stage27_up,
stage28_up,
stage29_up,
stage30_up,

stage31_up,
stage32_up,
stage33_up,
stage34_up,
stage35_up,
stage36_up,
stage37_up,
stage38_up,
stage39_up,
stage40_up,

stage41_up,
stage42_up,
stage43_up,
stage44_up,
stage45_up,
stage46_up,
stage47_up,
stage48_up,
stage49_up,
stage50_up,

stage51_up,
stage52_up,
stage53_up,
stage54_up,
stage55_up,
stage56_up,
stage57_up,
stage58_up,
stage59_up,
stage60_up,

stage61_up,
stage62_up,
stage63_up,
stage64_up,
stage65_up,
stage66_up,
stage67_up,
stage68_up,
stage69_up,
stage70_up,


stage71_up,
stage72_up,
stage73_up,
stage74_up,
stage75_up,
stage76_up,
stage77_up,
stage78_up,
stage79_up,
stage80_up,

stage81_up,
stage82_up,
stage83_up,
stage84_up,
stage85_up,
stage86_up,
stage87_up,
stage88_up,
stage89_up,
stage90_up,

stage91_up,
stage92_up,
stage93_up,
stage94_up,
stage95_up,
stage96_up,
stage97_up,
stage98_up,
stage99_up,
stage100_up,


gateway,validity,indirect_ref_amt,pay_via_voucher) VALUES 
('$pname', '$pprice', '$pcurid', '$pdetail','$pcktax', '$pckmpay', '$pcksbonus', NOW(), 1, 
'$p1','$p1up','$p2','$p2up','$p3','$p3up','$p4','$p4up','$p5','$p5up','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$p17','$p18','$p19',
'$p20',

'$p21',
'$p22',
'$p23',
'$p24',
'$p25',
'$p26',
'$p27',
'$p28',
'$p29',
'$p30',

'$p31',
'$p32',
'$p33',
'$p34',
'$p35',
'$p36',
'$p37',
'$p38',
'$p39',
'$p40',

'$p41',
'$p42',
'$p43',
'$p44',
'$p45',
'$p46',
'$p47',
'$p48',
'$p49',
'$p50',

'$p51',
'$p52',
'$p53',
'$p54',
'$p55',
'$p56',
'$p57',
'$p58',
'$p59',
'$p60',

'$p61',
'$p62',
'$p63',
'$p64',
'$p65',
'$p66',
'$p67',
'$p68',
'$p69',
'$p70',

'$p71',
'$p72',
'$p73',
'$p74',
'$p75',
'$p76',
'$p77',
'$p78',
'$p79',
'$p80',

'$p81',
'$p82',
'$p83',
'$p84',
'$p85',
'$p86',
'$p87',
'$p88',
'$p89',
'$p90',

'$p91',
'$p92',
'$p93',
'$p94',
'$p95',
'$p96',
'$p97',
'$p98',
'$p99',
'$p100',

'$p6up',
'$p7up',
'$p8up',
'$p9up',
'$p10up',

'$p11up',
'$p12up',
'$p13up',
'$p14up',
'$p15up',
'$p16up',
'$p17up',
'$p18up',
'$p19up',
'$p20up',

'$p21up',
'$p22up',
'$p23up',
'$p24up',
'$p25up',
'$p26up',
'$p27up',
'$p28up',
'$p29up',
'$p30up',

'$p31up',
'$p32up',
'$p33up',
'$p34up',
'$p35up',
'$p36up',
'$p37up',
'$p38up',
'$p39up',
'$p40up',

'$p41up',
'$p42up',
'$p43up',
'$p44up',
'$p45up',
'$p46up',
'$p47up',
'$p48up',
'$p49up',
'$p50up',

'$p51up',
'$p52up',
'$p53up',
'$p54up',
'$p55up',
'$p56up',
'$p57up',
'$p58up',
'$p59up',
'$p60up',

'$p61up',
'$p62up',
'$p63up',
'$p64up',
'$p65up',
'$p66up',
'$p67up',
'$p68up',
'$p69up',
'$p70up',

'$p71up',
'$p72up',
'$p73up',
'$p74up',
'$p75up',
'$p76up',
'$p77up',
'$p78up',
'$p79up',
'$p80up',

'$p81up',
'$p82up',
'$p83up',
'$p84up',
'$p85up',
'$p86up',
'$p87up',
'$p88up',
'$p89up',
'$p90up',

'$p91up',
'$p92up',
'$p93up',
'$p94up',
'$p95up',
'$p96up',
'$p97up',
'$p98up',
'$p99up',
'$p100up',

'$gateway','$renewdays','$inref_bonus','$pay_via_voucher')");

if($res1)
{
print "Package Created...!!! Redirecting...";
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
