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
    <title> home</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include('menu.php');
    ?>
    <br> <br> <br>
    <center>
    <h3 class='title'>all employees</h3>
<table>
    <table border='2'>
        <tr class='hr'>
            <td>names</td> <td>email</td><td colspan='2'>modify</td>
        </tr>
       
        <?php
        $ok=mysqli_query($connect,"select * from users where role!='manager'");
        while($row=mysqli_fetch_array($ok)){
            ?>
        <tr>
                <td><?php echo $row['names'] ?></td>
                 <td><?php echo $row['email'] ?></td>
               
         
                 <td>
                   <a href="deleteemployees.php?eid=<?php echo $row['id'] ?>"> <button>delete</button></a>
                </td>
                <td>
                <a href="update.php?id=<?php echo $row['id'] ?>"> <button>update</button></a>
                </td>
            </tr>
            <?php
        }

        ?>
      
    </table>
</table>
</center>
    
</body>
</html>