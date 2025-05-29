<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Theatre Assistant | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/green.css">

  <style>
    /* Green Theme Customizations */
    body {
      background-color: #2e7d32; /* Dark Green */
      color: white;
    }
    .login-box {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    .login-logo a {
      color: #2e7d32; /* Green Header */
      font-weight: bold;
    }
    .login-box-body {
      background: #e8f5e9; /* Light Green */
      padding: 20px;
      border-radius: 10px;
    }
    .btn-green {
      background-color: #388e3c; /* Dark Green Button */
      color: white;
      border-radius: 5px;
      width: 100%;
    }
    .btn-green:hover {
      background-color: #2e7d32;
    }
    .form-control {
      border: 1px solid #388e3c;
    }
    .form-control:focus {
      border-color: #1b5e20;
      box-shadow: 0 0 5px #66bb6a;
    }
    a {
      color: #2e7d32;
      font-weight: bold;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a>Theatre Assistant <b>&nbsp; Admin Panel</b></a>
  </div>

  <div class="login-box-body">
    <?php session_start(); include('../msgbox.php'); ?>
    <p class="login-box-msg">Please login to start your session</p>

    <form action="pages/process_login.php" method="post">
      <div class="form-group has-feedback">
        <input name="Email" type="text" placeholder="Username" class="form-control"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="Password" type="password" placeholder="Password" class="form-control" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-green">Login</button>
      </div>
    </form>

    <a href="../theatre/index.php">Go To Theatre Panel</a>
  </div>
</div>

<!-- Scripts -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%'
    });
  });
</script>
</body>
</html>
