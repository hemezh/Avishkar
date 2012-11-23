<?php 
	include('./header.php');
	if( chk_loggin() )
	redirect('./home.php');
?>

<div style="background:#fff">
<div id="main" >

 <table border="0" width="100%">
 		<tr>
        <td style="padding-top:15px;" colspan="2">
        <div id="permalink"></div>
        </td>
       	<td width="150px" valign="top" rowspan="2">
        <br />
        <?php 
			include('./sponsor.php'); 
		?>
        </td>
        </tr>
        <tr>
        <td valign="top" width="160px"><?php include('./accordion_registerpanel.php'); ?></td>
        <td style="vertical-align:top;" id="main_area">
        
        <?php
		$get_page = "" ;
		if(isset( $_GET['page']) )
			$get_page = $_GET['page'] ;
		switch($get_page)
		{
			case "message" : require_once('./message.php'); break ;
			case "forgot" : require_once('./forgot.php'); break ;
			default : require_once('./register_page.php');
		}
		?>
        
        </td>
        </tr>
        </table>
	</div>
    </div>
<?php include('./footer.php') ; ?>