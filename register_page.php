<?php
//if(!isset($HEADER	)) die();
//include("functions.php");
?>
  
<div class="top-heading">Register</div>
        <div class="css-panes skin2">
		<div style="display: block;" id="tab_content">
<center>
        <?php 
		//print_r($_POST);
		$error = 0 ;
		function chkempty($variable)
		{
			$val = trim(htmlentities($variable));
			if($val == "" )
				
				return -1 ;
				else
				$val ;
		}
		$errormsg = "" ;
		if(count($_POST)>0  && isset($_POST['register_proceed']) ) 
		{
			//sprint_r($_POST);
			$name = trim(htmlentities($_POST['name']));
			$email_id = trim(htmlentities($_POST['email_id']));
			$password= trim(htmlentities($_POST['password']));
			$rpassword= trim(htmlentities($_POST['rpassword']));
			$gender = trim(htmlentities($_POST['gender']));
			$contact_num = trim(htmlentities($_POST['contact_num']));
			$college = trim(htmlentities($_POST['college']));
			$other_college = trim(htmlentities($_POST['other_college']));
			$degree = trim(htmlentities($_POST['degree']));
			$other_degree = trim(htmlentities($_POST['other_degree']));
			$dept = trim(htmlentities($_POST['dept']));
			$other_dept = trim(htmlentities($_POST['other_dept']));
			$grad_yr = trim(htmlentities($_POST['grad_yr']));
			$address = trim(htmlentities($_POST['address']));
			if($error==0 && $name=="")
				{
					$error++ ;
					$errormsg = "Name cant be left blank" ;
				}
			if($error==0 && $email_id=="")
				{
					$error++ ;
					$errormsg = "Email ID cant be left blank" ;
				}
			
			if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email_id)))
				{
					$error++ ;
					$errormsg = "Invalid Email ID" ;
					
				}
			
			
			
			if($error == 0 )
			{
			 $data = "select count(*) from per_info where email = \"".$email_id."\" " ;
			if(get_value($data)>0)
				{
					$error++ ;
					$errormsg = "Email already registered" ;
				}
			}
			if($error==0 && $password=="")
				{
					$error++ ;
					$errormsg = "Password cannot be left blank" ;
				}
			if($error==0 && $rpassword != $password)
				{
					$error++ ;
					$errormsg = "Password doesnot match" ;
				}
			if($error==0 && strlen($password)<6)
			{
					$error++ ;
					$errormsg = "Password should be minimum of 6 character" ;
			}
				if($error==0 && ($gender!='m' && $gender!='f'))
				{
					$error++ ;
					$errormsg = "Invalid gender" ;
				}
			if($error==0 && $contact_num=="")
			{
					$error++ ;
					$errormsg = "Please mention your contact number" ;
			}
			if($error==0 && strlen($contact_num)<10)
			{
					$error++ ;
					$errormsg = "Invalid Contact Number" ;
			}
			
			if($error==0 && ($college=="Select College" && $other_college == ""))
				{
					$error++ ;
					$errormsg = "Please select a college" ;
				}
			if( $college == "Select College" )
				$college = $other_college ;
			if($error==0 && ($degree=="Select Graduation Program" && $other_degree == ""))
				{
					$error++ ;
					$errormsg = "Please select a degree" ;
				}
			if( $degree == "Select Graduation Program" )
				$degree = $other_degree ;
			if($error==0 && ($dept=="Select Department" && $other_dept == ""))
				{
					$error++ ;
					$errormsg = "Please select a Stream" ;
				}
			if($dept == "Select Department" )
				$dept = $other_dept ;
			if($error == 0 && (( $grad_yr <= "0" || $grad_yr > 10 ) || (!is_numeric($grad_yr))) )
				{
					$error++ ;
					$errormsg = "Invalid Graduation Year" ;
				}
			if($error==0 && ($address==""))
				{
					$error++ ;
					$errormsg = "Address cannot be left blank" ;
				}
				
				if($error ==0 )
				{
				$data = "insert into per_info ( name, email, pass, gender, mobile, address, college, branch, prog , graduation_yr ) values ( \"".$name."\" ,\"".$email_id."\" , \"".md5($password)."\", \"".$gender."\", \"".$contact_num."\", \"".$address."\", \"".$college."\", \"".$dept."\" , \"".$degree."\" , \"".$grad_yr."\" ) " ; 
				process_query($data);
				$error = 100 ;
				unset($_POST);
				$errormsg = "You have sucessfully registered, Proceed to <a href=\"./login.php\">login</a>";
				/*
				$expire=time()+60*5;
				setcookie("message", "You have sucessfully registered,<br />Proceed to <a href=\"./login.php\">login</a>", $expire);
				redirect('./register.php?page=message');
				*/
				}
		}
		if( $error > 0  && $error < 100 )
		{
			echo "<div class=\"error_box\"><center>".$errormsg."</center></div>" ;
		}
		if( $error == 100 )
		{
			echo "<div class=\"success_box\"><center>".$errormsg."</center></div>" ;
		}
		?>
        
        <form action="" method="post" name="register_me">
        <table width="100%" cellpadding="10px" border="0" align="center">
        <tr><td>Full Name <font color="#FF0000">*</font></td><td><input name="name" class="textbox" type="text" value="<?php if(isset($_POST['name']) ) echo $_POST['name'] ; ?>" /></td></tr>
        <tr><td>Email ID<font color="#FF0000">*</font></td><td><input name="email_id" class="textbox" type="text" value="<?php if(isset($_POST['email_id']) ) echo $_POST['email_id'] ; ?>" /></td></tr>
        <tr><td>Password<font color="#FF0000">*</font><br /><font size="-2">(Min 6 character)</font></td><td valign="top"><input name="password" class="textbox" type="password" /></td></tr>
        <tr><td>Retype Password<font color="#FF0000">*</font></td><td><input name="rpassword" class="textbox" type="password" /></td></tr>
        <tr><td>Gender<font color="#FF0000">*</font></td><td><select name="gender"><option value="m">Male</option>
        <option value="f">Female</option></select></td></tr>
        <tr><td>Contact Number<font color="#FF0000">*</font></td><td><input name="contact_num" class="textbox" type="text" value="<?php if(isset($_POST['contact_num']) ) echo $_POST['contact_num'] ; ?>" /></td></tr>
        <tr><td valign="top">College<font color="#FF0000">*</font><br /><font size="-2">(if not in list fill college in text box)</font></td><td>
        											<select name="college" class="textbox_big">
                                                    <option>Select College</option>
        											<?php 
													$data = "select distinct(college) from college order by college ASC " ;
													$result = process_query($data);
													while($res = mysql_fetch_array($result))
													{
														echo "<option " ; 
														//if( isset($_POST['college']) ) 
															if( $_POST['college'] == $res[0] )
																echo "selected=\"selected\" " ;
														echo " >".$res[0]."</option>" ;
													}
													?>
                                                    </select>
                                                    <br /><br />
                                                    <input name="other_college" class="textbox_big_font_small" value="<?php if(isset($_POST['other_college']) ) echo $_POST['other_college'] ; ?>" type="text" />
                                                    </td></tr>
        <tr><td valign="top">Graduation Scheme<font color="#FF0000">*</font><br /><font size="-2">(if not in list fill in text box)</font></td><td>
        											<select name="degree" class="textbox_big">
                                                    <option>Select Graduation Program</option>
        											<?php 
													$data = "select * from degree" ;
													$result = process_query($data);
													while($res = mysql_fetch_array($result))
													{
														echo "<option " ; 
														if( isset($_POST['degree']) ) 
															if( $_POST['degree'] == $res[0] )
																echo "selected=\"selected\" " ;
														echo " >".$res[0]."</option>" ;
													}
													?>
                                                    </select>
                                                    <br /><br />
                                                    <input name="other_degree" class="textbox_big_font_small" value="<?php if(isset($_POST['other_degree']) ) echo $_POST['other_degree'] ; ?>" type="text" />
                                                    </td></tr>
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
															if( $_POST['dept'] == $res[0] )
																echo "selected=\"selected\" " ;
														echo " >".$res[0]."</option>" ;
													}
													?>
                                                    </select>
                                                    <br /><br />
                                                    <input name="other_dept" class="textbox_big_font_small" value="<?php if(isset($_POST['other_dept']) ) echo $_POST['other_dept'] ; ?>" type="text" />
                                                    </td></tr>
        <tr><td valign="top">Current Year<font color="#FF0000">*</font></td><td>
        											<select name="grad_yr" class="textbox_big">
                                                    <option>Select Current Year</option>
        											<?php 
													for($i=1;$i<=5;$i++)
													{
														echo "<option value=".$i." " ; 
														if( isset($_POST['grad_yr']) ) 
															if( $_POST['grad_yr'] == $i )
																echo "selected=\"selected\" " ;
														echo " >".$i." ".numSufix($i)." Year</option>" ;
													}
													?>
                                                    </select>
                                                    </td></tr>
        <tr><td valign="top">Address<font color="#FF0000">*</font></td><td><textarea name="address" class="textbox_big"><?php if(isset($_POST['address']) ) echo $_POST['address'] ; ?></textarea></td></tr>
        <tr><td colspan="2"><center><input name="register_proceed" type="submit" class="button2" value="Register Me" style="width:150px; height:40px;" /></center></td></tr>
        </table>
        </form>
        </center>
        </div></div>