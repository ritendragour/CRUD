<?php

// Local
$db_name = "mysql:host=localhost;dbname=test";
$conn = new PDO($db_name,"root","");

// live
// $db_name = "mysql:host=localhost;dbname=ubrijxav_ri_test";
// $conn = new PDO($db_name,"ubrijxav_rootuser","Rite@9826");

// Company Name
$company_name = $conn->query("SELECT `company_name` FROM systemconfig WHERE id='1'")->fetch()['company_name'];

$uniqid = uniqid();
$permanentEmail = "ritendragour5@gmail.com";
$domainName = "gour.ritendra.in";
class useagain{
    function session(){
        session_start();
        session_unset();
        session_destroy();
    }
}
?>