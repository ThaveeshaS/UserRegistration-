<?php
include 'configure.php';

// Check if the email is provided in the query string
if (isset($_GET['updateemail'])) {
    $email = $_GET['updateemail'];
    
    // Select the user's data by email
    $sql = "SELECT * FROM `uregister` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $uname = $row['name'];
        $uaddress = $row['address'];
        $udob = $row['dob'];
        $email = $row['email'];
        $uphone = $row['phone'];
        $upassword = $row['password'];
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Email not provided in the query string.";
    exit;
}

if (isset($_POST['submit'])) {
    
    $uname = $_POST['name'];
    $uaddress = $_POST['address'];
    $udob = $_POST['dob'];
    $uphone = $_POST['phone'];
    $upassword = $_POST['password'];


    $sql = "UPDATE `uregister` 
            SET name='$uname', address='$uaddress', dob='$udob', phone='$uphone', password='$upassword'  
            WHERE email='$email'";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('location: u_Read.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update Form</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="background-image"></div>
    <div class="container">
        <h1>User Update</h1>
        <form method="POST" action="" id="updateForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $uname; ?>" required>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $uaddress; ?>" required>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $udob; ?>" required>
            <label for="email">Email:</label>
            
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required disabled>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $uphone; ?>" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $upassword; ?>" required>
            <div class="button-container">
                <button type="submit" name="submit" id="updateBtn">Save Changes</button>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>