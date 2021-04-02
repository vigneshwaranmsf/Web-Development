<?php
if (isset($_POST['username']) || isset($_POST['password']))
{  
    $username = $_POST['username'];
    $password = $_POST['password'];
    }
     // Database connection here
     $conn = new mysqli("localhost","priyanga","","test");
     if($conn->connect_error) {
     	  die("Failed to connect :".$conn->connect_error);
     } else {
     	 $stmt= $conn->prepare("select * from login where username = ?");
     	 $stmt->bind_param("s",$username);
     	 $stmt->execute();
     	 $stmt_result = $stmt->get_result();
     	 if($stmt_result->num_rows > 0) {
             $data = $stmt_result->fetch_assoc();
             if($data['password'] === $password) {
             	 echo "<h2>Login successfully</h2>";
             	
             }else {
             	echo "<h2>Invalid user or password</h2>";
             }
     	 } else {
     	 	echo "<h2>Invalid username or password</h2>";
     	 }
     }
    ?>