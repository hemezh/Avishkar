<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
require_once("../functions.php") ;
require_once("./mind_maze_functions.php") ;
sql_connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
require_once('../functions.php');
$conn=sql_connect();
if($conn)
{
echo "<center><table cellpadding=\"0px\" cellspacing=\"0px\" border=\"1px\" width=\"1024\">";
echo "<tr><td><b>Name</b></td>";
echo "<td><b>Avishkar ID</b></td>";
echo "<td><b>Registration Type</b></td>";
echo "<td><b>Mobile Number</b></td>";
echo "<td><b>College</b></td>";
echo "<td><b>Date & Time of Registration</b></td></tr>";

	
$out1=process_query("select * from reg_user");


while($res = mysql_fetch_array($out1)){

//print_r($res);
/*	
echo "<tr><td>".$out2['name']."</td>";
echo "<td>Ak11".$out1['stu_id']."</td>";
echo "<td>".$out3['name']."</td>";
echo "<td>".$out2['mobile']."</td>";
echo "<td>".$out2['college']."</td>";
echo "<td>".$out1['datetime']	."</td></tr>";
*/
//print_r($res);
$stu_id = "AK11".$res['stu_id'];
$d = getUserByAKID($stu_id);
//$s=getRegNameByCat($res['type']);
$data="select * from reg_category where cat_id=\"".$res['type']."\"";
$q=process_query($data);
$r = mysql_fetch_array($q);
//print_r($d);
	echo "<tr><td>".$d['name']."</td>";
	echo "<td>Ak11".$d['stu_id']."</td>";
	echo "<td>".$r['name']."</td>";
	echo "<td>".$d['mobile']."</td>";
	echo "<td>".$d['college']."</td>";
	echo "<td>".$res['datetime']."</td></tr>";

}
echo "<tr>" ;
echo "<center><button onclick=\"window.location.href='./';\" style=\"width:300px;\">Return Back</button></center>";
echo "</tr></table></center>";
}
/*echo "<form action=\"./printchallan.php\" method=\"post\">" ;
echo "<input name=\"avishkar_id\" type=\"hidden\" value=\"".$reg_id."\">" ;
echo "<input name=\"reg_type\" type=\"hidden\" value=\"".$reg_type."\">" ;
echo "<center><input type=\"submit\" value=\"Pay\" name=\"pay\" /></center>";
echo "</form>";*/
?>
</body>
</html>