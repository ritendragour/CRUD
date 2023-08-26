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
        h2{
            color:white;
        }
        .seoc{
            background-image:url('https://images.pexels.com/photos/17748598/pexels-photo-17748598/free-photo-of-brick-wall.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load');
            background-size:cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: right;
            padding-right: 400px;
        }
        .seoc a{
            font-size: 32px;
        }
    </style>
</head>
<body>
    <div class="loginHeader">
        <a href="#"><h2>Company name </h2></a>
        <button class="btn btn-warning"><a href="../ri/logout.php">logout <?php echo$_SESSION['fullname']." !";?></a></button>
    </div>
    <div class="seoc">
        <?php if($role!="0"){ ?>
        <a href="../ri/user.php" class="btn btn-light">Updated All Data</a>
        <?php } else{ ?>
        <a href="../ri/update.php?id=<?=$id?>" class="btn btn-light">Updated data</a>

        <?php } ?>
    </div>
</body>
</html> 

<?php
}
?>
