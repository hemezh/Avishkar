<?php
$id= $_SESSION['stu_avishkar_id'];
$error = 0 ;   
		$errormsg = "" ;
		if(count($_POST)>0  && isset($_POST['register_proceed']) ) 
		{     
			$dept = trim(htmlentities($_POST['dept']));
			$other_dept = trim(htmlentities($_POST['other_dept']));
						if($error==0 && ($dept=="Select Department" && $other_dept == ""))
				{
					$error++ ;
					$errormsg = "Please select a Stream" ;
				}
			if($dept == "Select Department" )
				$dept = $other_dept ;
if($error ==0 )
				{
					$change=mysql_query("UPDATE `per_info` SET `branch`=\"$dept\" WHERE `stu_id` = \"$id\" ");
		$error = 100 ;
		unset($_POST);
		$errormsg = "You information successfully changed, Proceed to <a href=\"./home.php?page=profile\">profile</a>";
	}	
}
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
$branch = get_value("SELECT branch FROM `per_info` WHERE `stu_id` = \"$id\" ") ;
 ?>
 <div class="top-heading"><?php echo $name;?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="100%" cellpadding="10px" border="0" align="center">
<tr><td valign="top">Subject Major/ Branch<font color="#FF0000">*</font><br /><font size="-2">(if not in list fill in text box)</font></td><td>
        											<select name="dept" class="textbox_big">
                                                    <option>Select Department</option>
        											<?php 
													$data = "select * from department order by branch asc" ;
													$result = process_query($data);
													while($res = mysql_fetch_array($result))
													{
														echo "<option " ; 
														if( isset($_POST['dept']) )
													    {
																if( $_POST['dept'] == $res[0] )
																echo "selected=\"selected\" " ;
														}
														else
														{
															if($branch == $res[0] ) 
																echo "selected=\"selected\" " ;
														}
														echo " >".$res[0]."</option>" ;
													}
													?>
                                                    </select>
                                                    <br /><br />
                                                    <input name="other_dept" class="textbox_big_font_small" value="<?php if(isset($_POST['other_dept']) ) echo $_POST['other_dept'] ; ?>" type="text" />
                                                    </td></tr>
  <tr><td colspan="2"><center><input name="register_proceed" type="submit" class="button2" value="Submit" style="width:150px; height:40px;" /></center></td></tr>
<?php 
		//print_r($_POST);
		
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