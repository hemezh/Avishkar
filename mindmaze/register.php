<h2>Mind-Maze Login</h2>
<br />
<form action="" method="post" name="mind_maze_login">
		<?php
		$err = 0 ;
		if(count($_POST)>0 && $_POST['register_proceed'] == "Register" )
		{
			//print_r($_POST);
			
			$err_msg = "" ;
			$teamname = htmlentities(trim($_POST['teamname'])) ; 
			$password = htmlentities(trim($_POST['password'])) ;
			$rpassword = htmlentities(trim($_POST['rpassword'])) ;
			$akid1 = htmlentities(trim($_POST['akid1']));
			$akid2 = htmlentities(trim($_POST['akid2']));
			
			if($teamname == "" || $password == "" || $rpassword == "" )
			{
				$err++ ;
				$err_msg = "Fill manadatory fields" ;
			}
			if($err == 0 && ($akid1 == "" && $akid2 == "" ) )
			{
				$err++ ;
				$err_msg = "Fill avishkarID " ;
			}
			if($err == 0 && $akid1 != "" && !chkAvishkarID($akid1))
			{
				$err++ ;
				$err_msg = "Invalid avishkar ID" ;
			}
			if($err == 0 && $akid2 != "" && !chkAvishkarID($akid2))
			{
				$err++ ;
				$err_msg = "Invalid avishkar ID" ;
			}
			if( $err == 0 && $akid1 != "" && chkRegisteredAvishkarID($akid1))
			{
				$err++ ;
				$err_msg = "Avishkar ID 1 already registered" ;
			}
			if( $err == 0 && $akid2 != "" && chkRegisteredAvishkarID($avishkarID))
			{
				$err++ ;
				$err_msg = "Avishkar ID 1 already registered" ;
			}
			if($err == 0 && chkNewTeamName($teamname) == 0 )
			{
				$err++ ;
				$err_msg = "Invalid teamname" ;
			}
			if($err == 0 && chkNewTeamName($teamname) == -1 )
			{
				$err++ ;
				$err_msg = "Teamname already registered" ;
			}
			if( $err == 0 && $password != $rpassword )
			{
				$err++ ;
				$err_msg = "Password missmatch" ;
			}
			if($err==0)
			{
				$data = "insert into mindmaze_teams (teamname, avishkarid1,avishkarid2, password) values (\"".$teamname."\" , \"".$akid1."\", \"".$akid2."\" , \"".md5($password)."\" ) " ;
				$go = process_query($data);
				$data2 = "select team_id from mindmaze_teams where teamname = \"".$teamname."\"  " ;
				$teamid = get_value($data2);
				$data = "select * from mindmaze_ques " ;
				$res = process_query($data);
				while($result = mysql_fetch_array($res))
				{
					$data3 = "insert into mind_maze_submission ( team_id , question_id ) values ( \"".$teamid."\" , \"".$result['quest_no']."\") " ;
					$gogo = mysql_query($data3) ;																											
				}
				$err = 100 ;
			}
		}
		?>
        <table width="70%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="2"><?php if($err>0) echo "<font color=\"#FF0000\"><center>".$err_msg."</center></font>" ;
							if( $err == 100 ) echo "<font color=\"green\"><center>Register SucessFully Proceed to Login</center></font>" ;
		?></td></tr>
        <tr><td>Teamname<font color="#FF0000">*</font></td><td><input name="teamname" class="textbox" type="text" /></td></tr>
        <tr><td>Password<font color="#FF0000">*</font></td><td><input name="password" class="textbox" type="password" /></td></tr>
        <tr><td>Retype Password<font color="#FF0000">*</font></td><td><input name="rpassword" class="textbox" type="password" /></td></tr>
        <tr><td>Avishkar ID 1<font color="#FF0000">*</font></td><td><input name="akid1" class="textbox" type="text"  style="width:100px" /></td></tr>
        <tr><td>Avishkar ID 2</td><td><input name="akid2" class="textbox" type="text" style="width:100px" /></td></tr>
        <tr><td colspan="2"><center><input name="register_proceed" type="submit" class="button2" value="Register" style="width:150px; height:40px;" /></center></td></tr>
        </table>
</form>
