<?php
require_once("../../config.php");
require_once("../../check_permission.php");
$message = '';
$mobile = $_SESSION["mobile"];
$mobile[6] = '*';
$mobile[7] = '*';
$mobile[8] = '*';

if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("../../include/head.php"); ?>
    <style>
        #partitioned {
            margin: 0 20px;
            letter-spacing: 30px;
            border: 0;
            background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
            background-position: bottom;
            background-position-x: center;
            background-size: 42px 1px;
            background-repeat: repeat-x;
            background-position-x: 28px;
            width: 220px;
            direction: ltr;
            font-size: 22px;
            padding: 0 0 0 7px;
        }
    </style>
    <title>تایید موبایل</title>
</head>

<body class="authentication-bg">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="https://wfl.ir">
                            <span><img src="../../assets/images/logo-dark.png" alt="" height="60"></span>
                        </a>
                    </div>
                    <?php echo $success_message; ?>

                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">تایید موبایل</h4>
                            </div>

                            <form action="check_mobile_verification_handler.php" method="POST">
                                <div class="form-group mb-3">
                                    <strong>موبایل: </strong><span style="display: inline-block; direction: ltr;"><?php echo $mobile; ?></span>
                                    <div class="btn btn-green mx-4" style="cursor: pointer;" id="send_code">ارسال کد</div>
                                </div>

                                <div class="form-group mb-3">
                                    <strong>کد ارسالی: </strong>
                                    <div style="display: inline-block; position: relative;">
                                        <div style="position: absolute; background:white;height: 100%;width: 40px;"></div>
                                        <input name="input_verify_code" id="partitioned" type="text" maxlength="5" onkeypress="return isNumberKey(event)" required/>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-green btn-block" type="submit"> تایید </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="../../assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="../../assets/js/app.min.js"></script>

    <script>
    var disable_send = false;
    $("#send_code").click(function () {
        if (disable_send) return;
        $("#send_code").text("ارسال شد.");
        disable_send = true;
        console.log("sent");
        $.ajax({
            url: "mobile_verification.php",
            method: "POST",
            data: {
                mobile: "<?php echo $_SESSION['mobile']; ?>"
            },
            success: function (response) {
                console.log(response);
            }
        });
    });
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
        return true;
    }
    </script>
</body>

</html>