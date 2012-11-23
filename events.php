<?php 
	include('./header.php');
?>
<div style="background:#fff">
<div id="main">
 <table border="0" width="100%">
 		<tr>
        <td style="padding:30px 15px 0px 15px;" colspan="2">
		<div id="prize_money">
		<div class="css-panes skin2">
		<p align="center" style="font-weight:bolder; font-size:16px; background-color:#072330; color:#F0F0F0; box-shadow:0 0 10px black inset; font-family:'Lucida Sans Unicode','Lucida Grande',sans-serif; opacity:0.95" >Prizes worth 5 Lakhs to be won !!!</p>	
        </div></div>
        </td>
       	<td width="150px" valign="top" rowspan="2">
        <br />
        <?php 
			include('./sponsor.php'); 
		?>
        </td>
        </tr>
        <tr>
        <td valign="top" width="160px"><?php include('./accordion_event.php'); ?></td>
        <td style="vertical-align:top;" id="main_area">
        <div id="centered_content">
        <br /><br /><br /><br /><br /><center><img src="./images/loader.gif" /></center>	
        <?php
		//include('event_matrix.php');
		 ?>
        </div>
        </td>
        </tr>
        </table>
	</div>
    </div>
<?php include('./footer.php') ; ?>