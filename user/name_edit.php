<?php
$id= $_SESSION['stu_avishkar_id'];

$error=0;
$errormsg = "" ;
if(count($_POST)>0  && isset($_POST['name']) ) 
{
	$name = trim(htmlentities($_POST['name']));
	if(is_numeric($_POST['name']))
	{
		$error++;
		$errormsg= "Name can not be numeric";
	}
	if($error==0 && $name=="")
	{
		$error++ ;
		$errormsg = "Name cannot  be left blank" ;
	}
	if($error ==0 )
	{	
		$change=mysql_query("UPDATE `per_info` SET `name`=\"$name\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}	
}
		
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
?>
 <div class="top-heading"><?php echo $name;?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
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
<form action="" method="post">
<table width="80%" cellpadding="10px" border="0" align="center">
<tr><td valign="top" width="30%">
Name</td><td><input type="text" name="name" value="<?php echo $name; ?>"/></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button2" style="width:150px; height:40px;" />
</td></tr>



</table></form></center></div></div>