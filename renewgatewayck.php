<?php
include_once ("z_db.php");
if (!empty($_POST))
{
//Fetching Details for user, package and payment gateway
$pgateid=mysqli_real_escape_string($con,$_POST['renewgateway']);
$userid=mysqli_real_escape_string($con,$_POST['renewusername']);
$renewpckid=mysqli_real_escape_string($con,$_POST['renewpck']);

$query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount FROM  affiliateuser where username = '$userid'"; 
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
 <?php $query="SELECT * FROM  packages where id = $renewpckid"; 
 
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
	$gatewayid="$row[gateway]";
	$total=$pprice+$ptax;
	$exp_date="$row[validity]";
// "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  
  // Details fetching end


if($pgateid==2)
{

$queryuser="SELECT id FROM  affiliateuser where username = '$userid'"; 
$resultuser = mysqli_query($con,$queryuser);

while($rowuser = mysqli_fetch_array($resultuser))
{
 $uaid="$rowuser[id]";
 }
			$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,cod,renew,renacid) values('$uaid','C.O.D','$total','$pcur',NOW(),1,1,$renewpckid)");
			
			$cur=date("Y-m-d");
                        $expiry=date('Y-m-d', strtotime($cur. '+ '.$exp_date.'days'));
			$result=mysqli_query($con,"UPDATE affiliateuser SET expiry='$expiry',pcktaken='$renewpckid' WHERE username='$userid'");
		


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
		 	

			//bonus code starts here
		$q1=mysqli_query($con,"SELECT  * FROM affiliate_bonus_history WHERE (user_id = '$userid')");
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



			print "
				<script language='javascript'>
					window.location = 'finalthankyoufree.php?username=$userid';
				</script>
			"; 
			
			
			
			
			
			
}
}
else
{
print "
				<script language='javascript'>
					window.location = 'renewaccount.php';
				</script>
			";
}
?>