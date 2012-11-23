<h2>Mind-Maze Question 2: Column Puzzle</h2>
<br />
<?php
if(!chkcontest())
			{
				$_SESSION['message'] = "Wait for timer" ;
				redirect('./home.php?page=message');
			}
		$err = 0 ;
//		print_r($_POST);
		$err_msg = "" ;
		$teamID = $_SESSION['mind_maze_team_id'];
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"2\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_2'] == "Submit My Solution" )
		{

			$answer = trim($_POST['answer2']) ;
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"2\" " ;
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
        
        <font size="+1">Identify the four digit number:<br /><br /><center>5292 -- 5489</center><br />
        <center>1842 -- 2656</center><br />
        <center>3060 -- 3595</center><br />
        <center>____ -- 9258</center><br />
        <center><b>Answer:</b></center>
        </font>
</td></tr>
<tr>
<td colspan="4"><center><input name="answer2" type="text" size="4" maxlength="4" /><br /><br /><input name="submit_quest_2" type="submit" value="Submit My Solution" /></center></td></tr>
        </table>
</form>
