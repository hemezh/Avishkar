<?php
$id= $_SESSION['stu_avishkar_id'];

$error=0;
$errormsg = "" ;
if(count($_POST)>0  && isset($_POST['register_proceed']) ) 
{
	$college = trim(htmlentities($_POST['college']));
	$other_college = trim(htmlentities($_POST['other_college']));
	if($error==0 && ($college=="Select College" && $other_college == ""))
		{
			$error++ ;
			$errormsg = "Please select a college" ;
		}
	if( $college == "Select College" )
				$college = $other_college ;
	if($error ==0 )
	{	
		$change=mysql_query("UPDATE `per_info` SET `college`=\"$college\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}	
}
 $college = get_value("SELECT college FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
 $name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
?>

 <div class="top-heading"><?php echo $name;?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="100%" cellpadding="10px" border="0" align="center">
 <tr><td valign="top">College<br /><font size="-2">(if not in list fill college in text box)</font></td><td>
        											<select name="college" class="textbox_big">
                                                    <option>Select College</option>
        											<?php 
													$data = "select * from college" ;
													$result = process_query($data);
													while($res = mysql_fetch_array($result))
													{
														echo "<option " ; 
														if( isset($_POST['college']) ) 
														{	
															if( $_POST['college'] == $res[0] )
																echo "selected=\"selected\" " ;
														}
														else
														{
															if($college == $res[0] ) 
																echo "selected=\"selected\" " ;
														}
														echo " >".$res[0]."</option>" ;
													}
													?>
                                                    </select>
                                                    <br /><br />
                                                    <input name="other_college" class="textbox_big_font_small" value="<?php if(isset($_POST['other_college']) ) echo $_POST['other_college'] ; ?>" type="text" />
                                                    </td></tr>
        <tr><td colspan="2"><center><input name="register_proceed" type="submit" class="button2" value="Submit" style="width:150px; height:40px;" /></center></td></tr>

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