<?php
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $name = $_POST['movie_name'];
    $cast = $_POST['cast'];
    $des = $_POST['des'];
    $rdate = $_POST['release_date'];
    $video = $_POST['video_url'];

    // Check if new image is uploaded
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "../../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $flname = "images/" . basename($_FILES["image"]["name"]);

        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $query = "UPDATE tbl_movie SET movie_name='$name', cast='$cast', des='$des', release_date='$rdate', image='$flname', video_url='$video' WHERE movie_id='$movie_id'";
    } else {
        $query = "UPDATE tbl_movie SET movie_name='$name', cast='$cast', des='$des', release_date='$rdate', video_url='$video' WHERE movie_id='$movie_id'";
    }

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Movie updated successfully!'); window.location='view_movie.php';</script>";
    } else {
        echo "<script>alert('Update failed! Try again.'); window.history.back();</script>";
    }
}
?>
