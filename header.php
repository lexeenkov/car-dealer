<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php if ($headder_txt == '') $headder_txt = 'TWD sportcar'; echo $headder_txt; ?></title>
<link href="styles.css" rel="stylesheet">
</head>
<body>
<!---  <div id="gallery">
  <img src="images/m_Maserati-GT-Stradale.jpg" alt="Maserati-GranTurismo-MC-Stradale" title="Maserati-GranTurismo-MC-Stradale" height="59" width="150"> 
  </div>
<div id="main">
-->
	<header>
        <div class="logo">
            <a href=index.php><img src='images/logo.png' alt="PREMIUM MOTORSPORT"></a>
        
            <ul class="nav">
            <li><a href="cars.php"> CARS </a></li>
            <?php
                if (isset($_SESSION["userid"])){
                    if($_SESSION['username']=='admin'){
                    echo '
                    <li><a href="testdrives-admin.php"> TEST DRIVES </a>';
                    }
                    echo '
                    <li><a href="action/logout.php"> LOG OUT</a></li>
                    ';
                }
              else{ echo '
            <li><a href="signup.php"> SIGN UP</a></li>
            <li><a href="login.php"> LOG IN </a></li>
            ';
              }?>
            </ul>
        </div>
        
	</header>
    </body></html>