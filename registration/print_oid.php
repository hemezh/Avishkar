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
<script language="javascript">
 function printpage()
  {
   window.print();
  }
</script>
<style type="text/css" media="print">

#print_bot {
	text-align:center;
	background-color:#C00;
	display: none;
}

</style>
</head>
<body>
<div id="print_bot">
<center><button style="width:150px" onclick="printpage()">Print These iCards</button><br /><button style="width:150px" onclick="window.location.href='./'">Return Back</button></center>
</div>
<?php
$data="select * from reg_user where `icard`=\"0\"";
$q=process_query($data);
$count = 0 ;

echo "<center>";
echo "<table width='700' border='1'>";
while($row=mysql_fetch_array($q))
{
	$data = "update reg_user set icard = \"1\" where stu_id = \"".$row['stu_id']."\" " ; 
	$go = process_query($data) ;
$info = getUserByAKID("AK11".$row['stu_id']);
		if($count%2==0)
		{
			echo "<tr>";
		}
		echo "<td>" ;
		echo "<TABLE width='350px' border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr><td colspan='2'><center><img width='250px' src='avi.jpg' /></center></td></tr>";
		echo "<tr><td width='60%'><B>Avishkar ID: </b>AK11".$row['stu_id']." ";
		echo "<br /><b>Name: </b>".$info['name']."<br />";
		echo "<b>Branch: </b>".$info['prog']."<br /><b>College:</b>".$info['college']."</td>";
		echo "<td><center><div style='border-color:#000; border-width:thin; border-style:solid; width:50px; height:70px;'></div></center></td></tr>";
		echo "<tr><td></td><td><center>----------------<br />Avishkar 2011</center></td></tr>";
		echo "<tr><td colspan='2'><font size='-2'><center>(Valid only on 23rd to 25th September 2011)</center></font></td></tr>";
		echo "</table>";
		
		echo "</td>" ;
		$count++;
	if($count%2==0)
			echo "</tr>" ;	
	if($count==8)
		break;
}
if($count%2!=0)
{
	echo "<td></td></tr>" ;
}
echo "</table>" ;
echo "</center>"
?>
</body>
</body>
</html>