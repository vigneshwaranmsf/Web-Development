<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    //Database connection
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
    	 die('connection Failed :'.$conn->connect_error);
    }else{
    	$stmt = $conn->prepare("insert into login(username,email,password,phone) values(?,?,?,?)");
    	$stmt->bind_param("sssi",$username,$email,$password,$phone);
    	$stmt->execute();
    	echo "registration successfully...";
    	$stmt->close();
    	$conn->close();
    }
?>
