<!-- Location = city -->
<?php
include('db.php');
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
            margin-top: 15px;
            margin-bottom: 2px;
        }
        .sub-con{
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 10px;
            align-items: center;
        }
        .submit{
            color: white;
            background-color: blue;
            margin-top: 5px;
            padding: 5px 20px;
            font-size: large;
            width: 20%;
            font-family: revert;
        }
        input,select{
            padding: 8px 10px;
        }
        form a{
            text-decoration: none;
            color:white;
        }
        form h2{
            display: flex;
            padding-bottom: 5px;
            border-bottom: 1px solid white;
            justify-content: center;
            margin-bottom: 15px;
            background-color:black;
        }
        .loginsection{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top:5px;
        }
        .loginbtn{   
            background-color: darkorange;
            display: flex;
            color: white;
            justify-content: center;
            padding: 5px 15px;
            text-decoration: none;
        }
        /* common classes */
        .df{
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .w-50{
            width: 49%;
        }
        .sp{
            display: flex;
            /* justify-content: flex-end; */
            font-size: small;
            color:red;
            margin-top: 5px;
        }
        .sub-df{
            display: flex;
            flex-direction: column;
            width: 49%;
        }
        .df a{
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        .showpassmode{
            justify-content: flex-start;
        }
        input[type="date"] {
            width: 100% !important;
        }
        @media(max-width:1200px){ 
        .main-container {
            height: auto;
            }
        form{
                width: 100vw;
                padding: 20px;
            }
        }
        @media(max-width:700px){ 
            .showpassmode{
            justify-content: flex-end;
            }
            .df{

                flex-direction: column;
            }
            .sub-df{
            width: 100%;
            }
        }
	</style>
</head>
<body>
	<div class="main-container">
		<form action="welcome.php" method="post">
            <a href="login.php"><h2><?=$company_name?></h2></a>
            <div class="loginsection">
                <a href='login.php' class='loginbtn'>> > log In </a>
            </div>
			<label for="" style="margin-top:0px;">Full Name <span style="color:red;">*</span></label>
			<div class="df" style="flex-direction:row!important;">
					<input type="text" name="fname" placeholder="First Name" class="w-50" required>
	
					<input type="text" name="lname" placeholder="Last Name" class="w-50">
			</div>
            
<!--  -->
            <div class="df">
                    <div class="sub-df" >
                    <label for="">E-mail <span style="color:red;">*</span></label>
				    <input type="email" name="email" placeholder="Enter E-mail" required>
                </div>
                
                <div class="sub-df" >
                    <label for="">Phone</label>
                    <input type="text" name="phone" placeholder="Enter Phone number ex. +91 9876543210">
                </div>
            </div>

              <!-- birth Start -->
              <div class="df">
                    
                    <div class="sub-df" >
                        <label for="">City</label>
                        <input type="text" name="location" placeholder="Enter City Name"  maxlength="12">
                    </div>
                    <div class="sub-df" >
                        <label for="">Pin code </label>
                        <input type="text" name="pincode" placeholder="Enter Security Answer"  maxlength="6">
                    </div>
                </div>
<!--  -->
                <div class="df">
                    <div class="sub-df" >
                        <label for="">Gender</label>
                        <select name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                </div>
                <div class="sub-df" >
                    <label for=""> DOB <span style="color:red;">*</span></label>
                    <input type="date" name="birthdate" max="<?=date('Y-m-d')?>" required>
                </div>
            </div>

            <!-- security Start -->
            <div class="df">
                    <div class="sub-df" >
                    <label for="">Security Question<span style="color:red;">*</span></label>
                    <select name="securityquestion" required>
                            <option value="In what city were you born?">In what city were you born?</option>
                            <option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
                            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                            <option value="What high school did you attend?">What high school did you attend?</option>
                            <option value="What was the name of your elementary school?">What was the name of your elementary school?</option>
                            <option value="What was the make of your first car?">What was the make of your first car?</option>
                            <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
                            <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
                            <option value="What year was your father (or mother) born?">What year was your father (or mother) born?</option>
                    </select>
                    <!-- <input type="text" name="securityquestion" placeholder="Enter Security Question"  maxlength="12" required>
                 -->
                </div>
                
                <div class="sub-df" >
                    <label for="">Security Answer<span style="color:red;">*</span>&nbsp;</label>
                    <input type="text" name="securityanswer" placeholder="Enter Security Answer"  maxlength="12" required>
                </div>
            </div>
            <!-- security END -->
           
            <!-- password start -->
            <div class="df">
                    <div class="sub-df" >
                    <label for="">Password <span style="color:red;">*</span></label>
            <input type="password" name="password" placeholder="Password" id="pass" minlength="8" required >

            <div class="sp showpassmode">
                <input type="checkbox" onclick="validateForm()">
                <p class="ifp">&nbsp;Show Password</p>
            </div>
                </div>
                <!-- c pass -->
                <div class="sub-df" >
                <label for="" >Confirm <span style="color:red;">*</span></label>
            <input type="password" name="cpassword" placeholder="Confirm Password" id="cpass" minlength="8" required>
            <div class="sp" style="justify-content: flex-end;">
                <input type="checkbox" onclick="validateFormc()"> 
                <p class="ifp">&nbsp;Show Password</p>
            </div>
                </div>
            </div>
            <!-- password end -->

    	   <!-- Start hidden field ROLE-->
            <input type="hidden" name="role" value="0">
           <!-- End hidden field ROLE-->

            <div class="sub-con">
                    <input type="submit" class="submit w-50 btn-success" style="background-color:green;" value="Sign Up">
		    </div>
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
        function validateFormc() {
            var cpass = document.getElementById('cpass');
            if(cpass.type === "password"){
                cpass.type = "text";
            }else{
                cpass.type = "password"
            }
        }
    </script>
</body>
</html>