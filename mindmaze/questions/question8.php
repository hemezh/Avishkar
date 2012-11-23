<h2>Mind-Maze Question 2: Column Puzzle</h2>
<br />
<?php
if(!chkcontest())
			{
				$_SESSION['message'] = "Wait for timer" ;
				redirect('./home.php?page=message');
			}
		$err = 0 ;
		$msg = "" ;
		
		$err_msg = "" ;
		$teamID = $_SESSION['mind_maze_team_id'];
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"8\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_8'] == "Submit My Solution" )
		{
			$answer = trim($_POST['answer8']) ;
			$answer=str_replace(" ","",$answer);
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"8\" " ;
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
        <font size="+1">Given below is a <b>Kakuro</b> figure,
        <ul><li>A clue box - which has usually a number on the bottom and/ or on the right side.</li>
        <li>A white blank box - that is where you fill in the a number between 1 and 9.</li>
        <li>A block box - that is the black box.</li></ul>
        <b>Rules:</b> Place one digit from 1 to 9 in each empty box so that the sum of the digits in each set of consecutive white boxes(horizontal or vertical) is the number appearing to the left of a set or above the set. No number may appear more than once in any consecutive boxes.
        </font>
        <br />
        <center><font size="+1">Problem Image</font><br /><img src="./questions/question8.png" width="570px" height="500px" /></center>
        </td></tr>
        <tr><td colspan="4">
        <center><font size="+1">Enter Value For Following:</font><br />
        <!-- by saurabh -->
        <font size="+1">Fill as:</font> <?php for($i=1;$i<60;$i++) echo "B".$i.", " ;  echo "B".$i; ?>
        <!-- saurabhs code ends here -->
        </center>
        </td></tr>       
<tr>
<td colspan="4"><center><textarea name="answer8" style="width:500px"></textarea><br /><br /><input name="submit_quest_8" type="submit" value="Submit My Solution" /></center></td></tr>
</table>
</form>
