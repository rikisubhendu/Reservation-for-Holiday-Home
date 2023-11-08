<?php
    require_once("../inc/connection.php");
    session_start();
    if($_SESSION['is_admin_login']===true){
       
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
    <title>Admin Panel_Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
    <style>
        .h-font{
                font-family: 'Borel', cursive;
            }
            .navbar-icon {
            width: 60px; /* Adjust the width to your desired size */
            height: auto; /* Automatically adjust the height to maintain aspect ratio */
            
            margin-left: 50px;
            margin-bottom: 20px;
            
            }

            /* Make the image responsive */
            @media (max-width: 768px) { /* You can adjust the breakpoint as needed */
            .navbar-icon {
                width: 30px; /* Adjust the width for smaller screens */
            }
        }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>


    
        <!-- Side manu -->
   
        <div class="wrapper">
            <div class="sidebar">
            <div class="imageDiv">
                <a href="admin.php">
                    <img src="../images/icon.png" class="navbar-icon" href="index.php">
                <a>
                </div>
                <!-- <h2 class="h-font">Taj Hotel</h2> -->
                <ul>
                    
                    <li><a href="admin.php" data-section="Home" onclick="showSection('home')"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="" data-section="Facilities" onclick="showSection('Facilities')"><i class="fas fa-building"></i>Facilities</a></li>
                    <li><a href="" data-section="rooms" onclick="showSection('rooms')"><i class="fas fa-hotel"></i>Rooms</a></li>
                    <li><a href="" data-section="users" onclick="showSection('users')"><i class="fas fa-user-edit"></i>Users</a></li>
                    <li><a href="" data-section="Booking" onclick="showSection('Booking')"><i class="fas fa-door-open"></i>Booking </a></li>
                   
                    <li><a href="" data-section="Refund" onclick="showSection('Refund')"><i class="fas fa-undo"></i>Refund</a></li>
                    <!-- <li><a href=""><i class="fas fa-cog"></i>Setting</a></li> -->
                    <a href="../logout.php" class="logout"><i class="fas fa-power-off"></i>Logout</a>
                </ul>
                
        </div>
    
    <div class="main_content">
        <!-- Home page -->
        <section id="Home" >
            <!-- Home -->
            <!-- <div class="header text-center">Admin Portal</div>  
            <div class="info">
            <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
            <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
            <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
            </div> -->
            <h1>Welcome to the Admin Dashboard</h1>
            <div class="container-info">
                <div class="squared-box">
                    <div class="box">
                        <div class="heading">
                            <p>Current booking of Today <p>
                        </div>
                        <div class="value">
                           <p> <?php echo getCurrentBookings();?></p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="heading">
                            <p>Avilable Rooms <p>
                        </div>
                        <div class="value">
                           <p> <?php echo  getAvilableRooms();?></p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="heading">
                            <p>Total guest <p>
                        </div>
                        <div class="value">
                           <p> <?php echo  getNoOfGuest();?></p>
                        </div>
                    </div>
                <!-- Add more boxes as needed -->
                </div>  
            </div>
            <?php
                    function getCurrentBookings() {
                    global $conn;
                    
                    //    $sql="SELECT  COUNT(*) AS total
                    //    FROM bookings
                    //    WHERE check_in_date = $curdate
                    //    UNION ALL
                    //    SELECT  COUNT(*) AS total
                    //    FROM bookings
                    //    WHERE check_out_date = $curdate";
                    //$sql="SELECT COUNT(*) AS total  FROM `bookings` WHERE booking_id not in (SELECT booking_id from bookings WHERE check_in_date >= '$curdate' AND check_out_date <='$curdate' ) AND iscancel=0;";
                    $sql="SELECT COUNT(*) AS total
                    FROM bookings
                    WHERE CURDATE() BETWEEN DATE(check_in_date) AND DATE(check_out_date) AND isCancel=0";
                    $result=$conn->query($sql);
                    $data=$result->fetch_assoc();
                    return $data['total'];
                    
                    }

                    function getAvilableRooms(){
                        global $conn;
                        $sql="SELECT COUNT(*) AS totalRooms FROM rooms ";
                        $result=$conn->query($sql);
                        $data=$result->fetch_assoc();
                        $booking=getCurrentBookings();
                        $avil=$data['totalRooms']-$booking;
                        return $avil;
                    }

                    function getNoOfGuest(){
                        global $conn;
                    
                        // $sql="SELECT count(id) as total_Guest from family_details WHERE booking_id in
                        //       (  SELECT booking_id
                        //     FROM bookings
                        //     WHERE check_in_date = $curdate
                        //     UNION ALL
                        //     SELECT  booking_id
                        //     FROM bookings
                        //     WHERE check_out_date = $curdate)";
                        //$sql="SELECT count(id) as total_Guest from family_details WHERE booking_id in(SELECT booking_id from bookings where booking_id not in (SELECT booking_id from bookings WHERE check_out_date <='$curdate' ) AND iscancel=0);";
                        $sql="SELECT count(id) as total_Guest from family_details WHERE booking_id in(
                            SELECT booking_id
                            FROM bookings
                            WHERE CURDATE() BETWEEN DATE(check_in_date) AND DATE(check_out_date) AND isCancel=0) ";
                        $result=$conn->query($sql);
                        $data=$result->fetch_assoc();
                        return $data['total_Guest'];
                    }

                ?>
        </section>

        <!-- Rooms -->
        <section id="rooms" style="display: none;">
            <!-- Button trigger modal -->
            <button id="addRoomBtn">Add New Room</button>

            <!--Add Room Modal -->
            <div id="addRoomModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Add New Room</h2>
                    <?php 
                            if(isset($_POST['roomAdd'])){
                                $room_number=$_POST["room_number"];
                                $room_type=$_POST["room_type"];
                                $occupancy=$_POST["occupancy"];
                                $view_type=$_POST["view_type"];
                                $bed_type=$_POST["bed_type"];
                                $price=$_POST["price"];
                                $availability=$_POST["availability"];
                                $description=$_POST["description"];
                                $floor=$_POST["floor"];
                                $room_image_url=$_FILES["room_image_url"]['name'];
                                $selectedFeatures = $_POST['features'];
                                $selectedFeatures = $_POST['features'];
                                $featuresIds = implode(',', $selectedFeatures);

                            
                                $targetDirectory = "../images/Rooms/"; 
                                $target_file = $targetDirectory . basename($_FILES["room_image_url"]["name"]);
                                move_uploaded_file($_FILES["room_image_url"]["tmp_name"], $target_file);
                                

                                try {
                                    $query = "INSERT INTO `rooms` (`room_number`, `room_type`, `occupancy`, `bed_type`, `view_type`, 
                                                `price`, `is_available`, `description`, `floor`, `image_url`, `features_ids`) 
                                                VALUES ($room_number,'$room_type','$occupancy','$bed_type','$view_type',
                                                $price,'$availability','$description',$floor,'$room_image_url','$featuresIds')";

                                    if ($conn->query($query) === TRUE) {
                                       
                                        ?>
                                        <!-- <div class="alert alert-success" role="alert">
                                            New Room successfully added!
                                            <button type="button" class="close-alert-btn" onclick="closeAlert(this)">
                                                <span>&times;</span>
                                            </button>
                                        </div> -->
                                        
                                    <?php
                                    } else {
                                        throw new Exception("Error: " . $conn->error);
                                    }
                                } catch (Exception $e) {?>
                                    <!-- <div class="alert alert-danger" role="alert">
                                        Error adding new room: <?php echo $e->getMessage(); ?>
                                        <button type="button" class="close-alert-btn" onclick="closeAlert(this)">
                                            <span>&times;</span>
                                        </button>
                                    </div> -->
                                <?php }
                        
                            }?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                   
                        
                        <label for="room_number">Room Number:</label>
                        <input type="text" id="room_number" name="room_number" required>
                        
                        <label for="room_type">Room Type:</label>
                        <select id="room_type" name="room_type" required>
                            <option value="standard">Standard</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="suite">Suite</option>
                        </select>
                        
                        <label for="occupancy">Occupancy:</label>
                        <input type="text" id="occupancy" name="occupancy" required>
                        
                        <label for="bed_type">Bed Type:</label>
                        <select id="bed_type" name="bed_type" required>
                            <option value="king">King</option>
                            <option value="queen">Queen</option>
                            <option value="twin">Twin</option>
                        </select>
                        
                        <label for="view_type">View Type:</label>
                        <input type="text" id="view_type" name="view_type">
                        
                        <label for="price">Price per Night:</label>
                        <input type="text" id="price" name="price" step="0.01" required>
                        
                        <label for="availability">Availability:</label>
                        <input type="checkbox" id="availability" name="availability" value=0>
                        
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4"></textarea>
                        
                        <label for="floor">Floor:</label>
                        <input type="text" id="floor" name="floor">
                        
                        <label for="image_url">Image URL:</label>
                        <input type="file" id="image_url" name="room_image_url">
                        
                        <label for="features">Features/Amenities:</label>
                        <select id="features" name="features[]" multiple>
                            <!-- Retrieve feature names from the features table -->
                            <?php
                            $featureQuery = "SELECT id, name FROM features";
                            $featureResult = $conn->query($featureQuery);
                            while ($featureRow = $featureResult->fetch_assoc()) {
                                echo '<option value="' . $featureRow['id'] . '">' . $featureRow['name'] . '</option>';
                            }
                            ?>
                        </select>
                        
                        <button type="submit" name="roomAdd">Add Room</button>
                    </form>
                </div>
            </div>

            <script>
                        $(document).ready(function() {
                            // Delete room
                            $('button.delete-room').click(function() {
                                console.log("Button clicked");
                                var roomNumber = $(this).data('room-number');
                                var button = $(this);
                                if (confirm("Are you sure you want to delete this room?")) {
                                    $.ajax({
                                        type: "POST",
                                        url: "admin.php",
                                        data: { delete_room_number: roomNumber },
                                        success: function(response) {
                                            // Update the page as needed, e.g., remove the deleted room from the list
                                            button.closest('tr').remove();
                                        },
                                        error: function(error) {
                                            console.error("Error deleting room: " + error);
                                        }
                                    });
                                }
                            });

                            // Maintain room
                            $('button.maintain-room').click(function() {
                                var roomNumber = $(this).data('room-number');
                                var button = $(this);
                                // if (confirm("Are you sure you want to make under maintain this room?")) {
                                    $.ajax({
                                        type: "POST",
                                        url: "admin.php",
                                        data: { maintain_room_number: roomNumber },
                                        success: function(response) {
                                            var availabilityCell = button.closest('tr').find('.availability');
                                            if (availabilityCell.text() === 'Yes') {
                                                availabilityCell.text('No');
                                            } else {
                                                availabilityCell.text('Yes');
                                            }
                                                            
                                        },
                                        error: function(error) {
                                            console.error("Error maintaining room: " + error);
                                        }
                                    });
                                // }
                            });
                            $('button.edit-room').click(function() {
                                var roomNumber = $(this).data('room-number');
                                var button = $(this);
                                $.ajax({
                                    type: "POST",
                                    url: "admin.php",
                                    data: { edit_room_number: roomNumber },
                                    dataType: 'json', // Expect JSON response
                                    success: function(response) {
                                        // Populate the form fields with the data from the response
                                        console.log(response);
                                        $('#room_number').val(response.room_number);
                                        $('#room_type').val(response.room_type);
                                        $('#occupancy').val(response.occupancy);
                                        $('#bed_type').val(response.bed_type);
                                        $('#view_type').val(response.view_type);
                                        $('#price').val(response.price);
                                        $('#availability').prop('checked', response.is_available);
                                        $('#description').val(response.description);
                                        $('#floor').val(response.floor);

                                        // Features need special handling as it's a multi-select
                                        var features = response.features_ids.split(',').map(function (id) {
                                            return id.trim();
                                        });
                                        $('#features').val(features);

                                        // Now open the edit modal
                                        $('#editRoomModal').show();
                                        // Add similar lines for other form fields
                                    },
                                    error: function(error) {
                                        console.error("Error editing room: " + error);
                                    }
                                });
                            });
                        });

                       
                    </script>

            <?php 
                //global $room_number1;
                // $room_number1 = "";
                // $room_type = "";
                // $occupancy = "";
                // $bed_type = "";
                // $view_type = "";
                // $price = "";
                // $is_available = "";
                // $description = "";
                // $floor = "";
                // $image_url = "";
                // $features_ids = "";
                // $isMaintain = "";
                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(isset($_POST['edit_room_number'])){
                        $room_number=$_POST['edit_room_number'];
                        echo $room_number;
                        $roomQuery = "SELECT * FROM `rooms` WHERE `room_number` = $room_number";
                        $result = $conn->query($roomQuery);
                        if ($result->num_rows === 1) {
                            $roomData = $result->fetch_assoc();

                            // Build the response array
                            $response = [
                                'room_number' => $roomData['room_number'],
                                'room_type' => $roomData['room_type'],
                                'occupancy' => $roomData['occupancy'],
                                'bed_type' => $roomData['bed_type'],
                                'view_type' => $roomData['view_type'],
                                'price' => $roomData['price'],
                                'is_available' => $roomData['is_available'],
                                'description' => $roomData['description'],
                                'floor' => $roomData['floor'],
                                'image_url' => $roomData['image_url'],
                                'features_ids' => $roomData['features_ids'],
                                'isMaintain' => $roomData['isMaintain'],
                            ];
                    
                            // Send the response as JSON
                            echo json_encode($response);
                        } else {
                            echo json_encode(['error' => 'Room not found']); // Room not found
                        }
                        
                        
                    }
                    else{
                        echo '<script>alert("Not working"); ;</script>';
                    }
                }
                 
               ?>
            <!--Edit modal-->
            <div id="editRoomModal" class="modal">
                <div class="modal-content">
                    
            
                    <span class="close">&times;</span>
                    <h2>Edit Room</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                    <label for="room_number">Room Number:</label>
                        <input type="text" id="room_number" name="room_number" required>
                        
                        <label for="room_type">Room Type:</label>
                        <select id="room_type" name="room_type" required>
                            <option value="standard">Standard</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="suite">Suite</option>
                        </select>
                        
                        <label for="occupancy">Occupancy:</label>
                        <input type="text" id="occupancy" name="occupancy" required>
                        
                        <label for="bed_type">Bed Type:</label>
                        <select id="bed_type" name="bed_type" required>
                            <option value="king">King</option>
                            <option value="queen">Queen</option>
                            <option value="twin">Twin</option>
                        </select>
                        
                        <label for="view_type">View Type:</label>
                        <input type="text" id="view_type" name="view_type">
                        
                        <label for="price">Price per Night:</label>
                        <input type="text" id="price" name="price" step="0.01" required>
                        
                        <label for="availability">Availability:</label>
                        <input type="checkbox" id="availability" name="availability" value="1">
                        
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4"></textarea>
                        
                        <label for="floor">Floor:</label>
                        <input type="text" id="floor" name="floor">
                        
                        <label for="image_url">Image URL:</label>
                        <input type="file" id="image_url" name="room_image_url">
                        
                        <label for="features">Features/Amenities:</label>
                        <select id="features" name="features[]" multiple>
                            <!-- Retrieve feature names from the features table -->
                            <?php
                            $featureQuery = "SELECT id, name FROM features";
                            $featureResult = $conn->query($featureQuery);
                            while ($featureRow = $featureResult->fetch_assoc()) {
                                echo '<option value="' . $featureRow['id'] . '">' . $featureRow['name'] . '</option>';
                            }
                            ?>
                        </select>

                        <button type="submit" name="roomEdit">Edit Room</button>
                    </form>
                </div>
            </div>
            
                <!-- Display existing room data in a table -->
               
            <!--Room Show  -->
            <div class="room-table">
                    <h2>Existing Rooms</h2>
                    
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['delete_room_number'])) {
                            $room_number = $_POST['delete_room_number'];
                            $deleteQuery = "DELETE FROM rooms WHERE room_number=$room_number";

                            if ($conn->query($deleteQuery) === TRUE) {
                                echo "Room deleted successfully: $room_number";
                            } else {
                                echo "Error deleting room: " . $conn->error;
                            }
                        }
                        if (isset($_POST['maintain_room_number'])) {
                            $room_number = $_POST['maintain_room_number'];

                            $toggleQuery = "UPDATE rooms SET isMaintain = CASE WHEN isMaintain = 0 THEN 1 ELSE 0 END WHERE room_number = $room_number";


                            if ($conn->query($toggleQuery ) === TRUE) {
                                echo "Room is under maintain : $room_number";
                            } else {
                                echo "Error maintaining room: " . $conn->error;
                            }
                        }
                    }

                    $selectQuery = "SELECT * FROM rooms";
                    $result = $conn->query($selectQuery);

                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Room Number</th>";
                        echo "<th>Room Type</th>";
                        echo "<th>Occupancy</th>";
                        echo "<th>Bed Type</th>";
                        echo "<th>View Type</th>";
                        echo "<th>Price</th>";
                        echo "<th>Availability</th>";
                        echo "<th>Floor</th>";
                        echo "<th>Features</th>";
                        echo "<th>Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['room_number'] . "</td>";
                            // ... (rest of your table row data)
                            echo "<td>" . $row['room_type'] . "</td>";
                            echo "<td>" . $row['occupancy'] . "</td>";
                            echo "<td>" . $row['bed_type'] . "</td>";
                            echo "<td>" . $row['view_type'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td class='availability'>" . ($row['isMaintain'] ? 'No' : 'Yes') . "</td>";
                            echo "<td>" . $row['floor'] . "</td>";

                            $featureIdsArray = explode(',', $row['features_ids']);
                            $featureNames = [];

                            $featureQuery = "SELECT name FROM features WHERE id IN (" . implode(',', $featureIdsArray) . ")";
                            $featureResult = $conn->query($featureQuery);
                            while ($featureRow = $featureResult->fetch_assoc()) {
                                $featureNames[] = $featureRow['name'];
                            }
                            $featuresString = implode(', ', $featureNames);
                            //$room_number=$row['room_number'];
                            echo "<td>" . $featuresString . "</td>";
                            echo "<td>";
                            //echo "<button class='btn btn-primary edit-room' id='editRoomBtn' data-room-number='" . $row['room_number'] . "'><i class='fa fa-pencil' aria-hidden='true'></i></button>";
                            echo "<button class='btn btn-danger delete-room' data-room-number='" . $row['room_number'] . "'><i class='fa fa-trash' aria-hidden='true'></i></button>";
                            echo "<button class='btn btn-danger maintain-room' data-room-number='" . $row['room_number'] . "'><i class='fa fa-wrench' aria-hidden='true'></i></button>";
                            

                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>No rooms found</p>";
                    }
                    ?>
            </div>
 
            
        </section>

        <!-- Facility -->
        <section id="Facilities" style="display: none;">
            <div class="facilities-container">
                <h1 class="text-alignment-center">Facilities</h1>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                        if(isset($_POST['FacilityAdd'])){
                            $Facility=$_POST['Facility'];
                            $des=$_POST['des'];
                            try{
                                $query="INSERT INTO `features` (`id`, `name`,`description`) VALUES (NULL, '$Facility','$des')";
                                if ($conn->query($query) === TRUE) {
                                    
                     
                                } else {
                                    throw new Exception("Error: " . $conn->error);
                                }
                            } catch (Exception $e) {
                               
                            }

                        }

                    }
                   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                        if (isset($_POST['delete_features_number'])) {
                            $id = $_POST['delete_features_number'];
                            $deleteQuery = "DELETE FROM features WHERE id=$id";
                            
                            if ($conn->query($deleteQuery) === TRUE) {
                            } else {
                                echo "Error deleting room: " . $conn->error;
                            }
                        }
                   }
                ?>
                <!-- Add Facility Form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <!-- Facility name, description, icon selection, etc. -->
                        <label for="occupancy">Name of the Facility:</label>
                        <input type="text" id="Facility" name="Facility" class="" required>

                        <label for="occupancy">Add Description:</label>
                        <input type="text" id="des" name="des" class="" required>
                        <button type="submit" name="FacilityAdd">Add Facility</button>
                </form>

                <table class="facility-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Retrieve existing facility data from the database
                    $selectQuery = "SELECT * FROM `features`";
                    $result = $conn->query($selectQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>';
                            echo "<button class='btn btn-danger delete-facility' data-facility-id='" . $row['id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></button>";
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='3'>No facilities found</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <script>
                    $(document).ready(function() {
                        // Delete facility
                        $('button.delete-facility').click(function() {
                            var facilityId = $(this).data('facility-id');
                            var button = $(this);

                            if (confirm("Are you sure you want to delete this facility?")) {
                                $.ajax({
                                    type: "POST",
                                    url: "admin.php",
                                    data: { delete_features_number: facilityId },
                                    success: function(response) {
                                        // Update the page as needed, e.g., remove the deleted facility from the list
                                        button.closest('tr').remove();
                                    },
                                    error: function(error) {
                                        console.error("Error deleting facility: " + error);
                                    }
                                });
                            }
                        });

                    });
                   
            </script>
                

        </section>

        <!-- Users -->
        <section id="users" style="display: none;">
                <h1>Users Details</h1>
            <div class="users-container">
               
                <div class="users-table">
                <?php
                     $selectQuery = "SELECT * FROM table_user";
                     $result = $conn->query($selectQuery);
                     $cnt=1;
                     if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr><th>Sl No.</th><th>User Name</th><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Gender</th></tr>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $cnt++ . '</td>';
                            echo '<td>' . $row['user_name'] . '</td>';
                            echo '<td>' . $row['full_name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['ph_no'] . '</td>';
                            echo '<td>' . $row['gender'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';

                     }
                     
                    else {
                        echo 'No records found.';
                    }
                ?>
                </div>

            </div>
        </section>

        <!-- Booking -->
        <section id="Booking" style="display: none;">
            <h1>Booking Details</h1>
            <div class="booking-container">
                <div class="booking-table">
                    <?php
                         $selectQuery = "SELECT * FROM bookings";
                         $result = $conn->query($selectQuery);
                         $cnt=1;
                         if($result->num_rows > 0) {
                            echo '<table>';
                            echo '<tr><th>Sl No.</th><th>Booking ID</th><th>User Name</th><th>Room Number</th><th>Check-In Date</th><th>Check-Out Date</th><th>Booking Time</th><th>Guests</th><th>Total Price</th><th>Cancel Status</th></tr>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $cnt++ . '</td>';
                                echo '<td>' . $row['booking_id'] . '</td>';
                                //echo '<td>' . $row['user_name'] . '</td>';
                                echo '<td><a data-section="users" onclick="showSection(\'users\')">' . $row['user_name'] . '</a></td>';
                                //echo '<td>' . $row['room_number'] . '</td>';
                                echo '<td><a data-section="rooms" onclick="showSection(\'rooms\')">' . $row['room_number'] . '</a></td>';
                                echo '<td>' . $row['check_in_date'] . '</td>';
                                echo '<td>' . $row['check_out_date'] . '</td>';
                                echo '<td>' . $row['booking_date'] . '</td>';
                                echo '<td>' . $row['guests'] . '</td>';
                                echo '<td>' . $row['total_price'] . '</td>';
                                //echo '<td>' . $row['iscancel'] . '</td>';
                                echo "<td>";
                                            if (isset($row['iscancel']) && $row['iscancel'] == 1) {
                                                echo "Cancel";
                                            } else {
                                                echo "No Cancel";
                                            }
                                            echo "</td>";
                                echo '</tr>';
                            }
                            echo '</table>';
                        } else {
                            echo 'No data found';
                        }
                    ?>
                </div>
            </div>
                   
        </section>

        <!-- Refund -->
        <section id="Refund" style="display: none;">
            <h1>Refund Details</h1>
            <div class="users-container">
            
                <div class="users-table">
                <?php
                     $selectQuery = "SELECT * FROM refunds";
                     $result = $conn->query($selectQuery);
                     $cnt=1;
                     if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr><th>Sl No.</th><th>refund_id</th><th>booking_id</th><th>Refund amount</th><th>cancel date</th><th>Refund Status</th><th>Action</th></tr>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $cnt++ . '</td>';
                            echo '<td>' . $row['refund_id'] . '</td>';
                            //echo '<td>' . $row['booking_id'] . '</td>';
                            echo '<td><a  data-section="Booking" onclick="showSection(\'Booking\')">' . $row['booking_id'] . '</a></td>';


                            echo '<td>' . $row['refund_amount'] . '</td>';
                            echo '<td>' . $row['cancel_date'] . '</td>';
                            echo "<td>";
                            if (isset($row['isrefund']) && $row['isrefund'] == 1) {
                                echo "Yes";
                            } else {
                                echo "No";
                            }
                            echo "</td>";
                            echo '<td>';
                                echo '<form method="POST">';
                                echo "<button class='btn btn-success' name='refund_action' type='submit' value='" . $row['booking_id'] . "'>";
                                echo "<i class='fa fa-credit-card' aria-hidden='true'></i> Refund";
                                echo '</button>';
                                echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';

                     }
                     
                    else {
                        echo 'No records found.';
                    }
                ?>
                </div>

            </div>
        </section>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
</body>
</html>