<?php
require_once "../config.php";
require_once "../check_permission.php";

$conn = new mysqli($db_server, $db_username, $db_password, $db_database);

if (isset($_REQUEST["add_course"]) && $_REQUEST["add_course"]) {
    $course_name = $_POST['course_name'];
    $teacher = $_POST['teacher'];
    $presentation_date = ($_POST['presentation_date']) ? $_POST['presentation_date'] : null;
    $start_course_date = $_POST['start_course_date'];
    $course_duration = $_POST['course_duration'];
    $description = $_POST['description'];
    $students = $_POST['students'];
    $query = "INSERT INTO Courses (course_name, teacher, presentation_date, start_course_date, course_duration, description, students)
                         VALUES ('$course_name', '$teacher', '$presentation_date', '$start_course_date', '$course_duration', '$description', '$students');";

    if ($conn->query($query) === true) {
        $course_id = $conn->insert_id;
        if ($_FILES["image"]["name"]) {
            $image = $course_id . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $image_location = $course_image_path . $image;
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_location)) {
                // TODO: invalid image
                $image = "placeholder.png";
            }
        }
        $query = "UPDATE Courses SET image='$image' WHERE course_id='$course_id'";
        $conn->query($query);
        header("Location: course_show.php?course_id=" . $course_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
