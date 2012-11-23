<h2>Mind-Maze Question 2: Column Puzzle</h2>
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
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"5\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_5'] == "Submit My Solution" )
		{
			
			$answer = strtoupper(trim($_POST['answer5'])) ;
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"5\" " ;
			$go = process_query($data);
			$err_msg = "Answer is updated sucessfully" ;
		}
		?>
<form action="" method="post" name="question1">
        <table width="100%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="4"><h2><center>(10 marks)</center></h2>
        <center>
        <?php echo "<br /><font color=\"#00CC33\">".$err_msg."</font><br /><font color=\"#FF0000\">".$msg."<br /></font>"  ; ?>
        </center><br />
        <font size="+1">Given below is a figure,in which each line represents a sequence which is same for all the 3
lines.Predict the geometrical figure that can replace the question mark in the last line.
Just enter the name of figure, for example:- if your answer is triangle then write triangle
(all letters must be in small case).
        </font>
        <br />
        <center><img src="./questions/question5.png" /></center>
</td></tr>
<tr>
<td colspan="4"><center><input name="answer5" type="text" size="30" maxlength="100" /><br /><br /><input name="submit_quest_5" type="submit" value="Submit My Solution" /></center></td></tr>
        </table>
</form>
