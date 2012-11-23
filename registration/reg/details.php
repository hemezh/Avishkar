<?php
session_start();
//print_r($_POST);
require_once('../functions.php');
if(isreg_admin_login()!=1)
	redirect('./');
$reg_id=htmlentities(trim($_POST['av_id']));
$reg_id = substr($reg_id,4);
$reg_type=$_POST['reg_type'];

$regid="SELECT count(*) from `per_info` where `stu_id`= \"$reg_id\" ";
$count = get_value($regid);
$result = process_array("select * from per_info where `stu_id`= \"$reg_id\" ");
 $i=0;
 $count_reg=0;
$count_reg =get_value("select count(*) from reg_user where `stu_id`= \"$reg_id\" ");
echo "<br /><br />";
if($count>0 && $count_reg==0)
{
echo "<centre><table cellpadding=\"10px\"><tr><td><b>Name</b></td><td>";
echo $result['name'];
echo "</td></tr>";
echo "<tr><td><b>E-mail</b></td><td>";
echo $result['email'];
echo "</td></tr>";
echo "<tr><td><b>College</b></td><td>";
echo $result['college'];
echo "</td></tr>" ;
$q ="SELECT * from `reg_category` where `cat_id`= \"".$reg_type."\" and `valid`=\"1\" ";
$data=process_array($q);
echo "<tr><td><b>Registration Type</b></td><td>".$data['name']."</td></tr>";
echo "<tr><td><b>Amount</b></td><td>".$data['amount']."</td></tr>";
echo "<tr><td><b>Coution Money</b></td><td>".$data['coution_money']."</td></tr>";
echo "<tr><td colspan=\"2\"><hr /></td></tr>";
$tot = $data['coution_money'] + $data['amount'] ;
echo "<tr><td><b>Total</b></td><td>".$tot."</td></tr>";
echo "</table>";
echo "<form action=\"./printchallan.php\" method=\"post\">" ;
echo "<input name=\"avishkar_id\" type=\"hidden\" value=\"".$reg_id."\">" ;
echo "<input name=\"reg_type\" type=\"hidden\" value=\"".$reg_type."\">" ;
echo "<center><input type=\"submit\" value=\"Pay\" name=\"pay\" /></center>";
echo "</form>";
}
else if($count_reg !=0 )
{
	echo "<center<b>Already Registered, <a href=\"./home.php?page=reg\"> click here</a> to go back";
}
else
{
	echo "<center><b>No such user exist, <a href=\"./home.php?page=reg\"> click here</a> to go back</a>";
}

//print_r($result);
//echo "hi";
/*
if($reg_id!="")
{
//	$conn=mysql_connect("localhost","root","saavan");
	if($conn)
	{
		$abc= mysql_select_db(Avishkar2011,$conn);
				$regid=mysql_query("SELECT * from `registered` where `stu_id`= \"$reg_id\" ");
				
				if(mysql_num_rows($regid) >0)
        		{
                	while($row = mysql_fetch_row($regid))
                	if(mysql_num_rows($regid) >0)
        		
					{
						if(mysql_num_rows($regid) > 0)
						{
				echo "Details<br>";
				echo "<table border='1'>";
echo  "<tr><th>Avishkar id</th> <th>Event Id</th>
 </tr>";

 
 
				while($row = mysql_fetch_row($regid))
				{
					echo "<tr>";
   echo "<td>" . $row['stud_id'] . "</td>";
   echo "<td>" . $row['event_id'] . "</td>";
   echo "</tr><tr><td>";
   echo "<input type=\"submit\"  value=\"Confirm\" align=\"middle\"/>";
   echo "</td></tr></table>";
				}
		}
	}
				}}}
				
else
{
	//echo"<script>window.location.href=\"reg_student.php\"</script>";
}
*/
?>
