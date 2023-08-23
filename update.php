<?php
include('db.php');
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM info where id=".$id."")->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<form action="editfile.php?id=<?=$id?>" method="post">
	<label for="">First Name</label>
	<input type="text" name="fname" value="<?=$sql['fname']?>">
	<br>
	<label for="">Last Name</label>
	<input type="text" name="lname" value="<?=$sql['lname']?>">
	<br>
	<input type="submit" value="Update">
</form>

</body>
</html>