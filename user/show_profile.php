<?php
require_once("../config.php");

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * FROM users WHERE username='ehsan';";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once "../include/head.php" ; ?>
    
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
                                <img src="../assets/images/logo-light.png" alt="" height="40">
                            </span>
                            <span class="logo-sm">
                                <img src="../assets/images/logo-sm.png" alt="" height="24">
                            </span>
                        </a>
                    </div>
    
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="index.html"><i class="mdi mdi-view-dashboard"></i>کاربران</a>
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
                    <div class="col-sm-3 sidebar">
                        <div class="sidebar__inner">
                            <div class="bg-picture card-box">
                                <div class="profile-info-name text-center">
                                    <div class="text-center">
                                        <img src="../assets/images/profile-placeholder.png" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                        <h4 class="m-0">نوید </h4>
                                    </div>

                                    <div class="mt-2">
                                        <div><a href="">پروفایل</a></div>
                                        <div><a href="">دوره ها</a></div>
                                        <div><a href="">مالی</a></div>

                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9 content">
                        <div class="card-box" style="height:1500px;">
                            <h4 class="header-title mt-0 mb-3">مشخصات</h4>

                                <div class="row">
                                    <div class="col-6 col-sm-4 my-2"><strong>کد ملی:</strong> <?php echo $user["NID"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>نام:</strong> <?php echo $user["firstname"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>نام خانوادگی:</strong> <?php echo $user["lastname"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>تاریخ تولد:</strong> <?php echo $user["birthday"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>وضعیت تاهل:</strong> <?php echo $user["civil_status"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>موبایل:</strong> <?php echo $user["mobile"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>تلفن:</strong> <?php echo $user["phone"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>ایمیل:</strong> <?php echo $user["email"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>تماس اضطراری:</strong> <?php echo $user["family_phone"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>آدرس:</strong> <?php echo $user["address"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>مدرک:</strong> <?php echo $user["degree"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>رشته تحصیلی:</strong> <?php echo $user["study_field"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>شغل:</strong> <?php echo $user["job_title"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>تجربه تخصص:</strong> <?php echo $user["experience"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>معرف:</strong> <?php echo $user["refree"]; ?></div>
                                    <div class="col-6 col-sm-4 my-2"><strong>نام معرف:</strong> <?php echo $user["refree_name"]; ?></div>
                                    <div class="col-12 col-sm-12 my-2"><strong>درباره خود:</strong> <?php echo $user["about"]; ?></div>
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
                        2016 - 2019 &copy; Adminto theme by <a href="">Coderthemes</a> 
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <?php include_once "../include/script.php" ; ?>
        <script type="text/javascript">
        var sidebar = new StickySidebar('.sidebar', {
            topSpacing: 150,
            bottomSpacing: 20,
            containerSelector: '.main-content',
            innerWrapperSelector: '.sidebar__inner'
        });
        </script>
    </body>
</html>