<?php

function print_select($zac, $kon, $default = 0) {
	for($i = $zac; $i <= $kon; $i++) {
		echo "<option value='$i'";
		if ($i == $default) echo ' selected';
		echo ">$i</option>\n";
	}
}

function CreateUser($conn, $name, $surname, $email, $username, $password, $admin){
    $sql = "INSERT INTO sportcar_users ( name, surname, email, username, pwd, admin) VALUES(?, ?, ?, ?, ?, ?)";
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

function CheckUName($conn, $username , $email ){
    $result;
    $sql = "SELECT * FROM sportcar_users WHERE username = ? OR email = ?;";
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
    $admin=$exists["admin"];
    if ($pwdcheck=== true){
        //SESSIONS START HERE
        session_start();
        $_SESSION["userid"] = $exists["usersID"];
        $_SESSION["username"] = $exists["username"];
        $_SESSION["admin"]= $exists["admin"];
        header("location: ../index.php?hello");
        exit();
    }
    else{
         echo '<p></p>   ';
        //echo $pwdexisting;
        echo '<p></p>   ';
        //echo $pwdcheck;
       header("location: ../login.php?error=else");
    exit(); 
    }
    }

function GetCars($conn){
     $sql = "SELECT * FROM sportcar_cars ORDER BY car_name";
    $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ..signup.php?error=else");
    exit();    
    };
    mysqli_stmt_execute($stmt);
    $cars_array = mysqli_stmt_get_result($stmt);
    return $cars_array;
}

function OutputCars($conn){
    include_once "action/db-act.php";
    $sql="
SELECT c.idc, car_name , speed , power , imgFullName, ROUND(AVG(points), 1) as rating FROM sportcar_cars c LEFT JOIN sportcar_rating r on c.idc=r.idc GROUP BY car_name ORDER BY imgOrder;";
            $stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
                header ("Location: index.php");
            } else{
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                
            //check session
               echo '<pre>';
//var_dump($_SESSION);
echo '</pre>';
                
                
        // echo 1
        while ($row=mysqli_fetch_assoc($result)){
       
            echo'
        <div id="car-box">';
        
                if(isset($_SESSION['username']))
        {echo '
        <a id="car-img" href=testdrives.php?idc='.$row["idc"].' style="background-image: url('."images/cars/".$row["imgFullName"].');"><span class = "text"><h4>TEST DRIVE</h4></span></a>
        ';} else{echo '<a href=login.php style="background-image: url('."images/cars/".$row["imgFullName"].');"></a>';};
            echo'
        <h3>'.$row["car_name"].'</h3>
        <p>POWER: '.$row["power"].' HP</p>
        <p>MAX SPEED: '.$row["speed"].' km/h</p>';
        // echo 2 RATING
        if(isset($_SESSION["username"])){
    if(!empty($row["rating"])){echo '<p>USER RATING: '.$row["rating"].' OUT OF 5</p>';}
       else{
           echo '<p>NO RATING YET</p>';
       }
       
        // echo 3
          // echo $row["idc"];
           if(isset($_SESSION['username']) && ($_SESSION['admin']===0)){
            echo
                '
                <form id="rating" method="post" action="rating.php?idc='.$row["idc"].'">
    <button id="rating" type="submit">RATE THIS CAR</button>
</form>
                ';
            //<form role="form"  id="rating-form" method="POST" action="rating.php?idc='.$row["idc"].'&uid='.$uid=$_SESSION["userid"].'">
            //<button type="submit">ADD RATING!</button>
      
        //';}
           
        }}echo '</div>';}
        
}}

function OutputTestdrives($conn){
    $idc=$_GET['idc'];
    //echo $idc;
    
    $result;
    
    $sql="SELECT c.car_name , t.date , name , u.surname , t.uid FROM sportcar_cars c LEFT join `sportcar_terms` t on t.idc=c.idc LEFT join sportcar_users u on t.uid=u.usersID WHERE c.idc=?";
            $stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
                header ("Location: index.php");
            } else{
                mysqli_stmt_bind_param($stmt, "i", $idc);
                mysqli_stmt_execute($stmt);
                
                $result=mysqli_stmt_get_result($stmt);
                $row=mysqli_fetch_assoc($result);
            echo '
            <h3>Choose the desired date for test-drive:</h3>
            <h3 id="car-name">Test drive of '.$row["car_name"].'</h3>';
       
            while ($row=mysqli_fetch_assoc($result)){
  
            if (isset($_SESSION['username']) && ($_SESSION['admin']===0)&& $row["uid"]==0){
                echo "<table id='testdrives'>";
//column1
  echo "<td>" .$row["date"]. "</td>";
//column2
  echo "<td>
  <a href='action/book-act.php?date=".$row["date"]."&idc=".$idc."&uid=".$_SESSION["userid"]."'><button id='book'>BOOK</button></a>
  </td>
  ";  
            }
      //column 3
 echo "<table id='testdrives'>";  
  if (isset($_SESSION['username']) && ($_SESSION['admin']===1)){
       
      if(!empty($row["name"])){
      echo'
          <td>'
          .$row["name"].' '.$row["surname"].
          '</td>
          ';  
      }
      else { // TEST DRIVE delete method
          echo '<td>
          <form method="post" action="action/delete.php?date='.$row["date"].'&idc='.$idc.'">
    <button id="book">DELETE</button>
</form></td>';
    
      }
//column1
  echo "<td>" .$row["date"]. "</td>";
//column2 not visible to admins
  if(isset($_SESSION['username']) && ($_SESSION['admin']===0)){
      echo "<td>
  <a href='action/book-act.php?date=".$row["date"]."&idc=".$idc."&uid=".$_SESSION["userid"]."'><button>BOOK</button></a>
  </td>
  ";
      
      }
      
  
  }
                
      echo "</tr>";

}}}

function deleteTerm($idc, $date, $conn){
    $$dat="'".strval($date)."'";
    echo $dat;
    echo $idc;
    
      $result;
    $sql = "DELETE FROM sportcar_terms WHERE date=? AND idc=?;";
    //    $sql="SELECT name from sportcar_users WHERE usersID=?";

    $stmt = mysqli_stmt_init($conn); // prepared statement to avoid sql injections
mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "si", $date, $idc);
      mysqli_stmt_execute($stmt);

    header ('location: ../testdrives.php?idc='.$idc);
}

function Welcome($conn, $uid){
   if(isset($_SESSION['username'])){
    
    $sql="SELECT name from sportcar_users WHERE usersID=?";
            $stmt=mysqli_stmt_init($conn);
             //if fails
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "MYSQL failed";
                header ("Location: index.php");
            } else{
                mysqli_stmt_bind_param($stmt, "i", $uid);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                $row=mysqli_fetch_assoc($result);
            echo "<h3>Hello, ".$row["name"].", you are logged in!</h3>";
            }
}
}
