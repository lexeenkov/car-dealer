<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
if(isset($_POST['submit']))
{
    //text from the form
    $newfilename=$_POST['filename'];
    if(empty($newfilename)){
        $newfilename='gallery';
    }
    else{
        $newfilename=strtolower(str_replace(' ', '_', $newfilename));
        $newfilename=str_replace("." , '-', $newfilename);
    }
    $carname=$_POST['car-name'];
    $power=$_POST['power'];
    $speed=$_POST['speed'];
    
    // about file
    //print_r($file);
    $file=$_FILES['file'];
    $filename = $file['name']; 
    $filetype = $file['type'];
    $filetemp = $file['tmp_name'];
    $fileerror = $file['error'];
    $filesize = $file['size'];
    
    //file type check
    //if(empty($file)){ // error check, don't need it now
    $fileExt=explode(".", $filename);
    $allowed = array('jpg','jpeg','png');
    //}
    
    //echo "WERE HERE";
    //file error handling
    if(!(in_array($fileExt[1], $allowed))){
        echo "Make sure your file is .jpg , .jpeg or .png";
        header ("Location: ../cars.php?wrongfile");
        exit();
        
    } 
    else if ($fileerror!==0){
            echo "Some error accured";
        exit();
        }
        else if ($filesize>2000000){
            echo "File is too large";
            exit();
        }
    
    //SUCCESS
        else {
            //echo "Sucess"; //checking the error handling and proceeding with upload
            $FullFileName=$newfilename . "." . uniqid('', true) . "." . $fileExt[1];//making sure the file name is unique
            echo $FullFileName;
            $FileDestination = "../images/cars/".$FullFileName;
            //echo "WERE HERE";
            include_once "db-act.php";
            
            if(empty($carname) ||empty($power)|| empty($speed)){
                header ("../cars.php?empty");
            } //empty error handler
            
           //prepare and initialize sql
            $sql="SELECT * FROM sportcar_cars";
            $stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
            }
            // if success
            else{
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                $rowcount=mysqli_num_rows($result);
                $imageorder=$rowcount+1;
                
                $sql="INSERT INTO sportcar_cars (car_name, power, speed, imgFullName, imgOrder) VALUES (? , ? , ? , ? , ?)";
                    //one more error handler
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
            } 
                //success
                    else {
                        mysqli_stmt_bind_param($stmt, "siisi", $carname, $power, $speed, $FullFileName, $imageorder);
                        mysqli_stmt_execute($stmt);
                    move_uploaded_file($filetemp, $FileDestination);
                    header("Location: ../cars.php?upload_success");
                    }
                    }
        //echo exec('whoami');
           // echo $filetemp;
        }}