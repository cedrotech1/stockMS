<?php
include('../connection.php');
$id=$_GET['eid'];
$ok=mysqli_query($connect,"delete from users where id='$id'");
if($ok){
    echo "<script>window.location.href='index.php'</script>";
}


?>