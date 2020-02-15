<?php
session_destroy();
unset($_SESSION);
session_regenerate_id(true);
header("Location: https://wfl.ir");
