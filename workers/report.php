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
<table>
    <table border='2'>
        <tr class='hr'>
            <td>product name</td> <td>quantity </td>
        </tr>
    
        <?php
        $ok=mysqli_query($connect,"select pname,quantity from stock,product where stock.pid=product.pid");
        while($row=mysqli_fetch_array($ok)){
            ?>
        <tr>
                <td><?php echo $row['pname'] ?></td>
                 <td><?php echo $row['quantity'] ?></td>
             
            </tr>
            <?php
        }

        ?>
      
    </table>
</table>
</center>


    
</body>
</html>