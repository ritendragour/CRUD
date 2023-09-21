<?php
include('../secure/db.php');
$id = $_GET['id'];

$deletecheck = $conn->query("SELECT * FROM `post` WHERE created_by= ".$id."")->fetch();

// print_r($deletecheck);die;
if($deletecheck){
    ?>
    <script>
        alert('Item was not this user in post');
        window.location.href = "home.php";
    </script>
<?php
}else{

    $delete = $conn->query("DELETE FROM `info` WHERE id= ".$id."");
}
?>
<script>
    alert('Item was deleted');
    window.location.href = "user.php";
</script>
<a href="signup.php">Home</a>