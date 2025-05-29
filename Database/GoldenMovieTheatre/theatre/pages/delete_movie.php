<?php
include('../../dbconnect.php'); // Include your database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($con, "SELECT image FROM tbl_movie WHERE movie_id = $id");
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        $image_path = '../../' . $row['image'];
        if (file_exists($image_path) && !empty($row['image'])) {
            unlink($image_path);
        }
        $delete_query = mysqli_query($con, "DELETE FROM tbl_movie WHERE movie_id = $id");

        if ($delete_query) {
            echo "<script>alert('Movie deleted successfully!'); window.location='view_movies.php';</script>";
        } else {
            echo "<script>alert('Error deleting movie!'); window.location='view_movies.php';</script>";
        }
    } else {
        echo "<script>alert('Movie not found!'); window.location='view_movies.php';</script>";
    }
} else {
    echo "<script>window.location='view_movies.php';</script>";
}
?>
