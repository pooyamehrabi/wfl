<?php
require_once("../../config.php");
require_once("check_admin.php");

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * FROM Users;";
$result = $conn->query($query);
$output = '' ;

if ($result->num_rows > 0) {
    $output  = '<table id="datatable" class="table table-bordered dt-responsive nowrap"><thead>';
    $output .= "<th>کد ملی</th>";
    $output .= "<th>نام</th>";
    $output .= "<th> نام خانوادگی</th>";
    $output .= "<th>تاریخ تولد</th>";
    $output .= "<th>وضعیت تاهل</th>";
    $output .= "<th>موبایل</th>";
    $output .= "<th>تلفن</th>";
    $output .= "<th>ایمیل</th>";
    $output .= "<th>تماس اضطراری</th>";
    $output .= "<th>آدرس</th>";
    $output .= "<th>مدرک</th>";
    $output .= "<th>رشته تحصیلی</th>";
    $output .= "<th>شغل</th>";
    $output .= "<th>تجربه تخصص</th>";
    $output .= "<th>درباره خود</th>";
    $output .= "<th>معرف</th>";
    $output .= "<th>نام معرف</th>";
    $output .= "<th>عکس</th>";
    $output .= "<th>عکس کارت ملی</th>";
    $output .= "<th>ویرایش</th>";
    $output .= "</thead>";
    while($row = $result->fetch_assoc()){
        $output .= "<tr>";
        $output .= "<td>" . $row["NID"] . "</td>";
        $output .= "<td>" . $row["firstname"] . "</td>";
        $output .= "<td>" . $row["lastname"] . "</td>";
        $output .= "<td>" . $row["birthday"] . "</td>";
        $output .= "<td>" . $row["civil_status"] . "</td>";
        $output .= "<td>" . $row["mobile"] . "</td>";
        $output .= "<td>" . $row["phone"] . "</td>";
        $output .= "<td>" . $row["email"] . "</td>";
        $output .= "<td>" . $row["family_phone"] . "</td>";
        $output .= "<td>" . $row["address"] . "</td>";
        $output .= "<td>" . $row["degree"] . "</td>";
        $output .= "<td>" . $row["study_field"] . "</td>";
        $output .= "<td>" . $row["job_title"] . "</td>";
        $output .= "<td>" . $row["experience"] . "</td>";
        $output .= "<td>" . $row["about"] . "</td>";
        $output .= "<td>" . $row["refree"] . "</td>";
        $output .= "<td>" . $row["refree_name"] . "</td>";
        $output .= "<td>" . $row["picture"] . "</td>";
        $output .= "<td>" . $row["national_card"] . "</td>";
        $output .= "<td class='text-center'><a href='user_edit.php?user_id=" . $row["user_id"] . "'><i class='fas fa-edit'></i></a></td>";
        $output .= "</tr>";
    }
    $output .= "</table>";
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
    <link rel="shortcut icon" href="/crm/assets/images/favicon.png">

    <?php require_once("../../include/style.php"); ?>
    <title>داشبورد مدیریت</title>
</head>

<body>

    <?php require_once "header.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <?php echo $output; ?>
                    </div>
                </div>
            </div> <!-- end row -->

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

    <?php include_once "../../include/script.php" ; ?>
    <script>
    $(document).ready(function () {
        $("#datatable").DataTable({
            "scrollX": true,
            language: {
                "sEmptyTable":     "هیچ داده‌ای در جدول وجود ندارد",
                "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                "sInfoEmpty":      "نمایش 0 تا 0 از 0 ردیف",
                "sInfoFiltered":   "(فیلتر شده از _MAX_ ردیف)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "نمایش _MENU_ ردیف",
                "sLoadingRecords": "در حال بارگزاری...",
                "sProcessing":     "در حال پردازش...",
                "sSearch":         "جستجو:",
                "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
                "oPaginate": {
                    "sFirst":    "برگه‌ی نخست",
                    "sLast":     "برگه‌ی آخر",
                    "sNext":     "بعدی",
                    "sPrevious": "قبلی"
                },
                "oAria": {
                    "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                    "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                }
            }

        });
    });
    </script>
    
</body>
</html>                            