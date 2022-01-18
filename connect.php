<?php
    $host = "localhost";
    $dbname = "crud";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($host,$username,$password,$dbname);

    if($conn != true){
        die("ERROR ".mysqli_connect_error());
    }
?>