<?php
require_once "../config.php";
require_once "../check_permission.php";

$user_id = $_SESSION["user_id"];

$teachers = [];
$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * FROM Users WHERE type='teacher' OR type='admin';";
$result = $conn->query($query);
$i = 0;
while ($teacher = $result->fetch_assoc()) {
    $teachers[$i] = $teacher;
    $i++;
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

    <div class="wrapper">
        <form class="form-horizontal" action="course_save.php" method="post" data-parsley-validate>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 mb-3 header-title">مشخصات دوره</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="course_name" class="text-right col-sm-3 col-form-label">نام دوره</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="course_name" class="form-control" id="course_name" placeholder="نام دوره" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="teacher" class="text-right col-sm-4 col-form-label">مدرس دوره</label>
                                        <div class="col-sm-8">
                                            <select type="text" class="form-control" id="teacher" placeholder="مدرک تحصیلی" >
                                                <option value=""></option>
                                                <?php
                                                foreach ($teachers as $teacher ) {
                                                    echo "<option value=". $teacher["user_id"] .">" . $teacher["firstname"] . " " . $teacher["lastname"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="presentation_date" class="col-sm-3 col-form-label text-right">تاریخ معارفه: </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="presentation_date" class="form-control" id="presentation_date" placeholder="تاریخ معارفه" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_course_date" class="col-sm-3 col-form-label text-right">تاریخ شروع دوره</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="start_course_date" class="form-control" id="start_course_date" placeholder="تاریخ شروع دوره" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="course_time" class="text-right col-sm-4 col-form-label">مجموع ساعات دوره</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="course_time" class="form-control" id="course_time" placeholder="مجموع ساعات دوره" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 mb-3 header-title">توضیح دوره</h4>
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="header-title mt-0 mb-3">عکس دوره</h4>
                            <input type="file" name="image" class="dropify" data-max-file-size="2M" />
                            <span style="font-size: 11px;">حداکثر حجم عکس 5 مگابیات</span>
                        </div>
                    </div><!-- end col -->
                </div>
            </div> <!-- end container -->
            <div class="form-group mb-0 justify-content-end row">
                <div class="col-sm-12 text-center">
                    <button type="submit" value="submit" class="btn btn-info waves-effect waves-light">ثبت دوره</button>
                </div>
            </div>
        </form>
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
                    2019 &copy; <a href="http://wfl.ir">WFL</a> 
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

    <script>
    $( document ).ready(function() {
        kamaDatepicker('start_course_date');
        kamaDatepicker('presentation_date');
        $(".dropify").dropify({
            messages:{
                default:"عکس خود را بیندازید اینجا",
                replace:"برای جایگزینی عکس جدید را روی این عکس بیندازید",
                remove:"پاک کردن",
                error:"مشکلی پیش آمد، دوباره تلاش کنید"
            },
            error:{
                fileSize:"حجم فایل شما بیش از میزان مورد قبول است (حداکثر: 5 مگابایت)"
            }
        });
        $('form').parsley();
        tinymce.init({
            selector: '#description',
            directionality : 'rtl',
            language: 'fa_IR',
            height : "480",
            plugins: 'preview searchreplace autolink visualblocks visualchars image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists imagetools  textpattern ',
            toolbar1: 'fontselect formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            font_formats: 'IRANSans=IRANSans;dana=dana;Nazanin=B Nazanin;Times New Roman=times new roman,times;'
        });
    });
    </script>
            
</body>
</html>