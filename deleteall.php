<?php

include('db.php');
$sqldeleteall = $conn->query("DELETE FROM `info`")->fetch();

session_start();
session_unset();
session_destroy();

header("location:signup.php");

?>