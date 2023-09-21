<?php
include('secure/db.php');

$usesession = new useagain();
$usesession->session();
header('location:login.php')
?>