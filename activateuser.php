<?php
//header( "refresh:3;url=paymentscod.php" );

include_once ("z_db.php");
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
        print "	<script language='javascript'>	window.location = 'index.php';	</script>";
			
}
$tomake= $_GET["username"];

$result=mysqli_query($con,"UPDATE affiliateuser SET active=1 WHERE username='$tomake'");




//code added by sridhar

$ref_query11=mysqli_query($con,"SELECT  * FROM affiliateuser WHERE username='$tomake'");
$ref_list11=$ref_query11->fetch_array(MYSQLI_ASSOC);
$ref=$ref_list11['referedby'];
$userid=$tomake;
$package=$_GET['package'];
// require_once('../../products/wp-load.php');
// $user_name = $ref_list11['username'];
//     $user_email = $ref_list11['email'];
//     $user_id = username_exists( $user_name );
//     if ( !$user_id ) {
//         $password = $ref_list11['password'];
//         $user_id = wp_create_user( $user_name,$password,$user_email );
// 		wp_set_password( $password, $user_id );
// 		$user_id_role = new WP_User($user_id);
// 		$user_id_role->set_role('seller');
// 		$updated1 = update_user_meta( $user_id, 'dokan_enable_selling', 'yes' );
// 		$updated2 = update_user_meta( $user_id, 'dokan_publishing', 'no' );
// 	} 
// 	else
// 	{
// 		$password = $ref_list11['password'];
// 		wp_set_password( $password, $user_id );
// 		$user_id_role = new WP_User($user_id);
// 		$user_id_role->set_role('seller');
// 	}

//echo $_SESSION['adminidusername']; exit;

