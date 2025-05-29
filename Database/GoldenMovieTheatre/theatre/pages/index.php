<?php
include('header.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Theatre Assistance</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Running Movies</h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php 
                        $qry8 = mysqli_query($con, "SELECT * FROM tbl_shows WHERE r_status=1 AND theatre_id='" . $_SESSION['theatre'] . "'");
                        
                        if (mysqli_num_rows($qry8) > 0) { ?>
                            <table class="table table-condensed">
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-3">Screen</th>
                                    <th class="col-md-4">Show Time</th>
                                    <th class="col-md-4">Movie</th>
                                </tr>
                                <?php 
                                $no = 1;
                                while ($mn = mysqli_fetch_array($qry8)) {
                                    $qry9 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='" . $mn['movie_id'] . "'");
                                    
                                    // If movie is deleted, skip this row
                                    if (mysqli_num_rows($qry9) == 0) {
                                        continue;
                                    }

                                    $mov = mysqli_fetch_array($qry9);
                                    $qry10 = mysqli_query($con, "SELECT * FROM tbl_show_time WHERE st_id='" . $mn['st_id'] . "'");
                                    $scr = mysqli_fetch_array($qry10);
                                    $qry11 = mysqli_query($con, "SELECT * FROM tbl_screens WHERE screen_id='" . $scr['screen_id'] . "'");
                                    $scn = mysqli_fetch_array($qry11);
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><span class="badge bg-green"><?php echo $scn['screen_name']; ?></span></td>
                                    <td><span class="badge bg-light-blue"><?php echo $scr['start_time']; ?> (<?php echo $scr['name']; ?>)</span></td>
                                    <td><?php echo $mov['movie_name']; ?></td>
                                </tr>
                                <?php
                                    $no++;
                                } ?>
                            </table>
                        <?php 
                        } else {
                            echo "<div class='alert alert-danger text-center'>No movies are currently available.</div>";
                        } ?>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>
<?php
include('footer.php');
?>
