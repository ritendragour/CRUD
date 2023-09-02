<?php
include('db.php');
$accessSecurityquestion= $_GET['securityquestion'];
$accessemail = $_GET['accessemail'];

$sqlcheckemail = $conn->query("SELECT * FROM `info` WHERE `email`= '$accessemail'")->fetch();
if(isset($_POST['submit'])){
    $EnterSecurityanswer = $_POST['EnterSecurityanswer'];
    $EnterBirthdate = $_POST['Enterbirthdate'];
    
    $accessSecurityanswer = $sqlcheckemail['securityanswer'];
    $accessBirthdate = $sqlcheckemail['birthdate'];

    if(($accessSecurityanswer == $EnterSecurityanswer) && ($EnterBirthdate == $accessBirthdate)){
                $sqlid= $sqlcheckemail['id'];
                $pf= "true";
                header("location:update.php?id=$sqlid&pf=$pf");
    }else{
        ?><script>
        alert("wrong Answer or DOB");
    </script><?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" class="df">
        <h2>Enter your <?=$accessSecurityquestion?></h2>
        <input type="text" class="form-control mt-2" name="EnterSecurityanswer" placeholder="Enter your <?=$accessSecurityquestion?>">
        <input type="date" class="form-control mt-2" name="Enterbirthdate" placeholder="Enter your DOB">
        <input type="submit" class="btn btn-success mt-3" name="submit" value="Find">
    </form>
</body>
</html>