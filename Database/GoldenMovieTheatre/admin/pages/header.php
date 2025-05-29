
<?php
session_start();
if(!isset($_SESSION['admin']))
{
  header('location:../index.php');
}
include('../../config.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <script type="text/javascript" src="../validation/vendor/jquery/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/> 
  <script type="text/javascript" src="../validation/dist/js/bootstrapValidator.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-green ">
<div class="wrapper">
  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-lg"><b>Golden</b></span>
    </a>    
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
          <a href="add_theatre.php">
             <span>Add Theatre</span>
          </a>
        </li>
        </li>
          <li class="treeview">
          <a href="manage_theatres.php">
            <span>Manage Theatre</span>
          </a>
        </li>
        <li class="treeview">
          <a href="add_movie_news.php">
             <span>Add Upcoming Movie News</span>
          </a>
        </li> 
        <li class="treeview">
          <a href="delete_movie_news.php">
           <span>Manage Upcoming Movie News</span>
          </a>
        </li> 
        <li class="treeview">
    <a href="#" onclick="confirmLogout()">
        <span>Logout</span>
    </a>
</li>
<script>
function confirmLogout() {
    if (confirm("Are you sure you want to logout?")) {
        window.location.href = "logout.php"; // Redirect only if confirmed
    }
}
</script>
      </ul>
    </section>
  </aside>
