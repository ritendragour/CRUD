<?php

// Local
$db_name = "mysql:host=localhost;dbname=test";
$conn = new PDO($db_name,"root","");

// live
// $db_name = "mysql:host=localhost;dbname=ubrijxav_ri_test";
// $conn = new PDO($db_name,"ubrijxav_rootuser","Rite@9826");

// Use again var
$company_name = $conn->query("SELECT * FROM systemconfig WHERE id='1'")->fetch()['value'];
$SuperAdminEmail = $conn->query("SELECT * FROM systemconfig WHERE id='2'")->fetch()['value'];
$SupportEmail = $conn->query("SELECT * FROM systemconfig WHERE id='3'")->fetch()['value'];
$domainName = $conn->query("SELECT * FROM systemconfig WHERE id='4'")->fetch()['value'];

$uniqid = uniqid();
$IPAddress = getenv("REMOTE_ADDR");

class useagain{
    function session(){
        session_start();
        session_unset();
        session_destroy();
    }
}
?>