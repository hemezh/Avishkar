<?php
$id= $_SESSION['stu_avishkar_id'];
$error=0;
$errormsg = "" ;
if(count($_POST)>0  && isset($_POST['mobile']) ) 
{
	$mobile = trim(htmlentities($_POST['mobile']));
		if($error==0 && $mobile=="")
			{
					$error++ ;
					$errormsg = "Please mention your contact number" ;
			}
			if($error==0 && strlen($mobile)<10)
			{
					$error++ ;
					$errormsg = "Invalid Contact Number" ;
			}
	if($error ==0 )
	{	
		$change=mysql_query("UPDATE `per_info` SET `mobile`=\"$mobile\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}
}
$mobile = get_value("SELECT mobile FROM `per_info` WHERE `stu_id` = \"$id\" ") ; 
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ; 
?>
 <div class="top-heading"><?php echo $name; ?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="80%" cellpadding="10px" border="0" align="center">
<tr><td valign="top" width="30%">Mobile No.</td><td><input type="text" name="mobile"  value="<?php echo $mobile;?>"/></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button2" style="width:150px; height:40px;" />
</td></tr>

<?php

		if( $error > 0  && $error < 100 )
		{
			echo "<div class=\"error_box\"><center>".$errormsg."</center></div>" ;
		}
		if( $error == 100 )
		{
			echo "<div class=\"success_box\"><center>".$errormsg."</center></div>" ;
		}
?>

</table></form></center></div></div>