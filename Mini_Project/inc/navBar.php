<?php
require("connection.php");
session_start();

        function error($str){
            echo '<script>alert("' . $str . '"); </script>';
        }
        if(isset($_POST['login_admin'])){
            
            $id=$_POST["admin_id"];
            $pass=$_POST["admin_pass"];
            $userInputCap = $_POST['captcha'];
            $captchaString = $_SESSION['captcha'];
            
            if ($userInputCap === $captchaString) {
                // CAPTCHA verification passed, you can proceed with the login logic here
                $query="SELECT * FROM `hotel_admin` WHERE admin_id='$id' AND admin_pass='$pass'";
                $result=$conn->query($query);

                if($result->num_rows==1){
                    
                    $_SESSION['is_admin_login']=true;
                    $_SESSION['admin_id']=$id;
                    header("Location: Admin/admin.php");
                }
                else{
                    error("Login fail") ;
                }
             
            } else {
                // CAPTCHA verification failed, show an error message
                error("CAPTCHA verification failed. Please try again.") ;
            }
            
        }

        if(isset($_POST['login_user'])){
            
            $id=$_POST["user_name"];
            $pass=md5($_POST["pass"]);
            $userInputCap = $_POST['captcha'];
            $captchaString = $_SESSION['captcha'];
                if ($userInputCap === $captchaString) {
                    // CAPTCHA verification passed, you can proceed with the login logic here
                    $query="SELECT * FROM `table_user` WHERE user_name='$id' AND pass='$pass'";
                    $result=$conn->query($query);

                    if($result->num_rows==1){
                        
                        $_SESSION['is_user_login']=true;
                        $_SESSION['user_name']=$id;
                        header("Location: Users/UserPage.php");
                    }
                    else{
                        error("Login fail");
                    }
                
                } else {
                    // CAPTCHA verification failed, show an error message
                    error("CAPTCHA verification failed. Please try again.") ;
                }
        }

            
        

        
    
?>
<style>

.navbar-icon {
  width: 60px; /* Adjust the width to your desired size */
  height: auto; /* Automatically adjust the height to maintain aspect ratio */
}

/* Make the image responsive */
@media (max-width: 768px) { /* You can adjust the breakpoint as needed */
  .navbar-icon {
    width: 30px; /* Adjust the width for smaller screens */
  }
}
</style>
<nav class="navbar  navbar-expand-lg navbar-light   me-3 px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <div class="imageDiv">
                <a href="index.php">
                    <img src="images/icon.png" class="navbar-icon me-5 mb-9 fs-3" href="index.php">
                <a>
            </div>
            <!-- <a class="navbar-brand me-5 mb-9 fw-bold fs-3 h-font" href="index.php">TAJ Hotel</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav col-mb-2 me-5 mb-2 mb-lg-0 ">
                        <li class="nav-item">
                        <a class="nav-link me-5 col-mb-2 fw-bold active" aria-current="page" href="room.php">Rooms</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link me-5 col-mb-2 fw-bold active" aria-current="page" href="facility.php">Facility</a>
                        </li>
                    
                        <li class="nav-item">
                        <a class="nav-link me-5 col-mb-2 fw-bold active" aria-current="page" href="#">About </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Contact us</a>
                        </li>
                    </ul>
                </div>
                    <!-- Button trigger modal -->
                    <form action="logout.php" method="post" class="d-flex justify-content-between">
                        <?php 
                        if(isset($_SESSION['is_user_login']) && $_SESSION['is_user_login'] === true){
                            echo '<a href="Users/UserPage.php" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Home</a>';
                                echo '<button type="submit"  class="btn btn-outline-dark shadow-none me-lg-3 me-2" >
                                Logout
                                </button>';
                                
                                
                        }
                        
                        else{
                            echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2 ml-auto order-md-2" data-bs-toggle="modal" data-bs-target="#LoginModel">
                            Login
                            </button>';
                            echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#AdminModel">
                                Admin
                            </button>';
                        }
                    echo '</form>'; 
                        ?>
            
        </div>
    </nav>

    <!-- Modal For login-->
    <div class="modal fade" id="LoginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="modal-header d-flex align-item-center">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <i class="bi bi-person-fill  me-2"> User Login </i>
                        </h5>
                        <button type="reset" class="btn-close shdaw-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">User ID</label>
                            <input type="text"  name="user_name" class="form-control"  >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control"  >
                        </div>

                        <div class="mb-3">
                            
                            <?php require("capture.php") ?>
                            <div class="captcha-container">
                                <span id="image"><?php echo $captchaString; ?></span>
                            </div>
                            <label class="form-label">Capture</label>
                            <input type="text" id="captcha" name="captcha" class="form-control" required >
                        </div>
                    

                        <div class="d-flex  justify-content-between mb-2">
                            <button type="submit"  name="login_user" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="Users/UserReg.php" class="text-secondary alin text-decoration-none ">Sign up</a>
                            <a href="javascript: void(0)" class="text-secondary  text-decoration-none ">Forgot Password?</a>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Admin Modal-->
    <div class="modal fade" id="AdminModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="modal-header d-flex align-item-center">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <i class="bi bi-person-fill-gear me-3">Admin Login</i>
                        </h5>
                            <button type="reset" class="btn-close shdaw-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">Admin ID</label>
                            <input name="admin_id" type="text" class="form-control"  >
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input name="admin_pass" type="password" class="form-control"  >
                        </div>
                        <div class="mb-3">
                            
                            <div class="captcha-container">
                                <span id="image"><?php echo $captchaString; ?></span>  
                            </div>
                            <label class="form-label">Capture</label>
                            <input type="text" id="captcha" name="captcha" class="form-control" required >
                        </div>
                        <div class="d-flex  justify-content-between mb-2">
                            <button name="login_admin" type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    
