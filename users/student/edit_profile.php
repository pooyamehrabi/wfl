<?php
$page_title = 'عضویت در مدرسه موفقیت';
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

    <?php require_once("../../include/style.php"); ?>
    
</head>

<body>

    <div class="wrapper">
        <form class="form-horizontal" action="user_handler.php" method="post" data-parsley-validate>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 mb-3 header-title">مشخصات فردی</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="firstname" class="text-right col-sm-3 col-form-label">نام</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="نام" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="lastname" class="col-sm-3 col-form-label text-right">نام خانوادگی</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="نام خانوادگی" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="national-code" class="text-right col-sm-3 col-form-label">کد ملی</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="national-code" class="form-control" id="national-code" placeholder="کد ملی" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="birthday" class="col-sm-3 col-form-label text-right">تاریخ تولد</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="birthday" class="form-control" id="birthday" placeholder="تاریخ تولد" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="civil_status" class="col-sm-3 col-form-label text-right">وضعیت تاهل</label>
                                        <div class="col-sm-9" style="padding-top:10px;">
                                            <input type="radio" value="مجرد" name="civil_status" style="position: relative;top:3px;margin:0 5px;" >مجرد
                                            <input type="radio" value="متاهل" name="civil_status" style="position: relative;top:3px;margin: 0 10px 0 5px;" >متاهل
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
                            <h4 class="mt-0 mb-3 header-title">مشخصات تماس</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="mobile" class="text-right col-sm-3 col-form-label">موبایل</label>
                                        <div class="col-sm-9">
                                            <input type="tel" name="mobile" pattern="09[0-9]{9}" class="form-control" id="mobile" placeholder="09xxxxxxxxx" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="tel" class="col-sm-3 col-form-label text-right">تلفن ثابت</label>
                                        <div class="col-sm-9">
                                            <input type="tel" name="phone" class="form-control" placeholder="021xxxxxxxx" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="email" class="text-right col-sm-3 col-form-label">ایمیل</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="ایمیل" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="tel-emergency" class="col-sm-3 col-form-label text-right">تلفن ضروری</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="family_phone" class="form-control" id="tel-emergency" placeholder="تلفن یکی از اقوام نزدیک" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label text-right">آدرس</label>
                                        <div class="col-sm-9">
                                            <textarea name="address" class="form-control" id="address" placeholder="آدرس" ></textarea>
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
                            <h4 class="mt-0 mb-3 header-title">سوابق</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="degree" class="text-right col-sm-4 col-form-label">مدرک تحصیلی</label>
                                        <div class="col-sm-8">
                                            <select type="text" class="form-control" id="degree" placeholder="مدرک تحصیلی" >
                                                <option value=""></option>
                                                <option name="degree" value="diploma">دیپلم</option>
                                                <option name="degree" value="graduate">لیسانس</option>
                                                <option name="degree" value="master">فوق لیسانس</option>
                                                <option name="degree" value="doctorate">دکترا</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="extra" class="col-sm-4 col-form-label text-right">رشته تحصیلی</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="study_field" class="form-control" id="study_field" placeholder="رشته تحصیلی" >       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="job" class="col-sm-4 col-form-label text-right">شغل</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="job_title" class="form-control" id="job" placeholder="شغل" >
                                        </div>
                                    </div>
                                </div>    
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="experience" class="text-right col-sm-4 col-form-label">تجربه و تخصص</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="experience" class="form-control" id="experience" placeholder="تجربه و تخصص" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="bio" class="col-sm-4 col-md-12 col-form-label text-left">درباره خود</label>
                                        <div class="col-sm-8 col-md-12">
                                            <textarea name="about" class="form-control" id="bio" placeholder="درباره خود"></textarea>
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
                            <h4 class="header-title mt-0 mb-3">معرف</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <select id="refree-type" name="refree" class="form-control" >
                                        <option value=""></option>
                                        <option name="refree" value="telegram">تلگرام</option>
                                        <option name="refree" value="instagram">اینستاگرام</option>
                                        <option name="refree" value="website">وب سایت</option>
                                        <option name="refree" value="refree">از طریق آشنایان</option>
                                        <option name="refree" value="others">سایر موارد</option>
                                    </select>                
                                </div>
                                <div id="refree-field" class="col-sm-6" style="display: none;">
                                    <div class="form-group row">
                                        <label for="refree_name" class="text-right col-sm-4 col-form-label">نام معرف</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="refree_name" class="form-control" id="refree-name" placeholder="نام معرف">
                                        </div>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="header-title mt-0 mb-3">عکس</h4>
                            <input type="file" name="picture" class="dropify" data-max-file-size="1M"  />
                            <span style="font-size: 11px;">حداکثر حجم عکس 1 مگابیات</span><br>
                            <span style="font-size: 11px;">عکس تمام رخ باشد(عکس پرسنلی)</span>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="header-title mt-0 mb-3">تصویر کارت ملی</h4>
                            <input type="file" name="national_card" class="dropify" data-max-file-size="1M"  />
                            <span style="font-size: 11px;">حداکثر حجم عکس 1 مگابیات</span><br>
                            <span style="font-size: 11px;">تصویر کارت ملی واضح باشد</span>
                        </div>
                    </div><!-- end col -->
                </div>
            </div> <!-- end container -->
            <div class="form-group mb-3 justify-content-end row">
                <div class="col-sm-12 text-center">
                    <button type="submit" value="submit" class="btn btn-info waves-effect waves-light">ثبت نام</button>
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
        kamaDatepicker('birthday');
        $(".dropify").dropify({
            messages:{
                default:"عکس خود را بیندازید اینجا",
                replace:"برای جایگزینی عکس جدید را روی این عکس بیندازید",
                remove:"پاک کردن",
                error:"مشکلی پیش آمد، دوباره تلاش کنید"
            },
            error:{
                fileSize:"حجم فایل شما بیش از میزان مورد قبول است (حداکثر: 1 مگابایت)"
            }
        });
        $("#refree-type").change(function(){
            $("#refree-field").hide();
            if($("#refree-type").val() == 'refree') {
                $("#refree-field").show();
            }
        })
        $('form').parsley();
    });
    </script>
            
</body>
</html>