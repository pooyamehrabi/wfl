<?php
$conn = new mysqli('localhost', 'root', '', 'crm');
$nid = $_POST['national-code'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$civil_status = $_POST['civil_status'];
$mobile = $_POST['mobile'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$family_phone = $_POST['family_phone'];
$address = $_POST['address'];
$degree = $_POST['degree'];
$job_title = $_POST['job_title'];
$experience = $_POST['experience'];
$study_field = $_POST['study_field'];
$about = $_POST['about'];
$refree = $_POST['refree'];
$refree_name = $_POST['refree_name'];
$picture = $_POST['picture'];
$national_card = $_POST['national_card'];
$query = "INSERT INTO users (NID, firstname, lastname, birthday, civil_status, mobile, phone, email, family_phone, address, degree, job_title, experience, study_field, about, refree, refree_name, picture, national_card)
                     VALUES ('$nid', '$firstname', '$lastname', '$birthday', '$civil_status', '$mobile', '$phone', '$email', '$family_phone', '$address', '$degree', '$job_title', '$experience', '$study_field', '$about', '$refree', '$refree_name', '$picture', '$national_card');";
var_dump($query);

if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
