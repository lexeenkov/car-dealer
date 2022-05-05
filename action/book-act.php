<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    $idc=$_GET['idc'];
$date=$_GET["date"];
    echo $idc.'  ';
echo $date.'  ';
$uid=$_GET["uid"];
echo $uid.'  ';

//prepare and initialize sql
    include_once "db-act.php";
            $sql="UPDATE sportcar_terms SET uid= ? WHERE idc=? AND date=?";
            $stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
            }
            // if success
            else{
                mysqli_stmt_bind_param($stmt, "iis", $uid , $idc ,$date ); // 
                mysqli_stmt_execute($stmt);
              
                    }
header("location: ../testdrives.php?idc=$idc&book=success");
// header with success mesage

