<?php
    include('../../config.php');

    // Fetch all theatres from the database
    $result = mysqli_query($con, "SELECT * FROM tbl_theatre");
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
            <h3 class="mb-0">Manage Theatres</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Theatre Name</th>
                        <th>Address</th>
                        <th>Place</th>
                        <th>State</th>
                        <th>Postal Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['place'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['pin'] . "</td>";
                        echo "<td>
                                <a href='edit_theatre.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm mr-2'>Edit</a>
                                <a href='delete_theatre.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this theatre?\")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <a href="add_theatre.php" class="btn btn-success">Add New Theatre</a>
                <button class="btn btn-secondary" onclick="window.location.href='index.php';">Back</button>
            </div>
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
    table th, table td {
        text-align: center;
        vertical-align: middle;
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
