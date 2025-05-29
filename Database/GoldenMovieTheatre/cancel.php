<?php
session_start();
include('config.php');
mysqli_query($con,"delete from tbl_bookings where booking_id='".$_GET['id']."'");
$_SESSION['success']="Booking Cancelled Successfully";
header('location:profile.php');
?>