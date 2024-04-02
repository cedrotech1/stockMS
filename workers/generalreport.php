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
    <h3 class='title'>current status report of our stock </h3>
    <form action="" method='post'>
     <button name='stockin'>stock in</button><button name='stockout'>stock out</button>
</form>
<table>
    <table border='2'>
        <tr class='hr'>
            <td>product name</td> <td>quantity </td><td>dates </td><td>status </td>
        </tr>
    
        <?php
        $ok=mysqli_query($connect,"SELECT product.pname,quantity,year,month,day,status 
        FROM product,historic WHERE product.pid=historic.pid");
        while($row=mysqli_fetch_array($ok)){
            ?>
        <tr>
                <td><?php echo $row['0'] ?></td>
                 <td><?php echo $row['1'] ?> kg</td>
                 <td><?php echo $row['4'] ?>/<?php echo $row['3'] ?>/<?php echo $row['2'] ?></td>
                 <td><?php echo $row['5'] ?></td>
             
            </tr>
            <?php
        }

        ?>
      
    </table>
</table>
</center>

<?php
if(isset($_POST['stockin'])){
   ?>
 <center>
    <h3 class='title'>stockin report </h3>
    
<table>
    <table border='2'>
        <tr class='hr'>
            <td>product name</td> <td>quantity </td><td>dates </td><td>status </td>
        </tr>
    
        <?php
        $ok=mysqli_query($connect,"SELECT product.pname,quantity,year,month,day,status FROM product,historic WHERE product.pid=historic.pid and status='stockin'");
        while($row=mysqli_fetch_array($ok)){
            ?>
        <tr>
                <td><?php echo $row['0'] ?></td>
                 <td><?php echo $row['1'] ?></td>
                 <td><?php echo $row['4'] ?>/<?php echo $row['3'] ?>/<?php echo $row['2'] ?></td>
                 <td><?php echo $row['5'] ?></td>
             
            </tr>
            <?php
        }

        ?>
      
    </table>
</table>
</center>
   <?php
}
if(isset($_POST['stockout'])){
    ?>
    <center>
       <h3 class='title'>stock out report </h3>
      
   <table>
       <table border='2'>
           <tr class='hr'>
               <td>product name</td> <td>quantity </td><td>dates </td><td>status </td>
           </tr>
       
           <?php
           $ok=mysqli_query($connect,"SELECT product.pname,quantity,year,month,day,status FROM product,historic WHERE product.pid=historic.pid and status='stockout'");
           while($row=mysqli_fetch_array($ok)){
               ?>
           <tr>
                   <td><?php echo $row['0'] ?></td>
                    <td><?php echo $row['1'] ?></td>
                    <td><?php echo $row['4'] ?>/<?php echo $row['3'] ?>/<?php echo $row['2'] ?></td>
                    <td><?php echo $row['5'] ?></td>
                
               </tr>
               <?php
           }
   
           ?>
         
       </table>
   </table>
   </center>
      <?php
}

?>



    
</body>
</html>
