<?php
require_once("/crm/config.php");

if(!isset($_SESSION["username"])) header("Location: /crm/login.php");

