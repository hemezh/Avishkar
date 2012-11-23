<?php
if(!isset($func))
	die ;
if( !chk_loggin() )
		redirect('./login.php');
if(!isHead(getLoginID()))
		redirect('./home.php');
$id= $_SESSION['stu_avishkar_id'];
		//print_r($_POST);
		$error = 0 ;   
		$errormsg = "" ;
		
?>
<style type="text/css">
.listing li { padding:10px; list-style:none}
</style>
<div class="top-heading">Enter Your Event Result</div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="100%" cellpadding="5px" border="0" align="center">
<tr><td width="30%" valign="top">
<center><b>This portal is currently locked, will available only on the day of Avishkar 2011<br /> <img src="../images/locked.png" /></center>
</td></tr>
<tr>
<td colspan="3" style="border:thin; border-color:#CCC">

</td>
</tr>
</table></form></center></div></div>			                                                    		                                                 