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
    </style>
</head>
<body>
    <?php
        include('db.php');
        $sql = $conn->query("SELECT * FROM info");
    ?>
    <div class="main-container">
        <a href="../ri/home.php"><h2>Company Name

        </h2></a>
        <?php if($role!="0"){?>
        <button onclick="deleteFun()" class="btn btn-warning">Delete All</button>
        <?php }else{ ?>
        <button class="btn btn-warning"><a href="../ri/logout.php" class="logoutbtn">
            logout <?php echo$_SESSION['fullname']." !";?></a></button>
       <?php } ?>
    </div>
    <script>
        function deleteFun() {
        if(confirm("Are you sure to Delete All Data Including your you also ?")){
            window.location.href = './deleteall.php';
        }else{
            window.location.href = '../ri/user.php';
        }
    }
    </script>
    <table>
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Location</th>
    <th>Data & Time</th>
    <th>Update</th>
    <?php if($role!="0"){?>   <th>Delete</th>  <?php } ?>
  </tr>
<?php
while($row = $sql->fetch()){
?>
  <tr>
    <td>RG0<?=$row['id']?></td>
    <td><?=$row["fname"]?></td>
    <td><?=$row["lname"]?></td>
    <td><?=$row['email']?></td>
    <td><?=$row["phone"]?></td>
    <td><?=$row["gender"]?></td>
    <td><?=$row["location"]?></td>
    <td><?=$row["dt"]?></td>
    <td><?="<a href='../ri/update.php?id=$row[id]'><button class='btn btn-primary'>Update</button></a>"?></td>
    <?php if($role!="0"){?>
    <td><?="<a href='../ri/delete.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a>"?></td>
    <?php } ?>

 </tr>
<?php
}
?>
</table>
</body>
</html>

<?php
    }
?>