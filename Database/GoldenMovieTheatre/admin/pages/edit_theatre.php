<?php
    include('../../config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch theatre data
        $result = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id = '$id'");
        $theatre = mysqli_fetch_assoc($result);
    }

    // Update the theatre data if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $place = $_POST['place'];
        $state = $_POST['state'];
        $pin = $_POST['pin'];

        // Update the theatre in the database
        $update_query = mysqli_query($con, "UPDATE tbl_theatre SET name = '$name', address = '$address', place = '$place', state = '$state', pin = '$pin' WHERE id = '$id'");

        if ($update_query) {
            echo "<script>alert('Theatre updated successfully.'); window.location.href='manage_theatres.php';</script>";
        } else {
            echo "<script>alert('Error updating theatre.');</script>";
        }
    }
?>

<!-- Add Bootstrap CDN links in the <head> section if it's not already included -->
<head>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Add Bootstrap JS (optional for added interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Edit Theatre</h3>
        </div>
        <div class="card-body">
            <form action="edit_theatre.php?id=<?php echo $id; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Theatre Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $theatre['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Theatre Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $theatre['address']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Place</label>
                    <input type="text" name="place" class="form-control" value="<?php echo $theatre['place']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control" value="<?php echo $theatre['state']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="text" name="pin" class="form-control" value="<?php echo $theatre['pin']; ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update Theatre</button>
            </form>
            <button class="btn btn-secondary mt-3" onclick="window.location.href='manage_theatres.php';">Back</button>
        </div>
    </div>
</div>

<!-- Optional: Add Custom CSS to Enhance UI -->
<style>
    .card {
        border-radius: 15px;
    }
    .card-header {
        border-radius: 15px 15px 0 0;
    }
    .btn {
        padding: 10px 20px;
        font-size: 14px;
    }
    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
    }
</style>
