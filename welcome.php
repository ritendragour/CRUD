<?php
include('db.php');
$FirstName= $_POST['fname'];
$LastName= $_POST['lname'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$gender= $_POST['gender'];
$location= $_POST['location'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];

if($password !=$cpassword){
    echo"Password does not match. Please Try agian ";
    ?>
            <a href='../ri/index.php'> signup </a>
            <?php
}else{

    if(isset($_POST['fname'])){

        $checkDupalicateEntry = $conn->query("SELECT email FROM `info` WHERE email= '$email'")->fetch();
        
        if($checkDupalicateEntry){
            echo("'".$checkDupalicateEntry['email']."' This E-mail is already register <br> Please Try Agian later");
            ?>
            <a href='../ri/index.php'> signup </a>
            <?php
        }
        else{
            $sql2 = $conn->query("INSERT INTO `info`(`fname`, `lname`, `email`, `phone`, `gender`, `location`,`password`)
         VALUES ('$FirstName','$LastName','$email','$phone','$gender','$location','$password')");
          ?>
          <a href='../ri/loginform.php'> login </a>

          <?php
        }
       
    }else{
        echo "no data for you";
    }
}

?>
