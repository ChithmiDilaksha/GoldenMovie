<?php
include('header.php');
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Theater Details
    </h1>
    <ol class="breadcrumb">
      <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Theater Details</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <div class="box box-primary">
          <div class="box-body">
            <?php include('../../msgbox.php'); ?>

            <ul class="todo-list">
              <?php 
              // Query to fetch only theater details
              $qry7 = mysqli_query($con, "SELECT * FROM tbl_theatre");
              if (mysqli_num_rows($qry7)) {
                while ($theater = mysqli_fetch_array($qry7)) {
              ?>
                <li>
                  <span class="handle">
                    <i class="fa fa-theater-masks"></i>
                  </span>
        
                  <span class="text"><?php echo $theater['name']; ?></span>

                  <div class="theater-details">
                    <p><strong>Address:</strong> <?php echo $theater['address']; ?></p>
                    <p><strong>Place:</strong> <?php echo $theater['place']; ?></p>
                    <p><strong>State:</strong> <?php echo $theater['state']; ?></p>
                    <p><strong>PIN:</strong> <?php echo $theater['pin']; ?></p>
                  </div>

                </li>
              <?php
                }
              } else {
                echo "<p>No theater details found.</p>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div> 
    </div>
  </section>
</div>

