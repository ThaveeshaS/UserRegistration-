<?php
include 'configure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $uname = $_POST['name'];
    $uaddress = $_POST['address'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $uphone = $_POST['phone'];
    $upassword = $_POST['password'];

    
    $dob = date('Y-m-d', strtotime($dob));

    


    $sql = "INSERT INTO uregister (name, address, dob, email, phone, password) 
            VALUES ('$uname', '$uaddress', '$dob', '$email', '$uphone', '$upassword')";

    if ($conn->query($sql) === true) {
    
        header("location: u_Read.php");
        exit; 
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
