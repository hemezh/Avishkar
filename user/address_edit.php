<?php
$id= $_SESSION['stu_avishkar_id'];
$error=0;
$errormsg = "" ;
if(count($_POST)>0  && isset($_POST['address']) ) 
{
	$address = trim(htmlentities($_POST['address']));
			if($error==0 && ($address==""))
				{
					$error++ ;
					$errormsg = "Address cannot be left blank" ;
				}
	if($error ==0 )
	{	
		$change=mysql_query("UPDATE `per_info` SET `address`=\"$address\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}	
}
$address = get_value("SELECT address FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
?>
 <div class="top-heading"><?php echo $name;?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="80%" cellpadding="10px" border="0" align="center">
<tr><td valign="top" width="30%">Address</td><td>
<textarea name="address" class="textbox_big" style="width:100%; height:100px"><?php echo $address?></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="button2" style="width:150px; height:40px;" value="Submit"/>
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