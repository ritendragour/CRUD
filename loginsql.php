<?php
include('db.php');
$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $sqlLogin= $conn->query("SELECT * FROM `info` WHERE `email`= '$email'")->fetch();
    
    $checkpassword = password_verify($password, $sqlLogin['password']);

if($checkpassword === false){
    ?>
    <script>
        alret("Password is not right");
</script>

    <?php
    header('location:loginform.php');
}


    if($checkpassword){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $sqlLogin['role'];
        $_SESSION['id'] = $sqlLogin['id'];
        $_SESSION['fullname'] = $sqlLogin['fname']." ".$sqlLogin['lname'];  
        header('location:home.php');
        
    }else{
        ?>
        <style>
            .main-container{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                justify-content: center;
                background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg?auto=compress&cs=tinysrgb&w=600');
                background-position: center;
                background-size: cover;
                width: 100%;
                height: 100vh;
                font-size: 24px;
                font-weight: 600;
            }
            a{
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                border: 2px solid black;
            }
        </style>
        <div class="main-container">
            <h1>Invalid Login</h1>
            <a href='../ri/loginform.php' class='submit btn btn-light btn-lg'>Try Again</a>
        </div>
        <?php
        
    }

}
?>