<?php
    require("inc/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAJ HOTEL_Facility</title>
    <?php   require("inc/links.php");?>
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
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Facility</h2>
        <p class="text-center mt-4">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Sit eius reiciendis amet voluptas quasi voluptates <br>alias
             numquam aperiam beatae necessitatibus.
        </p>
    </div>
    <div class="container">
        <div class="row">
           
                
                    <?php 
                        $query="SELECT * FROM `features`";
                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4 col-md-6 mb-5 px-4">';
                            echo '<div class="bg-white rounded shadow p-4 border-top border-4 border-dark">';

                            echo ' <h5 class="text-center">'. $row['name'] .'</h5>';
                            echo '<p>
                                    '. $row['description'] .'
                                </p>';
                            echo '</div>';
                            echo '</div>';

                        }
                    ?>
                
                
            </div>
        </div>
    </div>
    <?php require("inc/footer.php")?>

</body>
</html>