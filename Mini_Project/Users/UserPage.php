<?php
    require("../inc/connection.php");
  

    session_start();
    $currentDate = date('Y-m-d');
    if($_SESSION['is_user_login']===true){
       
    }
    else{
        header("Location: ../index.php");
    }

?>

<?php
    if(isset($_POST['delete_room'])){
        $booking_id=$_POST['delete_room'];

        $cancelBook="SELECT * FROM `bookings` WHERE `booking_id` = '$booking_id'";
        $result = $conn->query($cancelBook);
        $data=$result->fetch_assoc();
        $check_in_date=$data['check_in_date'];
        $diff = date_diff(date_create($check_in_date),date_create($currentDate));
        $diff1=$diff->format("%a");

        $refund_amount=0;
        if ($diff1>0){
            $refund_amount=$data['total_price'];
        }
        else{
            $refund_amount=$data['total_price'];
            $refund_amount=$refund_amount-$refund_amount*0.2;
        }
        
        $insertRefund = "INSERT INTO refunds (booking_id, refund_amount, cancel_date) VALUES ('$booking_id', '$refund_amount', NOW())";
        if ($conn->query($insertRefund) === TRUE) {
            $updateBooking = "UPDATE bookings SET iscancel = 1 WHERE booking_id = '$booking_id'";
            if ($conn->query($updateBooking) === TRUE) {
                //
            } else {
                echo "Error updating booking: " . $conn->error;
            }
            echo '<script>alert("Refund will conduted with in 7 days");</script>';
            //echo "Refund will conduted with in 7 days";
        } else {
            echo "Error: " . $conn->error;
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="UserPage.css?v=<?php echo time(); ?>">
    <title>Users</title>
</head>
<body>
    <!-- User Dashboard Section -->
    <!-- Navigation Bar -->
    <nav class="user-navbar">
        <div class="left-section">
            <a href="../index.php" class="navbar-brand">
                <img src="../images/icon.png" class="navbar-icon " href="index.php">
            </a>
        </div>
        <div class="middle-section">
            <?php
                // Fetch user's name from the database and display it
                $user_id=$_SESSION["user_name"];
                $selectQuery = "SELECT full_name FROM `table_user` WHERE user_name='$user_id'";
                $result = $conn->query($selectQuery);
                
                if ($result->num_rows > 0) {
                    // Fetch the data
                    $row = $result->fetch_assoc();
                    $username = $row["full_name"];
                }
                $username = strtok($username, ' ');
                echo "<div class='user_name'>
                        Welcome, $username
                    </div>";
            ?>
        </div>
        <div class="right-section">
            <a href="../logout.php" class="logout-button">Logout</a>
        </div>
    </nav>

<section class="user-dashboard">
    <div class="container">
        <div class="row">
            <!--  booking dates details -->
            <div class="">
                <div class="dashboard-card">
                    <h3>Current Booking </h3>
                    <div class="booked-rooms">
                        <!-- Display user's booked rooms dynamically -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Price</th>
                                    <th>Cancel Booking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $selectQuery = "SELECT bookings.*,rooms.room_type,rooms.price FROM `bookings` INNER JOIN  `rooms` 
                                    ON bookings.room_number=rooms.room_number 
                                    WHERE user_name='$user_id'
                                    AND bookings.check_out_date>='$currentDate' AND bookings.iscancel='0'";
                                    $result = $conn->query($selectQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["room_number"] . "</td>";
                                            echo "<td>" . $row["room_type"] . "</td>";
                                            echo "<td>" . $row["check_in_date"] . "</td>";
                                            echo "<td>" . $row["check_out_date"] . "</td>";
                                            echo "<td>" . $row["price"] . "</td>";
                                            // echo "<td><i class='fa fa-trash' aria-hidden='true'></i></td>";
                                            echo '<td>' ;
                                            echo '<form method="POST">';
                                            echo "<button class='btn btn-danger text-center' name='delete_room' type='submit' value='" . $row['booking_id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                            echo '</td>' ;
                                            echo '</form>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No booked rooms found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Room Search -->
            <div class="">
                <div class="dashboard-card">
                    <h3>Available Rooms</h3>
                    <div class="available-rooms">
                        <div class="container_check">
                            <h5 class="mb-4">Check Booking Availability</h5>
                            <form action="../Booking/searchroom.php" method="post">
                                <div class="horizontal-form">
                                    <div class="form-group">
                                        <label class="form-label">Check-in</label>
                                        <input type="date" class="form-control" name="check_in_date">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Check-Out</label>
                                        <input type="date" class="form-control" name="check_out_date">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Adult</label>
                                        <!-- <select class="form-select" name="adults">
                                            <option selected>Select</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select> -->
                                        <input type="text" class="form-control" name="adults">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Children</label>
                                        <!-- <select class="form-select" name="children">
                                            <option selected>Select</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select> -->
                                        <input type="text" class="form-control" name="children">
                                    </div>
                                    <div class="btn-container">
                                        <button type="submit" class="btn btn-submit" name="btn_users" id="check_btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cancel Booking details -->
            <div class="">
                <div class="dashboard-card">
                    <h3>Cancel Booking </h3>
                    <div class="booked-rooms">
                       
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Refund Amount</th>
                                    <th>Cancel Time</th>
                                    <th>Refund Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $selectQuery = "SELECT bookings.*, rooms.room_type, rooms.price, refunds.refund_amount, refunds.isrefund,refunds.cancel_date
                                    FROM `bookings`
                                    INNER JOIN `rooms` ON bookings.room_number = rooms.room_number
                                    LEFT JOIN `refunds` ON bookings.booking_id = refunds.booking_id
                                    WHERE user_name = '$user_id'
                                    AND bookings.check_out_date >= '$currentDate' AND bookings.iscancel=1" ;
                                    $result = $conn->query($selectQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["room_number"] . "</td>";
                                            echo "<td>" . $row["room_type"] . "</td>";
                                            echo "<td>" . $row["check_in_date"] . "</td>";
                                            echo "<td>" . $row["check_out_date"] . "</td>";
                                            echo "<td>" . $row["refund_amount"] . "</td>";
                                            echo "<td>" . $row["cancel_date"] . "</td>";
                                        
                                            echo "<td>";
                                            if (isset($row['isrefund']) && $row['isrefund'] == 1) {
                                                echo "Yes";
                                            } else {
                                                echo "No";
                                            }
                                            echo "</td>";
                                        
                                           
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No Cancel rooms found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Previous booking dates details -->
            <div class="">
                <div class="dashboard-card">
                    <h3>Booking History </h3>
                    <div class="booked-rooms">
                        <!-- Display user's booked rooms dynamically -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectQuery = "SELECT bookings.*,rooms.room_type,rooms.price FROM `bookings` INNER JOIN  `rooms` 
                                        ON bookings.room_number=rooms.room_number 
                                        WHERE user_name='$user_id' 
                                        AND  bookings.check_out_date < '$currentDate'";

                                    $result = $conn->query($selectQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["room_number"] . "</td>";
                                            echo "<td>" . $row["room_type"] . "</td>";
                                            echo "<td>" . $row["check_in_date"] . "</td>";
                                            echo "<td>" . $row["check_out_date"] . "</td>";
                                            echo "<td>" . $row["price"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No booked rooms found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>