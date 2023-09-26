<?php
include('db.php');
include('bootstrap.php');
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:login.php');
}else{

    if(isset($_POST['submit'])){
        $company_name_value = $_POST['company_name'];
        $SuperAdminEmail_value = $_POST['SuperAdminEmail'];
        $SupportEmail = $_POST['SupportEmail'];
        $domainName_value = $_POST['domainName'];
        $updated_by_user_id =$_SESSION['id'];

        $conn->query("UPDATE `systemconfig` SET `value`='$company_name_value' ,`updated_by` = '$updated_by_user_id' WHERE id='1'");
        $conn->query("UPDATE `systemconfig` SET `value`='$SuperAdminEmail_value' ,`updated_by` = '$updated_by_user_id' WHERE id='2'");
        $conn->query("UPDATE `systemconfig` SET `value`='$SupportEmail' ,`updated_by` = '$updated_by_user_id' WHERE id='3'");
        $conn->query("UPDATE `systemconfig` SET `value`='$domainName_value' ,`updated_by` = '$updated_by_user_id' WHERE id='4'");
        header('location:home.php');
    }
?>
<!DOCTYPE html>
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
            padding: 5px 30px;
            color: black;
        }
        .logoutbtn{
            display: flex;
            text-decoration: none;
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
        label{
            color:black;
            background-color: rgb(241 231 231 / 60%);
        }
        @media(max-width:450px)
        {
            .df{
                width: 90vw;
            }
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
    // $oldCompanyName =  $conn->query("SELECT * FROM `systemconfig` WHERE id ='1'")->fetch();

        // Super Admin condition
        if($SuperAdminEmail == $_SESSION['mail'] && $_SESSION['role'] == '10'){
        ?>
        <style>
                .loginPersionIsSuperAdmin{
                    display: block;
                }
        </style>
            <?php
        }else{
            ?>
        <style>
                .loginPersionIsSuperAdmin{
                    display: none;
                }
        </style>
        <?php
        }
        ?>
    <div class="main-container">
        <a href="home.php" class="btn p-0"><h2 class="m-0">
            <u style="text-decoration: none;" > <?=$company_name?></u></h2></a>    
                <a href="logout.php" class="logoutbtn"><h4 class="btn btn-warning m-0" style="font-weight: 600;">
                  logout <?php echo"( ".$_SESSION['fullname']." )";?></h4></a>
 
    </div>
    <div class="main">
        <form method="post" class="df">
            <h2>Update Company Info</h2>
            <label for="" class='mt-2'>Company Name</label>
            <input type="text" class="form-control mt-1" name="company_name" 
                placeholder="Company Name" value="<?=$company_name?>" required>

            <label for="" class='mt-2'>Support Email</label>
            <input type="text" class="form-control mt-1" name="SupportEmail" 
            placeholder="Support Email" value="<?=$SupportEmail?>" required>

            
            <div class="loginPersionIsSuperAdmin">
                <label for="" class='mt-2'>Domain Name</label>
                <input type="text" class="form-control mt-1" name="domainName" 
                placeholder="Domain Name" value="<?=$domainName?>" required>
                
                <label for="" class='mt-2'>Super Admin Email</label>
                <input type="text" class="form-control mt-1" name="SuperAdminEmail" 
                placeholder="Super Admin Email" value="<?=$SuperAdminEmail?>" required>  

            </div>

            <input type="submit" class="btn btn-success mt-3" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
<?php } ?>