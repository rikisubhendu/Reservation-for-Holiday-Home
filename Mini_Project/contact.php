
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        <h2 class="fw-bold h-font text-center">Contact us</h2>
        <!-- <p class="text-center mt-4">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Sit eius reiciendis amet voluptas quasi voluptates <br>alias
             numquam aperiam beatae necessitatibus.
        </p> -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5>Contact Information</h5>
                <p>If you have any questions or need assistance, feel free to get in touch with us.</p>
                <address>
                    <strong>Hotel Reservation Services</strong><br>
                    123 Main Street<br>
                    City, Country<br>
                </address>
            </div>
            <div class="col-lg-4">
                <h5>Call Us</h5>
                <p>For reservations and inquiries, you can reach us at:</p>
                <a href="tel:+911234567">+91 123-4567</a>
            </div>
            <div class="col-lg-4">
                <h5>Email Us</h5>
                <p>If you prefer email, you can also send us a message at:</p>
                <a href="mailto:info@example.com">info@example.com</a>
            </div>
        </div>
    </div>
    <?php require("inc/footer.php")?>
</body>
</html>