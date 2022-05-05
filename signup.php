<!DOCTYPE html>
<html lang="en">
<head>
    <title>Premium Deluxe Motorsport</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
    <section class="signup-form">
    <div>
    <form action="action/signup-act.php" method="post" id='login'>
    <label> NAME <input type="text" name="name" placeholder="Your name..."></label>
    <label> SURNAME <input type="text" name="surname" placeholder="Surname..."></label>
    <label> USERNAME <input type="text" name="username" placeholder="Pick a username..."></label>
         <label> EMAIL <input type="email" name="email" placeholder="Your email..."></label>
    <label> PASSWORD <input type="password" name="password" placeholder="And password..."></label>
    <label> REPEAT PASSWORD <input type="password" name="r_pass" placeholder="Password again..."></label>
    <button type="submit"  name="submit" id="submit">SUBMIT</button>
    </form>
    </div>
        <?php
    if (isset($_GET["error"])){
        if($_GET["error"] == "empty"){
            echo "<p id='error'>Fill in all fields</p>";
        }
        else if($_GET["error"] == "nomatch"){
            echo "<p id='error'>Passwords do not match , try again</p>";
        }
        else if($_GET["error"] == "taken"){
            echo "<p id='error'>This username is already taken</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p id='success'>You have Signed Up</p>";
        }
        else {
            echo "<p id='error'>Something Went Wrong</p>";
        }
    }
    ?>
    </section>
    
    
    
    <?php include_once 'footer.php' ?>
     </body>
</html>
<?php
/*
footer must be included
*/
?>
