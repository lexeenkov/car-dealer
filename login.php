<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple HTML document</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
    <div>
    <form method="post" action="/action/login-act.php">
    <label> USERNAME OR LOGIN <input type="text" name="username" placeholder="Your username..."></label>
    <label> PASSWORD <input type="password" name="pass" placeholder="And password..."></label>
        <button type="submit" name="submit">LOG IN</button>
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
