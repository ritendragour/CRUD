<?php
include('db.php');
$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $sqlLogin= $conn->query("SELECT * FROM `info` WHERE `email`= '$email' && `password` = '$password'")->fetch();
    
    if($sqlLogin){
        
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['fullname'] = $sqlLogin['fname']." ".$sqlLogin['lname'];

        header('location:home.php');
        
    }else{
        echo "Please enter valid details
			<a href='../ri/loginform.php' class=' submit w-50'> login </a>";  
        
    }

}
?>