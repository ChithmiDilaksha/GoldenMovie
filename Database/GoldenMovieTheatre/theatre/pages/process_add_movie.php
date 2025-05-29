<?php
    session_start();
    include('../../config.php');
    extract($_POST);
    
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/".basename($_FILES["image"]["name"]);
    $check_query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_name='$name'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('This Movie is already exists!.'); window.history.back();</script>";
        exit();
    }
    $check_query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE image='$flname'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('This image is already exists!.'); window.history.back();</script>";
        exit();
    }
    $check_query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE video_url='$video'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('This video is already exists!.'); window.history.back();</script>";
        exit();
    }
    mysqli_query($con,"insert into  tbl_movie values(NULL,'".$_SESSION['theatre']."','$name','$cast','$des','$rdate','$flname','$video','0')");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Movie Added";
    header('location:add_movie.php');
?>