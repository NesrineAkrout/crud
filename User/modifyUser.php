<?php
$user_id=$_GET['id'];
if(isset($_POST['send']))
{
    if(isset($_POST['username'])&&
       isset($_POST['email'])&&
       $_POST['username']!=""&&
       $_POST['email']!="")
   {
    include_once"../connect_ddb.php";
    extract($_POST);
    $sql="UPDATE user SET username='$username',email='$email' WHERE user_id=$user_id";
  
    if(mysqli_query($conn,$sql))
    {
        header("location:showUser.php?message=ModifySuccess");
    }else{
    header("location:showUser.php?message=ModifyFailed");  
}
    }else{
        header("location:modifyUser.php?message=EmptyFields");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
       include_once"../connect_ddb.php";
       $sql="SELECT * FROM user WHERE user_id=$user_id";
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result))
        {      
    ?>
    <form action="" method="post">
        <h1>Modifier un utilisateur</h1>
        <input type="text" name="username" value=<?=$row['username']?> placeholder="Username">
        <input type="email" name="email" value=<?=$row['email']?> placeholder="Email">
        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>
<?php
        }
?>
</body>
</html>