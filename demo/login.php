<?php

    $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "testdb"; 

    $conn = new mysqli($servername, $username, $password, $dbname);


    $uname = $_POST['uname'];

    $upswd = $_POST['upswd'];
	
    $sql = "SELECT * from `register` where `username`= '$uname' and `userpwd`='$upswd'";

    $result = $conn->query($sql);
   
if ($result) {
   
    if (mysqli_num_rows($result) > 0) {
       header("Location:register.html");
    } else {
        echo 'not found';
    }
} else {
    echo 'Error: ' . mysqli_error();
}

    $conn->close();
  
?>