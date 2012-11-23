<?php
require_once('../functions.php');
//print_r($_POST);
if(isreg_admin_login()!=1)
	redirect('./');
if(count($_POST)>0 && $_POST['confirm'] == "Submit Me" )
{
	//print_r($_POST);
	 $id=$_POST['stu_id'];
	 $field=$_POST['field'];
	//echo "<tr><td><b>Avishkar ID</b></td><td>".$id."</td></tr>";
	//echo "<tr><td><b>Field</b></td><td>Ak11".$field."</td></tr></table>";
	$data = "insert into volunteer (`stu_id`,`field`) values(\"".$id."\",\"".$field."\")" ;
	$q=process_query($data);
	//print_r($_POST);
	echo "You have added for more <a href=\"./home.php?page=vid\">click here</a>";
}
if(count($_POST)>0 && $_POST['reg'] == "Submit" )
{
	//print_r($_POST);
	$id=htmlentities(trim($_POST['a_id']));
	$id = substr($id,4);
	$v_field=htmlentities(trim($_POST['v_field']));
//print_r($_POST);
	$data = "select count(*) from per_info where stu_id = \"".$id."\" " ; 
	$data = get_value($data);
	
	if($data>0)
	{
		$field = $_POST['field'] ;
	$arr = getUserByAKID("AK11".$id);
	echo "<form name=\"\" action=\"\" method=\"post\">" ;
	echo "<table width=\"400px\" height=\"200px\">";
	echo "<tr><td><b>Name</b></td><td>".$arr['name']."</td></tr>";
	echo "<tr><td><b>Avishkar ID</b></td><td>Ak11".$arr['stu_id']."</td></tr>";
	echo "<tr><td><b>Field</b></td><td>".$_POST['field']."</td></tr>";
	echo "<tr><td colspan=\"2\"><centeR><input name=\"confirm\" type=\"submit\" value=\"Submit Me\"></center></td></tr>" ;
	echo "</table>";
	echo "<input name=\"stu_id\" type=\"hidden\" value=\"".$id."\" />";
	echo "<input name=\"field\" type=\"hidden\" value=\"".$field."\" />";
	echo "</form>";
	}
	else
	{
		echo "<center><b>No such user exist, <a href=\"./home.php?page=vid\"> click here</a> to go back</a>";
	}
}
?>