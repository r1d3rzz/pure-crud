<?php
    require "bootstrap.php";

    $email = $_GET['email'];
    $query = "DELETE FROM users WHERE email = '$email'";
    $res = mysqli_query($conn,$query);
    header('location:index.php');
?>