<?php

include('db.php');
$FirstName= $_POST['fname'];
$LastName= $_POST['lname'];

if(isset($_POST['fname'])){

    $sql2 = $conn->query("INSERT INTO `info`(`fname`, `lname`) VALUES ('$FirstName','$LastName')");
    ?>
    <a href='../ri/user.php'> Welcome </a>
    <?php
}else{

echo "no data for you";

}


?>
