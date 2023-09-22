<?php
include('db.php');

$usesession = new useagain();
$usesession->session();
header('location:login.php')
?>