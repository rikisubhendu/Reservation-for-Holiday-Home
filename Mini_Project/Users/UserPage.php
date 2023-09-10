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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="UserPage.css?v=<?php echo time(); ?>">
    <title>Users</title>
</head>
<body>
    <!-- User Dashboard Section -->
    <!-- Navigation Bar -->
    <nav class="user-navbar">
        <div class="left-section">
            <a href="../index.php" class="navbar-brand">TAJ Hotel</a>
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
                echo "<span>Welcome, $username</span>";
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
            <div class="col-lg-6 mb-4">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $selectQuery = "SELECT bookings.*,rooms.room_type,rooms.price FROM `bookings` INNER JOIN  `rooms` 
                                    ON bookings.room_number=rooms.room_number 
                                    WHERE user_name='$user_id'
                                    AND bookings.check_out_date>='$currentDate'";
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
            <!-- Room Search -->
            <div class="col-lg-6 mb-4">
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
                                        <select class="form-select" name="adults">
                                            <option selected>Select</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Children</label>
                                        <select class="form-select" name="children">
                                            <option selected>Select</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
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

            <!-- Previous booking dates details -->
            <div class="col-lg-6 mb-4">
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

</body>
</html>