$c1=mysqli_query($con,"SELECT  COUNT(*) as STAGETOTUSER FROM affiliate_bonus_history 
 WHERE (user_id = '$userid')");
$c1_list=$c1->fetch_array(MYSQLI_ASSOC);
$c1_count=$c1_list['STAGETOTUSER'];

if($c1_count==0)
{

	if(!($package==""))
	{
	$sqlquery11="SELECT validity FROM packages where id = $package"; //fetching no of days validity from package table from databse
	$rec211=mysqli_query($con,$sqlquery11);
	$row211 = mysqli_fetch_row($rec211);
	$noofdays=$row211[0]; //assigning website address
	$cur=date("Y-m-d");
	$expiry=date('Y-m-d', strtotime($cur. '+ '.$noofdays.'days'));
	$sbonus=0;
	}

	$sqlquery11="SELECT * FROM packages where id = $package"; //fetching amt from package table from database
	$rec211=mysqli_query($con,$sqlquery11);
	//$row211 = mysqli_fetch_row($rec211);
    $row211 =$rec211->fetch_array(MYSQLI_ASSOC);
	
	$luser_id=$userid; //registered username 

	//$ref_query=mysqli_query($con,"SELECT  COUNT(*) as TOTALUSER FROM affiliateuser WHERE referedby = '$ref'");
	//$ref_list=$ref_query->fetch_array(MYSQLI_ASSOC);
	//$ref_count=$ref_list['TOTALUSER'];  //getting the total user from referedby

	//getting stage count
	$s1=mysqli_query($con,"SELECT  COUNT(*) as STAGE1TOTUSER FROM affiliateuser as a,affiliate_bonus_history as b
	 WHERE (b.stage1_ref = '$ref' || b.stage2_ref = '$ref' || b.stage3_ref = '$ref' || b.stage4_ref = '$ref' || b.stage5_ref = '$ref' || b.stage6_ref = '$ref' || b.stage7_ref = '$ref' || b.stage8_ref = '$ref' || b.stage9_ref = '$ref' || b.stage10_ref = '$ref' || b.stage11_ref = '$ref' || b.stage12_ref = '$ref' || b.stage13_ref = '$ref' || b.stage14_ref = '$ref' || b.stage15_ref = '$ref' || b.stage16_ref = '$ref' || b.stage17_ref = '$ref' || b.stage18_ref = '$ref' || b.stage19_ref = '$ref' || b.stage20_ref = '$ref' || b.stage21_ref = '$ref' || b.stage22_ref = '$ref' || b.stage23_ref = '$ref' || b.stage24_ref = '$ref' || b.stage25_ref = '$ref' || b.stage26_ref = '$ref' || b.stage27_ref = '$ref' || b.stage28_ref = '$ref' || b.stage29_ref = '$ref' || b.stage30_ref = '$ref' || b.stage31_ref = '$ref' || b.stage32_ref = '$ref' || b.stage33_ref = '$ref' || b.stage34_ref = '$ref' || b.stage35_ref = '$ref' || b.stage36_ref = '$ref' || b.stage37_ref = '$ref' || b.stage38_ref = '$ref' || b.stage39_ref = '$ref' || b.stage40_ref = '$ref' || b.stage41_ref = '$ref' || b.stage42_ref = '$ref' || b.stage43_ref = '$ref' || b.stage44_ref = '$ref' || b.stage45_ref = '$ref' || b.stage46_ref = '$ref' || b.stage47_ref = '$ref' || b.stage48_ref = '$ref' || b.stage49_ref = '$ref' || b.stage50_ref = '$ref' || b.stage51_ref = '$ref' || b.stage52_ref = '$ref' || b.stage53_ref = '$ref' || b.stage54_ref = '$ref' || b.stage55_ref = '$ref' || b.stage56_ref = '$ref' || b.stage57_ref = '$ref' || b.stage58_ref = '$ref' || b.stage59_ref = '$ref' || b.stage60_ref = '$ref' || b.stage61_ref = '$ref' || b.stage62_ref = '$ref' || b.stage63_ref = '$ref' || b.stage64_ref = '$ref' || b.stage65_ref = '$ref' || b.stage66_ref = '$ref' || b.stage67_ref = '$ref' || b.stage68_ref = '$ref' || b.stage69_ref = '$ref' || b.stage70_ref = '$ref' || b.stage71_ref = '$ref' || b.stage72_ref = '$ref' || b.stage73_ref = '$ref' || b.stage74_ref = '$ref' || b.stage75_ref = '$ref' || b.stage76_ref = '$ref' || b.stage77_ref = '$ref' || b.stage78_ref = '$ref' || b.stage79_ref = '$ref' || b.stage80_ref = '$ref' || b.stage81_ref = '$ref' || b.stage82_ref = '$ref' || b.stage83_ref = '$ref' || b.stage84_ref = '$ref' || b.stage85_ref = '$ref' || b.stage86_ref = '$ref' || b.stage87_ref = '$ref' || b.stage88_ref = '$ref' || b.stage89_ref = '$ref' || b.stage90_ref = '$ref' || b.stage91_ref = '$ref' || b.stage92_ref = '$ref' || b.stage93_ref = '$ref' || b.stage94_ref = '$ref' || b.stage95_ref = '$ref' || b.stage96_ref = '$ref' || b.stage97_ref = '$ref' || b.stage98_ref = '$ref' || b.stage99_ref = '$ref' || b.stage100_ref = '$ref') AND (a.username = b.user_id )");
	$stage1_list=$s1->fetch_array(MYSQLI_ASSOC);
	$stage1_count=$stage1_list['STAGE1TOTUSER'];
	//getting stage count ends
	$ref_count= $stage1_count;

	$downline=2;
	$marketer_count=1;
	$ref_under_user=array();
	for ($i=1; $i <=100 ; $i++) { 
		$marketer_count *=$downline;
		if($ref_count <=$marketer_count){
			$ref_stage=$i;
			$stage_amt=$row211['level'.$i];
			break;
		}
	}
	
	
	
	// work till this kavi 

	/*
	$all_user_query=mysqli_query($con,"SELECT  * FROM affiliateuser WHERE (referedby = '$ref') ORDER BY id asc");
	while ($all_list = mysqli_fetch_array($all_user_query, MYSQL_ASSOC)) {
		$ref_under_user[]= $all_list['username'];
	}
	*/
	$all_user_query=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (stage1_ref = '$ref' OR stage2_ref = '$ref' OR stage3_ref = '$ref' OR 
	stage4_ref = '$ref' OR stage5_ref = '$ref' OR stage6_ref = '$ref' OR stage7_ref = '$ref' OR stage8_ref = '$ref' OR stage9_ref = '$ref' OR
	stage10_ref = '$ref' OR	stage11_ref = '$ref' OR stage12_ref = '$ref' OR stage13_ref = '$ref' OR stage14_ref = '$ref' OR stage15_ref = '$ref' OR stage16_ref = '$ref' OR stage17_ref = '$ref' OR stage18_ref = '$ref' OR stage19_ref = '$ref' OR
	stage20_ref = '$ref' OR
	
	stage21_ref = '$ref' OR stage22_ref = '$ref' OR stage23_ref = '$ref' OR 
	stage24_ref = '$ref' OR stage25_ref = '$ref' OR stage26_ref = '$ref' OR stage27_ref = '$ref' OR stage28_ref = '$ref' OR stage29_ref = '$ref' OR
	stage30_ref = '$ref' OR
	
	stage31_ref = '$ref' OR stage32_ref = '$ref' OR stage33_ref = '$ref' OR 
	stage34_ref = '$ref' OR stage35_ref = '$ref' OR stage36_ref = '$ref' OR stage37_ref = '$ref' OR stage38_ref = '$ref' OR stage39_ref = '$ref' OR
	stage40_ref = '$ref' OR
	
	stage41_ref = '$ref' OR stage42_ref = '$ref' OR stage43_ref = '$ref' OR 
	stage44_ref = '$ref' OR stage45_ref = '$ref' OR stage46_ref = '$ref' OR stage47_ref = '$ref' OR stage48_ref = '$ref' OR stage49_ref = '$ref' OR
	stage50_ref = '$ref' OR
	
	stage51_ref = '$ref' OR stage52_ref = '$ref' OR stage53_ref = '$ref' OR 
	stage54_ref = '$ref' OR stage55_ref = '$ref' OR stage56_ref = '$ref' OR stage57_ref = '$ref' OR stage58_ref = '$ref' OR stage59_ref = '$ref' OR
	stage60_ref = '$ref' OR
	
	stage61_ref = '$ref' OR stage62_ref = '$ref' OR stage63_ref = '$ref' OR 
	stage64_ref = '$ref' OR stage65_ref = '$ref' OR stage66_ref = '$ref' OR stage67_ref = '$ref' OR stage68_ref = '$ref' OR stage69_ref = '$ref' OR
	stage70_ref = '$ref' OR
	
	stage71_ref = '$ref' OR stage72_ref = '$ref' OR stage73_ref = '$ref' OR 
	stage74_ref = '$ref' OR stage75_ref = '$ref' OR stage76_ref = '$ref' OR stage77_ref = '$ref' OR stage78_ref = '$ref' OR stage79_ref = '$ref' OR
	stage80_ref = '$ref' OR
	
	stage81_ref = '$ref' OR stage82_ref = '$ref' OR stage83_ref = '$ref' OR 
	stage84_ref = '$ref' OR stage85_ref = '$ref' OR stage86_ref = '$ref' OR stage87_ref = '$ref' OR stage88_ref = '$ref' OR stage89_ref = '$ref' OR
	stage90_ref = '$ref' OR
	
	stage91_ref = '$ref' OR stage92_ref = '$ref' OR stage93_ref = '$ref' OR 
	stage94_ref = '$ref' OR stage95_ref = '$ref' OR stage96_ref = '$ref' OR stage97_ref = '$ref' OR stage98_ref = '$ref' OR stage99_ref = '$ref' OR
	stage100_ref = '$ref'
	
	) ORDER BY bid asc");
	while ($all_list = mysqli_fetch_array($all_user_query, MYSQL_ASSOC)) {
		$ref_under_user[]= $all_list['user_id'];
	}
        $ref_under_count=count($ref_under_user);
	// echo "<pre>";
	// print_r($ref_under_user);
	// exit;
	
	

	if($ref_under_count<=2)
	{
		$cur=date("Y-m-d");
		$query2=mysqli_query($con,"insert into affiliate_bonus_history ('bid','user_id','referedby','stage1_ref','ref_stage','amt','created') values 
		('','$luser_id','$ref','$ref','$ref_stage','$stage_amt','$cur')"); //changes made here
		
		$query4=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref'");
		$row4=$query4->fetch_array(MYSQLI_ASSOC);
		$tot_amt=($row4['TotalAmt']+$stage_amt); 
		$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt."',level='".$ref_stage."' where username='".$ref."'");
		
		
		
		
		//echo "less then 2";exit;
	}
	elseif($ref_under_count>2){
						
		
	        
		for($i=0;$i<$ref_under_count;$i++){
			//echo $ref_under_user[$i] . "<br/>";
			$query7=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE stage1_ref = '$ref_under_user[$i]'");
			$row7=$query7->fetch_array(MYSQLI_ASSOC);
			
			
			$ref_query=mysqli_query($con,"SELECT  COUNT(*) as TOTALFOUND FROM affiliate_bonus_history WHERE stage1_ref = '$ref_under_user[$i]'");
			$ref_list=$ref_query->fetch_array(MYSQLI_ASSOC);
			
			$stage_ref[]=array($ref_under_user[$i],$ref_list['TOTALFOUND']);
		}
		
	        
		$stage1_count=count($stage_ref);
		$s1=array();
		for($j=0;$j<$stage1_count;$j++){
			//print_r($stage_ref[$j]); //list
			//print_r($stage_ref[$j][0]);//name alone		
			//print_r($stage_ref[$j][1]);//counts
			if($luser_id != $stage_ref[$j][0])
			{
				if($stage_ref[$j][1]<3){
					$s1[]=$stage_ref[$j][0];
				}	
			}
				
		}
		
		
		// echo "<pre>";
		// print_r($s1);
	 //    exit;


		$stage1_ref=$s1[0];
		
		// echo "<pre>";
		// print_r($stage1_ref);
		// exit;
		
		
		$cur=date("Y-m-d");

		$query2=mysqli_query($con,"insert into affiliate_bonus_history (`bid`,`user_id`,`referedby`,`stage1_ref`,`ref_stage`,`amt`,`created`) values 
		('','$luser_id','$ref','$stage1_ref','$ref_stage','$stage_amt','$cur')");
		
		$query4=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
		$row4=$query4->fetch_array(MYSQLI_ASSOC);
		$tot_amt=($row4['TotalAmt']+$stage_amt); 
		$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt."',level='".$ref_stage."' where username='".$stage1_ref."'");

		//upgradation process code starts 
		$query5=mysqli_query($con,"SELECT  * FROM affiliateuser WHERE username = '$stage1_ref'");
		$row5=$query5->fetch_array(MYSQLI_ASSOC);
		$curr_stage=$row5['level']; 
		$current_tot=$row5['tamount'];
		$curr_ref=$row5['referedby'];

		$query6=mysqli_query($con,"SELECT  COUNT(*) FROM affliate_stage_bonus WHERE user_id = '$stage1_ref' AND upgrade_stage='$curr_stage'");
		$row6 = mysqli_fetch_row($query6);
		$numrows = $row6[0];

		$query7=mysqli_query($con,"SELECT  * FROM affiliateuser WHERE username = '$curr_ref'");
		$row7=$query7->fetch_array(MYSQLI_ASSOC);
		$upgradation_ref=$row7['referedby'];


		$query8=mysqli_query($con,"SELECT  count(*) as upgraded_status FROM affliate_stage_bonus 
		WHERE user_id = '$stage1_ref' AND upgrade_stage='$curr_stage' ");
		$row8=$query8->fetch_array(MYSQLI_ASSOC);
		$upgrade_his=$row8['upgraded_status'];


		//code to fetch the dynamic upgradation cost
		$curr_pack=$row5['pcktaken'];//current package for stage1 ref
		
		$sqlquery_package="SELECT * FROM packages where id = $curr_pack"; //fetching amt from package table from database
		$package_details=mysqli_query($con,$sqlquery_package);
		$package_info = $package_details->fetch_array(MYSQLI_ASSOC);
				
		$p1up=$package_info['stage1_up'];
		$p2up=$package_info['stage2_up'];
		$p3up=$package_info['stage3_up'];
		$p4up=$package_info['stage4_up'];
		$p5up=$package_info['stage5_up'];
		$p6up=$package_info['stage6_up'];
		$p7up=$package_info['stage7_up'];
		$p8up=$package_info['stage8_up'];
		$p9up=$package_info['stage9_up'];
		$p10up=$package_info['stage10_up'];

		$p11up=$package_info['stage11_up'];
		$p12up=$package_info['stage12_up'];
		$p13up=$package_info['stage13_up'];
		$p14up=$package_info['stage14_up'];
		$p15up=$package_info['stage15_up'];
		$p16up=$package_info['stage16_up'];
		$p17up=$package_info['stage17_up'];
		$p18up=$package_info['stage18_up'];
		$p19up=$package_info['stage19_up'];
		$p20up=$package_info['stage20_up'];

		$p21up=$package_info['stage21_up'];
		$p22up=$package_info['stage22_up'];
		$p23up=$package_info['stage23_up'];
		$p24up=$package_info['stage24_up'];
		$p25up=$package_info['stage25_up'];
		$p26up=$package_info['stage26_up'];
		$p27up=$package_info['stage27_up'];
		$p28up=$package_info['stage28_up'];
		$p29up=$package_info['stage29_up'];
		$p30up=$package_info['stage30_up'];

		$p31up=$package_info['stage31_up'];
		$p32up=$package_info['stage32_up'];
		$p33up=$package_info['stage33_up'];
		$p34up=$package_info['stage34_up'];
		$p35up=$package_info['stage35_up'];
		$p36up=$package_info['stage36_up'];
		$p37up=$package_info['stage37_up'];
		$p38up=$package_info['stage38_up'];
		$p39up=$package_info['stage39_up'];
		$p40up=$package_info['stage40_up'];

		$p41up=$package_info['stage41_up'];
		$p42up=$package_info['stage42_up'];
		$p43up=$package_info['stage43_up'];
		$p44up=$package_info['stage44_up'];
		$p45up=$package_info['stage45_up'];
		$p46up=$package_info['stage46_up'];
		$p47up=$package_info['stage47_up'];
		$p48up=$package_info['stage48_up'];
		$p49up=$package_info['stage49_up'];
		$p50up=$package_info['stage50_up'];


		$p51up=$package_info['stage51_up'];
		$p52up=$package_info['stage52_up'];
		$p53up=$package_info['stage53_up'];
		$p54up=$package_info['stage54_up'];
		$p55up=$package_info['stage55_up'];
		$p56up=$package_info['stage56_up'];
		$p57up=$package_info['stage57_up'];
		$p58up=$package_info['stage58_up'];
		$p59up=$package_info['stage59_up'];
		$p60up=$package_info['stage60_up'];


		$p61up=$package_info['stage61_up'];
		$p62up=$package_info['stage62_up'];
		$p63up=$package_info['stage63_up'];
		$p64up=$package_info['stage64_up'];
		$p65up=$package_info['stage65_up'];
		$p66up=$package_info['stage66_up'];
		$p67up=$package_info['stage67_up'];
		$p68up=$package_info['stage68_up'];
		$p69up=$package_info['stage69_up'];
		$p70up=$package_info['stage70_up'];


		$p71up=$package_info['stage71_up'];
		$p72up=$package_info['stage72_up'];
		$p73up=$package_info['stage73_up'];
		$p74up=$package_info['stage74_up'];
		$p75up=$package_info['stage75_up'];
		$p76up=$package_info['stage76_up'];
		$p77up=$package_info['stage77_up'];
		$p78up=$package_info['stage78_up'];
		$p79up=$package_info['stage79_up'];
		$p80up=$package_info['stage80_up'];


		$p81up=$package_info['stage81_up'];
		$p82up=$package_info['stage82_up'];
		$p83up=$package_info['stage83_up'];
		$p84up=$package_info['stage84_up'];
		$p85up=$package_info['stage85_up'];
		$p86up=$package_info['stage86_up'];
		$p87up=$package_info['stage87_up'];
		$p88up=$package_info['stage88_up'];
		$p89up=$package_info['stage89_up'];
		$p90up=$package_info['stage90_up'];

		$p91up=$package_info['stage91_up'];
		$p92up=$package_info['stage92_up'];
		$p93up=$package_info['stage93_up'];
		$p94up=$package_info['stage94_up'];
		$p95up=$package_info['stage95_up'];
		$p96up=$package_info['stage96_up'];
		$p97up=$package_info['stage97_up'];
		$p98up=$package_info['stage98_up'];
		$p99up=$package_info['stage99_up'];
		$p100up=$package_info['stage100_up'];

		 $indirect_ref_amt=$package_info['indirect_ref_amt'];
		
			for($i=1;$i<=100;$i++){

				$pup="p".$i."up";
				// echo $current_tot;
				// echo $$pup;
				
				if($current_tot>=$$pup && $current_tot!=0 && $curr_stage ==$i){

					$query8=mysqli_query($con,"SELECT  count(*) as upgraded_status FROM affliate_stage_bonus 
					WHERE user_id = '$stage1_ref' AND upgrade_stage='$curr_stage' ");
					$row8=$query8->fetch_array(MYSQLI_ASSOC);
					$upgrade_his=$row8['upgraded_status'];
					
					if($upgrade_his==0){
						$tot=$$pup;	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$stage1_ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$stage1_ref."'");
						$current_tot=$tot_amt9;
					}	
				}
			}	
		
		

	//upgradation process code ends 
		//echo "greater than 3";
		
	}

	//bonus code starts here
		$q1=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$luser_id')");
		$all_list1 = mysqli_fetch_array($q1, MYSQL_ASSOC);
		$ref_bonus_user= $all_list1['stage1_ref'];
		$i=2;
		while($ref_bonus_user !=""){

			$q2=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user')");
			$all_list2 = mysqli_fetch_array($q2, MYSQL_ASSOC);
			$ref_bonus_user2= $all_list2['stage1_ref'];
			if($ref_bonus_user2 !=""){
				$qq2=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user2'");
				$qrow2=$qq2->fetch_array(MYSQLI_ASSOC);
				$tot_amt2=($qrow2['TotalAmt']+$indirect_ref_amt);
				$qupdate2=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt2."'where username='".$ref_bonus_user2."'");	
				
				//stage update
				$st_update2=mysqli_query($con,"update affiliate_bonus_history set stage".$i."_ref='".$ref_bonus_user2."'where user_id='".$luser_id."'");		
				$ref_bonus_user=$all_list2['stage1_ref'];
				$i++;
			}
			else
			{
				$ref_bonus_user="";
			}


		}	
				
		//need to extend till 100
		

		
		
		//bonus code ends here
		

		//upgradation process code starts 
		$query5=mysqli_query($con,"SELECT  * FROM affiliateuser WHERE username = '$ref'");
		$row5=$query5->fetch_array(MYSQLI_ASSOC);
		$curr_stage=$row5['level']; 
		$current_tot=$row5['tamount'];
		$curr_ref=$row5['referedby'];

		$query6=mysqli_query($con,"SELECT  COUNT(*) FROM affliate_stage_bonus WHERE user_id = '$ref' AND upgrade_stage='$curr_stage'");
		$row6 = mysqli_fetch_row($query6);
		$numrows = $row6[0];

		$query7=mysqli_query($con,"SELECT  * FROM affiliateuser WHERE username = '$curr_ref'");
		$row7=$query7->fetch_array(MYSQLI_ASSOC);
		$upgradation_ref=$row7['referedby'];


		$query8=mysqli_query($con,"SELECT  count(*) as upgraded_status FROM affliate_stage_bonus 
		WHERE user_id = '$ref' AND upgrade_stage='$curr_stage' ");
		$row8=$query8->fetch_array(MYSQLI_ASSOC);
		$upgrade_his=$row8['upgraded_status'];

		if($numrows==0){
			
			
			//code to fetch the dynamic upgradation cost
			$curr_pack=$row5['pcktaken'];//current package for stage1 ref
			$sqlquery_package="SELECT * FROM packages where id = $curr_pack"; //fetching amt from package table from database
			$package_details=mysqli_query($con,$sqlquery_package);
			$package_info = $package_details->fetch_array(MYSQLI_ASSOC);
					
			$p1up=$package_info['stage1_up'];
			$p2up=$package_info['stage2_up'];
			$p3up=$package_info['stage3_up'];
			$p4up=$package_info['stage4_up'];
			$p5up=$package_info['stage5_up'];
			$p6up=$package_info['stage6_up'];
			$p7up=$package_info['stage7_up'];
			$p8up=$package_info['stage8_up'];
			$p9up=$package_info['stage9_up'];
			$p10up=$package_info['stage10_up'];

			$p11up=$package_info['stage11_up'];
			$p12up=$package_info['stage12_up'];
			$p13up=$package_info['stage13_up'];
			$p14up=$package_info['stage14_up'];
			$p15up=$package_info['stage15_up'];
			$p16up=$package_info['stage16_up'];
			$p17up=$package_info['stage17_up'];
			$p18up=$package_info['stage18_up'];
			$p19up=$package_info['stage19_up'];
			$p20up=$package_info['stage20_up'];

			$p21up=$package_info['stage21_up'];
			$p22up=$package_info['stage22_up'];
			$p23up=$package_info['stage23_up'];
			$p24up=$package_info['stage24_up'];
			$p25up=$package_info['stage25_up'];
			$p26up=$package_info['stage26_up'];
			$p27up=$package_info['stage27_up'];
			$p28up=$package_info['stage28_up'];
			$p29up=$package_info['stage29_up'];
			$p30up=$package_info['stage30_up'];

			$p31up=$package_info['stage31_up'];
			$p32up=$package_info['stage32_up'];
			$p33up=$package_info['stage33_up'];
			$p34up=$package_info['stage34_up'];
			$p35up=$package_info['stage35_up'];
			$p36up=$package_info['stage36_up'];
			$p37up=$package_info['stage37_up'];
			$p38up=$package_info['stage38_up'];
			$p39up=$package_info['stage39_up'];
			$p40up=$package_info['stage40_up'];

			$p41up=$package_info['stage41_up'];
			$p42up=$package_info['stage42_up'];
			$p43up=$package_info['stage43_up'];
			$p44up=$package_info['stage44_up'];
			$p45up=$package_info['stage45_up'];
			$p46up=$package_info['stage46_up'];
			$p47up=$package_info['stage47_up'];
			$p48up=$package_info['stage48_up'];
			$p49up=$package_info['stage49_up'];
			$p50up=$package_info['stage50_up'];

			$p51up=$package_info['stage51_up'];
			$p52up=$package_info['stage52_up'];
			$p53up=$package_info['stage53_up'];
			$p54up=$package_info['stage54_up'];
			$p55up=$package_info['stage55_up'];
			$p56up=$package_info['stage56_up'];
			$p57up=$package_info['stage57_up'];
			$p58up=$package_info['stage58_up'];
			$p59up=$package_info['stage59_up'];
			$p60up=$package_info['stage60_up'];

			$p61up=$package_info['stage61_up'];
			$p62up=$package_info['stage62_up'];
			$p63up=$package_info['stage63_up'];
			$p64up=$package_info['stage64_up'];
			$p65up=$package_info['stage65_up'];
			$p66up=$package_info['stage66_up'];
			$p67up=$package_info['stage67_up'];
			$p68up=$package_info['stage68_up'];
			$p69up=$package_info['stage69_up'];
			$p70up=$package_info['stage70_up'];

			$p71up=$package_info['stage71_up'];
			$p72up=$package_info['stage72_up'];
			$p73up=$package_info['stage73_up'];
			$p74up=$package_info['stage74_up'];
			$p75up=$package_info['stage75_up'];
			$p76up=$package_info['stage76_up'];
			$p77up=$package_info['stage77_up'];
			$p78up=$package_info['stage78_up'];
			$p79up=$package_info['stage79_up'];
			$p80up=$package_info['stage80_up'];

			$p81up=$package_info['stage81_up'];
			$p82up=$package_info['stage82_up'];
			$p83up=$package_info['stage83_up'];
			$p84up=$package_info['stage84_up'];
			$p85up=$package_info['stage85_up'];
			$p86up=$package_info['stage86_up'];
			$p87up=$package_info['stage87_up'];
			$p88up=$package_info['stage88_up'];
			$p89up=$package_info['stage89_up'];
			$p90up=$package_info['stage90_up'];

			$p91up=$package_info['stage91_up'];
			$p92up=$package_info['stage92_up'];
			$p93up=$package_info['stage93_up'];
			$p94up=$package_info['stage94_up'];
			$p95up=$package_info['stage95_up'];
			$p96up=$package_info['stage96_up'];
			$p97up=$package_info['stage97_up'];
			$p98up=$package_info['stage98_up'];
			$p99up=$package_info['stage99_up'];
			$p100up=$package_info['stage100_up'];
			
			for($i=1;$i<=100;$i++){

				$pup="p".$i."up";

				if($curr_stage==$i){


					$query8=mysqli_query($con,"SELECT  count(*) as upgraded_status FROM affliate_stage_bonus 
					WHERE user_id = '$stage1_ref' AND upgrade_stage='$curr_stage' ");
					$row8=$query8->fetch_array(MYSQLI_ASSOC);
					$upgrade_his=$row8['upgraded_status'];
					
					if($upgrade_his==0){
						

					if($current_tot>=$$pup){
						
						if($upgrade_his==0){
							$tot=$$pup;		
							$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
							
							$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$ref'");
							$row9=$query9->fetch_array(MYSQLI_ASSOC);
							$tot_amt9=($row9['TotalAmt']-$tot);
							$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref."'");
							$current_tot=$tot_amt9;
						}	
					}
				}
			}	
			
			


			
		}

	//upgradation process code ends 
	
}	
//code ended by sridhar 



if ($result)
{
print "<center>Profile Activated<br/>Redirecting in 2 seconds...</center>";
}
else
{
print "<center>Action could not be performed, Something went wrong. Check back again<br/>Redirecting in 2 seconds...</center>";
}

?>