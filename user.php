<?php
session_start();

$role= $_SESSION['role'];

// 0 = user, 10 = admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("Location: ../ri/signup.php");

}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <style>
        body{
            background-color: #ada4b6;
        }
        .main-container{
            display: flex;
            justify-content: space-between;
            padding: 0px 20px;
            align-items: center;
            background-color:#007bff;
        }
        a h2{
            text-decoration: none;
            color: white;
            font-weight: 600;
        }
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        border: 2px solid black;
        width: 100%;
        }
        td, th {
        text-align: left;
        padding: 8px;
         }
        tr:nth-child(even) {
        border: 1px solid black;
        background-color: #dddddd;
        }
        .logoutbtn{
            text-decoration: none;
            color: black;
        }
        .notaadmin{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    @media(max-width:775px){
        .noimp{
            display: none;
        }
    }
    @media(max-width:1440px){
        .noimp:nth-child(even){
            display: none;
        }
    }
    </style>
</head>
<body>
    <?php
        include('db.php');
        $sql = $conn->query("SELECT * FROM info");
    ?>
    <div class="main-container">
        <a href="../ri/home.php" style="text-decoration: none;"><h2>Company Name</h2></a>
        
        <!-- admin -->
        <?php if($role!="0"){?>
        <button onclick="deleteFun()" class="btn btn-light noimp">Delete All</button>
        <?php }
        // user
        else{ ?>
        <button class="btn btn-warning"><a href="../ri/logout.php" class="logoutbtn">
            logout <?php echo$_SESSION['fullname']." !";?></a></button>
        <?php } ?>

        <button class="btn btn-warning"><a href="../ri/logout.php"
        style="text-decoration: none;color: black;">logout <?php echo"( ".$_SESSION['fullname']." )";?></a></button>

    </div>
    <script>
        function deleteFun() {
        if(confirm("Are you sure to Delete All Data Including you are also ?")){
            window.location.href = './deleteall.php';
        }else{
            window.location.href = '../ri/user.php';
        }
    }
    </script>
    <?php 
    if($role!="0"){
        ?>
    <table>
  <tr>
    <th class="noimp">S N</th>
    <th class="noimp">Id</th>
    <th>Full Name</th>
    <th class="noimp">E-mail</th>
    <th class="noimp">Phone</th>
    <th class="noimp">Gender</th>
    <th class="noimp">City</th>
    <th>Role</th>
    <th class="noimp">Data & Time</th>
    <th>Update</th>
    <th class="noimp">Delete</th>
  </tr>
<?php
    $sn=1;
while($row = $sql->fetch()){
?>
  <tr>
    <td class="noimp">&nbsp;&nbsp;<?=$sn++?></td>
    <td class="noimp">RG0<?=$row['id']?></td>
    <td><?=$row["fname"]." ".$row["lname"]?></td>
    <td class="noimp"><?=$row['email']?></td>
    <td class="noimp"><?=$row["phone"]?></td>
    <td class="noimp"><?=$row["gender"]?></td>
    <td class="noimp"><?=$row["location"]?></td>
    <td><?php if($row["role"]=="0"){echo"User";}else{echo"Admin";}?></td>
    <td class="noimp"><?=$row["dt"]?></td>
    <td><?="<a href='../ri/update.php?id=$row[id]'><button class='btn btn-primary'>Update</button></a>"?></td>
    <?php if($role!="0"){?>
    <td class="noimp"><?="<a href='../ri/delete.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a>"?></td>
    <?php } ?>

 </tr>
<?php
} 
// role else
}else{

    echo"<div class='notaadmin'><h1>Your not a admin.</h1> <h2>That why you can't see any details</h2></div>";
}
?>
</table>
</body>
</html>
<?php
    }
?>