<?php
require_once "../config.php";
require_once "../check_permission.php";
require_once "../include/DateAbstract.php";
require_once "../include/Date.php";
require_once "../include/Jalali.php";

use Date\Date;
use Date\Jalali;

$course_id = $_REQUEST["course_id"];
$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * FROM Courses WHERE course_id='$course_id';";
$result = $conn->query($query);
$course = $result->fetch_assoc();

$query = "SELECT * from Users WHERE user_id='" . $course["teacher"] . "';";
$teacher = $conn->query($query)->fetch_assoc();

$presentation_date = new Date($course["presentation_date"]);
$start_course_date = new Date($course["start_course_date"]);

$query = "SELECT * FROM users_courses WHERE course_id='$course_id';";
$result = $conn->query($query);
$students_count = $result->num_rows;
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
    <title>دوره <?php echo $course["course_name"]; ?></title>

    <?php require_once "../include/style.php";?>

</head>

<body>

    <!-- Navigation Bar-->
    <?php
if ($_SESSION["type"] == "admin") {
    require_once "header_admin.php";
} else {
    require_once "header_user.php";
}
?>
    <!-- End Navigation Bar-->

    <div class="wrapper mb-3">
        <div class="container-fluid mt-3">
            <h4 class="mt-0 mb-3 header-title">نام دوره</h4>

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="card-box">
                        <img style="width:100%;" src="<?php echo $course_image_folder . $course["image"]; ?>" alt="">
                    </div>
                    <div class="card-box">
                        <div><?php echo $course["description"]; ?></div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="product-info-box">

                        <div class="sell_course">
                            <strong>قیمت :</strong>
                            <p class="price">1,900,000 تومان</ins></p>
                        </div>

                        <form class="cart" method="post" enctype="multipart/form-data">
                            <button type="submit" name="add-to-cart" value="506" class="single_add_to_cart_button button alt">رزرو دوره</button>
                        </form>

                    </div>
                    <div class="card-box product-info-box">
                        <div class="product-meta-info-list">

                            <div class="total_sales">
                                <i class="fal fa-user-graduate"></i> تعداد دانشجو : <span><?php echo $students_count; ?></span>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                                <div class="value">نوع دوره: حضوری و غیر حضوری</div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-book-reader"></i></div>
                                <div class="value">سطح دوره:   </div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-traffic-light-slow"></i></div>
                                <div class="value">پیش نیاز: </div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-clock"></i></div>
                                <div class="value">طول دوره: <?php echo $course["course_duration"]; ?> ساعت</div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-list-alt"></i></div>
                                <div class="value">تاریخ معارفه: <?php echo $presentation_date->toj()->format("j F Y H:i"); ?></div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-hdd"></i></div>
                                <div class="value">تاریخ شروع: <?php echo $start_course_date->toj()->format("j F Y H:i"); ?></div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-user-headset"></i></div>
                                <div class="value">روش پشتیبانی: ارسال تیکت</div>
                            </div>

                            <div class="meta-info-unit">
                                <div class="icon"><i class="fal fa-file-certificate"></i></div>
                                <div class="value">گواهی حضور در دوره</div>
                            </div>

                        </div>
                    </div>
                    <div class="course-teacher-details">
                        <div class="top-part">
                            <a href="#"><img class="img-fluid" src="<?php echo $profile_image_folder . $teacher["picture"]; ?>" alt="<?php echo $teacher["firstname"] . " " . $teacher["lastname"]; ?>"></a>
                            <div class="name">
                                <a href="" class="btn-link">
                                    <h6><?php echo $teacher["firstname"] . " " . $teacher["lastname"]; ?></h6>
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <p><?php echo $teacher["about"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- Footer Start -->
    <?php require_once "../include/footer.php";?>
    <!-- end Footer -->

    <?php require_once "../include/script.php";?>

</body>

</html>