<?php
session_start();
include('../../config.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $query = "SELECT attachment FROM tbl_news WHERE news_id = $id";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imagePath = "../" . $row['attachment'];
        $deleteQuery = "DELETE FROM tbl_news WHERE news_id = $id";
        if (mysqli_query($con, $deleteQuery)) {
            if (!empty($row['attachment']) && file_exists($imagePath)) {
                unlink($imagePath);
            }$_SESSION['message'] = "Movie news deleted successfully!";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Error deleting movie news: " . mysqli_error($con);
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "Movie news not found!";
        $_SESSION['msg_type'] = "danger";
    }
} else {
    $_SESSION['message'] = "Invalid request!";
    $_SESSION['msg_type'] = "danger";
}

// Redirect to the delete page
header("Location: delete_movie_news.php");
exit();
?>
