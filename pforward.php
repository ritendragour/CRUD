<?php

include('db.php');
if(isset($_POST['submit'])){
$email = $_POST['email'];

$sqlcheckemail = $conn->query("SELECT * FROM `info` WHERE `email`= '$email'")->fetch();

if($sqlcheckemail){
        $securityquestion = $sqlcheckemail['securityquestion'];
        $accessemail = $sqlcheckemail['email'];
        header("location:passwordverify.php?securityquestion=$securityquestion&accessemail=$accessemail");
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
</head>
<body>
        <form method="post" class="df">
            <h2>Email</h2>
            <input type="email" class="form-control mt-2" name="email" placeholder="Enter Email">
            <input type="submit" class="btn btn-success mt-3" name="submit" value="Find">
        </form>
</body>
</html>