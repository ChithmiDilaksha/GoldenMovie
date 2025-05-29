<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Movie News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
<button type="button" class="btn btn-secondary" onclick="window.location.href='index.php';">Back</button>
    <h2 class="text-center">Upcoming Movie News</h2>

    <?php
    session_start();
    if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']); 
                unset($_SESSION['msg_type']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Movie Name</th>
                <th>Cast</th>
                <th>Release Date</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../../config.php');
            $result = mysqli_query($con, "SELECT * FROM tbl_news");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['news_id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['cast'] . "</td>";
                echo "<td>" . $row['news_date'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td><img src='../" . $row['attachment'] . "' width='100'></td>";
                echo "<td>
                        <a href='process_news_delete.php?id=" . $row['news_id'] . "' class='btn btn-danger btn-sm'
                        onclick='return confirm(\"Are you sure you want to delete this movie news?\")'>Delete</a>
                        <a href='update_movie_news.php?id=" . $row['news_id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
