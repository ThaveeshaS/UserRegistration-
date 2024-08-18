<!DOCTYPE html>
<html>
<head></head>

<body>

<table border="1" width="100%" style="align-items: center;">
				<tr>
					<th>Name</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
					<th>Phone Number</th>
                    <th>Password</th>
                    <th>Update</th>
					<th>Delete</th>
				</tr>

                <?php
					
                    include 'configure.php';

                    $conn = mysqli_connect("localhost", "root", "", "mysql");
                    $mysql = "SELECT *from uregister";
                    $result = $conn->query($mysql);
					if($result){   
					while($row=mysqli_fetch_assoc($result)){
                        
                        $uname = $row['name'];
                        $uadress  = $row['address'];
                        $dob     = $row['dob'];
                        $email      = $row['email'];
                        $uphone  = $row['phone'];
                        $upassword = $row['password'];
					
					?>
					<tr>

					<td> <?php echo $row['name']; ?> </td>
					<td> <?php echo $row['address']; ?> </td>
					<td> <?php echo $row['dob']; ?> </td>
					<td> <?php echo $row['email']; ?> </td>
                    <td> <?php echo $row['phone']; ?> </td>
                    <td> <?php echo $row['password']; ?> </td>
					<td> <?php
					
					
					echo '<a href="u_Update.php? updateemail='.$email.'">
								<button  
									style="color:white;
									background-color:darkgreen; 
									width:70px; 
									height:30px; 
									border-radius:8px; 
									cursor: pointer;
									border: none;
									font-size: 100%; 
									margin-left:10px;  ">Edit
								</button></a>'
							?> </td>

							<td> <?php

							echo '<a href="u_Delete.php? deleteemail='.$email.'">
								<button  
									style="color:white; 
									background-color:green; 
									width:70px; 
									height:30px; 
									border-radius:8px; 
									cursor: pointer;
									border: none;
									font-size: 100%; 
									margin-left:10px;  ">Remove
								</button></a>'?> </td>
					</tr>
					
					<?php
                    }
                }
                ?>
            </table>
</body>
</html>