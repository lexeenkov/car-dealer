<!DOCTYPE html>
<html lang="en">
<head>
    <title>Premium Deluxe Motorsport</title>
</head>
<body>
    

<?php

if (isset($_POST["submit"])){
    
    echo "AHOOOY";
    require_once "db-act.php";
    require_once "functions.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // solved the error , but idk what this means.
    $name = $_POST["name"];
    $surname =  $_POST["surname"];
    $username = $_POST["username"];
    if(isset($_POST['password'])){$repeat_password=$_POST["password"];}
    if(isset($_POST['r_pass'])){$password=$_POST["r_pass"];} // fixed Warning: Undefined array key ERROR
    $email = $_POST["email"];
    $admin = 0;
    }
    
    if(EmptyInput($name, $surname, $email, $username, $password, $repeat_password)!== false){
        header("location: ../signup.php?error=empty");
        exit();
    }
    if(CheckPass($repeat_password, $password)!== false){
        header("location: ../signup.php?error=nomatch");
        exit();
    }
    if(CheckUName($conn, $username, $email)!== false){
        header("location: ../signup.php?error=taken");
        echo 'Work';
        exit();
    }
       
    CreateUser($conn, $name, $surname, $email, $username, $password, $admin);
}
else {
    header ("location: ../index.php");
    exit();
}

    ?>
     </body>
</html>
