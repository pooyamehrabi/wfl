<?php
if (!isset($_REQUEST["input_verify_code"])) die();

require_once("../../config.php");
require_once("../../check_permission.php");

$username = $_SESSION["username"];

if($_REQUEST["input_verify_code"] == $_SESSION["verify_code"]) {
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    $sql_string = "UPDATE Users SET mobile_verified=1 WHERE username='$username'; ";
    $result = $conn->query($sql_string);
    header("Location: ./users/student/profile.php?message=mobile_verified");
} else {
    header("Location: ./users/student/check_mobile_verification.php?message=mobile_verification_failed");
}


