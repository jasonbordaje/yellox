<?php
include '../includes/dbconfig2.php';

$headerid = $_REQUEST['headerid'];

$query = "SELECT * from delivery_tracking where request_header_id = $headerid ORDER by id DESC LIMIT 1";
$query = $conn2->query($query);

if($query){
	$result = mysqli_fetch_assoc($query);
	echo $result['location_lat'].", ".$result['location_long'];
}

?>