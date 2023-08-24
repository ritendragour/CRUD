<?php
include('db.php'); 
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
?>
<script>
    window.location.href = "../ri/user.php";
</script>

