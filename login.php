<?php
if(isset($_REQUEST["message"]) && $_REQUEST["message"] == "success") {
    $success_message = "<div class='alert alert-success text-center mt-3'>
        حساب کاربری شما با موفقیت ایجاد شد.
        </div>";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ورود</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app-rtl.min.css" rel="stylesheet" type="text/css" />
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
                        <?php echo $success_message; ?>

                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">ورود</h4>
                                </div>

                                <form action="#">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">نام کاربری یا ایمیل</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">رمز ورود</label>
                                        <input class="form-control" type="password" name="password" id="password" required>
                                    </div>

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

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>