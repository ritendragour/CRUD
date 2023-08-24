<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="main-container">
<form action="welcome.php" method="post">
	<h1>HEllo</h1>
	<label for="">First Name</label>
		<input type="text" name="fname" placeholder="First Name" required>

	<label for="">Last Name</label>
		<input type="text" name="lname" placeholder="Last Name">

	<label for="">E-mail / username</label>
		<input type="email" name="email" placeholder="Last Name" required>

	<label for="">Phone</label>
		<input type="text" name="phone" placeholder="Last Name">

	<label for="">Password</label>
	<input type="password" name="password" placeholder="Last Name" required>
	
	<label for="">Confirm Password</label>
	<input type="password" name="cpassword" placeholder="Last Name" required>

	<label for="">Gender</label>
	<select name="gender" required>
		<option value="M">Male</option>
		<option value="F">Female</option>
		<option value="Other">Other</option>
	</select>

	<label for="">Location</label>
	<input type="text" name="location" placeholder="Last Name">

	<input type="submit" class="submit">
</form>

<div class="image-section">
	<!-- <img src="https://images.pexels.com/photos/17821306/pexels-photo-17821306/free-photo-of-landscape-of-hills-and-mountains.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" width="35%"> -->
</div>
</div>

</body>
</html>