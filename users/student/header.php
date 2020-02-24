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
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
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
                            <a href="profile.php"><i class="fas fa-users"></i>پروفایل</a>
                        </li>

                        <li class="has-submenu">
                            <a href="courses_show.php"><i class="fas fa-users"></i>دوره ها</a>
                        </li>

                        <li class="has-submenu">
                            <a href="transactions_show.php"><i class="fas fa-users"></i>مالی</a>
                        </li>

                        <li class="has-submenu">
                            <a href="tickets_show.php"><i class="fas fa-users"></i>تیکت</a>
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