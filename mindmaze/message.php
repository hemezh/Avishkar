<h2>Mind-Maze Message</h2>
<br />
<?php
		$err = 0 ;
		if(count($_POST)>0 && $_POST['login_proceed'] == "Login" )
		{
			$err_msg = "" ;
			
			
		}
		?>
<form action="submit_answer.php" method="post" name="question1">
        <table width="100%" cellpadding="10px" border="0" align="left" >
      <tr><td>
      <?php if(isset($_SESSION['message']))
	  echo "<font size=\"+2\">Wait For Timer</font>"; ?>
</td></tr>
</table>
</form>
