<?php
require_once("../../config.php");
require_once("check_admin.php");

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);
$query = "SELECT * FROM Users;";
$result = $conn->query($query);
$output = '' ;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $output .= "<tr>";
        $output .= "<td>" . $row["NID"] . "</td>";
        $output .= "<td>" . $row["type"] . "</td>";
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
                        <table id="users-table" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>کد ملی</th>
                                    <th>نوع کاربر</th>
                                    <th>نام</th>
                                    <th> نام خانوادگی</th>
                                    <th>تاریخ تولد</th>
                                    <th>وضعیت تاهل</th>
                                    <th>موبایل</th>
                                    <th>تلفن</th>
                                    <th>ایمیل</th>
                                    <th>تماس اضطراری</th>
                                    <th>آدرس</th>
                                    <th>مدرک</th>
                                    <th>رشته تحصیلی</th>
                                    <th>شغل</th>
                                    <th>تجربه تخصص</th>
                                    <th>درباره خود</th>
                                    <th>معرف</th>
                                    <th>نام معرف</th>
                                    <th>عکس</th>
                                    <th>عکس کارت ملی</th>
                                    <th>ویرایش</th>
                                </tr>
                                <tr>
                                    <td>کد ملی</td>
                                    <td>نوع کاربر</td>
                                    <td>نام</td>
                                    <td> نام خانوادگی</td>
                                    <td>تاریخ تولد</td>
                                    <td>وضعیت تاهل</td>
                                    <td>موبایل</td>
                                    <td>تلفن</td>
                                    <td>ایمیل</td>
                                    <td>تماس اضطراری</td>
                                    <td>آدرس</td>
                                    <td>مدرک</td>
                                    <td>رشته تحصیلی</td>
                                    <td>شغل</td>
                                    <td>تجربه تخصص</td>
                                    <td>درباره خود</td>
                                    <td>معرف</td>
                                    <td>نام معرف</td>
                                    <td>عکس</td>
                                    <td>عکس کارت ملی</td>
                                    <td>ویرایش</td>
                                </tr>
                            </thead>

                            <?php echo $output; ?>
                            
                        </table>

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
        var table = $("#users-table").DataTable({
            "scrollX": true,
            buttons: [  {extend: 'csv'   , className: 'btn-light', text: 'خروجی CSV', exportOptions: { columns: ':visible' }, title: 'Users'},
                        {extend: 'excel' , className: 'btn-light', text: 'خروجی اکسل', exportOptions: { columns: ':visible' }, title: 'Users' },
                        {extend: 'colvis', className: 'btn-light', text: 'نمایش ستون'}],
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

        table.buttons().container().appendTo("#users-table_wrapper .col-md-6:eq(0)")

        $('#users-table tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#users-table_wrapper .dataTables_scrollHead thead th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="" />' );
            var that = this;
            $( 'input', this ).on( 'keyup change clear', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );

    });
    </script>
    
</body>
</html>                            