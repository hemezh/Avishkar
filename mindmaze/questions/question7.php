<h2>Mind-Maze Question 7: Series</h2>
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
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"7\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_7'] == "Submit both Answer" )
		{
			$answer1 = trim($_POST['answer7_1']) ;
			$answer2 = trim($_POST['answer7_2']) ;
			$answer1=str_replace(" ","",$answer1);
			$answer2=str_replace(" ","",$answer2);
			$teamID = $_SESSION['mind_maze_team_id'];
			$answer = $answer1."#".$answer2 ;
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"7\" " ;
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
        <font size="+1">Find the next two numbers in the following series:<br />
		<ol><li>33, 24, 34, 14, 33, 11, __ , __</li><li>11, 52, 24, 44, 23, 31, __, __</li></ol>
        <br /><b>HINT :</b> Think about english alphabets and N<b>x</b>N tables. All digits are of 2-digits only.<br />
        </font>
</td></tr>
<tr>
<td colspan="2">Enter comma seperated 2 digits for first series(eg. a,b):</td>
<td colspan="2"><input name="answer7_1" type="text" size="8" maxlength="8" /></td>
</tr>
<tr>
<td colspan="2">Enter comma seperated 2 digits for second series(eg. c,d):</td>
<td colspan="2"><input name="answer7_2" type="text" size="8" maxlength="8" /></td>
</tr>
        </table>
        <center><br /><font size="-1" color="#FF0000"><center>Submit both answer at once.</center></font><input type="submit" name="submit_quest_7" value="Submit both Answer" /></center>
</form>