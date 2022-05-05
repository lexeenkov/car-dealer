<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple HTML document</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
<?php
$_SESSION['idc']=$_GET    ['idc'];

    echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
    
      /*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
    
        echo '<pre>';
var_dump($_POST);
echo '</pre>';
    */
    //IF YOU SUBMITED RSTING BEFORE IT WILL BE UPDATED
    //If the user has already rated the car, their rating will be preset in the selection menu. 
    // Now here: 1. FORM with points 2. SQL action 
    ?>
    
  
    <form action="action/rating-act.php" method="post">
    <label for="rating">SELECT AMOUNT OF RATING POINTS:</label>
    <select class="rating" name="rating">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <button type="submit">SUBMIT RATING</button>
    </form>
    
    <?php include_once 'footer.php' ?>
    </body>
</html>

