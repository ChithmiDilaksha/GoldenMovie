<?php
include('../../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // First, delete the associated login details
        $delete_login = mysqli_query($con, "DELETE FROM tbl_login WHERE user_id = '$id'");

        // Then, attempt to delete the theatre
        $delete_theatre = mysqli_query($con, "DELETE FROM tbl_theatre WHERE id = '$id'");

        if ($delete_theatre) {
            echo "<script>alert('Theatre and associated login details deleted successfully.'); window.location.href='manage_theatres.php';</script>";
        } else {
            throw new Exception("Cannot delete theatre.");
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            echo "<script>alert('Cannot delete this theatre because it has associated screens. Delete the screens first.'); window.location.href='manage_theatres.php';</script>";
        } else {
            echo "<script>alert('Error deleting theatre. Please try again.'); window.location.href='manage_theatres.php';</script>";
        }
    }
}
?>
