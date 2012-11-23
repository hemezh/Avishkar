<?php
session_start();
require_once('../functions.php');
//print_r($_SESSION);
$uid = $_SESSION['reg_admin_id'] ;
$info = getUserByAKID("AK11".$uid) ;
//print_r($_POST);
$reg_id=$_POST['avishkar_id'];
$reg_type=$_POST['reg_type'];
$regid="SELECT count(*) from reg_user where `stu_id`= \"$reg_id\" ";
$count=0;
$count = get_value($regid);
if(count==0)
{
$data = date("d-m-Y");
$data1 = process_array("select * from per_info where `stu_id`= \"$reg_id\" ");
$data2= process_array("SELECT * from `reg_category` where `cat_id`= \"".$reg_type."\" and `valid`=\"1\" ");
//print_r($data2);
$q=mysql_query("insert into reg_user (stu_id, type, price,caution_return) values(\"".$data1['stu_id']."\",\"".$data2['cat_id']."\",\"".$data2['amount']."\",\"".$data2['caution_money']."\")");
}
else
{
echo "Already Registered";
echo "<a href=\"./home.php?page=reg\">click here</a> to go back</a>";
}
?>
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
<center><table border="0" cellpadding="0" cellspacing="0" width="800px">
<?php for($i=0;$i<3;$i++)
{?>
<tr>
<td>
<table width="100%" border="1" cellpadding="0" cellspacing="0" >
<tr><td width="25%"><center><img src="./mnnit.jpg" width="100px" height="120px" /></center></td><td colspan="3"><center><font size="+3">Avishkar 2011</font><br /><font size="+2">Motilal Nehru National Institute of Technology</font><br /><font size="+1">
<?php if($i == 0 )
echo "(Participant Copy)" ;
else if($i == 1 ) 
echo "(Avishkar Copy)" ;
else 
echo "(SAC Copy)" ;
?></font></center></td></tr>
<tr><td valign="top" width="50%" colspan="2" style="padding-left:60px"><b>Name:</b> <?php echo $data1['name'] ; ?> <br />
<b>Date: </b><?php echo $data ; ?><br />
<b>College: </b><?php echo $data1['college']; ?><br />
</td><td colspan="2" valign="top"><b>Avishkar ID: </b><?php echo "AK11".$data1['stu_id'] ; ?><br /><b>Registration Type: </b><?php echo $data2['name'] ; ?><br /><b>Amount: </b><?php echo $data2['amount']."/-" ;  ?><br /><b>Caution: </b><?php echo $data2['coution_money']."/-"; $tot = $data2['coution_money'] +  $data2['amount'] ;  ?><br /><b>Total: </b><?php echo $tot."/-" ; ?></td></tr>
<tr><td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;</td><td colspan="3">
<p>Thanks You for registeration. Please collect your registration kit before you move.<br />Keep this slip and Icard always with you till the moment you are at the event.</p>
<p>Caution money is refundable, please present the reciept to collect the money.</p>
</td></tr>
<tR><td colspan="4"><center><b>(<?php echo $info['name'] ; ?>)<br />Registration Desk</center></td></tR>
</table>
<br />
</td>
</tr>
<?php 
}
?>

</table>
<br /><br />
<div id="print_bot">
<button style="width:300px;" onclick="printpage()">Print Challan</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="window.location.href='./';" style="width:300px;">Return Back</button>
</div>
</center>