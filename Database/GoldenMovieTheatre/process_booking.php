<?php
include('config.php'); 
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please login to book tickets.');window.location.href='login.php';</script>";
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user']; // User ID from session
    $showId = $_SESSION['show']; // Show ID from session
    $screenId = $_POST['screen'];
    $noSeats = intval($_POST['seats']);
    $amount = intval($_POST['amount']);
    $ticketDate = $_POST['date']; // Selected show date
    $bookingDate = date('Y-m-d'); // Current date

    $queryTheatre = "SELECT theatre_id FROM tbl_shows WHERE s_id = ?";
    if ($stmtTheatre = mysqli_prepare($con, $queryTheatre)) {
        mysqli_stmt_bind_param($stmtTheatre, 'i', $showId);
        mysqli_stmt_execute($stmtTheatre);
        mysqli_stmt_bind_result($stmtTheatre, $theatreId);
        mysqli_stmt_fetch($stmtTheatre);
        mysqli_stmt_close($stmtTheatre);
    } else {
        echo "<script>alert('Error fetching theatre details.');window.location.href='booking.php';</script>";
        exit;
    }

    // Generate a unique ticket ID
    $ticketId = uniqid('TICKET_');

    // Set booking status (1 = confirmed, 0 = canceled)
    $status = 1;

    // Insert booking details into the database
    $query = "INSERT INTO tbl_bookings (ticket_id, t_id, user_id, show_id, screen_id, no_seats, amount, ticket_date, date, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, 'siiiiisssi', $ticketId, $theatreId, $userId, $showId, $screenId, $noSeats, $amount, $ticketDate, $bookingDate, $status);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Booking successful! Ticket ID: $ticketId');window.location.href='profile.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to complete booking. Please try again.');window.location.href='booking.php';</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error processing booking.');window.location.href='booking.php';</script>";
    }

    mysqli_close($con);
} else {
    header('Location: booking.php');
    exit;
}
?>
