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

    </style>
</head>
<body>
    <?php
        include('db.php');
        $sql = $conn->query("SELECT * FROM info");
    ?>
    <div class="main-container">
        <a href="../ri/home.php"><h2>Company Name</h2></a>
        <button onclick="deleteFun()" class="btn btn-warning">Delete All</button>
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
    <th>Delete</th>
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
    <td><?="<a href='../ri/delete.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a>"?></td>
 </tr>
<?php
}
?>
</table>
</body>
</html>