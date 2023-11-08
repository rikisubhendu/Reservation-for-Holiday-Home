<?php
require("inc/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAJ HOTEL_Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
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
    <!-- Carousel -->
    <div class="container-fluid  swiper px-lg-4 mt-4 h-10">
         <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/Hotel_image1.jpeg" class="w-100  d-block"/>
                </div>
                <div class="swiper-slide">
                    <img src="images/Hotel_image2.jpeg" class="w-100  d-block"/>
                </div>
                <div class="swiper-slide">
                    <img src="images/Hotel_image3.jpeg" class="w-100  d-block"/>
                </div>
                <div class="swiper-slide">
                    <img src="images/Hotel_image4.jpeg" class="w-100  d-block"/>
                </div>
                <div class="swiper-slide">
                    <img src="images/Hotel_image5.jpeg"class="w-100  d-block"/>
                </div>
            </div>
        </div>
    </div>
    <!-- check aviliblity form -->
    <div class="container avilibility-form">
        <div class="row">
            <div class="col-lg-12 bg-white  shadow-lg p-3 mb-5 bg-white rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                    <form action="Booking/searchroom.php" method="post">
                        <div class="row align-items-end" >
                            <div class="col-lg-3 mb-3">
                                <label class="form-lable" style="font-weight:500" >Check-in</label>
                                <input type="date" class="form-control shadow-none" name="check_in_date">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-lable" style="font-weight:500">Check-Out</label>
                                <input type="date" class="form-control shadow-none" name="check_out_date">
                            </div>
                            <div class="col-lg-2 mb-3">
                                <label class="form-lable" style="font-weight:500">Adult</label>
                                <!-- <select class="form-select shadow-none" name="adults">
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select> -->
                                <input type="text" class="form-control shadow-none" name="adults">
                            </div>
                            <div class="col-lg-2 mb-3">
                                <label class="form-lable" style="font-weight:500">Children</label>
                                <!-- <select class="form-select shadow-none" name="children">
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select> -->
                                <input type="text" class="form-control shadow-none" name="children">
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-submit text-white shadow-none custom-bg mb-3" id="check_btn" name="searchbtn">Submit</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Our ROOM -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
            <div class="container">
                <div class="row">
                    <?php
                    // Fetch room data from the database
                    $query = "SELECT rooms.*, GROUP_CONCAT(features.name SEPARATOR ', ') AS features_list
                            FROM rooms
                            LEFT JOIN features ON FIND_IN_SET(features.id, rooms.features_ids)
                            GROUP BY rooms.room_number";
                    
                    $result = $conn->query($query);
                    $cnt=0;
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
                        $cnt++;
                        if($cnt==4){
                            break;
                        }
                    }
                    ?>
                </div>
            </div>

           


            <div class="col-lg-12 text-center mt-5">
                <a href="room.php" class="btn btn-sm btn-outline-dark rounded-0 fw-blod shadow-none">More Rooms >>></a>

            </div>
        </div>
    </div>
    <!--  facility -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>
    <div class="container">
        <div class="row">
                <?php 
                        $query="SELECT * FROM `features`";
                        $result = $conn->query($query);
                        $cnt=0;
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4 col-md-6 mb-5 px-4">';
                            echo '<div class="bg-white rounded shadow p-4 border-top border-4 border-dark">';

                            echo ' <h5 class="text-center">'. $row['name'] .'</h5>';
                            echo '<p>
                                    '. $row['description'] .'
                                </p>';
                            echo '</div>';
                            echo '</div>';
                            if($cnt==6)
                                break;
                            $cnt++;

                        }
                    ?>
                
            <div class="col-lg-12 text-center mt-5">
                <a href="facility.php" class="btn btn-sm btn-outline-dark shadow-none">More Details>></a>
            </div>
        </div>
    </div>

    <section id="contact" class="mt-5 pt-4 mb-4 text-center fw-bold h-font">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contact us</h2>
</section>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5>Contact Information</h5>
                <p>If you have any questions or need assistance, feel free to get in touch with us.</p>
                <address>
                    <strong>Taj Hotel</strong><br>
                    123 Main Street<br>
                    City, Country<br>
                </address>
            </div>
            <div class="col-lg-4">
                <h5>Call Us</h5>
                <p>For reservations and inquiries, you can reach us at:</p>
                <p>+91 123-4567</p>
            </div>
            <div class="col-lg-4">
                <h5>Email Us</h5>
                <p>If you prefer email, you can also send us a message at:</p>
                <p>info@example.com</p>
            </div>
        </div>
    </div>

    <?php require("inc/footer.php")?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="index.js"></script>
</body>
</html>