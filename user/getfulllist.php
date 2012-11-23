<?php
if(!isset($func))
	die ;
if( !chk_loggin() )
		redirect('./login.php');
if(!isHead(getLoginID()))
		redirect('./home.php');
$id= $_SESSION['stu_avishkar_id'];

		//print_r($_POST);
		$error = 0 ;   
		$errormsg = "" ;
		if(count($_POST)>0  && isset($_POST['register_proceed']) ) 
		{     
			$grad_yr = trim(htmlentities($_POST['grad_yr']));
			if($error == 0 && ( $grad_yr <= "0" || $grad_yr > 10 ) )
				{
					$error++ ;
					$errormsg = "Invalid Graduation Year" ;
				}
			if($error ==0 )
				{
					$change=mysql_query("UPDATE `per_info` SET `graduation_yr`=\"$grad_yr\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}	
}
$year = get_value("SELECT graduation_yr FROM `per_info` WHERE `stu_id` = \"$id\" ") ; 
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ; ?>
 <div class="top-heading">Print full list of registered users</div>
        <div class="css-panes skin">
		<div style="display: block;" id="tab_content1">
<center>
<h2>Select fields you want</h2>
<form action="" method="post">
<?php
	if(count($_POST)>0 && $_POST['get_list'] == "Print List" ) 
	{
		$isset = 0 ; 
		$url = "" ;
		if(isset($_POST['name']))
			$url .= "&name=y" ;
		if(isset($_POST['avishkar_id']))
			$url .= "&avishkar_id=y" ;
		if(isset($_POST['email_id']))
			$url .= "&email_id=y" ;
		if(isset($_POST['gender']))
			$url .= "&gender=y" ;
		if(isset($_POST['college']))
			$url .= "&college=y" ;
		if(isset($_POST['prog']))
			$url .= "&degree=y" ;
		if(isset($_POST['branch']))
			$url .= "&branch=y" ;
		if(isset($_POST['year']))
			$url .= "&year=y" ;
		if(isset($_POST['address']))
			$url .= "&address=y" ;
		if(isset($_POST['contact_num']))
			$url .= "&contact_num=y" ;
		if(isset($_POST['event_id']))
			$url .= "&event_id=".$_POST['event_id'] ;
		$url = substr($url,1);
		$url = "./user/print.php?".$url ;
		redirect($url);
	}
?>
<table width="100%" cellpadding="10px" border="0" align="center">
<tr><td>
<table width="100%" border="0" height="200px">
<tr><td colspan="2"><b>Select Event</td><td colspan="2">

<select name="event_id">
<?php
$eventID = getEventID(getLoginID());
// to chk head 
$headq = "select head from events where eventid = \"".$eventID."\"" ; 
$resHead = get_value($headq);
if($resHead == 1 )
{
	echo "<option value=\"all\">All</option>";
	$result = getEventsByParent($eventID);
	while($res = mysql_fetch_array($result))
	{
		echo "<option value=\"".$res[0]."\">".getEventNameByID($res[0])."</option>";
	}
}
else
{
	echo "<option value=\"".$eventID."\">".getEventNameByID($eventID)."</option>";
}
?>
</select>
</td></tr>
<tr>
	<td width="25%"><input name="avishkar_id" type="checkbox" checked="checked" value="avishkar_id" /> Avishkar ID</td>
    <td width="25%"><input name="name" type="checkbox" checked="checked" value="name" /> Name</td>
    <td width="25%"><input name="email_id" type="checkbox" checked="checked" value="email_id" /> email ID</td>
    <td width="25%"><input name="gender" type="checkbox" value="gender" /> Gender</td>
</tr>
<tr><td colspan="4"><center><b>Academic Background</b></center></td></tr>
<tr>
	<td><input name="college" type="checkbox" value="college" /> College</td>
    <td><input name="prog" type="checkbox" value="prog" /> Degree</td>
    <td><input name="branch" type="checkbox" value="branch" /> Branch</td>
    <td><input name="year" type="checkbox" value="year" /> Year</td>
</tr>
<tr><td colspan="4"><center><b>Contact Information</b></center></td></tr>
<tr>
	<td><input name="contact_num" type="checkbox" value="contact_num" /> Contact Number</td>
    <td><input name="address" type="checkbox" value="address" /> Address</td>
    <td></td>
    <td></td>
</tr>
</table>
</td></tr>
<tr><td colspan="4"><center><input name="get_list" type="submit" style="width:200px" value="Print List" /></center></td></tr>
</table></form></center>
</div></div>			                                                    		                                                 