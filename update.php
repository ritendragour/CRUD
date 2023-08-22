<?php
include('db.php');

$id = $_GET['id'];

$update = $conn->query("UPDATE `info` SET `id`='[value-1]',`fname`='[value-2]',`lname`='[value-3]' WHERE $id")

?>