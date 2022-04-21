<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$servername = "localhost";
$dbuser = "root";
$dbpass = "";
$dbName = "cars";

$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbName);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$conn = new mysqli($servername, $dbuser, $dbuser, $dbname);
// Check connection


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 



if ($result = $conn -> query("SELECT * FROM users")) {
  echo "Returned rows are: " . $result -> num_rows;
  // Free result set
  $result -> free_result();
}

if($conn){
    echo "True";

    //die("Connection Failed: ". mysql_error());
};
