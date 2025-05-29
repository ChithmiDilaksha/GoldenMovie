
<?php
session_start();
if(!isset($_SESSION['theatre']))
{
  header('location:../index.php');
}
date_default_timezone_set('Asia/Kolkata');
include('../../config.php');
$th=mysqli_query($con,"select * from tbl_theatre where id='".$_SESSION['theatre']."'");
$theatre=mysqli_fetch_array($th);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Theatre Assistance</title>
  <script type="text/javascript" src="../validation/vendor/jquery/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/> 
  <script type="text/javascript" src="../validation/dist/js/bootstrapValidator.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-lg"><b>Theatre</b> Assistant</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $theatre['name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
                  Theatre Assistance
                </p>
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
                  <ul class="sidebar-menu">
        <li class="treeview">
          <a href="index.php">
            <span>Home</span>
                     </a>
        </li>
        <li class="treeview">
          <a href="add_theatre_2.php">
        <span>Theatre Details</span>
            
          </a>
        </li>
        
          <li class="treeview">
          <a href="add_movie.php">
             <span>Add Movie</span>
           
          </a>
        </li>

        <li class="treeview">
          <a href="view_movie.php">
          <span>View Movies</span>
            
          </a>
        </li>

        <li class="treeview">
          <a href="add_show.php">
           <span>Add Show</span>
            
          </a>
        </li>
        <li class="treeview">
          <a href="view_shows.php">
            <span>View Show</span>
         
          </a>
        </li>
        <li class="treeview">
          <a href="todays_shows.php">
           <span>Todays Shows</span>
           
          </a>
        </li>
        <li class="treeview">
          <a href="tickets.php">
         <span>Todays Bookings</span>
          
          </a>
        </li>
        
      </ul>
    </section>
  </aside>