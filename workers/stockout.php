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
    <h3>STOCK OUT</h3>
     <form action="stockout.php" method='post'  class='form1'><br>
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
   
   
    $result=mysqli_query($connect,"SELECT * FROM stock where pid='$pid'");
    while($row=mysqli_fetch_array($result)){
        $existing_quantity=$row['quantity'];
    }
    $row= mysqli_num_rows($result);
    if($row)
    {
        if($existing_quantity>=$quantity){
             $updated_quantity=$existing_quantity-$quantity;
                $ins= mysqli_query($connect,"update stock set quantity='$updated_quantity' where pid='$pid'"); 
                if ($ins) {
                    echo "<script>alert('stock updated successfully')</script>";
                    // echo "<script>window.location.href='index.php'</script>";
                }
        }else{
            echo "<script>alert('that quantity is much more than what we have')</script>";
        }
       


    }else{

        echo "<script>alert('we dont have that product in our stock')</script>";
       
    
    }



     
   


 }
?>