<?php
include_once ("z_db.php");
if($_POST['username'])
{
	 $status = "OK"; //initial status
	 $msg="";
	$username=$_POST['username']; //fetching details through post method
	$password = $_POST['password'];
	 //$pay_amt= $_POST['pay_amt']; /* This line commented by karthikeyan */
	 $userid=$_POST['userid'];

	
	// Retrieve username and password from database according to user's input, preventing sql injection
	/* End condition for checking amount was removed by karthikeyan in below query */
	$query ="SELECT COUNT(*) AS ucount FROM affiliateuser WHERE (username = '" .$_POST['username']. "') AND (password = '" .$_POST['password']. "') AND (active = 1)";
	if ($stmt = mysqli_query($con, $query)) {
		
		/* execute query */
	  
	    $num=$stmt->fetch_array(MYSQLI_ASSOC);
	
	    /* close statement */
	   
	}
	//mysqli_close($con);
	// Check username and password match
if (($num['ucount']) == 1) {
		
		$queryuser="SELECT id,pcktaken FROM  affiliateuser where username = '$userid'"; 
		$resultuser = mysqli_query($con,$queryuser);
		
		while($rowuser = mysqli_fetch_array($resultuser))
		{
			 $uaid="$rowuser[id]";
		 	 $pcktake="$rowuser[pcktaken]";
		}
		$query="SELECT * FROM  packages where id = $pcktake"; 
		 
		$result = mysqli_query($con,$query);
		
		while($row = mysqli_fetch_array($result))
		{
			$pckid="$row[id]";
			$pname="$row[name]";
			$pprice="$row[price]";
			$pcur="$row[currency]";
			$ptax="$row[tax]";
			$gatewayid="$row[gateway]";
			$pay_via_voucher="$row[pay_via_voucher]";// This line was added by karthikeyan
			$total=$pprice+$ptax;
		}
		
		$query4=mysqli_query($con,"SELECT  tamount As TotalAmt FROM affiliateuser WHERE username = '$username'");
		$row4=$query4->fetch_array(MYSQLI_ASSOC);
		$tot_amt=($row4['TotalAmt']-$pay_via_voucher); 
		/* Code by karthikeyan starts */
		if ($tot_amt>50)
		{/* Code by karthikeyan ends */
			$up_query=mysqli_query($con,"update affiliateuser set tamount='".$tot_amt."' where username='".$username."'");
			/* Code by karthikeyan starts */
			$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,cod,pckid,gateway) values('$uaid','R.B','$total','$pcur',NOW(),1,'$pckid','R.B')");
			/* Code by karthikeyan ends */
			$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
			$rec2=mysqli_query($con,$sqlquery);
			$row2 = mysqli_fetch_row($rec2);
			$wlink=$row2[0]; //assigning website address
			
			$sqlquery222="SELECT email FROM settings where sno=0"; //fetching website from databse
			$rec3=mysqli_query($con,$sqlquery222);
			$row222 = mysqli_fetch_row($rec3);
			$email=$row222[0]; //assigning website address
			
			$sqlquery111="SELECT etext FROM emailtext where code='NEWMEMBER'"; //fetching website from databse
			$rec2111=mysqli_query($con,$sqlquery111);
			$row2111 = mysqli_fetch_row($rec2111);
			$emailtext=$row2111[0]; //assigning email text for email
					// More headers
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
			$to=$email;
			$subject="New COD Order SignUp | Bingo ";
			$message=$emailtext;
			mail($to,$subject,$message,$headers);
						
			$status="success";
			echo $status;
		/* Code by karthikeyan starts */
		}
		else
		{
			echo "fail";
		}
		/* Code by karthikeyan ends */
	}
	else
	{
		$status="fail";
		echo $status;
	
	}
	
	
}else{echo $status= "failed";}exit;

?>