<?php
session_start();
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    
$date=$_GET["date"];
$idc=$_SESSION["idc"];
if(!empty($date)){//if date is not empty
//prepare and initialize sql
    
    include_once "db-act.php";
    
    $sql="SELECT * FROM sportcar_terms WHERE date= ? AND idc = ?";
$stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
            }
            // if success
            else{
                mysqli_stmt_bind_param($stmt, "si", $date , $idc ); // 
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                
               if($row = mysqli_fetch_assoc($result))
               {//if this date is already booked
                    header("location: ../testdrives.php?idc=$idc");
                }
                else{ 
                    // if the date is available
        $sql="INSERT INTO sportcar_terms (date, idc, uid) VALUES (? , ? , 0)";
$stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
            }
            // if success
            else{
                mysqli_stmt_bind_param($stmt, "si", $date , $idc ); // 
                mysqli_stmt_execute($stmt);
              
                    
}}}}
else{// if date IS empty
   
    header("location: ../testdrives.php?idc=$idc");
}

header("location: ../testdrives.php?idc=$idc");