<?php 
session_start();
include('./functions.php');
$choices=trim(htmlentities($_GET['choices']));
$size=trim(htmlentities($_GET['size']));
$stu_id=$_SESSION['stu_avishkar_id'];
$sql="delete from registered  where stu_id=\"$stu_id\"";
$query=process_query($sql);
	$arr=explode(",",$choices);

	for($i=0;$i<=$size;$i++)
	{
		 $eid=$arr[$i];
		 $j=$i+1;
	 $sql="insert into registered values(\"$stu_id\",\"$eid\")";
	  $query=process_query($sql);
	
	}

?>