<?php

if(isset($_POST["submit"])){
    
    require_once "db-act.php";
    require_once "functions.php";
    if(isset($_POST['username'])){
    $username = $_POST["username"];}
    if(isset($_POST['pass'])){
    $password = $_POST["pass"];
    }
   
    
    LogUser($conn, $username, $password);
    
}

else {
    header ("location: ../index.php");
}
