<?php
include("connection.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
   <center>
<h3 class='title'>login form</h3>
<form action="" method='post'>
    <input type="email" placeholder='email' name='email'><br>
    <input type="password" placeholder='****' name='password'><br>

    <input type="submit" value='login' name='login'>
</form></center>
    
</body>
</html>
<?php
if(isset($_POST['login'])){

$email=$_POST['email']; 
$password=$_POST['password']; 

$ok=mysqli_query($connect,"select * from users where email='$email' and password='$password'");
while($row=mysqli_fetch_array($ok)){
   $role=$row['role'];
}

$row=mysqli_num_rows($ok);
if($row){
    $_SESSION['login']=$email;

    if($role=='admin'){
        echo "<script>window.location.href='admin/index.php'</script>";
    }else{
        echo "<script>window.location.href='workers/index.php'</script>";
    }

    

}else{
    echo "<script>alert('incorect cridentios')</script>";
}
}



?>