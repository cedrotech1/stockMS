<?php
 include('../connection.php');
 session_start();
 $_SESSION['login'];
 if(!isset($_SESSION['login']))
 {
    echo "<script>window.location.href='../login.php'</script>";
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
    <h3 class='title'>add employees</h3>
<form action="addemployee.php" method='post'>
    <input type="text" placeholder='names' name='names'><br>
    <!-- <input type="text" placeholder='address' name='address'><br> -->
    <input type="email" placeholder='email' name='email'><br>
    <input type="password" placeholder='****' name='password'><br>

    <input type="submit" value='add' name='add'>
</form></center>
    
</body>
</html>

<?php
if(isset($_POST['add'])){
 $names=$_POST['names'];
$address=$_POST['address'];
$email=$_POST['email']; 
$password=$_POST['password']; 

$ok=mysqli_query($connect,"INSERT INTO `users` (`id`, `names`, `email`, `role`, `password`) VALUES 
(NULL, '$names', '$email', 'worker', '$password')");
if($ok){
    echo "<script>window.location.href='index.php'</script>";
}
}



?>