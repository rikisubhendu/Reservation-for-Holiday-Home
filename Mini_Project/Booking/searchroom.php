<?php
    require("../inc/connection.php");
    require("../inc/links.php");
    session_start();
    function error($str){
        echo '<script>alert("' . $str . '"); window.location.href = "../Users/UserPage.php";</script>';
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $check_in_date = $_POST["check_in_date"];
        $check_out_date = $_POST["check_out_date"];
        $adults = $_POST["adults"];
        $children = $_POST["children"];
        $sum=(int)$adults+(int)$children;
        if ($sum>4){
            $str="Sorry we don't have this capacity in our Facility";
            error($str);
        }
        if( $check_in_date < date("Y-m-d")){
            //echo "It is not possible";
            error("Check the current date");
        }
        if( $check_in_date == $check_out_date ){
            //echo "It is not possible";
            error("Date not to be same");
        }
        if( $check_in_date > $check_out_date ){
            //echo "It is not possible";
            error("Check the date");
        }
        else{

            $_SESSION['check_in_date'] = $check_in_date;
            $_SESSION['check_out_date'] = $check_out_date;
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serach Book</title>
    <link rel="stylesheet" href="../index.css?v=<?php echo time(); ?>">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        .h-font{
            font-family: 'Borel', cursive;
        }
        .imageDiv img{
            padding-left: 10px;
            height: 70px;
            width: 100px;
        }
    </style>
</head>
<body>
            <div class="imageDiv">
                <a href="javascript:history.back()">
                    <img src="../images/icon.png" >
                <a>
            </div>
    
                <div class="container">
                    <div class="row">
                        
                        <!-- Search avilable room -->
                        <?php   
                            
                                if(isset($check_in_date) && isset($check_out_date)){
                                    $query="SELECT rooms.*, GROUP_CONCAT(features.name SEPARATOR ', ') AS features_list
                                            FROM rooms
                                            LEFT JOIN features ON FIND_IN_SET(features.id, rooms.features_ids) 
                                            WHERE rooms.isMaintain=0 AND rooms.room_number 
                                            not in ( SELECT room_number FROM bookings 
                                            WHERE  iscancel=0 AND ((check_in_date <= '$check_in_date' AND check_out_date >= '$check_in_date') 
                                            OR (check_in_date <= '$check_out_date' AND check_out_date >= '$check_out_date')))
                                            GROUP by room_number;";
                            
                                
                                    $result = $conn->query($query);
                                                
                                    echo '<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Available Room</h2>';
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                                        echo '    <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">';
                                        echo '        <img class="card-img-top" src="../images/Rooms/'. $row['image_url'] . '" alt="Card image cap" style="width: 350px; height: 270px;">';
                                        echo '        <div class="card-body">';
                                        echo '            <h5 class="mb-4 mt-4">' . $row['room_type'] . '</h5>';
                                        echo '            <h5 class="mb-4 mt-4">' . $row['floor'] . ' floor</h5>';
                                        echo '            <h5 class="mb-4 mt-4">' . $row['view_type'] . ' view</h5>';
                                        echo '            <h6 class="mb-4 mt-4">₹' . $row['price'] . ' per night</h6>';
                                        echo '            <div class="features mb-4">';
                                        echo '                <h6>Features</h6>';
                                        echo '                <span class="badge rounded-pill bg-light text-dark test-wrap">' . $row['features_list'] . '</span>';
                                        echo '            </div>';
                                        echo '            <div class="d-flex justify-content-evenly mb-2">';
                                        echo '                <a href="booking.php?room_number=' . $row['room_number'] . '" class="btn btn-submit btn-sm text-white shadow-none">Book Now</a>';
                                        echo '            </div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                }
                            
                    echo '</div>';
                echo '</div>';
                }
                else{
                    $query="SELECT rooms.*, GROUP_CONCAT(features.name SEPARATOR ', ') AS features_list
                                            FROM rooms
                                            LEFT JOIN features ON FIND_IN_SET(features.id, rooms.features_ids) 
                                            WHERE rooms.isMaintain=0 
                                            GROUP by room_number;";
                            
                                
                                    $result = $conn->query($query);
                                                
                                    echo '<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Available Room</h2>';
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                                        echo '    <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">';
                                        echo '        <img class="card-img-top" src="../images/Rooms/'. $row['image_url'] . '" alt="Card image cap" style="width: 350px; height: 270px;">';
                                        echo '        <div class="card-body">';
                                        echo '            <h5 class="mb-4 mt-4">' . $row['room_type'] . '</h5>';
                                        echo '            <h5 class="mb-4 mt-4">' . $row['floor'] . ' floor</h5>';
                                        echo '            <h5 class="mb-4 mt-4">' . $row['view_type'] . ' view</h5>';
                                        echo '            <h6 class="mb-4 mt-4">₹' . $row['price'] . ' per night</h6>';
                                        echo '            <div class="features mb-4">';
                                        echo '                <h6>Features</h6>';
                                        echo '                <span class="badge rounded-pill bg-light text-dark test-wrap">' . $row['features_list'] . '</span>';
                                        echo '            </div>';
                                        echo '            <div class="d-flex justify-content-evenly mb-2">';
                                        echo '                <a href="booking.php?room_number=' . $row['room_number'] . '" class="btn btn-submit btn-sm text-white shadow-none">Book Now</a>';
                                        echo '            </div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                }
                            
                    echo '</div>';
                echo '</div>';
                }
                    
                        ?>

</body>
</html>


        
