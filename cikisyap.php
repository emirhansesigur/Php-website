<?php
include("mysqlbaglan.php");

session_start();

session_destroy();

header("location: index.php");
exit();
