<h2>Registration Portal ID</h2>
<br />
<?php
		require_once('../functions.php');
		$err = 0 ;
		if(count($_POST)>0 && $_POST['login_proceed'] == "Login" )
		{
			$err_msg = "" ;
			$studid = htmlentities(trim($_POST['studid'])) ; 
			$password = htmlentities(trim($_POST['password'])) ;
			if( $studid == ""  || $password == "" )
			{
				$err++ ;
				$err_msg = "Please enter data" ;
			}
			else
			{
				$studid = substr($studid,4);
				$data = "select count(*) from reg_admin where stu_id  = \"".$studid."\" " ;
				if(get_value($data)!=1)
				{
					$err++ ;
					$err_msg = "Invalid ID" ;
				}
				else
				{
					$data = "select password from reg_admin where stu_id = \"".$studid."\" " ;
					$pass = get_value($data) ;
					if($pass == md5($password))
					{
						$_SESSION['reg_admin_id'] = $studid ;
						redirect('./home.php');
					}
					else
					{
						$err++ ;
						$err_msg = "" ;
					}
				}

			}
		}
		?>
<form action="" method="post" name="mind_maze_login">
        <table width="60%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="2"><?php if($err>0) echo "<font color=\"#FF0000\"><center>".$err_msg."</center></font>" ;
							if( $err == 100 ) echo "<font color=\"green\"><center>Register SucessFully Proceed to Login</center></font>" ;
		?></td></tr>
        <tr><td>Student Id</td><td><input name="studid" class="textbox" type="text" /></td></tr>
        <tr><td>Password</td><td><input name="password" class="textbox" type="password" /></td></tr>
        <tr><td colspan="2"><center><input name="login_proceed" type="submit" class="button2" value="Login" style="width:150px; height:40px;" /><br /><br /></td></tr>
        </table>
</form>
