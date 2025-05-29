<?php
session_start();
include('../../config.php');

if (!isset($_GET['id'])) {
    $_SESSION['message'] = "Invalid request!";
    $_SESSION['msg_type'] = "danger";
    header("Location: delete_movie_news.php");
    exit();
}

$id = intval($_GET['id']);
$result = mysqli_query($con, "SELECT * FROM tbl_news WHERE news_id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    $_SESSION['message'] = "Movie news not found!";
    $_SESSION['msg_type'] = "danger";
    header("Location: delete_movie_news.php");
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<button type="button" class="btn btn-secondary" onclick="window.location.href='delete_movie_news.php';">Back</button>
    <h2 class="text-center">Update Movie News</h2>

    <form action="process_news_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['news_id']; ?>">
        <input type="hidden" name="old_image" value="<?php echo $row['attachment']; ?>">

        <div class="mb-3">
            <label class="form-label">Movie Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cast:</label>
            <input type="text" name="cast" class="form-control" value="<?php echo htmlspecialchars($row['cast']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Release Date:</label>
            <input type="date" name="news_date" class="form-control" value="<?php echo $row['news_date']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" required><?php echo htmlspecialchars($row['description']); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image:</label>
            <input type="file" name="attachment" class="form-control">
            <?php if (!empty($row['attachment'])): ?>
                <p>Current Image:</p>
                <img src="../<?php echo htmlspecialchars($row['attachment']); ?>" width="100">
            <?php endif; ?>
        </div>

        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="delete_movie_news.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
