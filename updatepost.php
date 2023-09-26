<?php
include('db.php');
include('bootstrap.php');
session_start();

$id = $_GET['id'];
$sqlFetch = $conn->query("SELECT * FROM `post` where id='$id'")->fetch();

$sqlFetchShareID = $sqlFetch['share_id'];
$sqlEmail = $conn->query("SELECT * FROM `info` where id='$sqlFetchShareID'")->fetch();

if(isset($_POST['submit'])){

$category= $_POST['category'];
$title= $_POST['title'];
$description= $_POST['description'];
$file_path= $_FILES['file']['name'];
$updated_by= $_SESSION['id'];
$sharedEmail = $_POST['share_id']; 

    move_uploaded_file($_FILES['file']['tmp_name'], "uploaded_file/".$_FILES['file']['name']);

    if($sharedEmail== ""){
        $sharedid = $_SESSION['id'];
    }else{
        $sharedid = $conn->query("SELECT id FROM `info` where email = '$sharedEmail'")->fetch();
        
        if($sharedid == ""){
            ?>
            <script>
                if(alert('E-mail is not write.')){
                    window.location.href = "post.php";
                }
            </script>
            <?php
        }else{
            $sharedid = $sharedid['id'];
        }
    }
    if($sharedid){

        try{           
            $sql = $conn->query("UPDATE  `post` SET`category`='$category', `title`='$title', `description`='$description',
             `share_id`= '$sharedid',`file_path`='$file_path',`updated_by`='$updated_by' WHERE id=$id");

            header('location:home.php');
        }catch(exception $e){
            ?>
                <script>
                    if(alert('description pattern is not write.')){
                        window.location.href = "post.php";
                    }
                </script>
            <?php
        }
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
        *{
            font-family: 'Roboto', sans-serif;
        }
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
            <a href="home.php"><h2 class="m-0"><?=$company_name?></h2></a>
            <a href="logout.php"><button class="btn btn-warning">logout <?php echo"( ".$_SESSION['fullname']." )";?></button></a>
    </div>
    <div class="lower">
        <form method="post" enctype="multipart/form-data">
                
            <h2 style="display: flex;justify-content: center;" class="mb-4"><u><?=$company_name." Post"?></u></h2>
            
            <label for="">Title <span style="color:red;">*</span></label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?=$sqlFetch['title']?>" required>
        
            <label for="">Description <span style="color:red;">*</span></label>
            <input type="text" name="description" class="form-control"
            value="<?=$sqlFetch['description']?>" placeholder="Enter Description" required>
            <!-- <p class="text-danger text-right" style="text-align: end;margin:0px">Note : Don't use enter button in text area.</p> -->

            <label for="" class="dn">Category </label>
            <select name="category" class="form-control dn">
                <option value="Public">Public</option>
                <option value="Private">Private</option>    
            </select>

            <label for="">Share with other mail</label>
            <input type="text" name="share_id" class="form-control" value="<?=$sqlEmail['email']?>" placeholder="Enter share Email">
            <p class="text-danger text-right" style="text-align: end;margin:0px">You can share only one email address</p>
          
            <label for="">File</label>
                <input type="file" name='file' class="form-control" value="<?=$sqlFetch['file_path']?>">
                <p class="text-dark">Note : You can only upload image (jpg, jpeg, png) extensions.<br>Other extensions we will look at like Docs</p>
            
            <input type="submit" value="Post Update" name="submit" class="mt-2 btn btn-success">
        </form>
</div>
</body>
</html>