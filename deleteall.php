<?php

include('db.php');
$sqldeleteall = $conn->query("DELETE FROM `info`")->fetch();

$usesession = new useagain();
$usesession->session();

header("location:signup.php");

?>