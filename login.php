<div class="top-heading">Login</div>
<div class="top-heading-aft" style="width: 994px; "></div><br />
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content">
        
        <center>
        <?php 
		$error = 0 ;
		$errormsg = "" ;
		if(count($_POST)>0 && $_POST['login_proceed'] == "Login" )
		{
			$email_id = trim(htmlentities($_POST['email_id']));
			$password= trim(htmlentities($_POST['user_password']));
			if($error == 0 && $email_id == "" )
			{
				$errormsg = "Email cannot be left blank" ;
				$error++ ;
			}
			if($error == 0 && $password == "" )
			{
				$errormsg = "Password cannot be left blank" ;
				$error++ ;
			}
			if($error == 0 )
			{
			$data = "select count(*) from per_info where email = \"".$email_id."\" " ;
			
			if(get_value($data)!=1)
				{
					$error++ ;
					$errormsg = "Authentication Failure" ;
				}
			}
			$data = "select pass from per_info where email = \"".$email_id."\" " ;
			$pass = get_value($data);
			
			if( $error ==0 && $pass != md5($password) ) 
			{
				$error++ ;
				$errormsg = "Email password mismatch" ;
			}
			if($error ==0 && $pass == md5($password) )
			{
				// login success
				$data = "select stu_id from per_info where email = \"".$email_id."\" " ;
				$get_user_id = get_value($data) ;
				$_SESSION['stu_avishkar_id'] = $get_user_id;
				redirect('./home.php');
			}
			if($error > 0 )
			{
				echo "<div class=\"error_box\"><center>".$errormsg."</center></div>" ;
			}
		}
		?>
        
        <form action="" method="post" name="login_me">
        <table width="60%" cellpadding="10px" border="0" align="center">
        <tr><td>Email ID</td><td><input name="email_id" class="textbox" type="text" /></td></tr>
        <tr><td>Password</td><td><input name="user_password" class="textbox" type="password" /></td></tr>
        <tr><td colspan="2"><center><input name="login_proceed" type="submit" class="button2" value="Login" style="width:150px; height:40px;" /></center></td></tr>
        </table>
        </form>
        </center>
        </div>
		</div>
        