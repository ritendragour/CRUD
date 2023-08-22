<?php
include('db.php');

$sql = $conn->query("SELECT * FROM info");
$id = $sql->fetch()['id'];

echo "<a href='../ri/update.php?id=$id'>Update</a>";


echo "<a href='../ri/delete.php?id=$id'>delete</a>";

while($row = $sql->fetch()){
    echo "<br>".$row['id']." ".$row["fname"]." ".$row["lname"]."<br>";
}

?>
