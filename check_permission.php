<?php
require_once("../../config.php");

if(!isset($_SESSION["username"])) header("Location: /crm/login.php");
var_dump($_SESSION);

