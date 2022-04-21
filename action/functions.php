<?php
/*
DB must be included
    
To check if there is a mysqli extension:    
php -m | grep mysqli

*/
function print_select($zac, $kon, $default = 0) {
	for($i = $zac; $i <= $kon; $i++) {
		echo "<option value='$i'";
		if ($i == $default) echo ' selected';
		echo ">$i</option>\n";
	}
}

function CreateUser($conn, $name, $surname, $email, $username, $password, $admin){
    $sql = "INSERT INTO users ( name, surname, email, username, pwd, admin) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ..signup.php?error=else");
    exit();    
    };
    
    $hashedPass= password_hash($password, PASSWORD_DEFAULT);
   
    mysqli_stmt_bind_param($stmt, "sssssi", $name, $surname, $email, $username, $hashedPass, $admin);
   mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../signup.php?error=none");
}

function CheckUName($conn, $username , $email){
    $result;
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header for error;
    exit();    
    };
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData=mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
        $result= true;
    }else{
        $result = false;
    }
     return $result;
    mysqli_stmt_close($stmt);    
}

function EmptyInput($name, $surname, $email, $username, $password, $repeat_password){
    $result;
    if(empty($name)||empty($surname)||empty($email)||empty($username)||empty($password)||empty($repeat_password)){
        $result=true;
        
    }
    else {
        $result=false;
        
    }
    return $result;
    
}

function CheckPass($password, $repeat_password){
    $result;
    if ($password==$repeat_password){
        $result=false;
    }
    else{
        $result=true;
    }
    return $result;
}

function LogUser($conn, $username, $password){
    $exists = CheckUName($conn, $username, $username);
    if ($exists === false){
        header("location: ../login.php?error=else");
    exit();
    }
    $pwdexisting = $exists["pwd"];
    
    $pwdcheck = password_verify($password, $pwdexisting);
    
    if ($pwdcheck=== true){
        //SESSIONS START HERE
        session_start();
        $_SESSION["userid"] = $exists["usersID"];
        $_SESSION["username"] = $exists["username"];
        header("location: ../index.php");
        exit();
    }
    else{
         echo '<p></p>   ';
        echo $pwdexisting;
        echo '<p></p>   ';
        echo $pwdcheck;
       //header("location: ../login.php?error=else");
    exit(); 
    }
    }

