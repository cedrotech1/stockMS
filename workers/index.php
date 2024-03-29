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
    <title>stock in</title>
    <link rel="stylesheet" href="../style.css">
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
       
        <input type="submit" value='save' name='save'>
    </form></center> <br> 
   <center>
    <h3>PRODUCTS</h3>
    <table border='0'>
        <tr class='hr'>
        <td>ID</td><td>product name</td><td>decription</td><td colspan='2'>modify</td>
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
            <td><button>delete</button></td>
            <td><button>update</button></td>
            
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

   $ins= mysqli_query($connect,"INSERT INTO `product`(`pid`, `pname`, `decription`) VALUES (null,'$pname','$description')"); 
   if ($ins) {
        echo "<script>alert('product uploaded successfully')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
 }
?>