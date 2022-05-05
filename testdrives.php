<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple HTML document</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
<section>
		
		<?php
    $_SESSION["idc"]=$_GET["idc"];
    echo $_SESSION["idc"];
    include_once "action/db-act.php";
    include_once "action/functions.php";
    // if isset admin output modify dates
     if(isset($_SESSION['username']) && ($_SESSION['admin']===1)){
    echo 'ADD NEW TEST DRIVE DATE:';
     echo'<form action="action/add-act.php"> 
     <input type="date" name="date" min='.date("Y-m-d").'>
     <button type="submit">ADD</button>
     </form>';
     }
    echo '<table>'.
    OutputTestdrives($conn).'</table>';
  
    
    // if isset admin output customers name if reserved and free if free

    
    ?>
</section>
    <?php include_once 'footer.php' ?>
    </body>
</html>

