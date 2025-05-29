<?php
include('header.php');
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Movies List</h1>
        <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Movies List</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="box box-primary">
                    <div class="box-body">
                        <?php include('../../msgbox.php'); ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Cast</th>
                                    <th>Description</th>
                                    <th>Release Date</th>
                                    <th>Image</th>
                                    <th>Video URL</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $qry7 = mysqli_query($con, "SELECT * FROM tbl_movie");
                                if (mysqli_num_rows($qry7) > 0) {
                                    while ($c = mysqli_fetch_array($qry7)) {
                                ?>
                                <tr>
                                    <td><?php echo $c['movie_name']; ?></td>
                                    <td><?php echo $c['cast']; ?></td>
                                    <td><?php echo $c['des']; ?></td>
                                    <td><?php echo $c['release_date']; ?></td>
                                    <td><img src="../../<?php echo $c['image']; ?>" width="80"></td>
                                    <td><a href="<?php echo $c['video_url']; ?>" target="_blank">Watch</a></td>
                                    <td>
                                        <button class="btn btn-danger" onclick="del(<?php echo $c['movie_id']; ?>)">Delete</button>
                                        <a href="update_movie.php?mid=<?php echo $c['movie_id']; ?>" class="btn btn-primary">Update</a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>No movies found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>

<?php include('footer.php'); ?>

<script>
function del(movieId) {
    if (confirm("Are you sure you want to delete this movie?")) {
        window.location = "del_movie.php?mid=" + movieId;
    }
}
</script>
