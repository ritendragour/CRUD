<?php
include('db.php');
include('bootstrap.php');
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:login.php');
}else{

    if(isset($_POST['submit'])){
        $company_name_value = $_POST['company_name'];
        $conn->query("UPDATE `systemconfig` SET `company_name`='$company_name_value' WHERE id='1'");
        header('location:home.php');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Config</title>
    <style>
        body{
            background-image: url('https://images.pexels.com/photos/518244/pexels-photo-518244.jpeg?auto=compress&cs=tinysrgb&w=600');
            background-position: center;
            background-size: cover;
        }
        .main-container{
            display: flex;
            justify-content: space-between;
            background-color: #007bff;
            padding: 5px;
        }
        .logoutbtn{
            display: flex;
            text-decoration: none;
            color: black;
            align-items: center;
            justify-content: center;   
        }
        .main{
            display: flex; 
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;
            padding-right: 100px;
        }
        .df{
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 90vh;
            color:white;
        }
        .df h2{
            background-color: rgb(41 52 55 / 60%);
            padding: 5px;
        }
        @media(max-width:450px)
        {
            .main-container{
                flex-direction: column;
            }
            .main{
                padding: 0px;
                align-items:center;
            }
        }  
  </style>
</head>
<body>
    <?php
    $oldCompanyName =  $conn->query("SELECT * FROM `systemconfig` WHERE id ='1'")->fetch();
    ?>
    <div class="main-container">
        <a href="home.php" class="btn text-light"><h2>
            <u style="text-decoration: none;"> <?=$company_name?></u></h2></a>    
                <a href="logout.php" class="logoutbtn"><h4 class="btn btn-warning" style="font-weight: 600;">
                  logout <?php echo"( ".$_SESSION['fullname']." )";?></h4></a>
 
    </div>
    <div class="main">
        <form method="post" class="df">
            <h2>Update Company Name</h2>
            <input type="text" class="form-control mt-2" name="company_name" 
                placeholder="Company Name" value="<?=$oldCompanyName['company_name']?>">
            <input type="submit" class="btn btn-success mt-3" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
<?php } ?>