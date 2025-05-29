<?php
session_start();
include('../../config.php');
extract($_POST);
$uploaddir = '../news_images/';
$uploadfile = $uploaddir . basename($_FILES['attachment']['name']);
$checkQuery = "SELECT * FROM tbl_news WHERE name = '$name'";
$result = mysqli_query($con, $checkQuery);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = "This movie news is already added!";
    $_SESSION['msg_type'] = "warning";
} else {
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
        $flname = "news_images/" . basename($_FILES["attachment"]["name"]);
        $query = "INSERT INTO tbl_news VALUES(NULL, '$name', '$cast', '$date', '$description', '$flname')";
        if (mysqli_query($con, $query)) {
            $_SESSION['message'] = "Movie news added successfully!";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Error adding movie news: " . mysqli_error($con);
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "File upload failed!";
        $_SESSION['msg_type'] = "danger";
    }
}

header('location:add_movie_news.php');
exit();
?>
