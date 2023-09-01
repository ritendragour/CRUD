<?php

include('db.php');
if(isset($_GET['submit'])){
$email = $_GET['email'];

$sqlcheckemail = $conn->query("SELECT * FROM `info` WHERE `email`= '$email'")->fetch();
$sqlid= $sqlcheckemail['id'];

    if($sqlcheckemail){
        $pf= "true";
        header("location:update.php?id=$sqlid&pf=$pf");
    }else{
    ?>
        <script>
            alert("wrong Email");
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
    <title>Password forward</title>
</head>
<body>
        <form method="get" class="df">
            <h2>Email</h2>
            <input type="email" class="form-control mt-2" name="email" placeholder="Enter Email">
            <input type="submit" class="btn btn-success mt-3" name="submit" value="Find">
        </form>
</body>
</html>

<script>