<?php
include('db.php');
session_start();
$role= $_SESSION['role'];
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM info where id=".$id."")->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
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
            height: 100vh;
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
        form .titlehead{
            display: flex;
            border-bottom: 1px solid white;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        /* common classes */
        .df{
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .w-50{
            width: 48%  !important ;
        }
        .df a{
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        .text-right{
            margin-top: 5px;
            text-align: end;
            font-size: 20px;
        }
        .sp{
            display: flex;    
            align-items: center;
            justify-content: flex-end;
            font-size: small;
            color:red;
            margin-top: 5px;
        }
        @media(max-width:1200px){
            form{
                width: 100vw;
                padding: 20px;
            }
        }
        @media(max-width:420px){
            form .titlehead{
                padding-bottom: 20px;
                flex-direction: column-reverse;
                /* justify-content: space-evenly; */
            }
        }
</style>
</head>
<body>
	<div class="main-container">
		
		<form action="editfile.php?id=<?=$id?>" method="post">
        <div class="titlehead">
            <a href="../ri/home.php" class="btn btn-light">< < &nbsp;Back Home</a>
            <h2>Testing Version 2.0</h2>
            <p>&nbsp;</p>
        </div>
			<label for="">Full Name</label>
			<div class="df">
				<input type="text" name="fname" value="<?=$sql['fname']?>" class="w-50" placeholder="First Name">
				<input type="text" name="lname" value="<?=$sql['lname']?>" class="w-50" placeholder="Last Name">
			</div>
		<!--  -->
			<label for="">E-mail	</label>
			<input type="email" name="email" value="<?=$sql['email']?>" placeholder="E-mail">

			<label for="">Phone</label>
			<input type="text" name="phone" value="<?=$sql['phone']?>" placeholder="Enter Phone">

			<label for="">Password</label>
			<input type="password" name="password" id="pass" value="<?=$sql['password']?>" 
            minlength="8" placeholder="Enter Password">
            <div class="sp">
                <input type="checkbox" onclick="validateForm()">
                <p class="ifp" style="margin-bottom:0px">&nbsp;Show Password</p>
            </div>

            <div class="df">
                <label for="">Gender</label>
                <p class="text-danger text-right"><?="Old value : ".$sql['gender']?></p>
            </div>

				<select name="gender" placeholder="gender">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select>
                <!--Start  role -->
            <?php if($role!="0"){?>
                <div class="df">
                    <label for="">Role</label>
                    <p class="text-danger text-right"><?php echo"Old value : ";
                    if($sql['role']=="0"){ echo "User";}else{ echo"Admin"; }?></p>
                </div>
                
				<select name="role" value="<?=$sql['role']?>">
					<option value="0">User</option>
					<option value="10">Admin</option>
				</select>
                <!--END role -->
                <?php } ?>

			<label for="">City</label>
			<input type="text" name="location" value="<?=$sql['location']?>" placeholder="City" maxlength="12">

			<input type="submit" value="Update" class="mt-2 btn btn-primary w-50">
		</form>
	</div>
    <script>
        function validateForm() {
            var pass = document.getElementById('pass');
            if(pass.type === "password"){
                pass.type = "text";
            }else{
                pass.type = "password"
            }
        }
        </script>
</body>
</html>