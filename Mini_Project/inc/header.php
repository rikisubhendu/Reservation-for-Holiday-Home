
<?php
    require("connection.php");
?>
<nav class="navbar  navbar-expand-lg navbar-light   me-3 px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 mb-9 fw-bold fs-3 h-font" href="index.php">TAJ Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav col-mb-2 me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link me-5 col-mb-2 fw-bold active" aria-current="page" href="#">Rooms</a>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#LoginModel">
                    Login
                </button>
                <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#AdminModel">
                   Admin
                </button>
            </div>
        </div>
    </nav>

    <!-- Modal For login-->
    <div class="modal fade" id="LoginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header d-flex align-item-center">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <i class="bi bi-person-fill  me-2"> User Login </i>
                        </h5>
                        <button type="reset" class="btn-close shdaw-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">User ID</label>
                            <input type="email" class="form-control"  >
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control"  >
                        </div>
                        <div class="d-flex  justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="UserReg.php" class="text-secondary alin text-decoration-none ">Sign up</a>
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
                <form action="#" method="post">
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
                        <div class="d-flex  justify-content-between mb-2">
                            <button name="login_admin" type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['login_admin'])){
            $id=$_POST["admin_id"];
            $pass=$_POST["admin_pass"];
            $query="SELECT * FROM `hotel_admin` WHERE admin_id='$id' AND admin_pass='$pass'";
            $result=mysqli_query($con,$query);

            if(mysqli_num_rows($result)==1){
                echo ("Hello word");
            }
					


        }
    ?>
