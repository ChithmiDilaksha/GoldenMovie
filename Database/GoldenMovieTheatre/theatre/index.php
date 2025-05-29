<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <style>
    body {
      background-color: #0a192f; /* Dark navy background */
    }
    .login-box {
      border: 2px solid #112d4e; /* Navy blue border */
      border-radius: 10px;
    }
    .login-logo a {
      color:rgb(26, 36, 93) !important; /* Light blue title */
    }
    .btn-primary {
      background-color: #112d4e !important; /* Navy button */
      border-color: #112d4e !important;
    }
    .btn-primary:hover {
      background-color: #0b253f !important;
      border-color: #0b253f !important;
    }
    .login-box-body {
      background-color: #1b3a57; /* Navy blue box */
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(17, 45, 78, 0.5);
      color: white;
    }
    .login-box-msg {
      color: white;
    }
    input::placeholder {
      color: #b0c7e4; /* Light blue placeholder */
    }
  </style>

</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="#">Theatre Assistant <b>Theatre Panel</b></a>
  </div>
  
  <div class="login-box-body">
    <?php session_start(); include('../msgbox.php'); ?>
    <p class="login-box-msg">Please login to start your session</p>
    
    <form action="pages/process_login.php" method="post">
      <div class="form-group has-feedback">
        <input name="Email" type="text" size="25" placeholder="Username" class="form-control"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="Password" type="password" size="25" placeholder="Password" class="form-control"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
    </form>

    <a href="../admin/index.php" style="color: #00bcd4;">Go To Admin Panel</a>

  </div>
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>
