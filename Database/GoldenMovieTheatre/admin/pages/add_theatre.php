<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Theatre</title>
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

            <h3 class="mb-0">Add Theatre</h3>
        </div>
        <div class="card-body">
            <form action="process_add_theater.php" method="post" id="form1" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label class="form-label">Theatre Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <div class="invalid-feedback">Please enter a theatre name.</div>
                    <?php $frm->validate("name", array("required", "label" => "Theatre Name")); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Theatre Address</label>
                    <input type="text" name="address" class="form-control" required>
                    <div class="invalid-feedback">Please enter a theatre address.</div>
                    <?php $frm->validate("address", array("required", "label" => "Theatre Address")); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Place</label>
                    <input type="text" name="place" class="form-control" required>
                    <div class="invalid-feedback">Please enter a place.</div>
                    <?php $frm->validate("place", array("required", "label" => "Place")); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">State</label>
                    <input type="text" name="state" id="administrative_area_level_1" class="form-control" required>
                    <div class="invalid-feedback">Please enter a state.</div>
                    <?php $frm->validate("state", array("required", "label" => "State")); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="text" name="pin" id="postal_code" class="form-control" required>
                    <div class="invalid-feedback">Please enter a postal code.</div>
                    <?php $frm->validate("pin", array("required", "label" => "Pin Code")); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                    <div class="invalid-feedback">Please enter a username.</div>
                    <?php $frm->validate("username", array("required", "label" => "Username")); ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">Please enter a password.</div>
                    <?php $frm->validate("password", array("required", "label" => "Password")); ?>
                </div>
                <button type="submit" class="btn btn-success w-100">Add Theatre</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Bootstrap validation script
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
