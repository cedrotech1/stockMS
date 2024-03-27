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
    <h3 class='title'>stock in </h3>
<table>
    <table border='2'>
        <tr class='trh'>
            <td>product</td> <td>quantity</td><td>price</td><td>total</td><td>status</td><td colspan='2'>modify</td>
        </tr>
    
        <?php
        $ok=mysqli_query($connect,"select * from stock where status='stockin'");
        while($row=mysqli_fetch_array($ok)){
            ?>
        <tr>
                <td><?php echo $row['product'] ?></td>
                 <td><?php echo $row['quantity'] ?></td>
                 <td><?php echo $row['price'] ?></td>
                 <td><?php echo $row['total'] ?></td>
                 <td><?php echo $row['status'] ?></td>
                 <td>
                    <button>delete</button></td><td><button>edit</button></td>
            </tr>
            <?php
        }

        ?>
      
    </table>
</table>
</center>

<br><br>

<center>
    <h3 class='title'>stock out </h3>
    <table>
    <table border='2'>
        <tr class='trh'>
            <td>product</td> <td>quantity</td><td>price</td><td>total</td><td>status</td><td colspan='2'>modify</td>
        </tr>
    
        <?php
        $ok=mysqli_query($connect,"select * from stock where status='stockout'");
        while($row=mysqli_fetch_array($ok)){
            ?>
        <tr>
                <td><?php echo $row['product'] ?></td>
                 <td><?php echo $row['quantity'] ?></td>
                 <td><?php echo $row['price'] ?></td>
                 <td><?php echo $row['total'] ?></td>
                 <td><?php echo $row['status'] ?></td>
                 <td>
                    <button>delete</button></td><td><button>edit</button></td>
            </tr>
            <?php
        }

        ?>
      
    </table>
</center>
    
</body>
</html>