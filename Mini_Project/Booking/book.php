<?php
require("../inc/connection.php");
session_start();

function error($str){
    echo '<script>alert("' . $str . '"); window.location.href = "../Users/UserPage.php";</script>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_number = $_POST['room_number'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $guests = $_POST['num_members'];
    $price=$_POST['price'];
    $user_name = $_SESSION['user_name'];

    //check if the room is avilable
    if(isset($check_in_date) && isset($check_in_date)){
        $check_booking = "SELECT * FROM bookings WHERE room_number = '$room_number' 
                    AND ((check_in_date <= '$check_in_date' AND check_out_date >= '$check_in_date') 
                    OR (check_in_date <= '$check_out_date' AND check_out_date >= '$check_out_date'))";
        $result = $conn->query($check_booking);

    if ($result->num_rows > 0) {
        error("This room is not available for the selected dates.");
    } 
    else {
                date_default_timezone_set('Asia/Kolkata');
                $currentDateTime = date('Y-m-d H:i:s');

                $insert_booking_sql = "INSERT INTO bookings (user_name, room_number, check_in_date, check_out_date,booking_date, guests,total_price) VALUES (?, ?, ?, ?, ?,?,?)";
                $stmt = $conn->prepare($insert_booking_sql);
                $stmt->bind_param("sissssd", $user_name, $room_number, $check_in_date, $check_out_date, $currentDateTime, $guests, $price);
                $stmt->execute();
                $booking_id = $stmt->insert_id;
                $stmt->close();

                $currentDate = date('Y-m-d');
                // Update the room availability to '0' (not available) if current date booking
                if($check_in_date===$currentDate){
                    $update_room_sql = "UPDATE rooms SET is_available = '0' WHERE room_number = '$room_number'";
                    $conn->query($update_room_sql);
                }
                //get number of list
                $cnt=0;
                // Insert family member details into the family table
                if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['relationship']) && isset($_POST['date_of_birth'])) {
                    $first_names = $_POST['first_name'];
                    $last_names = $_POST['last_name'];
                    $relationships = $_POST['relationship'];
                    $date_of_births = $_POST['date_of_birth'];
                    
                    for ($i = 0; $i < count($first_names); $i++) {
                        $first_name = $conn->real_escape_string($first_names[$i]);
                        $last_name = $conn->real_escape_string($last_names[$i]);
                        $relationship = $conn->real_escape_string($relationships[$i]);
                        $date_of_birth = $conn->real_escape_string($date_of_births[$i]);

                        // Check if required fields are not empty before insertion
                        if (!empty($first_name) && !empty($last_name) && !empty($relationship) && !empty($date_of_birth)) {
                            $insert_family_sql = "INSERT INTO family_details (booking_id, user_name, first_name, last_name, relationship, date_of_birth) VALUES ('$booking_id', '$user_name', '$first_name', '$last_name', '$relationship', '$date_of_birth')";
                            $conn->query($insert_family_sql);
                            $cnt++;
                        }
                    }
                }
                //no of guest update
                $update_number_booking="UPDATE bookings SET guests=$cnt WHERE booking_id ='$booking_id'";
                $conn->query($update_number_booking);
                $conn->close();
                error("Successfully book Room number {$room_number}");

                

 
            }
        }


      
}

?>