<?php
include '../includes/dbconfig2.php';

session_start();

$loginid = $_SESSION['loginid'];

$query = "SELECT * from mst_user where id = $loginid";
$query = $conn2->query($query);

$row = mysqli_fetch_assoc($query);

echo json_encode($row);
?>