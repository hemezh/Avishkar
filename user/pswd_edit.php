<?php
$id= $_SESSION['stu_avishkar_id'];
$error=0;
$errormsg = "" ;
//print_r($_POST);
if(count($_POST)>0  && isset($_POST['new_password']) ) 
{
	 $oldpassword= trim(htmlentities($_POST['old_password']));
	 $newpassword= trim(htmlentities($_POST['new_password']));
	 $renewpassword=trim(htmlentities($_POST['re_new_password']));
	if($newpassword=="")
	{
		$error++ ;
		$errormsg = "Password cannot be left blank" ;
	}
	if(strcmp($newpassword,$renewpassword))
	{
		$error++ ;
		$errormsg = "Password does not match" ;
	}
	if(strlen($newpassword)<6)
	{
		$error++ ;
		$errormsg = "Password should be minimum of 6 character" ;
	}
	$password = get_value("SELECT pass FROM per_info WHERE stu_id like \"$id\" ") ;
	/*if(strcmp(md5($newpassword),$passwrd))
	{
		$error++ ;
		$errormsg = "Old and new password should not be same" ;
	}
	*/
	$oldpassword=md5($oldpassword);
	if(strcmp($oldpassword,$password))
	{
		$error++;
		$errormsg="Old password not correct";
	}
	if($error==0)
	{	
		$password=md5($newpassword);
		$data="UPDATE per_info SET pass=\"$password\" WHERE stu_id like \"$id\" ";
		if(process_query($data))
		{
			$error = 100 ;
			unset($_POST);
			$errormsg = "Your password successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
		}
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
 <tr><td>Old Password<br /></td><td valign="top"><input name="old_password" class="textbox" type="password" /></td></tr>
  <tr><td>Password</td><td valign="top"><input name="new_password" class="textbox" type="password" /></td></tr>
        <tr><td>Retype Password</td><td><input name="re_new_password" class="textbox" type="password" /></td></tr>
        
<tr><td colspan="2"><center><input name="register_proceed" type="submit" class="button2" value="Submit" style="width:150px; height:40px;" /></center></td></tr>


</table></form></center></div></div>