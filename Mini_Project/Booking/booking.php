<?php
    require("../inc/connection.php");
    require("../inc/links.php");

    session_start();
    if(isset($_SESSION['is_user_login']) && $_SESSION['is_user_login'] === true){
            //continue;
    }
    else{
        echo '<script>alert("Login First"); window.location.href = "../index.php";</script>';
        //header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booking.css?v=<?php echo time(); ?>">
    <title>Booking</title>
</head>
<body>
    <?php

        $currentDate = date('Y-m-d');
        $currentDate=date('Y-m-d', strtotime($currentDate. ' - 1 days'));
        $bookingcheck="SELECT room_number FROM `bookings` WHERE `check_out_date` = '$currentDate'";
        $result1 = $conn->query($bookingcheck);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()){
                $room_id=$row['room_number'];
                
                $updateQuary="UPDATE `rooms` SET `is_available` = '1' WHERE `rooms`.`room_number` =$room_id";
                $result2 = $conn->query($updateQuary);
            }
        }
        
        $check_in_date=$_SESSION['check_in_date'];
        $check_out_date=$_SESSION['check_out_date'] ;
        $room_id = $_GET['room_number'];
        $selectQuery="SELECT rooms.room_number,rooms.occupancy,rooms.price FROM `rooms` WHERE room_number = '$room_id'";
        $result = $conn->query($selectQuery);
        if ($result) {
            $row = $result->fetch_row();
            $max_no_member = $row[1];
            $price=$row[2];
        } 
        if ($result->num_rows > 0) {?>
                <div class="mem-container">
                    <form action="book.php" method="POST">
                        <label for="room_number">Room Number:</label>
                        <input type="text" name="room_number" value =" <?php echo $room_id?>" readonly>
                        <br>
                        <label for="num_members">Maxmimum Member:</label>
                        <input type="number" id="num_members" name="num_members"  value ="<?php echo $max_no_member?>" max="<?php echo $max_no_member ?>" readonly >
                        <br>
                        <br>
                        <label for="num_members">Price:</label>
                        <input type="number" id="price" name="price"  value ="<?php echo $price?>"  readonly >
                        <br>
                        <div class="col-lg-4 mb-3">
                                <label class="form-lable" >Check-in</label>
                                <input type="date" class="form-control shadow-none" name="check_in_date" value="<?php echo $check_in_date?>" require>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-lable">Check-Out</label>
                            <input type="date" class="form-control shadow-none" name="check_out_date" value="<?php echo $check_out_date?>" require>
                        </div>
                        <input type="button" onclick="addFamilyMembers()" value="Add Member">
                        <div id="family_container">
                            <!-- Family member fields will be generated here -->
                        </div>
                        <input type="submit" value="Book Room">

                    </form>
                </div>

       <?php
       }
        else{
            echo '<script>alert("This room is not avilable"); window.location.href = "Users/UserPage.php";</script>';
        }


    ?>
    
    <script src="booking.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>