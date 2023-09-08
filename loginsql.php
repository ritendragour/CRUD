<?php
include('db.php');
include('bootstrap.php');
$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $sqlLogin= $conn->query("SELECT * FROM `info` WHERE `email`= '$email'")->fetch();
    
    $checkpassword = password_verify($password, $sqlLogin['password']);
    
    if($checkpassword){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $sqlLogin['role'];
        $_SESSION['id'] = $sqlLogin['id'];
        $_SESSION['fullname'] = $sqlLogin['fname']." ".$sqlLogin['lname'];  
        ?>
            <link rel="stylesheet" href="../lib/w3.css">
            <body style="color:red;" onload="doNotPressbackButtonMGS()">
            <script>
                function doNotPressbackButtonMGS() {
                    if(!alert("Please don't press back button Because if you press back button automatically you will be logout")){
                        window.location.href = 'home.php';
                    }
                }
            </script>
        <?php
    }else{
        ?>
        <style>
            .main-container{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-image: url("https://c8.alamy.com/comp/ECMD14/hand-pushing-virtual-security-button-on-digital-background-ECMD14.jpg") ;
                background-position: center;
                background-size: cover;
                width: 100%;
                height: 100vh;
            }
            a{
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                border: 2px solid black;
                font-weight: 700;
            }
            h1{
                padding: 5px 10px;
                font-size: 64px;
                color: red;
                background-color: rgb(255,255,255,0.8);
            }
        </style>
        <div class="main-container">
            <h1>Invalid Login</h1>
            <a href='login.php' class='submit btn btn-light btn-lg'>Try Again</a>
        </div>
        <?php   
    }
}
?>