<h2>Mind-Maze Question 1: Bubble Numbers</h2>
<br />
<?php
if(!chkcontest())
			{
				$_SESSION['message'] = "Wait for timer" ;
				redirect('./home.php?page=message');
			}
		$err = 0 ;
		$err_msg = "" ;
		$teamID = $_SESSION['mind_maze_team_id'];
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"1\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_1'] == "Submit My Solution" )
		{
			$answer = "" ;
			for($i = 1 ;$i<=8; $i++)
			{
				$f = "bub_".$i ;
				$answer .= trim($_POST[$f]) ;
			}
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"1\" " ;
			$go = process_query($data);
			$err_msg = "Answer is updated sucessfully" ;
			
		}
		?>
<form action="" method="post" name="question1">
        <table width="100%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="4"><h2><center>(5 marks)</center></h2>
        <center>
        <?php echo "<br /><font color=\"#00CC33\">".$err_msg."</font><br /><font color=\"#FF0000\">".$msg."<br /></font>"  ; ?>
        </center>
        
        <font size="+1"><br />Place the digits 1 to 8, into the bubbles (one number only in one bubble).
The numbers you can see in <b>bold</b> are the totals for the numbers in the surrounding bubbles.
<center><img src="./questions/question1.png" /></center>
<b>Answer:</b></font>
</td></tr>
<tr>
<td><b>Bubble 1</b> <input name="bub_1" type="text" size="1" maxlength="2" /></td>
<td><b>Bubble 2</b> <input name="bub_2" type="text" size="1" maxlength="2" /></td>
<td><b>Bubble 3</b> <input name="bub_3" type="text" size="1" maxlength="2" /></td>
<td><b>Bubble 4</b> <input name="bub_4" type="text" size="1" maxlength="2" /></td>
</tr>
<tr>
<td><b>Bubble 5</b> <input name="bub_5" type="text" size="1" maxlength="2" /></td>
<td><b>Bubble 6</b> <input name="bub_6" type="text" size="1" maxlength="2" /></td>
<td><b>Bubble 7</b> <input name="bub_7" type="text" size="1" maxlength="2" /></td>
<td><b>Bubble 8</b> <input name="bub_8" type="text" size="1" maxlength="2" /></td>
</tr>
<tr><td colspan="4"><center><input name="submit_quest_1" type="submit" value="Submit My Solution" /></center></td></tr>
        </table>
</form>
