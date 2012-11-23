<?php
include('header_mind_maze.php');
if(isreg_admin_login()!=1)
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
        <td width="15%">
        <?php include('./accordion_mindmaze.php'); ?>
        </td>
        <td style="vertical-align:top; text-align:center; padding-top:10px;" id="main_area">
        <div id="centered_contents" align="center">
        <div class="css-panes skin2">
        <div id="tab_content1" style="display:block">
        <?php 
		switch($page_id)
		{
			case "reg" : include('./reg/reg_student.php'); break  ;
			case "prc" : include('./reg/price.php'); break  ;
			case "id" : include('./reg/s_id.php'); break  ;
			case "vid" : include('./reg/v_id.php'); break  ;
			case "details" : include('./reg/details.php');break;
			case "o_list" :include('./reg/outside_list.php');break;
			case "prc_cal":include('./reg/price_cal.php'); break;
			case "pr_id":include('./reg/pr_id.php');break;
			case "pr_vid":include('./reg/pr_vid.php');break;
			case "search":include('./reg/search.php');break;
		/*	default : include('./dashboard.php');  */
		}
		
		?>
        </div>
        </div>
        </div>
        </td>
        <td width="20%" valign="top" align="center">
        <div style="font-size:48px; text-align:center"></div>
        <div id="sponsorHead"><a href="./logout.php">Logout</a></div>
        <br /><br />
        <?php 
		$info = getUserByAKID("AK11".$_SESSION['reg_admin_id']);
		echo "<font size=\"+1\">".$info['name']."</font>";
		?>
        </td>
        </tr>
</table>
</div>
</div>
<?php
include('footer_mind_maze.php');
?>