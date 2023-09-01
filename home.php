<?php
include('db.php');
    session_start();
    $role= $_SESSION['role'];
    $id = $_SESSION['id'];

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:signup.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        *{
            /* border:1px solid red; */
        }
        body{
            background-image:url('./logo.jpg');
            background-size:cover;
            /* background-position:center; */
            color:white;
        }
        .user_hello{
            font-size:50px;            
        }
        .loginHeader {
            display: flex;
            /* align-items: center; */
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
        h2{
            color:white;
        }
        .seoc{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            background-color:rgba(1,1,1,0.6);

        }
        .seoc a{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="loginHeader">
        <a href="#"><h2>Company name </h2></a>
        <button class="btn btn-warning"><a href="logout.php">logout <?php echo"( ".$_SESSION['fullname']." )";?></a></button>
    </div>
   
    <div class="seoc">
        <p></p>
    <h1 class="user_hello">Hello <?php echo$_SESSION['fullname']." !";?></h1>
        <?php if($role!="0"){ ?>
        <a href="user.php" class="btn btn-light">Updated All Data</a>
        <?php } else{ ?>
        <a href="update.php?id=<?=$id?>" class="btn btn-light">Updated data</a>

        <?php } ?>
    </div>
</body>
</html> 

<?php
}
?>
