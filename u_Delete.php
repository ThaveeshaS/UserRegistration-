<?php
include 'configure.php';

if (isset($_GET['deleteemail'])) {
    $email = $_GET['deleteemail'];

    $sql = "DELETE FROM `uregister` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location: u_Read.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>
