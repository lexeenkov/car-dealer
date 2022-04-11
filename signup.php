<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple HTML document</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
    <div>
    <form method="post">
    <label> NAME <input type="text" name="name" placeholder="Your name..."></label>
    <label> SURNAME <input type="text" name="surname" placeholder="Surname..."></label>
    <label> USERNAME <input type="text" name="username" placeholder="Pick a username..."></label>
    <label> PASSWORD <input type="password" name="pass" placeholder="And password..."></label>
        <label> REPEAT PASSWORD <input type="password" name="pass" placeholder="Password again..."></label>
        <input type="submit" name="submit">
    </form>
    </div>
    
    
    
    <?php include_once 'footer.php' ?>
     </body>
</html>
<?php
/*
footer must be included
*/
?>
