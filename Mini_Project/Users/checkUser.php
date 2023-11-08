<?php 
    require("../inc/connection.php");
    $username = $_POST['username'];
    $query = "SELECT user_name FROM table_user WHERE user_name = '$username'";
    $result=$conn->query($query);

    if (mysqli_num_rows($result) > 0) {
        echo 'exists';
    } else {
        echo 'available';
    }

?>