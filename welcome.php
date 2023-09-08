<?php
include('db.php');
include('bootstrap.php');

$FirstName= $_POST['fname'];
$LastName= $_POST['lname'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$gender= $_POST['gender'];
$location= $_POST['location'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
$role= $_POST['role'];
$securityquestion= $_POST['securityquestion'];
$securityanswer= $_POST['securityanswer'];
$birthdate= $_POST['birthdate'];
$pincode= $_POST['pincode'];

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

if($password !=$cpassword){
    ?>
    <div class="textareause">
    <h2 style="color:red" class="note">Password does not match</h2>
        <a href='signup.php' class="btn btn-dark btn-lg mt-3" 
        style="text-decoration: none;color: white;">Sign Up </a>
    </div>
    <?php
}else{

    if(isset($email)){

        $checkDupalicateEntry = $conn->query("SELECT email FROM `info` WHERE email= '$email'")->fetch();
        
        if($checkDupalicateEntry){
            ?>
            <div class="textareause">
            <?php
            echo('<h2>"'.$checkDupalicateEntry['email'].'"');
            ?>
            This E-mail is already register</h2>
            <h2 class="note">Please Try Agian later</h2>
                <a href='signup.php' class="btn btn-dark btn-lg mt-3" 
                style="text-decoration: none;color: white;">Sign Up </a>
            </div>
            <?php
        }
        else{
            $sql2 = $conn->query("INSERT INTO `info`(`fname`, `lname`, `email`, `phone`, `gender`,
             `location`,`password`,`role`,`securityquestion`,`securityanswer`,`birthdate`,`pincode`)
            VALUES ('$FirstName','$LastName','$email','$phone','$gender','$location',
            '$passwordHash','$role','$securityquestion','$securityanswer','$birthdate','$pincode')");
          ?>
          <style>
                body {
                     background-image: url("https://images.pexels.com/photos/4065876/pexels-photo-4065876.jpeg?auto=compress&cs=tinysrgb&w=600") !important;
                     background-size: cover;
                    }
          </style>
          <div class="textareause">

              <h1>Hello <?=$FirstName." ".$LastName?> </h1>
              <h2> Congratulations Successfully register your Email </h2>
              <h2>"<?=$email?>"</h2>
              <a href='login.php' 
              style="text-decoration: none;color: white;font-size: 28px;">
              <button class="btn btn-dark text-light btn-lg">login</button></a>
            
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
        background-color: rgb(255,255,255,0.7);
        width: 70%;
        padding: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .note{
        font-size: 48px;
    }
    @media (max-width:820px) {
        .textareause{
            width: 100%;
        }
    }
    @media (max-width:569px) {
        .note{
        font-size: 32px;
    }
    }
    @media (max-width:425px) {
        .note{
        font-size: 26px;
    }
    }
</style>
</head>
<body>
    
</body>
</html>