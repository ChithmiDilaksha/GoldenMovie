<?php
include('../../config.php');

// Check if id is set and not empty
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("<h3>Error: Show ID is missing.</h3>");
}

$id = mysqli_real_escape_string($con, $_POST['id']);

// Fetch show details
$w = mysqli_query($con, "SELECT * FROM tbl_shows WHERE st_id='$id' AND r_status='1'");

if (!$w) {
    die("Query Error: " . mysqli_error($con));
}

$swt = mysqli_fetch_array($w);

if (!$swt) {
    die("<h3>Start the show for check bookings.</h3>  <h4>Go to view show -> click Start Running button</h4>");
}

$qq = mysqli_query($con, "SELECT * FROM tbl_bookings WHERE show_id='" . $swt['s_id'] . "' AND date=CURDATE()");

if (mysqli_num_rows($qq) > 0) {
    $m = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='" . $swt['movie_id'] . "'");
    $movie = mysqli_fetch_array($m);
    echo "<h3><small>Movie : </small>" . $movie['movie_name'] . "</h3>";
    echo "<table class='table'><th>Slno</th><th>Ticket id</th><th>Viewer Name</th><th>Phone</th><th>Number of Tickets</th>";

    $sl = 1;
    while ($sh = mysqli_fetch_array($qq)) {
        $us = mysqli_query($con, "SELECT * FROM tbl_registration WHERE user_id='" . $sh['user_id'] . "'");
        $user = mysqli_fetch_array($us);
        echo "<tr><td>$sl</td><td>{$sh['ticket_id']}</td><td>{$user['name']}</td><td>{$user['phone']}</td><td>{$sh['no_seats']}</td></tr>";
        $sl++;
    }
    echo "</table>";
} else {
    echo "<h3>No Bookings</h3>";
}
?>
