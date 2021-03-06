<?php
require_once("../../config.php");

$username = $_SESSION["username"];
$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * FROM Users WHERE username='{$username}';";
$result = $conn->query($query);
$user = $result->fetch_assoc();
$query = "UPDATE Users 
          SET firstname='$firstname', lastname='$lastname', birthday='$birthday', mobile='$mobile', phone='$phone', email='$email', family_phone='$family_phone', address='$address', study_field='$study_field', job_title='$job_title', experience='$experience', about='$about'
          WHERE username='$username';";

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
    <title>پروفایل - <?php echo $user["firstname"] . " " . $user["lastname"] ?></title>

    <?php require_once("../../include/style.php"); ?>
    
</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo $crmbase_url; ?>" class="logo text-center">
                        <span class="logo-lg">
                            <img src="../../assets/images/logo-light.png" alt="" height="40">
                        </span>
                        <span class="logo-sm">
                            <img src="../../assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <div style="position: absolute;left: 20px;font-size: 30px;top: 18px;"><a href="../../login.php?action=logout"><i class="fas fa-power-off" style="color: white;" title="خروج"></i></a></div>

            </div> <!-- end container-fluid-->
        </div>
        <!-- end Topbar -->

        <div class="topbar-menu">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <p class="my-2"><i class="mdi mdi-view-dashboard m-1"></i>پروفایل</p>
                        </li>

                    </ul>
                    <!-- End navigation menu -->

                    <div class="clearfix"></div>
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navbar-custom -->

    </header>
    <!-- End Navigation Bar-->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                        <h4 class="page-title my-3">نام</h4>
                    </div>
                </div>
            </div>     

            <div class="row main-content">
                <div class="col-12 col-sm-3 sidebar">
                    <div class="sidebar__inner">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name text-center">
                                <div class="text-center" style="position: relative;">
                                    <div class="edit-profile-image" style="display:none;position: absolute;right: 50%;transform: translateX(50%);top: 30%;"><i class="fas fa-edit font-20"></i></div>
                                    <img src="../../assets/images/profile-placeholder.png" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                    <h4 class="m-0"><?php echo $user["firstname"] . ' ' . $user["lastname"]; ?></h4>
                                </div>

                                <div class="mt-2">
                                    <div class="my-2"><a href="">پروفایل</a></div>
                                    <div class="my-2"><a href="">دوره ها</a></div>
                                    <div class="my-2"><a href="">مالی</a></div>
                                    <div class="my-2"><a href="./dashboard.php">بازگشت به داشبورد</a></div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-9 content">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-2">مشخصات</h4>
                            <div class="row form-group">
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>نام:</strong></div> <div class="col-7"><input class="form-control" name="firstname" type="text" value="<?php echo $user["firstname"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>نام خانوادگی:</strong></div> <div class="col-7"><input class="form-control" name="lastname" type="text" value="<?php echo $user["lastname"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>تاریخ تولد:</strong></div> <div class="col-7"><input class="form-control" name="birthday" type="text" value="<?php echo $user["birthday"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>وضعیت تاهل:</strong></div> <?php echo $user["civil_status"]; ?></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>موبایل:</strong></div> <div class="col-7"><input class="form-control" name="mobile" type="text" value="<?php echo $user["mobile"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>تلفن:</strong></div> <div class="col-7"><input class="form-control" name="phone" type="text" value="<?php echo $user["phone"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>ایمیل:</strong></div> <div class="col-7"><input class="form-control" name="email" type="text" value="<?php echo $user["email"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>تماس اضطراری:</strong></div> <div class="col-7"><input class="form-control" name="family_phone" type="text" value="<?php echo $user["family_phone"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>آدرس:</strong></div> <div class="col-7"><input class="form-control" name="address" type="text" value="<?php echo $user["address"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>مدرک:</strong></div> <?php echo $user["degree"]; ?></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>رشته تحصیلی:</strong></div> <div class="col-7"><input class="form-control" name="study_field" type="text" value="<?php echo $user["study_field"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>شغل:</strong></div> <div class="col-7"><input class="form-control" name="job_title" type="text" value="<?php echo $user["job_title"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>تجربه تخصص:</strong></div> <div class="col-7"><input class="form-control" name="experience" type="text" value="<?php echo $user["experience"]; ?>"></div></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>معرف:</strong></div> <?php echo $user["refree"]; ?></div>
                                <div class="col-6 col-sm-6 my-2 row"><div class="col-5"><strong>نام معرف:</strong></div> <?php echo $user["refree_name"]; ?></div>
                                <div class="col-12 col-sm-12 my-2 row"><div class="col-3"><strong>درباره خود:</strong></div> <div class="col-9"><textarea class="form-control" name="about" style="width:100%;"><?php echo $user["about"]; ?></textarea></div></div>
                            </div>
                    </div>

                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

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

    <?php include_once "../include/script.php" ; ?>
    <script type="text/javascript">
    if($(window).width() >= 1024){
        var sidebar = new StickySidebar('.sidebar', {
            topSpacing: 150,
            bottomSpacing: 20,
            containerSelector: '.main-content',
            innerWrapperSelector: '.sidebar__inner'
        });
    }
    </script>
</body>
</html>
