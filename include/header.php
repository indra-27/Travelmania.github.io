<!-- Navigation Bar-->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 font" href="index.php" style="left:10px;position:relative;">
            <h3> <span style="color:#4ECCA3;">Travel</span><span style="color:#EEEEEE;">Mania</span> </h3>
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="morehotels.php">Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="hangouts.php">Hangout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="aboutus.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php 
                 if(isset($_SESSION['login'])&& isset($_SESSION['login'])==true)
                 {
                     echo <<<data
                     <div class="dropdown">
                     <button class="btn btn-outline-light shadow-none me-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       $_SESSION[email]
                     </button>
                     <ul class="dropdown-menu">
                       <li><a class="dropdown-item" href="logoutuser.php">Logout</a></li>
                     </ul>
                     </div>
                     data;
                 }
                 else{
                    echo <<<data
                    <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginmodel">Login</button>
                    <button type="button" class="btn btn-outline-light shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registermodel">Register</button>
                    data;
                 }
                ?>
                
            </div>

        </div>
    </div>
</nav>
<!--Login Model-->
<div class="modal fade" id="loginmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" id="log_form" action="ajax/regdetails.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center"><i
                            class="bi bi-person-fill fs-4 me-3"></i>Login</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control shadow-none" required
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pwd" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-dark shadow-none" name="login">Login</button>
                        <button type="button" class="btn text-secondary shadow-none text-decoration-none p-0" data-bs-toggle="modal" data-bs-target="#forgotmodel">Forgot Password?</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Registration Model-->
<div class="modal fade" id="registermodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <form class="" id="reg_form" action="ajax/regdetails.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 d-flex align-items-center"><i
                                        class="bi bi-person-plus-fill fs-4 me-3"></i>Register</h1>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control shadow-none" name="fname" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control shadow-none" name="lname" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" class="form-control shadow-none" name="phno" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none" name="email" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-10 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" name="addr" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Pin Code</label>
                                    <input type="number" class="form-control shadow-none" name="pc" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">DOB</label>
                                    <input type="date" class="form-control shadow-none" name="dob" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none" name="pass" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control shadow-none" name="cpass" value=""
                                        required>
                                </div>
                            </div>
                            <div class="">
                                <br>
                                <button type="submit" class="btn btn-dark mb-3 shadow-none" name="rbutton">Register
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Forgot modal-->
<div class="modal fade" id="forgotmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" id="log_form" action="ajax/regdetails.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center"><i
                            class="bi bi-person-fill fs-4 me-3"></i>Forgot Password</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="uemail" class="form-control shadow-none" required
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Update Password</label>
                        <input type="password" name="upwd" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-dark shadow-none" name="updatepwd">Update!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>