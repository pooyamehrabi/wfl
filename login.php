<?php
require_once("config.php");
$message = '';
$success_message = '';
$error_message   = '';

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout") {
    session_start();
    session_destroy();
    unset($_SESSION);
    session_regenerate_id(true);
    header("Location: https://wfl.ir");
    die();
}

if(isset($_REQUEST["message"]) && $_REQUEST["message"] == "success") {
    $success_message = "<div class='alert alert-success text-center mt-3'> حساب کاربری شما با موفقیت ایجاد شد. </div>";
}

if (isset($_REQUEST["message"])) {
    $error_message = "You Successfully Logged out";
}

if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    
    $sql_string = "SELECT * FROM Users WHERE username='$username';";
    $result = $conn->query($sql_string);
    $row = $result->fetch_assoc();
    
    if ($row["password"] == $password) {
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["type"] = $row["type"];
        $_SESSION["username"] = $username;
        $_SESSION["mobile"] = $row["mobile"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["permissions"] = json_decode($row["permissions"], true);
        $_SESSION["settings"] = $row["settings"];

        switch ($_SESSION["type"]) {
            case 'admin':
                header("Location: ./users/admin/dashboard.php");
                break;
            
            case 'student':
                if($row["mobile_verified"]) {
                    header("Location: ./users/student/profile.php");
                    die();
                } else {
                    header("Location: ./users/student/check_mobile_verification.php");
                    die();
                }
                break;
            
            case 'teacher':
                break;
            
            case 'employee':
                break;
            
            default:
                break;
        }
        die();
    } else {
        $error_message = "<div class='alert alert-danger text-center mt-3'>نام کاربری یا رمز عبور اشتباه وارد شده است.</div>";
    }    
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Work For Living" name="description" />
        <meta content="WFL" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <?php require_once("include/style.php"); ?>

        <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
        <title>ورود</title>
    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="index.html">
                                <span><img src="assets/images/logo-dark.png" alt="" height="60"></span>
                            </a>
                        </div>
                        <?php echo $success_message; ?>
                        <?php echo $success_message; ?>

                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">ورود</h4>
                                </div>

                                <form action="login.php" method="POST" onsubmit="return loginsubmit()">
                                    <div class="form-group mb-3">
                                        <label for="username">نام کاربری یا ایمیل</label>
                                        <input class="form-control" type="text" name="username" id="username" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">رمز ورود</label>
                                        <input class="form-control" type="password" name="password" id="password" required>
                                    </div>

                                    <div style="margin: 0 0 20px; text-align:center;"><div class="g-recaptcha" data-sitekey="6LfyIwwUAAAAABNwVVcouu6qJjBYQ-1yyzCbAAu5"></div></div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-green btn-block" type="submit"> ورود </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="recoverpw.html" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>رمز خود را فراموش کرده اید؟</a></p>
                                <p class="text-muted">اکانت ندارید؟ <a href="register.php" class="text-dark ml-1"><b>ثبت نام</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        1398 &copy; <a href="">مدرسه موفقیت</a> با <i class="fas fa-heart" style="color: red"></i>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="https://wfl.ir/about-us/">درباره ما</a>
                            <a href="https://wfl.ir/contact/">تماس با ما</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        <script>
        function loginsubmit() {
            return true;
            if (grecaptcha.getResponse() == ""){
                alert("کپچا وارد نشده است.");
                return false;
            }
            return true;
        }
        </script>
    </body>
</html>