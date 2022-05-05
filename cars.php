<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple HTML document</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
<section>
   
 <?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
    
    require_once "action/db-act.php";
    require_once "action/functions.php";
    require_once "action/car-upload.php";
    // get the cars
    //have the cars
 GetCars($conn);
    if (!empty($cars_array)) { 
	foreach($product_array as $key=>$value){}}
?>
    
    <div class="wrapper">
        <h2>Car Gallery</h2>
    <div class="gallery">
        <?php
        include_once "action/db-act.php";
        include_once "action/functions.php";
        OutputCars($conn);
      ?>
        </div>
        
        <?php 
        //echo $_SESSION["username"];
        // only admin can add cars
        if(isset($_SESSION['username']) && ($_SESSION['admin']===1)){
    echo '
    <div class="add-car">
    <form action="action/car-upload.php" method="post" enctype="multipart/form-data">
    <input type="text" name="filename" placeholder="Image Name..">
    <input type="text" name="car-name" placeholder="Car Name..">
    <input type="number" name="power" placeholder="Power of the car..">
    <input type="number" name="speed" placeholder="Max speed..">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
        
    </form>    
    </div>
    </div>
    ';}?>

        
    </div>
</section>
 <?php include_once 'footer.php'?>
    </body>
</html>