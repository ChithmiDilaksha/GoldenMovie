<?php
session_start();
include('../../config.php');
if (isset($_POST['update'])) {
    $id = intval($_POST['id']); $name = mysqli_real_escape_string($con, $_POST['name']); 
    $cast = mysqli_real_escape_string($con, $_POST['cast']); $news_date = $_POST['news_date'];
    $description = mysqli_real_escape_string($con, $_POST['description']);$old_image = $_POST['old_image'];
    if (!empty($_FILES['attachment']['name'])) {
        $imageName = time() . "_" . $_FILES['attachment']['name']; 
        $targetPath = "../uploads/" . $imageName;
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $targetPath)) {
            if (!empty($old_image) && file_exists("../" . $old_image)) {
                unlink("../" . $old_image);
            }
            $imagePath = "uploads/" . $imageName; 
        } else { $_SESSION['message'] = "Error uploading image!"; $_SESSION['msg_type'] = "danger";
            header("Location: update_movie_news.php?id=$id");
            exit();
        }
    } else {$imagePath = $old_image; }
    $updateQuery = "UPDATE tbl_news SET 
                    name='$name', 
                    cast='$cast', 
                    news_date='$news_date', 
                    description='$description', 
                    attachment='$imagePath' 
                    WHERE news_id=$id";
    if (mysqli_query($con, $updateQuery)) {
        $_SESSION['message'] = "Movie news updated successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error updating movie news: " . mysqli_error($con);
        $_SESSION['msg_type'] = "danger";
    }
}header("Location: delete_movie_news.php");exit();?>
