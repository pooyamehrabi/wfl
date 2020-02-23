<?php
require_once("../../config.php");
$conn = new mysqli($db_server, $db_username, $db_password, $db_database);

$user_id = $_REQUEST["user_id"];
if (isset($_REQUEST["edit_user"]) && $_REQUEST["edit_user"]) {
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
    $query = "UPDATE Users 
              SET firstname='$firstname', lastname='$lastname', birthday='$birthday', mobile='$mobile', phone='$phone', 
                  email='$email', family_phone='$family_phone', address='$address', study_field='$study_field', 
                  job_title='$job_title', experience='$experience', about='$about'
              WHERE user_id='{$user_id}';";
    $conn->query($query);
}

$query = "SELECT * FROM Users WHERE user_id='{$user_id}';";
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

    <?php require_once("../../include/style.php"); ?>
    
</head>

<body>

    <?php include_once "header.php"; ?>

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
                <div class="col-12 col-sm-3 sidebar">
                    <div class="sidebar__inner">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name text-center">
                                <div class="text-center" style="position: relative;">
                                    <div class="edit-profile-image" style="display:none;position: absolute;right: 50%;transform: translateX(50%);top: 30%;"><i class="fas fa-edit font-20"></i></div>
                                    <img src="../../assets/images/profile-placeholder.png" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
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
                        <form class="row form-group" action="" method="POST">
                            <input type="hidden" name="edit_user" value="true">
                            <div class="col-12 row">
                                <div class="col-6 col-sm-3 text-right pt-1"><strong>نوع حساب:</strong></div>
                                <div class="col-6 col-sm-3">
                                    <select name="type" class="form-control">
                                        <option value="admin">ادمین</option>
                                        <option value="teacher">استاد</option>
                                        <option value="student">دانش آموز</option>
                                        <option value="accountant">حسابدار</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>نام:</strong></div> <div class="col-7"><input class="form-control" name="firstname" type="text" value="<?php echo $user["firstname"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>نام خانوادگی:</strong></div> <div class="col-7"><input class="form-control" name="lastname" type="text" value="<?php echo $user["lastname"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تاریخ تولد:</strong></div> <div class="col-7"><input class="form-control" name="birthday" type="text" value="<?php echo $user["birthday"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>وضعیت تاهل:</strong></div> <?php echo $user["civil_status"]; ?></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>موبایل:</strong></div> <div class="col-7"><input class="form-control" name="mobile" type="text" value="<?php echo $user["mobile"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تلفن:</strong></div> <div class="col-7"><input class="form-control" name="phone" type="text" value="<?php echo $user["phone"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>ایمیل:</strong></div> <div class="col-7"><input class="form-control" name="email" type="text" value="<?php echo $user["email"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تماس اضطراری:</strong></div> <div class="col-7"><input class="form-control" name="family_phone" type="text" value="<?php echo $user["family_phone"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>آدرس:</strong></div> <div class="col-7"><input class="form-control" name="address" type="text" value="<?php echo $user["address"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>مدرک:</strong></div> <?php echo $user["degree"]; ?></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>رشته تحصیلی:</strong></div> <div class="col-7"><input class="form-control" name="study_field" type="text" value="<?php echo $user["study_field"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>شغل:</strong></div> <div class="col-7"><input class="form-control" name="job_title" type="text" value="<?php echo $user["job_title"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>تجربه تخصص:</strong></div> <div class="col-7"><input class="form-control" name="experience" type="text" value="<?php echo $user["experience"]; ?>"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"></div></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>معرف:</strong></div> <?php echo $user["refree"]; ?></div>
                            <div class="col-12 col-sm-6 my-2 row"><div class="col-5 text-right pt-1"><strong>نام معرف:</strong></div> <?php echo $user["refree_name"]; ?></div>
                            <div class="col-12 col-sm-12 my-2 row"><div class="col-3 text-right"><strong>درباره خود:</strong></div> <div class="col-9"><textarea class="form-control" name="about" style="width:100%;"><?php echo $user["about"]; ?></textarea></div></div>
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

    <?php include_once "../include/script.php" ; ?>
    <script type="text/javascript">
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
