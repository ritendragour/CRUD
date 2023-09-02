<?php
include('db.php'); 

session_start();
     $role_session= $_SESSION['role'];
     $id =$_GET['id'];
     $FirstName= $_POST['fname'];
     $LastName= $_POST['lname'];
     $email= $_POST['email'];
     $phone= $_POST['phone'];
     $gender= $_POST['gender'];
     $role=$_POST['role'];
     $location= $_POST['location'];
     $securityquestion= $_POST['securityquestion'];
     $securityanswer= $_POST['securityanswer'];
     $birthdate= $_POST['birthdate'];
     $pincode= $_POST['pincode'];
     $password= $_POST['password'];
     $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $sql3 = $conn->query("UPDATE `info` SET `fname`='$FirstName',`lname`='$LastName'
    ,`email`='$email',`phone`='$phone',`gender`='$gender',`location`='$location', 
    `password`='$passwordHash',`role`='$role' ,`securityquestion` = '$securityquestion',
    `securityanswer` ='$securityanswer',`birthdate`='$birthdate',`pincode`='$pincode' WHERE id=$id");

   if($role_session!="0"){
         header('location:user.php');
    }else{
         header('location:home.php');

    }

?>

