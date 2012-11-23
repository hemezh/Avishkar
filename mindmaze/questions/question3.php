<h2>Mind-Maze Question 3: Encryption</h2>
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
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"31\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg1 = "Already Submitted a Solution 3(a)"; 
			else
			$msg1 = "" ;
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"32\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg2 = "Already Submitted a Solution 3(b)"; 
			else
			$msg2 = "" ;
		if(count($_POST)>0 && isset($_POST['submit_quest_3_1']) && $_POST['submit_quest_3_1'] == "Submit Solution" )
		{

			$answer = trim($_POST['answer3_1']) ;
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"31\" " ;
			$go = process_query($data);
			$err_msg = "Answer for 3(a) is updated sucessfully" ;
		}
		if(count($_POST)>0 && isset($_POST['submit_quest_3_2']) && $_POST['submit_quest_3_2'] == "Submit Solution" )
		{
			$answer = trim($_POST['answer3_2']) ;
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"32\" " ;
			$go = process_query($data);
			$err_msg = "Answer for 3(b) is updated sucessfully" ;
		}
		?>

        <table width="100%" cellpadding="10px" border="0" align="center">
        <tr><td colspan="4"><h2><center>(5+5 marks)</center></h2>
        <center>
        <?php echo "<br /><font color=\"#00CC33\">".$err_msg."</font><br /><font color=\"#FF0000\">".$msg1."<br />".$msg2."<br /></font>"  ; ?>
        </center>
        <br />
        <font size="+1">Decrypt the following encrypted message.</font>
        <br />(Enter answer in uppercase, single space b/w 2 words and without fullstop)<br />
        <font size="+1">
        <br /><br />1)Encrypted->HLPS ZLNJWYN RIYFS LF I HLPS ZLNJWYN SPPSRN<br />(Hint: philosophy of life) <br />
        <center><b>Answer 1:</b></center><br />
        <form action="" method="post" name="question31">
        <center><textarea style="width:90%" name="answer3_1"></textarea><br /><br /><input name="submit_quest_3_1" type="submit" value="Submit Solution" /></center>
        
       </form>
       <br /><br />
       <form action="" method="post" name="question32">
        <br /><br />ENCYPTION : L ZLJJ QP WKP NLBYNREP ZLBBPT<br />(Hint : Why you are here?)<br />
        <center><b>Answer 2:</b></center><br />
        <form action="" method="post" name="question31">
        <center><textarea style="width:90%" name="answer3_2"></textarea><br /><br /><input name="submit_quest_3_2" type="submit" value="Submit Solution" /></center>
        
       </form>
        </font>
</td></tr>
<tr>
<td colspan="4"><center></center></td></tr>
        </table>
</form>
