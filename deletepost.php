<?php
include('db.php');
$id = $_GET['id'];
$delete = $conn->query("DELETE FROM `post` WHERE id= ".$id."");
header('location:home.php');
?>