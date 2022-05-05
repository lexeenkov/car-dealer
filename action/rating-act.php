<?php
session_start();
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include_once "db-act.php";


echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
echo "AHOOOY";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$idc=$_SESSION["idc"];
$uid=$_SESSION["userid"];
$rating=$_POST["rating"];
//$rating=$_POST["rating"];
    //var_dump($_POST);
echo $idc.'  ';
echo $uid.'  ';
echo $rating;
}
//prepare and initialize sql
    $result;
    $sql = "SELECT * FROM sportcar_rating WHERE uid = ? AND idc = ?;";
    $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header for error;
    exit();    
    };
    mysqli_stmt_bind_param($stmt, "ii", $uid, $idc);
    mysqli_stmt_execute($stmt);
    
    $resultData=mysqli_stmt_get_result($stmt);
    
    if(!empty($row = mysqli_fetch_assoc($resultData))){
        
        $result= "true";// UPDATE RATING from THIS UID for THIS IDC
        echo $result;
        $sql = "UPDATE sportcar_rating SET points=? WHERE idc=? AND uid=?;";
        $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header for error;
    exit();    
    };
    mysqli_stmt_bind_param($stmt, "iii", $rating, $idc ,$uid);
    mysqli_stmt_execute($stmt);
    }else{
        $result = "false"; // NEW RATING from THIS UID for THIS IDC
        echo $result;
        $sql = "INSERT INTO sportcar_rating (idc, points, uid) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header for error;
    exit();    
    };
    mysqli_stmt_bind_param($stmt, "iii", $idc, $rating, $uid);
    mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);    
 header ("location: ../cars.php?error=success");


    ?>