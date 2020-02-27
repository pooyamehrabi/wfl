<?php
require_once "../config.php";
require_once "../check_permission.php";

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);

if (isset($_REQUEST["add_course"]) && $_REQUEST["add_course"]) {

    if ($_FILES["image"]["name"]) {
        $image = $course_id . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $image_location = $course_image_path . $image;
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_location)) {
            // TODO: invalid image
            $image = "placeholder.png";
        }
    }
}

$course_name = $_POST['course_name'];
$teacher = $_POST['teacher'];
$presentation_date = $_POST['presentation_date'];
$start_course_date = $_POST['start_course_date'];
$course_time = $_POST['course_time'];
$description = $_POST['description'];
$picture = $_POST['picture'];
$students = $_POST['students'];
$query = "INSERT INTO course (course_name, teacher, start_course_date, course_time, description, picture, students)
                     VALUES ('$course_name', '$teacher', '$start_course_date', '$course_time', '$description', '$picture', '$students');";

if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
