<?php
include('../config.php'); // Adjust path if needed

// Check if `id` is provided in the URL
if (isset($_GET['id'])) {
    $screen_id = intval($_GET['id']); // Prevent SQL injection

    // Fetch existing screen details
    $query = mysqli_query($con, "SELECT * FROM tbl_screens WHERE screen_id='$screen_id'");

    if ($query && mysqli_num_rows($query) > 0) {
        $screen = mysqli_fetch_array($query);
    } else {
        echo "<script>alert('Screen not found.'); window.location='your_previous_page.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request.'); window.location='your_previous_page.php';</script>";
    exit();
}

// Handle form submission
if (isset($_POST['update'])) {
    $screen_name = mysqli_real_escape_string($con, $_POST['screen_name']);
    $seats = intval($_POST['seats']);
    $charge = floatval($_POST['charge']);

    // Update query
    $updateQuery = "UPDATE tbl_screens SET screen_name='$screen_name', seats='$seats', charge='$charge' WHERE screen_id='$screen_id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Screen updated successfully!'); window.location='your_previous_page.php';</script>";
    } else {
        echo "<script>alert('Error updating screen.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Screen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Screen Details</h2>
        <form method="POST">
            <div class="form-group">
                <label>Screen Name</label>
                <input type="text" name="screen_name" class="form-control" value="<?= isset($screen['screen_name']) ? htmlspecialchars($screen['screen_name']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Seats</label>
                <input type="number" name="seats" class="form-control" value="<?= isset($screen['seats']) ? htmlspecialchars($screen['seats']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Charge</label>
                <input type="text" name="charge" class="form-control" value="<?= isset($screen['charge']) ? htmlspecialchars($screen['charge']) : ''; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="add_theatre_2.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
