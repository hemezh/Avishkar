<?php
session_start();
include('../functions.php');
session_destroy();
redirect("./");
die();
//exit(0);
?>
