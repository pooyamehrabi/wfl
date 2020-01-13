<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
    require_once("include/head.php");
    ?>
    </head>

    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="fas fa-home h2 text-dark"></i></a>
        </div>

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

                                <form action="#">

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="fullname">نام</label>
                                            <input class="form-control" type="text" name="firstname" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="fullname">نام خانوادگی</label>
                                            <input class="form-control" type="text" name="lastname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>موبایل</label>
                                            <input class="form-control" type="email" name="mobile" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="emailaddress">ایمیل</label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="password">رمز</label>
                                            <input class="form-control" type="password" name="password" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password">تکرار رمز</label>
                                            <input class="form-control" type="password" name="password-repeat" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">ثبت نام</button>
                                    </div>

                                </form>

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