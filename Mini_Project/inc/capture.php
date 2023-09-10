<?php


// Function to generate a random string of a specified length
function generateRandomString($length = 2) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}


// Generate and store the CAPTCHA text
$captchaString = generateRandomString(2);
$_SESSION['captcha'] = $captchaString;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with CAPTCHA</title>
    <style>
        /* Style the CAPTCHA container with a mixed color background and solid background color */
        .captcha-container{
            transform: skewX(-15deg);
        }
        #image {
            margin-top: 20px;
           
            padding: 10px;
            font-weight: 400;
            padding-bottom: 0px;
            height: 40px;
            user-select: none;
            text-decoration: line-through;
            font-style: italic;
            font-size: x-large;
            margin-left: 10px;
        }
        .captcha {
            display: inline-block;
            padding: 10px;
            font-size: 18px;
            transform: skewX(-15deg); /* Apply skew transformation */
            background: linear-gradient(45deg, #FF5733, #33FF57, #5733FF); /* Mixed color gradient background */
            -webkit-background-clip: text; /* Clip text to background */
            background-clip: text;
            color: transparent; /* Hide the text color */
            background-color: #f0f0f0; 
            border: 1px solid #ccc;
             
        }

        /* Style the input field */
        #captcha {
            font-size: 16px;
            padding: 5px;
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            /* //margin: 10px auto;  */
        }
       
        /* #captchaInput {
           /* Center the input field horizontally */
         
    </style>
</head>
<body>
    
</body>
</html>
