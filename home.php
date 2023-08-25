<?php
    session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    $loginuser= true;
    header('location:index.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo"Hello Welcome".$_SESSION['fullname']." !";?>
    <a href="../ri/logout.php">logout</a>
</body>
</html>

<?php
}
?>
