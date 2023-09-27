<?php
include('db.php');
include('bootstrap.php');

    session_start();
    $role= $_SESSION['role'];
    $id = $_SESSION['id'];
    $CheckSharedMail = $_SESSION['mail'];

    if(($_SESSION['mail'] == $SuperAdminEmail)){ 
        $sql = $conn->query("SELECT * FROM `post` ORDER BY id DESC");
    }else{
        $sql = $conn->query("SELECT * FROM `post` WHERE created_by ='$id' || share_id = '$id' ORDER BY id DESC");
    }

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:login.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-image:url('./logo.jpg');
            background-size:cover;
            background-position:center;
            height: 90vh;
            color:white;
        }
        .user_hello{
            font-size:50px;            
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
        .seoc{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            border-bottom: 1px solid white;
            background-color:rgba(1,1,1,0.6);
        }
        .seoc a{
            font-size: 20px;
        }
        .lower{
            display: flex;
            justify-content: center;
        }
        .inlower{
            display: flex;
            flex-direction: column;
            align-items: center;
            width:60%;
            color:white;
            border:4px solid white;
            background-color:rgb(0 0 0/ 80%);
        }
        .post_span{
            display: flex;   
            align-items: center;
            justify-content: space-between;
            padding: 0px 20px;
            width: 98%;
        }
        @media (max-width:925px) {
            .inlower{
                width: auto;
            }
        }
        @media (max-width:775px) {
            .seoc{
                flex-direction: column;
            }
            .post_span{
                flex-direction: column;
            }
        }
        @media (max-width:480px) {
            .loginHeader {
                flex-direction: column;
            }
            .user_hello{
                 font-size:28px;            
             }
             .seoc a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="upper">
        <div class="loginHeader">
            <a href="home.php"><h2  class="m-0"><?=$company_name?></h2></a>
            <a href="logout.php"><button class="btn btn-warning">logout <?php echo"( ".$_SESSION['fullname']." )";?></button></a>
        </div>
        <div class="seoc">
            <h1 class="user_hello">Hello <?php echo$_SESSION['fullname']." !";?></h1>
            <span style="display:flex;">
                <a href="post.php" class="btn btn-dark bg-primary">Create Post</a>        
                <?php if($role!="0"){ ?>
                    <a href="user.php" class="btn btn-light">All User Info</a>
                    <a href="systemconfig.php" class="btn btn-info"> System Config</a>
                <?php } else{ ?>
                        <a href="update.php?id=<?=$id?>" class="btn btn-light">Update data</a>        
                <?php } ?>
            </span>
                <iframe src="https://free.timeanddate.com/clock/i90mqbyf/n1617/fn6/fs16/fcfff/tc000/ftb/bas2/bat1/bacfff/pa8/tt0/tw1/th1/ta1/tb4" frameborder="0" width="216" height="58"></iframe>
        </div>
    </div>

    <!-- POST TABLE -->
    <div class="lower">
        <div class="inlower mt-3">
            <?php $sn=1;
            while ($row = $sql->fetch()){ ?>

                <span class="post_span mt-2">
                    <h1><u><?=$sn++.".  ".$row['title']?></u></h1>
                    <span style="display:flex">
                        <p class="btn btn-light dn"><b><?=$row['category']?></b></p>

                        <?php if($row['file_path'] != ""){?>
                        <p><a href="/uploaded_file/<?=$row['file_path']?>" class="btn btn-info" download>
                        <b>Explore <?=pathinfo($row['file_path'])['extension']?> File</b></a></p>
                        <?php } ?>
                        
                        <?php $full_file_path = "./uploaded_file/".$row['file_path'];?>
                        <p><?="<a href='updatepost.php?&$uniqid$uniqid$uniqid$uniqid$uniqid&id=$row[id]&$uniqid$uniqid$uniqid' class='btn btn-warning text-light'><i class='fa fa-pencil'></i></a>"?></p>
                        <p><?="<a href='deletepost.php?&$uniqid$uniqid$uniqid$uniqid$uniqid&id=$row[id]&$uniqid$uniqid$uniqid' class='btn btn-danger text-light'><i class='fa fa-trash-o'></i></a>"?></p>
                    </span>
                </span>
                
                <?php $file_extendsion = ['jpg','jpeg','png'];
                if($row['file_path'] != ""){
                 if(in_array(pathinfo($row['file_path'])['extension'],$file_extendsion)){?>
                    <img style="margin: 10px;" src="./uploaded_file/<?=$row['file_path']?>"
                    alt="This is not a Image. This is <?=$row['file_path']?>" height="400" width="95%">
                <?php } } ?>
                     
                <h4 style="width: 90%;" class="mt-2"><?=$row['description']?></h4>
                <?php
                        $createdByid = $row['created_by'];
                        $createdByName = $conn->query("SELECT * FROM `info` WHERE id =$createdByid")->fetch();
                        $createdByFullName = 'Created by '.$createdByName['fname'].' '.$createdByName['lname'];

                        if(is_null($row['updated_by'])){
                            $updated_byFullName = "";
                        }else{
                            $updated_by_id = $row['updated_by'];
                            $updated_byName = $conn->query("SELECT * FROM `info` WHERE id =$updated_by_id")->fetch();
                            $updated_byFullName = 'Updated by '.$updated_byName['fname'].' '.$updated_byName['lname'];
                        }
                ?>
                <span class="post_span">
                    <p class='m-0'><?=$createdByFullName?></p>
                    <p class='m-0'><?=$updated_byFullName?></p>
                    <p class="m-0"><?=$row['dt']?></p>
                </span>
                <p style="width: 100%;border: 2px solid white;" class='mt-4'></p>
            <?php } ?>
        </div>
    </div>
</body>
</html> 
<?php
}
?>
