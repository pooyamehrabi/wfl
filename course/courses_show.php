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
        $output .= '<h4 class="card-title"><a href="course_show.php?course_id=' . $row["course_id"] . '">' .  $row["course_name"] . '</a></h4>';
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

        <?php require_once("../include/style.php"); ?>
    
    </head>

    <body>

        <!-- Navigation Bar-->
        <?php require_once "header.php"; ?>
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