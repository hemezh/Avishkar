<?php
include('header_mind_maze.php');
if(isreg_admin_login()==1)
	redirect('./home.php');
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
			case "register" : include('./register.php'); 
			default : include('./login.php'); 
		}
		
		?>
        </div>
        </div>
        </div>
        </td>
        <td width="20%" valign="top" align="center">
        <div id="mind_maze_timer">
        
        </div>
         <div id="sponsorHead"><a href="./">Login</a></div>
        </td>
        </tr>
</table>
</div>
</div>
<?php
include('footer_mind_maze.php');
?>