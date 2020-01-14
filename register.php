<?php
require_once("config.php");
if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    $conn = new mysqli($server, $username, $password, $database);
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (firstname, lastname, mobile, email, password)
                        VALUES ('$firstname', '$lastname', '$mobile', '$email', '$password');";
    var_dump($query);

    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
                            <p class="text-muted mt-2 mb-4">مدرسه موفقیت</p>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">ثبت نام</h4>
                                </div>
                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <form action="#">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="firstname">نام</label>
                                                                        <input class="form-control" type="text" name="firstname" id="firstname" required>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="lastname">نام خانوادگی</label>
                                                                        <input class="form-control" type="text" name="lastname" id="lastname" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="mobile">موبایل</label>
                                                                        <input class="form-control" type="email" name="mobile" id="mobile" required>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="email">ایمیل</label>
                                                                        <input class="form-control" type="email" name="email" id="email" required>
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