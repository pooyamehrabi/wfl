<?php
require_once("config.php");
$success_message = "";
$error_message = "";

if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $mobile    = $_POST['mobile'];
    $email     = $_POST['email'];
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    
    $conn = new mysqli($db_server, $db_username, $db_password, $db_database);
    $query = "INSERT INTO users (firstname, lastname, mobile, email, username, password)
                        VALUES ('$firstname', '$lastname', '$mobile', '$email', '$username', '$password');";

    if ($conn->query($query) === true) {
        header('Location: login.php?message=success');
        die();
    } elseif (strpos($conn->error, 'Duplicate entry') !== false) {
        if (strpos($conn->error, 'username')) {
            $error_message .= "<div class='alert alert-danger text-center mt-3'> نام کاربری موجود است. </div>";
        }
        
        if (strpos($conn->error, 'email')) {
            $error_message .= "<div class='alert alert-danger text-center mt-3'> ایمیل موجود است. </div>";
        }

        if (strpos($conn->error, 'mobile')) {
            $error_message .= "<div class='alert alert-danger text-center mt-3'> موبایل موجود است. </div>";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once("include/head.php"); ?>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

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
                        <?php echo $error_message; ?>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">ثبت نام</h4>
                                </div>

                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <form action="#" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="firstname">نام</label>
                                                        <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $_REQUEST["firstname"]; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="lastname">نام خانوادگی</label>
                                                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $_REQUEST["lastname"]; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="mobile">موبایل</label>
                                                        <input class="form-control" type="tel" name="mobile" id="mobile" value="<?php echo $_REQUEST["mobile"]; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="email">ایمیل</label>
                                                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $_REQUEST["email"]; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="username">نام کاربری</label>
                                                        <input class="form-control" type="text" name="username" id="username" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="reg-password">رمز</label>
                                                        <input class="form-control" type="password" name="password" id="reg-password" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0 text-center">
                                                    <button class="btn btn-green btn-block" type="submit">ثبت نام</button>
                                                </div>
                                            </form>
                                            <!-- end row -->
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">عضو هستید؟ <a href="login.html" class="text-dark ml-1"><b>ورود</b></a></p>
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

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>