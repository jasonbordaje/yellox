<?php
include 'includes/dbconfig2.php';

session_start();

$loginid = $_SESSION['loginid'];
$headerid = $_REQUEST['headerid'];

$query2 = "SELECT * from request_details where request_header_id = $headerid";
$query2 = $conn2->query($query2);
$numrows = mysqli_num_rows($query2);

if($numrows > 0){
	$row2 = mysqli_fetch_assoc($query2);

	$packageid = $row2['package_type'];
	$package = "SELECT * from package_type where id = $packageid";
	$package = $conn2->query($package);
	$row3 = mysqli_fetch_assoc($package);

		$row2['package_type'] = $row3['package_name'];
		echo json_encode($row2);	
}
?>