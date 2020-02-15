<?php
if($_SESSION["type"]!= 'admin') {
    header("Location: ../../login.php");
    die();
}

