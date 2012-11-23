<?php
include('header_mind_maze.php');
if(islogin()!=1)
	redirect('./');
$page_id = "" ;
if(isset($_GET['page']))
{
	$page_id = $_GET['page'] ;
}
?>
<div style="background:#fff">
<div id="main" >

<table border="0" width="100%" >
 		<tr>
        <td width="15%" valign="top">
        <?php include('./accordion_mindmaze.php'); ?>
        </td>
        <td style="vertical-align:top; text-align:center; padding-top:10px;" id="main_area">
        <div id="centered_contents" align="center">
        <div class="css-panes skin2">
        <div id="tab_content1" style="display:block">
        <?php 
		switch($page_id)
		{
			case "question1" : include('./questions/question1.php'); break  ;
			case "question2" : include('./questions/question2.php'); break  ;
			case "question3" : include('./questions/question3.php'); break  ;
			case "question4" : include('./questions/question4.php'); break  ;
			case "question5" : include('./questions/question5.php'); break  ;
			case "question6" : include('./questions/question6.php'); break  ;
			case "question7" : include('./questions/question7.php'); break  ;
			case "question8" : include('./questions/question8.php'); break  ;
			case "question9" : include('./questions/question9.php'); break  ;
			case "question10" : include('./questions/question10.php'); break  ;
			case "rules" : include('./dashboard.php'); break  ;
			default : include('./dashboard.php'); 
		}
		?>
        </div>
        </div>
        </div>
        </td>
        <td width="20%" valign="top" align="center">
        
<!--        <font size="-2">(Dont try to stop this timer :P)</font> -->
        <div style=" text-align:center; height:70px; width: border:#93C; border-width:thin; border-style:solid" id="mind_maze_timer"><br /><img src="loader.gif" /></div>
        <br /><br />
        <div id="sponsorHead"><a href="./logout.php">Logout</a></div><br /><br />
        <?php 
		$teamID = $_SESSION['mind_maze_team_id'];
		$data = "select * from mindmaze_teams where team_id  = \"".$teamID."\" " ; 
		$res = process_array($data);
		echo "<br /><br /><font size=\"+1\">Team: ".$res['teamname']."</font>" ;
		?>
        </td>
        </tr>
</table>
</div>
</div>
<?php
include('footer_mind_maze.php');
?>