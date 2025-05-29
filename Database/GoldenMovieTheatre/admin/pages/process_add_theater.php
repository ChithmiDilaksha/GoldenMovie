<?php
    include('../../config.php');
    extract($_POST);
    $check_query = mysqli_query($con, "SELECT * FROM tbl_login WHERE username='$username'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Username already exists! Please choose another one.'); window.history.back();</script>";
        exit();
    }
    mysqli_query($con, "INSERT INTO tbl_theatre VALUES(NULL, '$name', '$address', '$place', '$state', '$pin')");
    $id = mysqli_insert_id($con);
    mysqli_query($con, "INSERT INTO tbl_login VALUES(NULL, '$id', '$username', '$password', '1')");
    header('location:add_theatre_2.php?id='.$id);
?>
