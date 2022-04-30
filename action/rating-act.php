<?php

//sql:
// SELECT AVG(points) FROM sportcar_rating r INNER JOIN sportcar_cars c ON r.idc=c.idc WHERE c.idc=?;

//OR

// SELECT AVG(points) , r.idc FROM sportcar_rating r INNER JOIN sportcar_cars c ON r.idc=c.idc;
// IN this case you can pick rating for each car later
// copy paste from prev files
/*


$sql="SELECT ;";

$stmt=mysqli_stmt_init($conn);

// check if fails
if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
            } 
// if success
            else{
                mysqli_stmt_execute($stmt);           $rating=mysqli_stmt_get_result($stmt); 