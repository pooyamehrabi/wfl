<?php
$conn = new mysqli('localhost', 'root', '', 'crm');
$course_name = $_POST['course_name'];
$teacher = $_POST['teacher'];
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
