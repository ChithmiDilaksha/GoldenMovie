<?php
    session_start();
    include('config.php');
    extract($_POST);
    $check_query = mysqli_query($con, "SELECT * FROM tbl_registration WHERE name='$name'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Name already exists! Please give another one.'); window.history.back();</script>";
        exit();
    }
    $check_query = mysqli_query($con, "SELECT * FROM tbl_login WHERE username='$email'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Email already exists! Please give another one.'); window.history.back();</script>";
        exit();
    }
    $check_query = mysqli_query($con, "SELECT * FROM tbl_registration WHERE phone='$phone'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Phone Number already exists! Please give another one.'); window.history.back();</script>";
        exit();
    }
    mysqli_query($con,"insert into  tbl_registration values(NULL,'$name','$email','$phone','$age')");
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into  tbl_login values(NULL,'$id','$email','$password','2')");
    $_SESSION['user']=$id;
    header('location:index.php');
?>
