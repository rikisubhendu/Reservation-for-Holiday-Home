<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="captcha.css">
    <link rel="stylesheet" href=
"https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity=
"sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
        crossorigin="anonymous">
        <style>
            #image{
    margin-top: 10px;
    box-shadow: 5px 5px 5px 5px gray;
    width: 60px;;
    padding: 20px;
    font-weight: 400;
    padding-bottom: 0px;
    height: 40px;
    user-select: none;
    text-decoration:line-through;
    font-style: italic;
    font-size: x-large;
    border: red 2px solid;
    margin-left: 10px;
     
}
#user-input{
    box-shadow: 5px 5px 5px 5px gray;
    width:auto;
       margin-right: 10px;
    padding: 10px;
    padding-bottom: 0px;
    height: 40px;
       border: red 0px solid;
}
input{
    border:1px black solid;
}
.inline{
    display:inline-block;
}
#btn{
    box-shadow: 5px 5px 5px grey;
    color: aqua;
    margin: 10px;
    background-color: brown;
}
</style>
    
</head>
 
<body onload="generate()">
    <div id="user-input" class="inline">
        <input type="text"
               id="submit"
               placeholder="Captcha code" />
    </div>
 
    <div class="inline" onclick="generate()">
        <i class="fas fa-sync"></i>
    </div>
 
    <div id="image"
         class="inline"
         selectable="False">
    </div>
    <input type="submit"
           id="btn"
           onclick="printmsg()" />
 
    <p id="key"></p>

    <script>

let captcha;
function generate() {
 
    // Clear old input
    document.getElementById("submit").value = "";
 
    // Access the element to store
    // the generated captcha
    captcha = document.getElementById("image");
    let uniquechar = "";
 
    const randomchar =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
 
    // Generate captcha for length of
    // 5 with random character
    for (let i = 1; i < 5; i++) {
        uniquechar += randomchar.charAt(
            Math.random() * randomchar.length)
    }
 
    // Store generated input
    captcha.innerHTML = uniquechar;
}
 
function printmsg() {
    const usr_input = document
        .getElementById("submit").value;
 
    // Check whether the input is equal
    // to generated captcha or not
    if (usr_input == captcha.innerHTML) {
        let s = document.getElementById("key")
            .innerHTML = "Matched";
        generate();
    }
    else {
        let s = document.getElementById("key")
            .innerHTML = "not Matched";
        generate();
    }
}
    </script>
</body>
</html>
-->
<?php
session_start();

// Function to generate a random CAPTCHA string
function generateRandomCaptcha($length = 6) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['captcha'];
    $captchaString = $_SESSION['captcha'];

    if ($userInput === $captchaString) {
        $message = "Matched";
        $_SESSION['captcha'] = generateRandomCaptcha();
    } else {
        $message = "Not Matched";
        $_SESSION['captcha'] = generateRandomCaptcha();
    }
} else {
    // Initialize CAPTCHA on first load
    $_SESSION['captcha'] = generateRandomCaptcha();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with CAPTCHA (PHP)</title>
    <style>
        #image {
            margin-top: 10px;
            box-shadow: 5px 5px 5px 5px gray;
            width: 60px;
            padding: 20px;
            font-weight: 400;
            padding-bottom: 0px;
            height: 40px;
            user-select: none;
            text-decoration: line-through;
            font-style: italic;
            font-size: x-large;
            border: red 2px solid;
            margin-left: 10px;
        }

        #user-input {
            box-shadow: 5px 5px 5px 5px gray;
            width: auto;
            margin-right: 10px;
            padding: 10px;
            padding-bottom: 0px;
            height: 40px;
            border: red 0px solid;
        }

        input {
            border: 1px black solid;
        }

        .inline {
            display: inline-block;
        }

        #btn {
            box-shadow: 5px 5px 5px grey;
            color: aqua;
            margin: 10px;
            background-color: brown;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <div>
           <span id="image"><?php echo $_SESSION['captcha']; ?></span>
        </div>
        <div>
            <label for="captchaInput">Enter CAPTCHA: </label>
            <input type="text" id="user-input" name="captcha" required>
        </div>
        <div>
            <button type="submit" id="btn">Submit</button>
        </div>
        <div>
            <p id="key"><?php echo isset($message) ? $message : ''; ?></p>
        </div>
    </form>
</body>
</html>
