<!DOCTYPE html>
<html lang="en">
<head>
    <title>Premium Deluxe Motorsport</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
    <div>
        <section class="login-form">
    <form action="action/login-act.php"  method="post" id='login'>
    <label> USERNAME OR LOGIN <input type="text" name="username" placeholder="Your username..."></label>
    <label> PASSWORD <input type="password" name="pass" placeholder="And password..."></label>
        <button type="submit" name="submit" id="submit">LOG IN</button>
    </form>
       <?php if (isset($_GET["error"])){
        if($_GET["error"] == "else"){
            echo "<p id='error'>Something went wrong. Try again.</p>";
        }} ?>
        </section>
    </div>
    
    
    
    <?php include_once 'footer.php' ?>
     </body>
</html>
<?php
/*
footer must be included
*/
?>
