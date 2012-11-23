<?php
require_once('../functions.php');
if(isreg_admin_login()!=1)
	redirect('./');
$type=htmlentities(trim($_POST['reg_type']));
$num=htmlentities(trim($_POST['no_stud']));
$price =process_array("select * from reg_category where `name`= \"".$type."\" ");
$r_type=process_array("select * from reg_category where `cat_id`=\"".$type."\" ");

$a=($num*$r_type['amount'])+($num*$r_type['coution_money']);
echo "<table border=\"1\">";
echo "<tr><td><b>Registration Type</b></td><td>".$r_type['name']."</td></tr>";
echo "<tr><td><b>Price</b></td><td>Rs.".$r_type['amount']."</td></tr>";
echo "<tr><td><b>Caution Money</b></td><td>Rs.".$r_type['coution_money']."</td></tr>";
echo "<tr><td><b>Number of Students</b></td><td>".$num."</td></tr>";
echo "<tr><td>======================</td><td>=====================</td></tr><tr><td><b>Total Amount</b></td><td>Rs.".$a."</td></tr>";
echo "</table>";
?>