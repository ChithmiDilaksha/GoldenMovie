<?php
include('header.php');

if(isset($_GET['mid'])) {
    $movie_id = $_GET['mid'];
    $query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='$movie_id'");
    $movie = mysqli_fetch_array($query);
} else {
    echo "<script>alert('Invalid Movie ID'); window.location='view_movie.php';</script>";
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Update Movie</h1>
        <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Movie</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="update_movie_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="movie_id" value="<?php echo $movie['movie_id']; ?>">
                    <div class="form-group">
                        <label>Movie Name</label>
                        <input type="text" name="movie_name" class="form-control" value="<?php echo $movie['movie_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Cast</label>
                        <input type="text" name="cast" class="form-control" value="<?php echo $movie['cast']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="des" class="form-control" required><?php echo $movie['des']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input type="date" name="release_date" class="form-control" value="<?php echo $movie['release_date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Movie Image</label><br>
                        <img src="../../<?php echo $movie['image']; ?>" width="80"><br>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>Video URL</label>
                        <input type="text" name="video_url" class="form-control" value="<?php echo $movie['video_url']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update Movie</button>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php'); ?>
