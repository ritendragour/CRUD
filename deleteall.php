<?php
include('db.php');

$sqldeleteall = $conn->query("DELETE FROM `info`")->fetch();

header("location:user.php");
?>