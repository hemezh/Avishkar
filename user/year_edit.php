<?php
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
 <div class="top-heading"><?php echo $name?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="100%" cellpadding="10px" border="0" align="center">
  <tr><td valign="top">Current Year<font color="#FF0000">*</font></td><td>
        											<select name="grad_yr" class="textbox_big">
                                                    <option value="0">Select Current Year</option>
        											<?php 
													echo $year ;
													for($i=1;$i<=5;$i++)
													{
														echo "<option value=".$i." " ; 
														if( isset($_POST['grad_yr']) ) 
														{
															if( $_POST['grad_yr'] == $i )
																echo "selected=\"selected\" " ;
														}
														else
														{
															if($year == $i ) 
																echo "selected=\"selected\" " ;
														}
										
														echo " >".$i."".numSufix($i)." Year</option>" ;
													}
													?>
                                                    </select>
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