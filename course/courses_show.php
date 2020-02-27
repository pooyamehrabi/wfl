<?php
require_once("../config.php");

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * from Courses;";
$result = $conn->query($query);
$output = '' ;

if ($result->num_rows > 0) {
    $output = '<div class="row">';
    while($row = $result->fetch_assoc()){
        $output .= '<div class="mb-3 col-md-4 col-sm-6 col-12"><div class="card">';
        $output .= '<img class="card-img-top img-fluid" src="' . $course_image_folder . $row["image"] . '" alt="Card image cap">';
        $output .= '<div class="card-body">';
        $output .= '<h4 class="card-title">' .  $row["course_name"] . '</h4>';
        $output .= '<p class="card-text">' . $row["description"] . '</p>';
        $output .= '<p class="card-text"> <small class="text-muted">Last updated 3 mins ago</small> </p>';
        $output .= "</div></div></div>";
    }
    $output .= "</div>";
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

        <?php require_once("/crm/include/style.php"); ?>
    
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
    
                        <div style="position: absolute;left: 20px;font-size: 30px;top: 18px;"><a href="../../login.php?action=logout"><i class="dripicons-power" style="color: white;" title="خروج"></i></a></div>
                
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo text-center">
                            <span class="logo-lg">
                                <img src="../assets/images/logo-light.png" alt="" height="40">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
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
                                <a href="#"><i class="mdi mdi-view-dashboard"></i>دوره ها</a>
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
                        <div class="page-title-box">
                            <h4 class="page-title">دوره ها</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <?php echo $output; ?>

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        
        <!-- end Footer -->

        <?php include_once "../include/script.php" ; ?>
        <script>
        $(document).ready(function () {
            $("#datatable").DataTable({
                "scrollX": true
            });
        });
        </script>
        
    </body>
</html>                            