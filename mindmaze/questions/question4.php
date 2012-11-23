<h2>Mind-Maze Question 2: Mirrors</h2>
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
		$chksubmitted="select answer from mind_maze_submission where team_id = \"".$teamID."\" and question_id = \"4\" " ;
		$r = trim(get_value($chksubmitted));
		if($r!="")
			$msg = "Already Submitted a Solution"; 
			else
			$msg = "" ;
		if(count($_POST)>0 && $_POST['submit_quest_4'] == "Submit My Solution" )
		{
			//print_r($_POST);
			$answer1 = trim($_POST['answer4_1']) ;
			$answer2 = trim($_POST['answer4_2']) ;
			$answer2=str_replace(" ","",$answer2);
			$answer = $answer1."#".$answer2;
			$teamID = $_SESSION['mind_maze_team_id'];
			$data = "UPDATE mind_maze_submission SET answer = \"".$answer."\" WHERE team_id =\"".$teamID."\" AND question_id =\"4\" " ;
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
        <font size="+1">Your objective is to place some diagonal 'mirrors' into the grid. If a ray of light is shone in to the grid from each of the letters, and allowed to bounce off the internal diagonal mirrors, each will exit the grid at the twin of the letter that it entered the grid. 
<br /><br />For example, a ray entering at either letter A will bounce off some mirrors and exit the grid at the other letter A.
<br />Each row and each column will contain exactly two of the diagonal mirrors.
<br />
You have to tell:
<ol type="i"><li>How many mirros are needed.</li>
<li>Numbers of points in circles(in ascending order) between whom a mirror will be placed.<br />
    <ul type="none"><li>eg. x, y where x < y</li>
    <li>eg. a, b, c where a < b < c</li>
    </ul>
</ol>
<font size="-1">Format of answer should be: (x,y)(a,b,c)........</font>
        </font>
        <center><img src="./questions/question4.png"</center>
</td></tr>
<tr>
<td colspan="2">Enter Number of Mirrors</td>
<td colspan="2"><input name="answer4_1" type="text" size="4" maxlength="4" /></td>
</tr>
<tr>
<td colspan="2">Enter Coordinates</td>
<td colspan="2"><textarea name="answer4_2" style="width:90%" ></textarea></td>
</tr>
<tr><td colspan="4"><center><input name="submit_quest_4" type="submit" value="Submit My Solution" /></center></td></tr>
        </table>
</form>
