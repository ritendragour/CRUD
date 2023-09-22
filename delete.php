<?php
include('db.php');
$id = $_GET['id'];
$delete = $conn->query("DELETE FROM `info` WHERE id= ".$id."");
?>
<script>
    alert('Item was deleted');
    window.location.href = "user.php";
</script>
<a href="signup.php">Home</a>