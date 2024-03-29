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
    <br>  <br>  <br> 
   <center>
    <h3>STOCK IN</h3>
     <form action="stockin.php" method='post'  class='form1'><br>
        <select name="pid" id="">
        
            <?php
                $select="SELECT * FROM product ";
                $result=mysqli_query($connect,$select);
                    while($row=mysqli_fetch_array($result)){
                        ?>
                          <option value="<?php echo $row['pid'] ?>"><?php echo $row['pname'] ?></option>

             <?php
                }
                ?>
    
        </select><br>
        <input type="number" placeholder='quantity' name='quantity'><br>

        <input type="submit" value='save' name='save'>
    </form></center>
    
</body>
</html>
<?php
if(isset($_POST['save'])){

     $pid=$_POST['pid'];
     $quantity=$_POST['quantity'];
     $date=date('m/d/Y');
   
    $result=mysqli_query($connect,"SELECT * FROM stock where pid='$pid'");
    while($row=mysqli_fetch_array($result)){
        $existing_quantity=$row['quantity'];
    }
    $row= mysqli_num_rows($result);
    if($row)
    {
        // update 0798231310
        $updated_quantity=$existing_quantity+$quantity;
        $ins= mysqli_query($connect,"update stock set quantity='$updated_quantity' where pid='$pid'"); 
        if ($ins) {
            echo "<script>alert('stock updated successfully')</script>";
            // echo "<script>window.location.href='index.php'</script>";
        }
    }else{
        // insert
 $ins= mysqli_query($connect,"INSERT INTO `stock` (`id`, `pid`, `quantity`)
    VALUES (NULL, '$pid', ' $quantity')"); 
   if ($ins) {
        echo "<script>alert('stock added successfully')</script>";
        // echo "<script>window.location.href='index.php'</script>";
    }
    }



     
   


 }
?>