<?php
if(isset($_POST['btn'])){
    $to=$_post['to'];
    $sub=$_post['subject'];
    $msg=$_post['message'];
    $headers="test";
    if(mail( $to, $sub, $msg, $headers)){
        echo "Suceessfull";
    }
    else{
        echo "Fail";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Contact Form</h2>
    <form method="post" >
        <label for="to">To:</label>
        <input type="email" id="to" name="to" required><br><br>
        
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        
        <input type="submit" value="Send Email" name="btn">
    </form>
</body>
</html>