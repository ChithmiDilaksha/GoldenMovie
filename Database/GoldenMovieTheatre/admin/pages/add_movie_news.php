<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Upcoming Movie News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
    include('../../form.php');
    $frm = new formBuilder;      
?>    

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php';">Back</button>

            <h3 class="mb-0">Add Upcoming Movie News</h3>
        </div>
        <div class="card-body">
            <form action="process_add_news.php" method="post" enctype="multipart/form-data" id="form1" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label class="form-label">Movie Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <div class="invalid-feedback">Please enter a movie name.</div>
                    <?php $frm->validate("name", array("required", "label" => "Movie Name")); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cast</label>
                    <input type="text" name="cast" class="form-control" required>
                    <div class="invalid-feedback">Please enter the cast details.</div>
                    <?php $frm->validate("cast", array("required", "label" => "Cast", "regexp" => "text")); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Release Date</label>
                    <input type="date" name="date" class="form-control" required>
                    <div class="invalid-feedback">Please select a release date.</div>
                    <?php $frm->validate("date", array("required", "label" => "Release Date")); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                    <div class="invalid-feedback">Please enter a description.</div>
                    <?php $frm->validate("description", array("required", "label" => "Description")); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="attachment" class="form-control" required>
                    <div class="invalid-feedback">Please upload an image.</div>
                    <?php $frm->validate("attachment", array("required", "label" => "Image")); ?>
                </div>

                <button type="submit" class="btn btn-success w-100">Add News</button>
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

            </form>
        </div>
    </div>
</div>

<script>
    // Bootstrap form validation
    (function () {
        'use strict';
        var form = document.getElementById('form1');
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    })();
</script>


</body>
</html>
