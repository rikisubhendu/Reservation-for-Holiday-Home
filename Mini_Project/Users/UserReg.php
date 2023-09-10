<?php
    session_start();
    require("../inc/connection.php");
    
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(isset($_POST['user_reg'])){
        $full_name=sanitizeInput($_POST['full_name']);
        $user_name=sanitizeInput($_POST['user_name']);
        $email=sanitizeInput($_POST['email']);
        $ph_no=sanitizeInput($_POST['ph_no']);
        $gender=sanitizeInput($_POST['gender']);
        $pass=sanitizeInput($_POST['pass']);
        $Rpass=sanitizeInput($_POST['Rpass']);

       $errors =array();

        if(!preg_match('/^[0-9]{10}+$/', $ph_no)) {
            $errors[] ="Invalid Phone Number";
        } 
        if (empty($pass)) {
            $errors[] = "Password is required.";
        } elseif (strlen($pass) < 10 || strlen($pass) > 14) {
            $errors[] = "Password must be between 10 and 14 characters.";
        } elseif (!preg_match('/[A-Za-z]/', $pass) || !preg_match('/[0-9]/', $pass) || !preg_match('/[^A-Za-z0-9]/', $pass)) {
            $errors[] = "Password must include at least one letter, one number, and one special character.";
        }

        if ($pass !== $Rpass) {
            $errors[] = "Passwords do not match.";
        }
        
        $md_pass=md5($pass);
        if (count($errors) === 0) {
            try{
                $query="INSERT INTO `table_user` (`user_name`, `full_name`, `email`, `ph_no`, `gender`, `pass`) VALUES ('$user_name', '$full_name', '$email', '$ph_no', '$gender', '$md_pass')";
           
                if ($conn->query($query) === TRUE) {?>
                    <div class="alert alert-success" role="alert">
                        SuccessFully register!!!
                        <button type="button" class="close-alert-btn" onclick="closeAlert(this)" >
                        <?php 
                            $_SESSION['is_user_login']=true;
                            $_SESSION['user_name']=$user_name;
                            header("Location: UserPage.php");?>

                            <span>&times;</span>
                        </button>
                    </div>
                <?php
                } else {
                    throw new Exception("Error: " . $conn->error);
                }
    
            }catch(Exception $e){?>
                <div class="alert alert-danger" role="alert">
                    Something is wrong: <?php echo $e->getMessage(); ?>
                    <button type="button" class="close-alert-btn" onclick="closeAlert(this)">
                        <span>&times;</span>
                    </button>
                </div>
            <?php }
    
        }
        else{
                foreach ($errors as $error) {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="close-alert-btn" onclick="closeAlert(this)">
                            <span>&times;</span>
                        </button>
                    </div>
                <?php
                }
        } 
       
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="UserReg.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <?php  require("../inc/links.php");?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <div class="title">Registration For New User</div>
            <div class="content">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?> "  method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="full_name"  placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" name="user_name"  placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" name="email"  placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" name="ph_no"  placeholder="Enter your number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="pass"  placeholder="Enter your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" name="Rpass"  placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" value="M" id="dot-1">
                        <input type="radio" name="gender" value="F" id="dot-2">
                        <input type="radio" name="gender" value="NOT" id="dot-3">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender" value="M">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender" value="F">Female</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender" vvalue="Not">Prefer not to say</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="button">
                        <input type="submit" name="user_reg" value="Register">
                    </div>

            </form>
        </div>
    </div>
    <script src="UserReg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>