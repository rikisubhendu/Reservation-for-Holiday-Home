<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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
<body>
    <?php require("inc/navBar.php")?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">About us</h2>
        <p class="text-center mt-4">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Sit eius reiciendis amet voluptas quasi voluptates <br>alias
             numquam aperiam beatae necessitatibus.
        </p>
    </div>
    <div class="container">
        <div class="row justify-content-between align-item-center">
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3">Lorem, ipsum dolor sit </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Nobis sed dolore sequi voluptate rerum. 
                    Iste unde earum ab eum eaque exercitationem. 
                    Accusamus impedit quia nihil consequatur nesciunt officia quaerat officiis.
                </p>

            </div>
            <div class="col-lg-5 col-md-5 mb-4">
                    <img src="images/owner.jpg" class="w-100 h-100">
            </div>

        </div>
    </div>
    <?php require("inc/footer.php")?>
</body>
</html>