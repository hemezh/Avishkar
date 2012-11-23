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
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"9\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_9'] == "Submit My Solution" )
		{

			$answer = trim($_POST['answer9']) ;
			$answer=str_replace(" ","",$answer);

			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"9\" " ;
			$go = process_query($data);
			$err_msg = "Answer is updated sucessfully" ;
		}
		?>
<form action="" method="post" name="question1">
        <table width="100%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="4"><h2><center>(10 marks)</center></h2>
        <center>
        <?php echo "<br /><font color=\"#00CC33\">".$err_msg."</font><br /><font color=\"#FF0000\">".$msg."<br /></font>"  ; ?>
        </center>
        <br />
        <font size="+1">Fill all the squares with numbers ranging from 1-7(both inclusive) only, and the angle bracket represent inequalities.</font>
        <center><img src="./questions/question9.png" /></center>
        <br />
        
        <font size="+1">Fill as:</font> <?php for($i=1;$i<56;$i++) echo "B".$i.", " ;  echo "B".$i; ?>
</td></tr>
<tr>
<td colspan="4"><center><textarea name="answer9" style="width:500px"></textarea><br /><br /><input name="submit_quest_9" type="submit" value="Submit My Solution" /></center></td></tr>
        </table>
</form>
