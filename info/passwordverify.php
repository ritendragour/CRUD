<?php
include('../secure/db.php');
include('../secure/bootstrap.php');
$accessSecurityquestion= $_GET['securityquestion'];
$accessemail = $_GET['accessemail'];
$ftime = $_GET['ftime'];


$sqlcheckemail = $conn->query("SELECT * FROM `info` WHERE `email`= '$accessemail'")->fetch();
if(isset($_POST['submit'])){
    $EnterSecurityanswer = $_POST['EnterSecurityanswer'];
    $EnterBirthdate = $_POST['Enterbirthdate'];
    
    $accessSecurityanswer = $sqlcheckemail['securityanswer'];
    $accessBirthdate = $sqlcheckemail['birthdate'];

        if($accessSecurityanswer == $EnterSecurityanswer){

            if($EnterBirthdate == $accessBirthdate){
                $sqlid= $sqlcheckemail['id'];
                $pf= "true";
                $fullnameformail = $sqlcheckemail['fname']." ".$sqlcheckemail['lname'];
                
                // SMTP MAIL
                $subject = 'Reset your password';

// START MAIL

$message = "$company_name 

Hello $fullnameformail

To reset your password, please click on the link below. 

$domainName/update.php?&$uniqid$uniqid&ftime=$ftime&$uniqid&id=$sqlid&$uniqid&pf=$pf&$uniqid& 

If you did not request this reset, you can ignore this email. It will expire in 30 min.

Try to login IP $IPAddress.

$company_name 
Email: '$SupportEmail' 
Website: www.$domainName 

Copyright © $company_name , All rights reserved.";

// END MAIL

                $headers = 'From: '.$SupportEmail;

                mail($accessemail,$subject,$message,$headers);

                header("location:thankyou.php");
            }else{
                ?>
                <script>
                alert("wrong DOB");
                </script>
                <?php
            }
        }else{
            ?>
            <script>
            alert("wrong Answer");
            </script>
            <?php
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Verify</title>
    <style>
        body{
            background-image: url('https://images.pexels.com/photos/397096/pexels-photo-397096.jpeg?auto=compress&cs=tinysrgb&w=600');
            background-position: center;
            background-size: cover;
        }
        .loginHeader {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color:#007bff;
            color:white;
            padding: 5px 30px;
        }   
        a{
            text-decoration: none;
            color: #121010;
            font-weight: 600;
        }
         @media (max-width:480px) {
            .loginHeader {
                flex-direction: column;
            }
        }
        .main{
            display: flex; 
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;
            padding-right: 100px;
        }
        .df{
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 90vh;
            color:white;
        }
        .df h2{
            background-color: rgb(41 52 55 / 60%);
            padding: 5px;
        }
        @media(max-width:450px)
        {
            .main-container{
                flex-direction: column;
            }
            .main{
                padding: 0px;
                align-items:center;
            }
            .df{
                width: 90vw;
            }
        }
    </style>
</head>
<body>
    <div class="loginHeader">
        <a href="login.php"><h2><?=$company_name?></h2></a>
        <a href="signup.php"><button class="btn btn-warning">SignUp</button></a>
    </div>
    <div class="main">
        <form method="post" class="df">

        <h2 class="m-0" id="questionid"></h2>
        <input type="text" class="form-control" name="EnterSecurityanswer"
         placeholder="Enter Your <?=$accessSecurityquestion?>" required>

        <h2 class="mt-3 m-0">Enter Your DOB</h2>
        <input type="date" class="form-control" name="Enterbirthdate"placeholder="Enter your DOB" required>

        <input type="submit" class="btn btn-success mt-3" name="submit" value="Find">
        </form>
    </div>
    <script>
            let SquestionVar = "<?=$accessSecurityquestion?>".toUpperCase();
            document.getElementById("questionid").innerHTML = `Enter Your ${SquestionVar}`; 
    </script>
</body>
</html>