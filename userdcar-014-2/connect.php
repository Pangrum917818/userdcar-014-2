<?php
    $conn = new mysqli("localhost","root","12345678","userdcar-014");
    if($conn->connect_errno){
        die("Connection failed:".$conn->connect_error);
    }
?>