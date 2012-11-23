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
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"6\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_6'] == "Submit My Solution" )
		{
			
			$answer = trim($_POST['answer6']) ;
			$answer=strtoupper(str_replace(" ","",$answer));
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"6\" " ;
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
        <font size="+1">
        Using all of the letters A to Z, each once only, complete these words:
<br /><br />
		<font size="+2">*e*el  <br />
        b*d<br />
        s*i*l<br />
        swa**<br />
        fo*<br />
        *er*y<br />
        a*ur*<br />
        *u*dy<br />
        *uo*e<br />
        *e*a*e<br />
        ed**<br />
        sc*r*y<br />
        l*p<br />
        **lls</font>

        </font>
</td></tr>
<tr>
<td colspan="4"><center><textarea name="answer6" style="width:500px"></textarea><br /><font size="-1" color="#999999">Use comma to seperate words</font><br /><br /><input name="submit_quest_6" type="submit" value="Submit My Solution" /></center></td></tr>
        </table>
</form>
