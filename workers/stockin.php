
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
    <h3 class='title'>STOCK IN</h3>
<form action="stockin.php" method='post'>
    <input type="text" placeholder='product' name='product'><br>
    <input type="number" placeholder='quantity' name='quantity'><br>
    <input type="number" placeholder='price' name='price'><br>

    <input type="submit" value='add' name='add'>
</form></center>
    
</body>
</html>

<?php
if(isset($_POST['add'])){
 $p=$_POST['product'];
$q=$_POST['quantity'];
$price=$_POST['price']; 
$total=$q*$price;
$status='stockin';

$ok=mysqli_query($connect,"INSERT INTO `stock` (`id`, `product`, `quantity`, `price`, `total`, `status`)
 VALUES (NULL, '$p', '$q', '$price', '$total', '$status');");
if($ok){
    echo "<script>window.location.href='index.php'</script>";
}
}



?>