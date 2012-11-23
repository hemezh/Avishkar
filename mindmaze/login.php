<h2>Mind-Maze Login</h2>
<br />
<?php
if(!chkcontest())
{
				$_SESSION['message'] = "Contest is closed" ;
				redirect('./index.php?page=message');
}
		$err = 0 ;
		if(count($_POST)>0 && $_POST['login_proceed'] == "Login" )
		{
			$err_msg = "" ;
			$teamname = htmlentities(trim($_POST['teamname'])) ; 
			$password = htmlentities(trim($_POST['password'])) ;
			if( $teamname == ""  || $password == "" )
			{
				$err++ ;
				$err_msg = "Please enter data" ;
			}
			else
			{
				$res = chkTeamAndPassword($teamname,$password)	;
				if($res == -5)
				{
					$err++ ;
					$err_msg = "Unauthorised access" ;
				}
				else if ( $res == -1 )
				{
					$err++ ;
					$err_msg = "no such team exist" ;
				}
				else if( $res == 1 )
				{
					$err=100 ;
					$teamID = getTeamID($teamname);
					$_SESSION['mind_maze_team_id'] = $teamID ;
					redirect('./home.php') ;
					$err_msg = "You are logged in !!! <a href=\"./home.php\">Click to proceed</a>" ;
				}
				else if($res == 0)
				{
					$err++ ;
					$err_msg ="Username password missmatch" ; 
				}
				else
				{
					$err++ ;
					$err_msg ="Server is facing some problem plz try after some time" ; 
				}
			}
		}
		?>
<form action="" method="post" name="mind_maze_login">
        <table width="60%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="2"><?php if($err>0) echo "<font color=\"#FF0000\"><center>".$err_msg."</center></font>" ;
							if( $err == 100 ) echo "<font color=\"green\"><center>Register SucessFully Proceed to Login</center></font>" ;
		?></td></tr>
        <tr><td>Teamname</td><td><input name="teamname" class="textbox" type="text" /></td></tr>
        <tr><td>Password</td><td><input name="password" class="textbox" type="password" /></td></tr>
        <tr><td colspan="2"><center><input name="login_proceed" type="submit" class="button2" value="Login" style="width:150px; height:40px;" /><br /><br />for new team <a href="?page=register">registeration click here</a> </center></td></tr>
        </table>
</form>
