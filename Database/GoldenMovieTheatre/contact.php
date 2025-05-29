
<html>
<head>
<title>contact</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>
<script src='js/jquery.color-RGBa-patch.js'></script>
<script src='js/example.js'></script>
</head>
<body>
<?php include('header.php');
?>
<div class="content">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4 rounded-3">
                <h3 class="text-center mb-4">Contact Us</h3>
                <form action="process_contact.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" required name="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control" required name="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile No</label>
                        <input type="tel" class="form-control" required name="mobile" placeholder="Enter your mobile number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <textarea class="form-control" required name="subject" rows="4" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="footer">
	<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_4 span_1_of_4">
					<div class="footer-nav">
		                <ul>
		                   <li><a href="login.php">Login</a></li>
		                    <li><a href="registration.php">Register</a></li>
		                     <li><a href="contact.php">Contact.php</a></li>
		                   </ul>
		              </div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="call_info">
						<p class="txt_3">Call us toll free:</p>
						<p class="txt_4">1 800 234 23456</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class=social>
						<a href="#"><img src="images/fb.png" alt=""/></a>
						<a href="#"><img src="images/tw.png" alt=""/></a>
						<a href="#"><img src="images/dribble.png" alt=""/></a>
						<a href="#"><img src="images/pinterest.png" alt=""/></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

</div>
</body>
</html>

