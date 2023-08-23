<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../ri/index.php">Home</a>
<?php
include('db.php');
$sql = $conn->query("SELECT * FROM info");
while($row = $sql->fetch()){
    echo "<br>RG".$row['id']." ".$row["fname"]." ".$row["lname"]."  
    <a href='../ri/update.php?id=$row[id]'>Update</a>
    <a href='../ri/delete.php?id=$row[id]'>delete</a>";
}
?>