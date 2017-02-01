<?php
include('z_db.php'); //connection details
$status="OK"; //initial status
$msg="";

$downline_count=mysqli_real_escape_string($con, $_POST['downline_count']);
$earning_amt=mysqli_real_escape_string($con, $_POST['earning_amt']);
$time_stamp=date('Y-m-d H:i:s');

if ($downline_count == '' || $earning_amt == '')
{
	$status="NOTOK";
	$msg="Both downline count and earning amount field required.<BR>";
}

if ($status=="OK")
{
	header( "refresh:3;url=earningsettings.php" );
	
	$result=mysqli_query($con, "INSERT INTO `earning_settings` (downline_count,earning_amt,created_at,updated_at,active) VALUES ('$downline_count', '$earning_amt', '$time_stamp', '$time_stamp', '1')");
	if($result)
	{
		print "Earning Level Created...!!! Redirecting...";
	}
	else
	{
		print "Error!!!! try again later or ask for help from your administrator!!!! Redirecting...";
	}
}
else
{
	echo "
	<font face='Verdana' size='2' color=red>$msg</font><br>
	<input type='button' value='Retry' onClick='history.go(-1)'>";	 
}
