<?php

include('db.php');
include('bootstrap.php');
if(isset($_POST['submit'])){
$email = $_POST['email'];

$sqlcheckemail = $conn->query("SELECT * FROM `info` WHERE `email`= '$email'")->fetch();


if($sqlcheckemail){
        $securityquestion = $sqlcheckemail['securityquestion'];
        $accessemail = $sqlcheckemail['email'];
        header("location:passwordverify.php?&$uniqid$uniqid$uniqid$uniqid$uniqid&securityquestion=$securityquestion&$uniqid&&accessemail=$accessemail");
    }else{
    ?><script>
            alert("wrong Email");
        </script><?php
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password forward</title>
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
        @media(max-width:650px)
        {
            .main-container{
                flex-direction: column;
            }
            .main{
                padding: 0px;
                align-items:center;
            }
        }
        @media(max-width:443px)
        {
            .main{
                padding: 0px 20px;
                align-items:center;
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
            <h2>Enter Your Registrar Email Address</h2>
            <input type="email" class="form-control mt-2" name="email" placeholder="Enter Email">
            <input type="submit" class="btn btn-success mt-3" name="submit" value="Find">
        </form>
    </div>
</body>
</html>