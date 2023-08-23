<?php
include('db.php');
    $id =$_GET['id'];
    $FirstName= $_POST['fname'];
    $LastName= $_POST['lname'];
    $sql3 = $conn->query("UPDATE `info` SET `fname`='$FirstName',`lname`='$LastName' WHERE id=".$id."");
?>
<script>
    window.location.href = "../ri/user.php";
</script>
