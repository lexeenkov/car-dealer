<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<meta charset="utf-8">
<title>Premium Deluxe Motorsport</title>
<link href="styles.css" rel="stylesheet">
</head>
<body>
<!---  <div id="gallery">
  <img src="images/m_Maserati-GT-Stradale.jpg" alt="Maserati-GranTurismo-MC-Stradale" title="Maserati-GranTurismo-MC-Stradale" height="59" width="150"> 
  </div>
<div id="main">
-->
	<header>
        <div class="navigation">
            <a class="logo" href=index.php><img class="logo" src='images/logo.png' alt="PREMIUM MOTORSPORT"></a>
            <a href="cars.php"> CARS </a>
            <?php
                if (isset($_SESSION["userid"])){
                    
                    echo '
                     <a href="action/logout.php"> LOG OUT</a> 
                    ';
                }
              else{ echo '
             <a href="signup.php"> SIGN UP</a> 
             <a href="login.php"> LOG IN </a> 
            ';
              }?>
            
        </div>
        
	</header>
    </body></html>