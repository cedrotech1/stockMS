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
    <br>  <br>  <br> 
   <center>
    <h3>ADD PRODUCT</h3>
     <form action=""  class='form1'><br>
        <input type="text" placeholder='pname' name='pname'><br>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <input type="date" placeholder='expired date' name='expired_date'><br>
        <input type="password" placeholder='password' name='password'><br>
        <input type="submit" value='save' name='save'>
    </form></center>
    
</body>
</html>