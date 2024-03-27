<?php
include('connection.php');
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock in</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body> <br>
    <?php
include('menu.php');
    ?>
    <br>  <br>    <center>
    <h3>ADD PRODUCT</h3>
     <form action="index.php" method='post'   class='form1'><br>
        <input type="text" placeholder='pname' name='pname'><br>
        <textarea name="description" id="" cols="48" rows="2"></textarea>
        <input type="date" placeholder='expired date' name='expired_date'><br>
  
        <input type="submit" value='save' name='save'>
    </form></center> <br> 
   <center>
    <h3>PRODUCTS</h3>
    <table border='1'>
        <tr class='hr'>
        <td>ID</td><td>product name</td><td>decription</td><td>expired date</td>
        </tr>
       
        <?php
        $select="SELECT * FROM product ";
        $result=mysqli_query($connect,$select);
        while($row=mysqli_fetch_array($result)){
            ?>
        <tr>
        <td><?php echo $row['pid']?></td>
            <td><?php echo $row['pname']?></td>
            <td><?php echo $row['decription']?></td>
            <td><?php echo $row['expireDate']?></td>
            <td></td>
        </tr>
        <?php
        }?>
    
      
    </table>
</center>
    
</body>
</html>
<?php
if(isset($_POST['save'])){

    $pname=$_POST['pname'];
    $description=$_POST['description'];
    $expired_date=$_POST['expired_date'];

   $ins= mysqli_query($connect,"INSERT INTO `product`(`pid`, `pname`, `decription`, `expireDate`) VALUES (null,'$pname','$description','$expired_date')"); 
   if ($ins) {
        echo "<script>alert('product uploaded successfully')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
 }
?>