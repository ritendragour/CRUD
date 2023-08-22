<?php
include('db.php');

$id = $_GET['id'];

$delete = $conn->query("DELETE FROM `info` WHERE id= ".$id."");

?>

<a href="../ri/index.php">Home</a>