<?php
include('db.php');
$id = $_GET['id'];
$delete = $conn->query("DELETE FROM `info` WHERE id= ".$id."");
?>
<script>
    alert('Item was deleted');
    window.location.href = "../ri/user.php";
</script>
<a href="../ri/index.php">Home</a>