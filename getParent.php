<?php 
require_once("./functions.php");
$child=$_GET['child'];
$parent=getParent($child);
echo $parent;
?>