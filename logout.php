<?php
session_start();
include('./functions.php');
session_destroy();
redirect("./index.php");
die();
//exit(0);
?>
