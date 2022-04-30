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
        $sql="
SELECT car_name , speed , power , imgFullName, AVG(points) as rating FROM sportcar_cars c LEFT JOIN sportcar_rating r on c.idc=r.idc GROUP BY car_name ORDER BY imgOrder;";
            $stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
                header ("Location: index.php");
            } else{
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                
        // echo 1
        while ($row=mysqli_fetch_assoc($result)){
        echo'
        <a href="#" id="car-box">
        <span class = "text"><h4>TEST DRIVE</h4></span>
        <div style="background-image: url('."images/cars/".$row["imgFullName"].');"></div>
        <h3>'.$row["car_name"].'</h3>
        <p>'.$row["power"].'</p>
        <p>'.$row["speed"].'</p>';
        // echo 2 RATING
        if(isset($_SESSION["username"])){
    if(!empty($row["rating"])){echo '<p>'.$row["rating"].'</p>';}
       else{
           echo '<p>No rating yet</p>';
       }
       
        // echo 3
        echo '</a>';
        }}}
        ?>
        
        </div>
        <?php 
        //echo $_SESSION["username"];
        // only admin can add cars
        if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')){
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