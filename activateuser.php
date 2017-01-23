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
require_once('../../products/wp-load.php');
$user_name = $ref_list11['username'];
    $user_email = $ref_list11['email'];
    $user_id = username_exists( $user_name );
    if ( !$user_id ) {
        $password = $ref_list11['password'];
        $user_id = wp_create_user( $user_name,$password,$user_email );
		wp_set_password( $password, $user_id );
		$user_id_role = new WP_User($user_id);
		$user_id_role->set_role('seller');
		$updated1 = update_user_meta( $user_id, 'dokan_enable_selling', 'yes' );
		$updated2 = update_user_meta( $user_id, 'dokan_publishing', 'no' );
	} 
	else
	{
		$password = $ref_list11['password'];
		wp_set_password( $password, $user_id );
		$user_id_role = new WP_User($user_id);
		$user_id_role->set_role('seller');
	}


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
	 WHERE (b.stage1_ref = '$ref') AND (a.username = b.user_id )");
	$stage1_list=$s1->fetch_array(MYSQLI_ASSOC);
	$stage1_count=$stage1_list['STAGE1TOTUSER'];

	$s2=mysqli_query($con,"SELECT  COUNT(*) as STAGE2TOTUSER FROM affiliateuser as a,affiliate_bonus_history as b
	 WHERE (b.stage2_ref = '$ref') AND (a.username = b.user_id )");
	$stage2_list=$s2->fetch_array(MYSQLI_ASSOC);
	$stage2_count=$stage2_list['STAGE2TOTUSER'];

	$s3=mysqli_query($con,"SELECT  COUNT(*) as STAGE3TOTUSER FROM affiliateuser as a,affiliate_bonus_history as b
	 WHERE (b.stage3_ref = '$ref') AND (a.username = b.user_id )");
	$stage3_list=$s3->fetch_array(MYSQLI_ASSOC);
	$stage3_count=$stage3_list['STAGE3TOTUSER'];

	$s4=mysqli_query($con,"SELECT  COUNT(*) as STAGE4TOTUSER FROM affiliateuser as a,affiliate_bonus_history as b
	 WHERE (b.stage4_ref = '$ref') AND (a.username = b.user_id )");
	$stage4_list=$s4->fetch_array(MYSQLI_ASSOC);
	$stage4_count=$stage4_list['STAGE4TOTUSER'];

	$s5=mysqli_query($con,"SELECT  COUNT(*) as STAGE5TOTUSER FROM affiliateuser as a,affiliate_bonus_history as b
	 WHERE (b.stage5_ref = '$ref') AND (a.username = b.user_id )");
	$stage5_list=$s5->fetch_array(MYSQLI_ASSOC);
	$stage5_count=$stage5_list['STAGE5TOTUSER'];
	
	$s6=mysqli_query($con,"SELECT  COUNT(*) as STAGE5TOTUSER FROM affiliateuser as a,affiliate_bonus_history as b
	 WHERE (b.stage6_ref = '$ref') AND (a.username = b.user_id )");
	$stage6_list=$s6->fetch_array(MYSQLI_ASSOC);
	$stage6_count=$stage6_list['STAGE5TOTUSER'];

	//getting stage count ends
	$ref_count= $stage1_count+$stage2_count+$stage3_count+$stage4_count+$stage5_count+$stage6_count;
	
	
	$ref_under_user=array();
	if($ref_count <=2){
		$ref_stage=1;
		$stage_amt=$row211['level1'];
	}
	elseif($ref_count <=4){
		$ref_stage=2;
		$stage_amt=$row211['level2'];
	}
	elseif($ref_count<=8){
		$ref_stage=3;
		$stage_amt=$row211['level3'];
	}
	elseif($ref_count<=16){
		$ref_stage=4;
		$stage_amt=$row211['level4'];
	}
	elseif($ref_count<=32){
		$ref_stage=5;
		$stage_amt=$row211['level5'];
	}
	else{
		$ref_stage=6;
		$stage_amt='';
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
	//echo "<pre>";
	//print_r($ref_under_user);
	//exit;
	
	

	if($ref_under_count<2)
	{
		$cur=date("Y-m-d");
		$query2=mysqli_query($con,"insert into affiliate_bonus_history values 
		('','$luser_id','$ref','$ref','','','','','$ref_stage','$stage_amt','$cur')");
		
		$query4=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref'");
		$row4=$query4->fetch_array(MYSQLI_ASSOC);
		$tot_amt=($row4['TotalAmt']+$stage_amt); 
		$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt."',level='".$ref_stage."' where username='".$ref."'");
		
		
		
		
		//echo "less then 3";
	}
	elseif($ref_under_count>=2){
						
		
	        
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
		
		
		//echo "<pre>";
		//print_r($s1);
	               		
		$stage1_ref=$s1[0];
		
		// exit;
		
		
		$cur=date("Y-m-d");
		$query2=mysqli_query($con,"insert into affiliate_bonus_history values 
		('','$luser_id','$ref','$stage1_ref','','','','','$ref_stage','$stage_amt','$cur')");
		
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
		$indirect_ref_amt=$package_info['indirect_ref_amt'];
			
			
				if($current_tot>=$p1up){
					
					if($upgrade_his==0){
						$tot=$p1up;	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$stage1_ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$stage1_ref."'");
					}	
				}
		
			
			
				if($current_tot>=$p2up){
					$tot=$p2up;
					if($upgrade_his==0){	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$stage1_ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$stage1_ref."'");
					
					}
				}
			
			
				if($current_tot>=$p3up){
					$tot=$p3up;	
					if($upgrade_his==0){
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$stage1_ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$stage1_ref."'");
					
					}
				}
			
			
				if($current_tot>=$p4up){
					$tot=$p4up;
					if($upgrade_his==0){	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$stage1_ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$stage1_ref."'");
						
					}
				}
			
			
			
				if($current_tot>=$p5up){
					$tot=$p5up;
					if($upgrade_his==0){	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$stage1_ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$stage1_ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$stage1_ref."'");
						
					}
				}
			
			


	//upgradation process code ends 
		//echo "greater than 3";
		
	}

	//bonus code starts here
		$q1=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$luser_id')");
		$all_list1 = mysqli_fetch_array($q1, MYSQL_ASSOC);
		$ref_bonus_user= $all_list1['stage1_ref'];
		
		 
		$q2=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user')");
		$all_list2 = mysqli_fetch_array($q2, MYSQL_ASSOC);
		$ref_bonus_user2= $all_list2['stage1_ref'];
		if($ref_bonus_user2 !=""){
			$qq2=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user2'");
			$qrow2=$qq2->fetch_array(MYSQLI_ASSOC);
			$tot_amt2=($qrow2['TotalAmt']+$indirect_ref_amt);
			$qupdate2=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt2."'where username='".$ref_bonus_user2."'");	
			
			//stage update
			$st_update2=mysqli_query($con,"update affiliate_bonus_history set stage2_ref='".$ref_bonus_user2."'where user_id='".$luser_id."'");		
		}

		$q3=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user2')");
		$all_list3 = mysqli_fetch_array($q3, MYSQL_ASSOC);
		$ref_bonus_user3= $all_list3['stage1_ref'];
		if($ref_bonus_user3 !=""){
			$qq3=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user3'");
			$qrow3=$qq3->fetch_array(MYSQLI_ASSOC);
			$tot_amt3=($qrow3['TotalAmt']+$indirect_ref_amt);
			$qupdate3=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt3."'where username='".$ref_bonus_user3."'");	
		
			//stage update
			$st_update3=mysqli_query($con,"update affiliate_bonus_history set stage3_ref='".$ref_bonus_user3."'where user_id='".$luser_id."'");		
		
		}

		$q4=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user3')");
		$all_list4 = mysqli_fetch_array($q4, MYSQL_ASSOC);
		$ref_bonus_user4= $all_list4['stage1_ref'];
		if($ref_bonus_user4 !=""){
			$qq4=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user4'");
			$qrow4=$qq4->fetch_array(MYSQLI_ASSOC);
			$tot_amt4=($qrow4['TotalAmt']+$indirect_ref_amt);
			$qupdate4=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt4."'where username='".$ref_bonus_user4."'");	
			
			//stage update
			$st_update4=mysqli_query($con,"update affiliate_bonus_history set stage4_ref='".$ref_bonus_user4."'where user_id='".$luser_id."'");		
		
		}

		$q5=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user4')");
		$all_list5 = mysqli_fetch_array($q5, MYSQL_ASSOC);
		$ref_bonus_user5= $all_list5['stage1_ref'];
		if($ref_bonus_user5 !=""){
			$qq5=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user5'");
			$qrow5=$qq5->fetch_array(MYSQLI_ASSOC);
			$tot_amt5=($qrow5['TotalAmt']+$indirect_ref_amt);
			$qupdate5=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt5."'where username='".$ref_bonus_user5."'");	
		
			//stage update
			$st_update5=mysqli_query($con,"update affiliate_bonus_history set stage5_ref='".$ref_bonus_user5."'where user_id='".$luser_id."'");		
		
		
		}
		
		$q6=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user5')");
		$all_list6 = mysqli_fetch_array($q6, MYSQL_ASSOC);
		$ref_bonus_user6= $all_list6['stage1_ref'];
		if($ref_bonus_user6 !=""){
			$qq6=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user6'");
			$qrow6=$qq6->fetch_array(MYSQLI_ASSOC);
			$tot_amt6=($qrow6['TotalAmt']+$indirect_ref_amt);
			$qupdate6=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt6."'where username='".$ref_bonus_user6."'");	
			
			//stage update
			$st_update6=mysqli_query($con,"update affiliate_bonus_history set stage6_ref='".$ref_bonus_user6."'where user_id='".$luser_id."'");	
		}
		
		
		$q7=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user6')");
		$all_list7 = mysqli_fetch_array($q7, MYSQL_ASSOC);
		$ref_bonus_user7= $all_list7['stage1_ref'];
		if($ref_bonus_user7 !=""){
			$qq7=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user7'");
			$qrow7=$qq7->fetch_array(MYSQLI_ASSOC);
			$tot_amt7=($qrow7['TotalAmt']+$indirect_ref_amt);
			$qupdate7=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt7."'where username='".$ref_bonus_user7."'");	
			
			//stage update
			$st_update7=mysqli_query($con,"update affiliate_bonus_history set stage7_ref='".$ref_bonus_user7."'where user_id='".$luser_id."'");	
		}
		
		
		$q8=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user7')");
		$all_list8 = mysqli_fetch_array($q8, MYSQL_ASSOC);
		$ref_bonus_user8= $all_list8['stage1_ref'];
		if($ref_bonus_user8 !=""){
			$qq8=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user8'");
			$qrow8=$qq8->fetch_array(MYSQLI_ASSOC);
			$tot_amt8=($qrow8['TotalAmt']+$indirect_ref_amt);
			$qupdate8=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt8."'where username='".$ref_bonus_user8."'");	
			
			//stage update
			$st_update8=mysqli_query($con,"update affiliate_bonus_history set stage8_ref='".$ref_bonus_user8."'where user_id='".$luser_id."'");	
		}
		
		
		$q9=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user8')");
		$all_list9 = mysqli_fetch_array($q9, MYSQL_ASSOC);
		$ref_bonus_user9= $all_list9['stage1_ref'];
		if($ref_bonus_user9 !=""){
			$qq9=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user9'");
			$qrow9=$qq9->fetch_array(MYSQLI_ASSOC);
			$tot_amt9=($qrow9['TotalAmt']+$indirect_ref_amt);
			$qupdate9=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref_bonus_user9."'");	
			
			//stage update
			$st_update9=mysqli_query($con,"update affiliate_bonus_history set stage9_ref='".$ref_bonus_user9."'where user_id='".$luser_id."'");	
		}
		
		
		$q10=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$ref_bonus_user9')");
		$all_list10 = mysqli_fetch_array($q10, MYSQL_ASSOC);
		$ref_bonus_user10= $all_list10['stage1_ref'];
		if($ref_bonus_user10 !=""){
			$qq10=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$ref_bonus_user10'");
			$qrow10=$qq10->fetch_array(MYSQLI_ASSOC);
			$tot_amt10=($qrow10['TotalAmt']+$indirect_ref_amt);
			$qupdate10=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt10."'where username='".$ref_bonus_user10."'");	
			
			//stage update
			$st_update10=mysqli_query($con,"update affiliate_bonus_history set stage10_ref='".$ref_bonus_user10."'where user_id='".$luser_id."'");	
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
			
			
			if($curr_stage==1){
				if($current_tot>=$p1up){
					
					if($upgrade_his==0){
						$tot=$p1up;	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref."'");
					}	
				}
			}
			
			if($curr_stage==2){
				if($current_tot>=$p2up){
					$tot=$p2up;
					if($upgrade_his==0){	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref."'");
					
					}
				}
			}
			if($curr_stage==3){
				if($current_tot>=$p3up){
					$tot=$p3up;	
					if($upgrade_his==0){
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref."'");
					
					}
				}
			}
			if($curr_stage==4){
				if($current_tot>=$p4up){
					$tot=$p4up;
					if($upgrade_his==0){	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref."'");
						
					}
				}
			}
			
			if($curr_stage==5){
				if($current_tot>=$p5up){
					$tot=$p5up;
					if($upgrade_his==0){	
						$query2=mysqli_query($con,"insert into affliate_stage_bonus values ('','$ref','$curr_ref','$curr_stage','$tot','adminadmin','$cur')");	
						$query9=mysqli_query($con,"SELECT  SUM(tamount) As TotalAmt FROM affiliateuser WHERE username = '$ref'");
						$row9=$query9->fetch_array(MYSQLI_ASSOC);
						$tot_amt9=($row9['TotalAmt']-$tot);
						$query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt9."'where username='".$ref."'");
						
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