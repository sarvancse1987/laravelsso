<?php

$servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "testdb"; 

    $conn = new mysqli($servername, $username, $password, $dbname);


    $uname = $_POST['uname'];

    $email = $_POST['email'];

    $upswd = $_POST['upswd'];

    $ucpswd = $_POST['ucpswd'];

    $sql = "INSERT INTO `register`(`username`, `userpwd`, `userconfirmpwd`, `isactive`, `createdon`) 

           VALUES ('$uname','$upswd','$ucpswd',true, NOW())";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    }

    $conn->close();
  
?>