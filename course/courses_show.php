<?php
require_once("../config.php");
require_once("../include/date.php");

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * from Courses;";
$result = $conn->query($query);
$output = '' ;
$today = date("Y-m-d H:i:s");
$countdown = array();

if ($result->num_rows > 0) {
    $output = '<div class="row">';
    while($course = $result->fetch_assoc()){
        $course_image = ($course["image"]) ? $course["image"] : "course_no_image.png";
        $query = "SELECT * from Users WHERE user_id='". $course["teacher"] ."';";
        $teacher = $conn->query($query)->fetch_assoc();
        array_push($countdown, $course["course_id"]);
        $output .= '<div class="mb-3 col-md-4 col-sm-6 col-12 d-flex"><div class="card move-up">';
        $output .= '<img class="card-img-top img-fluid" src="' . $course_image_folder . $course_image . '" alt="Card image cap">';
        $output .= '<div class="card-body">';
        $output .= '<div class="teacher-info"><a href="#"><img src="../uploads/courses/placeholder.png" alt=""><span>' . $teacher["firstname"] . " " . $teacher["lastname"] . '</span></a></div>';
        $output .= '<h4 class="card-title mt-2"><a href="course_show.php?course_id=' . $course["course_id"] . '">' .  $course["course_name"] . '</a></h4>';
        if($course["presentation_date"]) $output .= '<div class="card-text">زمان معارفه: ' . jdate("y/n/j ساعت شروع: H:i", $course["presentation_date"]) . '</div>';
        if($course["start_course_date"]) $output .= '<div class="card-text">شروع دوره: ' . jdate("y/n/j ساعت شروع: H:i", $course["start_course_date"]) . '</div>';
        $output .= '<div class="mb-5"></div>';
        if($today < $course["presentation_date"]){
            $output .= '<div class="countdown-container"><div class="flipper" data-reverse="true" data-datetime="' . $course["presentation_date"] . '" data-template="dd|HH|ii|ss" data-labels="روز|ساعت|دقیقه|ثانیه" id="flipper-' . $course["course_id"] . '"></div></div>';
            // $output .= '<p class="countdown-container">' . jdate("y/n/j, H:i", $course["presentation_date"]) . ' </p>';
        } else {
            $output .= '<div class="countdown-container"><div class="flipper" data-reverse="true" data-datetime="' . $course["start_course_date"] . '" data-template="dd|HH|ii|ss" data-labels="روز|ساعت|دقیقه|ثانیه" id="flipper-' . $course["course_id"] . '"></div></div>';
        }
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
            <?php
            foreach ($countdown as $cd) {
                echo "$('#flipper-" . $cd ."').flipper('init');";
            }
            ?>

        });
        </script>
        
    </body>
</html>                            