<?php
// var_dump($_SESSION);
if($_SESSION["type"]!= 'admin') {
    header("Location: ../../login.php");
    die();
}

