<?php
include('db.php');
include('bootstrap.php');
session_start();

if(isset($_POST['submit'])){

$category= $_POST['category'];
$title= $_POST['title'];
$description= $_POST['description'];
$file_path= $_FILES['file']['name'];
$created_by= $_SESSION['id'];

move_uploaded_file($_FILES['file']['tmp_name'], "uploaded_file/".$_FILES['file']['name']);

  try{

      $sql = $conn->query("INSERT INTO `post`(`category`, `title`, `description`, `file_path`, `created_by`)
    VALUES ('$category','$title','$description','$file_path','$created_by')");
    header('location:home.php');
    
    }catch(exception $e){
        header('location:post.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <style>
        .loginHeader {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color:#007bff;
            color:white;
            padding: 5px 30px;
        }
        a{
            text-decoration: none;
            color: #121010;
            font-weight: 600;
        }
        form {
            display: flex;
            flex-direction: column;
            padding: 20px 50px;
            background-color: rgb(255 255 255 / 70%);;
            }
        .lower{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
            background-image:url('./logo.jpg');
            background-size:cover;
            background-position:center;
         }   
         label{
            font-size : 30px;
         }
         @media (max-width:380px) {
            form{
                padding: 10px 25px;
            }
            .loginHeader {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>      
    <div class="loginHeader">
            <a href="home.php"><h2><?=$company_name?></h2></a>
            <a href="logout.php"><button class="btn btn-warning">logout <?php echo"( ".$_SESSION['fullname']." )";?></button></a>
    </div>
    <div class="lower">
        <form method="post" enctype="multipart/form-data">
                
            <h2 style="display: flex;justify-content: center;" class="mb-4"><u><?=$company_name." Post"?></u></h2>
            
            <label for="">Title <span style="color:red;">*</span></label>
            <input type="text" name="title" class="form-control" required>
            
            <label for="">Description <span style="color:red;">*</span></label>
            <textarea type="text" name="description" class="form-control" maxlength="250" rows="3" required></textarea>
            <!-- <p class="text-danger text-right" style="text-align: end;margin:0px">Note : Don't use enter button in text area.</p> -->

            <label for="" class="dn">Category </label>
            <select name="category" class="form-control dn">
                <option value="Public">Public</option>
                <option value="Private">Private</option>
            </select>

            <label for="">File</label>
            <input type="file" name='file' class="form-control" >
            <p class="text-dark">Note : You can only upload image (jpg, jpeg, png) extensions.<br>Other extensions we will look at like Docs</p>
            
        
            <input type="submit" value="Post" name="submit" class="mt-2 btn btn-success">
        </form>
</div>
</body>
</html>