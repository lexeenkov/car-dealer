<!DOCTYPE html>
<html lang="en">
<head>
    <title>Premium Deluxe Motorsport</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
<section>
		
		<?php
    //success message
    if (isset($_GET["book"])){
        if($_GET["book"] == "success"){
            echo "<p id='success'>Your booking is successful!</p>";
        }}
    
    
    $_SESSION["idc"]=$_GET["idc"];
    //echo $_SESSION["idc"];
    include_once "action/db-act.php";
    include_once "action/functions.php";
    // if isset admin output modify dates
     if(isset($_SESSION['username']) && ($_SESSION['admin']===1)){
    echo '
    <div id="admin-test">
    <h2 id="admin-test"> ADD NEW TEST DRIVE DATE:</h2>';
     echo'
     
     <form id="admin-test" action="action/add-act.php"> 
     <input type="date" name="date" min='.date("Y-m-d").'>
     <button type="submit">ADD</button>
     </form>
     </div>';
     }
    echo '<table>'.
    OutputTestdrives($conn).'</table>';
  
    
    // if isset admin output customers name if reserved and free if free
    
    echo '</div>';
    ?>
</section>
    <?php include_once 'footer.php' ?>
    </body>
</html>

