<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="style.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
		*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
	font-family: 'Roboto', sans-serif;
}
.main-container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    justify-content: center;
    background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg?auto=compress&cs=tinysrgb&w=600');
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100vh;
    font-size: 24px;
    font-weight: 600;
}
form{
    display: flex;
    background-color:rgba(226, 214, 214, 0.5);
    padding: 20px 60px;
    flex-direction: column;
    justify-content: center;
    width: 50%;
}
.main-container img{
    width: 50%;
}
.main-container img img{
    width: 100%;
}
label{
    margin-top: 5px;
    margin-bottom: 2px;
}
.sub-con{
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 5px;
    align-items: center;
    justify-content: center;
}
.submit{
    color: white;
    background-color: blue;
    margin-top: 5px;
    padding: 5px 20px;
    font-size: large;
    width: 20%;
}
input,select{
    padding: 8px 10px;
}
form h2{
    display: flex;
    border-bottom: 1px solid white;
    justify-content: center;
    margin-bottom: 15px;
}
/* common classes */
.df{
    display: flex;
    justify-content: space-between;
    width: 100%;
}
.w-50{
    width: 48%;
}
.df a{
	display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

	</style>
</head>
<body>
	<!-- require('navbar.php') -->
	<div class="main-container">
		<form action="welcome.php" method="post">
			<h2>Hello This is Testing Version 2.0</h2>

			<label for="">Full Name</label>
			
			<div class="df">
					<input type="text" name="fname" placeholder="First Name" class="w-50" required>
	
					<input type="text" name="lname" placeholder="Last Name" class="w-50">
			</div>

			<label for="">E-mail</label>
				<input type="email" name="email" placeholder="Enter E-mail" required>

			<label for="">Phone</label>
				<input type="text" name="phone" placeholder="Enter Phone number ex. +91 9876543210">

			<label for="">Password</label>
			<input type="password" name="password" placeholder="Password" required>
			
			<label for="">Confirm Password</label>
			<input type="password" name="cpassword" placeholder="Confirm Password" required>

			<label for="">Gender</label>
			<select name="gender" required>
				<option value="M">Male</option>
				<option value="F">Female</option>
				<option value="Other">Other</option>
			</select>

			<label for="">Location</label>
			<textarea  name="location" placeholder="Enter your Location" rows="4" cols="50"></textarea >
		<div class="sub-con">
			<div class="df">
				<input type="submit" class="submit w-50" value="Sign Up">
				
			<a href='../ri/loginform.php' class=' submit w-50'> Go to log In </a>
			</div>
		</div>
		</form>
	</div>
</body>
</html>