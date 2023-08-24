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

	<label for="">Last Name</label>
	<input type="text" name="lname" value="<?=$sql['lname']?>">
<!--  -->
	<label for="">E-mail / username</label>
	<input type="email" name="email" value="<?=$sql['email']?>">

	<label for="">Phone</label>
	<input type="text" name="phone" value="<?=$sql['phone']?>">

	<label for="">Password</label>
	<input type="password" name="password" value="<?=$sql['password']?>">

	<label for="">Gender</label>
		<select name="gender" value="<?=$sql['gender']?>">
			<option value="M">Male</option>
			<option value="F">Female</option>
			<option value="Other">Other</option>
		</select>

	<label for="">Location</label>
	<input type="text" name="location" value="<?=$sql['location']?>">
	<!--  -->
	<input type="submit" value="Update">
</form>

</body>
</html>