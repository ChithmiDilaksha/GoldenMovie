<?php
include('header.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get movie ID securely

    // Fetch movie details
    $query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id = $id");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "<script>alert('Movie not found!'); window.location='view_movie.php';</script>";
        exit;
    }
}

// Handle form submission
if (isset($_POST['update'])) {
    $movie_name = mysqli_real_escape_string($con, $_POST['movie_name']);
    $cast = mysqli_real_escape_string($con, $_POST['cast']);
    $des = mysqli_real_escape_string($con, $_POST['des']);
    $release_date = mysqli_real_escape_string($con, $_POST['release_date']);
    $video_url = mysqli_real_escape_string($con, $_POST['video_url']);

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = 'images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . $image);
    } else {
        $image = $row['image']; // Keep the old image if not changed
    }

    // Update movie details
    $update_query = "UPDATE tbl_movie SET 
                    movie_name = '$movie_name', 
                    cast = '$cast', 
                    des = '$des', 
                    release_date = '$release_date', 
                    image = '$image', 
                    video_url = '$video_url' 
                    WHERE movie_id = $id";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Movie updated successfully!'); window.location='view_movie.php';</script>";
    } else {
        echo "<script>alert('Error updating movie!');</script>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Movie</h1>
    </section>

    <section class="content">
        <div class="box-body">
            <form method="POST" enctype="multipart/form-data">
                <label>Movie Name</label>
                <input type="text" name="movie_name" value="<?= htmlspecialchars($row['movie_name']) ?>" required class="form-control">

                <label>Cast</label>
                <input type="text" name="cast" value="<?= htmlspecialchars($row['cast']) ?>" required class="form-control">

                <label>Description</label>
                <textarea name="des" required class="form-control"><?= htmlspecialchars($row['des']) ?></textarea>

                <label>Release Date</label>
                <input type="date" name="release_date" value="<?= htmlspecialchars($row['release_date']) ?>" required class="form-control">

                <label>Current Image</label><br>
                <img src="../../<?= $row['image'] ?>" width="100"><br>
                <input type="file" name="image" class="form-control">

                <label>Trailer YouTube Link</label>
                <input type="text" name="video_url" value="<?= htmlspecialchars($row['video_url']) ?>" class="form-control">

                <br>
                <button type="submit" name="update" class="btn btn-success">Update Movie</button>
                <a href="view_movie.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </section>
</div>

<?php include('footer.php'); ?>
