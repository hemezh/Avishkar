<?php
session_start();
include('../functions.php');
require_once('../class.excel.php');
if(!isset($func))
	die ;
if( !chk_loggin() )
	redirect('./login.php');
if(!isHead(getLoginID()))
		redirect('./home.php');
//print_r($_GET);
$printArray = array() ;
$headArray = array() ;
$eventID = getEventID(getLoginID());
$eventArray = array();
if(isset($_GET['event_id'])&&isHeadAvishkarID(getLoginID()))
{
	$eventPara = $_GET['event_id'];
	if($eventPara == "all" )
	{
		$result = getEventsByParent($eventID);
		while($res = mysql_fetch_array($result))
		{
			array_push($eventArray,$res[0]);
		}
	}
	else
	{
		$result = getEventsByParent($eventID);
		while($res = mysql_fetch_array($result))
		{
			if($res[0]==$eventPara)
				array_push($eventArray,$res[0]);
		}
	}
}
else
{
	array_push($eventArray,$eventID);
}
//print_r($eventArray);
if(isset($_GET['avishkar_id']))
	{
		array_push($printArray,"stu_id");
		array_push($headArray,"Avishar ID");
	}
if(isset($_GET['name']))
	{
		array_push($printArray,"name");
		array_push($headArray,"Name");
	}
if(isset($_GET['email_id']))
	{
		array_push($printArray,"email");
		array_push($headArray,"EmailID");
	}
if(isset($_GET['gender']))
	{
		array_push($printArray,"gender");
		array_push($headArray,"Gender");
	}
if(isset($_GET['contact_num']))
	{
		array_push($printArray,"mobile");
		array_push($headArray,"Contact Num");
	}
if(isset($_GET['address']))
	{
		array_push($printArray,"address");
		array_push($headArray,"Address");
	}
if(isset($_GET['college']))
	{
		array_push($printArray,"college");
		array_push($headArray,"College");
	}
if(isset($_GET['degree']))
	{
		array_push($printArray,"prog");
		array_push($headArray,"Degree");
	}
if(isset($_GET['branch']))
	{
		array_push($printArray,"branch");
		array_push($headArray,"Branch");
	}
if(isset($_GET['year']))
	{
		array_push($printArray,"graduation_yr");
		array_push($headArray,"Year");
	}
require_once('../class.excel.php');
//print_r($printArray) ;
//print_r($headArray);

$num = count($printArray);
for( $i=0;$i<1;$i++)
{
	for($j=0;$j<1;$j++)
		$forExcel[$i][$j]=0;
}
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
<style type="text/css">
.print_options { width:200px; height:50px; font-size:20px }
</style>
<style type="text/css" media="print">

#print_bot {
	text-align:center;
	background-color:#C00;
	display: none;
}

</style>

</head>

<body>

<form action="print_excel.php" method="post" name="print_excel" target="_self">
<table width="1024px" align="center"  cellpadding="0px" cellspacing="0px" id="print_bot">
<tr>
<td><center><input name="print" type="button" value="Print" onClick="printpage();" class="print_options" /></center></td>
<td><center><input name="excel" type="submit" value="Export In Excel"  class="print_options" /></center></td>
<td><center><input name="back" type="button" value="Return Back" onClick=" window.location.href  = '../home.php?page=getfulllist' "  class="print_options" /></center></td>
</tr></table><br />
<table width="1024px" align="center" border="1" cellpadding="0px" cellspacing="0px">
<?php
// print header
$track = 0 ;
echo "<tr>";
for($i = 0 ; $i < $num ; $i++ )
{
	echo "<input name=\"forexcelheader_".$i."\" type=\"hidden\" value=\"".$headArray[$i]."\" />" ;
	echo "<td><b>".$headArray[$i]."<b></td>";
}
$track++ ;
echo "</tr>";
$chkDupsArray = array();
for($k=0;$k<count($eventArray);$k++)
{
$studentInfo = getStudentByEvent($eventArray[$k]);
while($res = mysql_fetch_array($studentInfo))
{
	if(in_array($res['stu_id'],$chkDupsArray))
		continue;
	
	array_push($chkDupsArray,$res['stu_id']);
	
	echo "<tr>";
	for($i=0;$i<$num;$i++)
		{
			if($printArray[$i] == "stu_id" )
			{
				echo "<td>AK11".$res[$printArray[$i]]."</td>";
				echo "<input name=\"forexcel_".$track."_".$i."\" type=\"hidden\" value=\"AK11".$res[$printArray[$i]]."\" />" ;
			}
			else if($printArray[$i] == "gender" )
			{
			echo "<td>".genderMap($res[$printArray[$i]])."</td>";
			echo "<input name=\"forexcel_".$track."_".$i."\" type=\"hidden\" value=\"".genderMap($res[$printArray[$i]])."\" />" ;
			}
			else
			{
				echo "<td>".$res[$printArray[$i]]."</td>";
				echo "<input name=\"forexcel_".$track."_".$i."\" type=\"hidden\" value=\"".$res[$printArray[$i]]."\" />" ;
			}
		}
		$track++;
	echo "</tr>";
}
}
echo "<input name=\"row_num\" type=\"hidden\" value=\"".$track."\" /><input name=\"col_num\" type=\"hidden\" value=\"".$num."\" />" ;
?>
</table>
<br />
<table width="1024px" align="center"  cellpadding="0px" cellspacing="0px" id="print_bot">
<tr><td colspan="3"><center><h3>Total: <?php echo $track ; ?></h3></center></td></tr>
<tr>
<td><center><input name="print" type="button" value="Print" onClick="printpage();" class="print_options" /></center></td>
<td><center><input name="excel" type="submit" value="Export In Excel"  class="print_options" /></center></td>
<td><center><input name="back" type="button" value="Return Back" onClick=" window.location.href  = '../home.php?page=getfulllist' "  class="print_options" /></center></td>
</tr></table>
</form>
</body><br /><br />

</body>
</html>
