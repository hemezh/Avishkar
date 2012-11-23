<?php
require_once('../functions.php');
if(isreg_admin_login()!=1)
	redirect('./');
?>
<table border="0" cellpadding="0" cellspacing="10px" width="100%">
<form action="" method="post">
<tr><td>Enter Partial email ID</td><td><input name="emailid" type="text" style="width:250px" /></td></tr>
<tr><td colspan="2"><center><input type="submit" name="get_detail" style="width:300px" value="search" /></center></td></tr>
</form>
<?php 
if(count($_POST)>0 && $_POST['get_detail'] == "search" && trim($_POST['emailid']) != "" )
{
echo "<tr><td colspan=\"2\"><hr /></td></tr>" ;
echo "<tr><td colspan=\"2\">" ;
//print_r($_POST);
$data = "select * from per_info where email like \"%".$_POST['emailid']."%\"" ; 
$re = process_query($data);
$count=0 ;
while($res = mysql_fetch_array($re))
{
	if($count==0) echo "<table width=\"100%\" border=\"1\"><tr><td><b>AvID</b></td><td><b>Email</b></td><td><b>Name</b></td><td><b>College</b></td></tr>" ;
	echo "<tr><td>AK11".$res['stu_id']."</td><td>".$res['email']."</td><td>".$res['name']."</td><td>".$res['college']."</td></tr>" ;
	$count++ ;
}
if($count>0) echo "</table>" ;
echo "</td></tr>" ;
echo "<tr><td colspan=\"2\"><hr /></td></tr>" ;
}
?>
</table>