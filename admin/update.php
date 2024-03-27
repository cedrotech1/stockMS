
<?php
 include('../connection.php');
 session_start();
 $_SESSION['login'];
 if(!isset($_SESSION['login']))
 {
    echo "<script>window.location.href='../login.php'</script>";
 }
?><?php
// include('../connection.php');
$id=$_GET['id'];
$ok=mysqli_query($connect,"select * from users where id='$id'");
        while($row=mysqli_fetch_array($ok)){
             $n=$row['names'];
             $email=$row['email'];


        }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add employee</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include('menu.php');
    ?>
    <br> <br> <br>
    <center>
    <h3 class='title'>update employees</h3>
<form action="update.php" method='post'>
    <input type="text" name='id' hidden value='<?php echo $id;  ?>'>
    <input type="text" placeholder='names' name='names' value='<?php echo $n;  ?>'><br>
    <!-- <input type="text" placeholder='address' name='address'><br> -->
    <input type="email" placeholder='email' name='email' value='<?php echo $email;  ?>'><br>
 
    <input type="submit" value='save changes' name='update'>
</form></center>
    
</body>
</html>

<?php
if(isset($_POST['update'])){
echo  $names=$_POST['names'];
echo $email=$_POST['email'];
echo $id=$_POST['id'];




$ok=mysqli_query($connect,"update users set names='$names' , email='$email' where id='$id'");
if($ok){
    echo "<script>window.location.href='index.php'</script>";
}
}



?>