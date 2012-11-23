<?php
$id= $_SESSION['stu_avishkar_id'];
$error = 0 ;
$errormsg = "" ;
		if(count($_POST)>0  && isset($_POST['register_proceed']) ) 
		{
			$degree = trim(htmlentities($_POST['degree']));
			$other_degree = trim(htmlentities($_POST['other_degree']));	
						if($error==0 && ($degree=="Select Graduation Program" && $other_degree == ""))
				{
					$error++ ;
					$errormsg = "Please select a degree" ;
				}
			if( $degree == "Select Graduation Program" )
				$degree = $other_degree ;
				if($error ==0 )
				{
					$change=mysql_query("UPDATE `per_info` SET `prog`=\"$degree\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}	
}
$degree = get_value("SELECT prog FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
?>
 <div class="top-heading"><?php echo $name;?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="100%" cellpadding="10px" border="0" align="center">
<tr><td valign="top">Graduation Scheme<br /><font size="-2">(if not in list fill in text box)</font></td><td>
        											<select name="degree" class="textbox_big">
                                                    <option>Select Graduation Program</option>
        											<?php 
													$data = "select * from degree" ;
													$result = process_query($data);
													while($res = mysql_fetch_array($result))
													{
														echo "<option " ; 
														if( isset($_POST['degree']) ) 
														{
															if( $_POST['degree'] == $res[0] )
																echo "selected=\"selected\" " ;
														}
														else
														{
															if($degree == $res[0] ) 
																echo "selected=\"selected\" " ;
														}
														echo " >".$res[0]."</option>" ;
													}
													?>
                                                    </select>
                                                    <br /><br />
                                                    <input name="other_degree" class="textbox_big_font_small" value="<?php if(isset($_POST['other_degree']) ) echo $_POST['other_degree'] ; ?>" type="text" />
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