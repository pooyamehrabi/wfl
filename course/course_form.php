<?php
$page_title = 'ثبت دوره جدید';
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

    <div class="wrapper">
        <form class="form-horizontal" action="course_handler.php" method="post" data-parsley-validate>
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
                                                <option name="teacher" value="دکتر محمدرضا ماجد">دکتر محمدرضا ماجد</option>
                                                <option name="teacher" value="مهتاب متین">مهتاب متین</option>
                                                <option name="teacher" value="نوید رضاپور">نوید رضاپور</option>
                                            </select>
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
                            <input type="file" name="picture" class="dropify" data-max-file-size="5M"  />
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
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help',
            toolbar1: 'fontselect formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            font_formats: 'IRANSans=IRANSans;dana=dana;Nazanin=B Nazanin;Times New Roman=times new roman,times;'
        });
    });
    </script>
            
</body>
</html>