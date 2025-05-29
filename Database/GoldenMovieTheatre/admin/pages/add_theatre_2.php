<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Theater Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="add_theater.php">Add Theater</a></li>
        <li class="active">Add Theater Details</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">General Details</h3>
            </div>
        <div class="box-body">
          <?php
            $th=mysqli_query($con,"select * from tbl_theatre where id='".$_GET['id']."'");
            $theatre=mysqli_fetch_array($th);
          ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="col-md-6">Theater Name</td>
                    <td  class="col-md-6"><?php echo $theatre['name'];?></td>
                </tr>
                <tr>
                    <td>Theater Address</td>
                    <td><?php echo $theatre['address'];?></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><?php echo $theatre['place'];?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo $theatre['state'];?></td>
                </tr>
                <tr>
                    <td>Pin</td>
                    <td><?php echo $theatre['pin'];?></td>
                </tr>
            </table>
        </div> 
      </div>
    </section>
  </div>