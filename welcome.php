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
            <a href='../ri/signup.php'> signup </a>
            <?php
}else{

    if(isset($_POST['fname'])){

        $checkDupalicateEntry = $conn->query("SELECT email FROM `info` WHERE email= '$email'")->fetch();
        
        if($checkDupalicateEntry){
            echo("'".$checkDupalicateEntry['email']."' This E-mail is already register <br> Please Try Agian later");
            ?>
            <a href='../ri/signup.php'> signup </a>
            <?php
        }
        else{
            $sql2 = $conn->query("INSERT INTO `info`(`fname`, `lname`, `email`, `phone`, `gender`, `location`,`password`)
         VALUES ('$FirstName','$LastName','$email','$phone','$gender','$location','$password')");
          ?>
          <div class="textareause">

              <h1>Hello <?=$FirstName." ".$LastName?> </h1>
              <h2> Congratulations Successfully register your Email </h2>
              <h2>"<?=$email?>"</h2>
              <button class="btn btn-dark text-light btn-lg w-25"><a href='../ri/loginform.php'>login</a></button>
            
            </div>
          <?php
        }
       
    }else{
        echo "no data for you";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
    body {
    height: 100vh;
    width: 100vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-image: url("https://c8.alamy.com/comp/ECMD14/hand-pushing-virtual-security-button-on-digital-background-ECMD14.jpg") ;
    background-position:center;
    font-size: 64px;"
    }
    h1{
        font-size: 72px;
    }
    .textareause{
        background-color: rgb(255,255,255,0.5);
        width: 70%;
        padding: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
</head>
<body>
    
</body>
</html>