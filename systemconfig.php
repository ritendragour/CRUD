<?php
include('db.php');

if(isset($_POST['submit'])){
    $company_name_value = $_POST['company_name'];
    $conn->query("INSERT INTO `systemconfig`(`company_name`) VALUES ('$company_name_value')");
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="company_name">
        <input type="submit" name="submit">
    </form>
</body>
</html>