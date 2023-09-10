<?php

    // $host="localhost";
    // $user="subhendu";
    // $password="1234";
    // $db="hotel_reservation";
    // $con=mysqli_connect($host,$user,$password,$db);

    // if(!$con){
    //     die("Cannot connect to Database".mysqli_connect_error());
    // }

    $host="localhost";
    $user="root";
    $password="";
    $db="hotel_reservation";
    $conn = new mysqli($host, $user, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $host="localhost";
    // $user="subhendu";
    // $password="1234";
    // $db="hotel_reservation";
    // $conn = new mysqli($host, $user, $password, $db);

    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

?>