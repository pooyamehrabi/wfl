<?php
require_once "../../config.php";
require_once "../../check_permission.php";

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$user_id = $_SESSION["user_id"];
if (isset($_REQUEST["edit_user"]) && $_REQUEST["edit_user"]) {

    if ($_FILES["picture"]["name"]) {
        $picture = $user_id . "." . pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION);
        $picture_location = $profile_image_path . $picture;
        if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $picture_location)) {
            // TODO: invalid picture
            $picture = "placeholder.png";
        }
    }

    if ($_FILES["national_card"]["name"]) {
        $national_card = $user_id . "." . pathinfo($_FILES["national_card"]["name"], PATHINFO_EXTENSION);
        $national_card_location = $national_card_image_path . $national_card;
        if (!move_uploaded_file($_FILES["national_card"]["tmp_name"], $national_card_location)) {
            // TODO: invalid national_card
            $national_card = "placeholder.png";
        }
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $mobile = $_POST['mobile'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $family_phone = $_POST['family_phone'];
    $address = $_POST['address'];
    $job_title = $_POST['job_title'];
    $experience = $_POST['experience'];
    $study_field = $_POST['study_field'];
    $about = $_POST['about'];
    $query = "UPDATE Users SET
                firstname='$firstname', lastname='$lastname', birthday='$birthday', mobile='$mobile', phone='$phone',
                email='$email', family_phone='$family_phone', address='$address', study_field='$study_field',
                job_title='$job_title', experience='$experience' ";
    if ($about) {
        $query .= ", about='$about' ";
    }

    if ($picture) {
        $query .= ", picture='$picture' ";
    }

    if ($national_card) {
        $query .= ", national_card='$national_card' ";
    }

    $query .= "WHERE user_id='{$user_id}';";
    $conn->query($query);
}

$query = "SELECT * FROM Users WHERE user_id='$user_id';";
$result = $conn->query($query);
$user = $result->fetch_assoc();

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

    <?php require_once "../../include/style.php";?>

</head>

<body>

    <?php include_once "header.php";?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <h4 class="page-title my-3">ویرایش پروفایل</h4>
                </div>
            </div>

            <div class="row main-content">
                <div class="col-12 col-sm-3 sidebar">
                    <div class="sidebar__inner">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name text-center">
                                <div class="text-center" style="position: relative;">
                                    <img src="<?php echo $profile_image_folder . $user["picture"]; ?>" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                    <h4 class="m-0"><?php echo $user["firstname"] . ' ' . $user["lastname"]; ?></h4>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-9 content">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-2">مشخصات</h4>
                        <form class="row form-group" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="edit_user" value="true">
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>نام:</strong></div> <div class="col-7"><input class="form-control" name="firstname" type="text" value="<?php echo $user["firstname"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>نام خانوادگی:</strong></div> <div class="col-7"><input class="form-control" name="lastname" type="text" value="<?php echo $user["lastname"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تاریخ تولد:</strong></div> <div class="col-7"><input class="form-control" name="birthday" type="text" value="<?php echo $user["birthday"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>وضعیت تاهل:</strong></div>
                                <div class="col-7">
                                    <select name="type" class="form-control">
                                        <option <?php echo ($user["civil_status"] == "single") ? "selected" : ""; ?> value="Single">مجرد</option>
                                        <option <?php echo ($user["civil_status"] == "married") ? "selected" : ""; ?> value="married">متاهل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>موبایل:</strong></div> <div class="col-7"><input class="form-control" name="mobile" type="text" value="<?php echo $user["mobile"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تلفن:</strong></div> <div class="col-7"><input class="form-control" name="phone" type="text" value="<?php echo $user["phone"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>ایمیل:</strong></div> <div class="col-7"><input class="form-control" name="email" type="text" value="<?php echo $user["email"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تماس اضطراری:</strong></div> <div class="col-7"><input class="form-control" name="family_phone" type="text" value="<?php echo $user["family_phone"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>آدرس:</strong></div> <div class="col-7"><input class="form-control" name="address" type="text" value="<?php echo $user["address"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>مدرک:</strong></div>
                                <div class="col-7">
                                    <select name="type" class="form-control">
                                        <option <?php echo ($user["degree"] == "diploma") ? "selected" : ""; ?> value="diploma">دیپلم</option>
                                        <option <?php echo ($user["degree"] == "associate") ? "selected" : ""; ?> value="associate">فوق دیپلم</option>
                                        <option <?php echo ($user["degree"] == "bachelor") ? "selected" : ""; ?> value="bachelor">لیسانس</option>
                                        <option <?php echo ($user["degree"] == "master") ? "selected" : ""; ?> value="master">فوق لیسانس</option>
                                        <option <?php echo ($user["degree"] == "doctorate") ? "selected" : ""; ?> value="doctorate">دکترا</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>رشته تحصیلی:</strong></div> <div class="col-7"><input class="form-control" name="study_field" type="text" value="<?php echo $user["study_field"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>شغل:</strong></div> <div class="col-7"><input class="form-control" name="job_title" type="text" value="<?php echo $user["job_title"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تجربه تخصص:</strong></div> <div class="col-7"><input class="form-control" name="experience" type="text" value="<?php echo $user["experience"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>معرف:</strong></div>
                                <div class="col-7">
                                    <select name="type" id="referee" class="form-control" onchange="setRefereeVisibility(this)">
                                        <option <?php echo ($user["refree"] == "telegram") ? "selected" : ""; ?> value="telegram">تلگرام</option>
                                        <option <?php echo ($user["refree"] == "instagram") ? "selected" : ""; ?> value="instagram">اینستاگرام</option>
                                        <option <?php echo ($user["refree"] == "friends") ? "selected" : ""; ?> value="friends">دوستان</option>
                                        <option <?php echo ($user["refree"] == "mofid_broker") ? "selected" : ""; ?> value="mofid_broker">کارگزاری مفید</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 my-2 row referee-name"><div class="col-5 text-right pt-1"><strong>نام معرف:</strong></div> <div class="col-7"><input class="form-control" name="refree_name" type="text" value=" <?php echo $user["refree_name"]; ?>"></div></div>
                            <div class="col-12 col-sm-12 my-2 row"><div class="col-3 text-right"><strong>درباره خود:</strong></div> <div class="col-9"><textarea class="form-control" name="about" style="width:100%;"><?php echo $user["about"]; ?></textarea></div></div>
                            <div class="col-6 my-3">عکس پرسنلی: <div style="height: 10px"></div><input name="picture" type="file" class="dropify" data-default-file="<?php echo $profile_image_folder . $user["picture"]; ?>" /></div>
                            <div class="col-6 my-3">کارت ملی: <div style="height: 10px"></div><input name="national_card" type="file" class="dropify" data-default-file="<?php echo $national_card_image_folder . $user["national_card"]; ?>" /></div>
                            <div class="col-12"><button class="btn btn-bordred-success" type="submit">ذخیره</button></div>
                        </form>
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

    <?php include_once "../../include/script.php";?>
    <script type="text/javascript">
    function setRefereeVisibility() {
        var refree_tye = $('#referee').find(":selected").val();
        if (refree_tye == "friends") {
            $(".referee-name").show();
        } else {
            $(".referee-name").hide();
        }
    }
    setRefereeVisibility();

    $(".dropify").dropify({
        messages:{
            default:"عکس خود را بیندازید اینجا",
            replace:"برای جایگزینی عکس جدید را روی این عکس بیندازید",
            remove:"پاک کردن",
            error:"مشکلی پیش آمد، دوباره تلاش کنید"
        },
    });

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
