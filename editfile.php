<?php
include('db.php'); 

session_start();
    $role= $_SESSION['role'];
    $id =$_GET['id'];
    $FirstName= $_POST['fname'];
    $LastName= $_POST['lname'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $gender= $_POST['gender'];
    $location= $_POST['location'];
    $password= $_POST['password'];

    $sql3 = $conn->query("UPDATE `info` SET `fname`='$FirstName',`lname`='$LastName'
    ,`email`='$email',`phone`='$phone',`gender`='$gender',`location`='$location', `password`='$password' WHERE id=".$id."");

   if($role!="0"){
         header('location:../ri/user.php');
    }else{
         header('location:../ri/home.php');

    }

?>

