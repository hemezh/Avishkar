<?php
//session_start();
require_once('../functions.php');
$conn=sql_connect();
if($conn)
{
echo "<table cellpadding=\"2px\" cellspacing=\"2px\">";
echo "<tr><td><b>Name</b></td>";
echo "<td><b>Avishkar ID</b></td>";
echo "<td><b>Registration Type</b></td>";
echo "<td><b>Mobile Number</b></td>";
echo "<td><b>College</b></td>";
echo "<td><b>Date & Time of Registration</b></td></tr>";

	
$out1=process_array("select * from reg_user");
//echo $out1;
$out2 = process_array("select * from per_info where `stu_id`= \"".$out1['stu_id']."\" ");
$out3=process_array("select * from reg_category where `cat_id`=\"".$out1['type']."\" ");
//while($tmp=mysql_num_rows($out1)>0){
//$q=process_array("select stu_id,datetime from reg_user UNION select name,amount from reg_category where `cat_id`=\"".$out1['type']."\"  UNION select mobile,college from per_info where `stu_id`=\"".$out1['stu_id']."\" ");






//while($q=process_array("select stu_id,datetime from reg_user UNION select name,amount from reg_category where `cat_id`=\"".$out1['type']."\"  UNION select mobile,college from per_info where `stu_id`=\"".$out1['stu_id']."\" "));
{
//$out2 = process_array("select * from per_info where `stu_id`= \"".$out1['stu_id']."\" ");
//$out3=process_array("select * from reg_category where `cat_id`=\"".$out1['type']."\" ");	
echo "<tr><td>".$out2['name']."</td>";
echo "<td>Ak11".$out2['stu_id']."</td>";
echo "<td>".$out3['name']."</td>";
echo "<td>".$out2['mobile']."</td>";
echo "<td>".$out2['college']."</td>";
echo "<td>".$out1['datetime']."</td></tr>"; 
}}
echo "</table>";

/*echo "<form action=\"./printchallan.php\" method=\"post\">" ;
echo "<input name=\"avishkar_id\" type=\"hidden\" value=\"".$reg_id."\">" ;
echo "<input name=\"reg_type\" type=\"hidden\" value=\"".$reg_type."\">" ;
echo "<center><input type=\"submit\" value=\"Pay\" name=\"pay\" /></center>";
echo "</form>";*/
?>