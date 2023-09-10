<?php
    require("inc/connection.php");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php   require("inc/links.php");?>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <title>Rooms</title>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
        .h-font{
            font-family: 'Borel', cursive;
        }
    </style>
</head>
<body class="bg-light">


    <?php require("inc/navBar.php")?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>
        <p class="text-center mt-4">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Sit eius reiciendis amet voluptas quasi voluptates <br>alias
             numquam aperiam beatae necessitatibus.
        </p>
    </div>
    <!-- <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2> -->
        <div class="container">
            <div class="row">
                <?php
                // Fetch room data from the database
                    $query = "SELECT rooms.*, GROUP_CONCAT(features.name SEPARATOR ', ') AS features_list
                            FROM rooms
                            LEFT JOIN features ON FIND_IN_SET(features.id, rooms.features_ids)
                            GROUP BY rooms.room_number";
                    
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                        echo '    <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">';
                        echo '        <img class="card-img-top" src="images/Rooms/'. $row['image_url'] . '" alt="Card image cap" style="width: 350px; height: 270px;">';
                        echo '        <div class="card-body">';
                        echo '            <h5 class="mb-4 mt-4">' . $row['room_type'] . '</h5>';
                        echo '            <h5 class="mb-4 mt-4">' . $row['floor'] . ' floor</h5>';
                        echo '            <h5 class="mb-4 mt-4">' . $row['view_type'] . ' view</h5>';
                        echo '            <h6 class="mb-4 mt-4">₹' . $row['price'] . ' per night</h6>';
                        echo '            <div class="features mb-4">';
                        echo '                <h6>Features</h6>';
                        echo '                <span class="badge rounded-pill bg-light text-dark test-wrap">' . $row['features_list'] . '</span>';
                        echo '            </div>';
                        // Similar code for Facilities and Rating
                        echo '            <div class="d-flex justify-content-evenly mb-2">';
                        echo '                <a href="Booking/booking.php?room_number=' . $row['room_number'] . '" class="btn btn-submit btn-sm text-white shadow-none">Book Now</a>';
                        echo '            </div>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                        
                    }
                ?>
              

            </div>
        </div>
        
    <?php require("inc/footer.php")?>
    
</body>
</html>