<?php 
	include('./header.php');
	
	if( !chk_loggin() )
		redirect('./login.php');
	
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
        <td valign="top" width="160px"><?php include('./accordion_userpanel.php'); ?></td>
        <td style="vertical-align:top;" id="main_area">
       <?php
		$get_page = "" ;
		if(isset( $_GET['page']) )
			$get_page = $_GET['page'] ;
		switch($get_page)
		{
			case "register_event" : require_once('./register_event_new.php'); break ;
			case "my_registered_events" : require_once('./myRegisteredEvents.php'); break;
			case "profile" : require_once('./profile.php');break;
			case "edit_page" : require_once('./edit_name.php'); break ;
			case "name_edit" : require_once('./user/name_edit.php');break;
			case "mobile_edit" : require_once('./user/mobile_edit.php'); break ;
			case "address_edit" : require_once('./user/address_edit.php');break;
			case "college_edit" : require_once('./user/college_edit.php');break;
			case "grad_edit" : require_once('./user/grad_edit.php');break;
			case "branch_edit" : require_once('./user/branch_edit.php');break;
			case "year_edit" : require_once('./user/year_edit.php');break;
			case "pass_edit" : require_once('./user/pswd_edit.php');break;
			case "portal" : require_once('./portal/temp.php');break;
			case "getfulllist" : require_once('./user/getfulllist.php');break;
			case "getinfo" : require_once('./user/getinfo.php');break;
			case "eventresult" : require_once('./user/eventresult.php');break;
			default : require_once('./profile.php');
		}
		?>
        </td>
        </tr>
        </table>
	</div>
    </div>
<?php include('./footer.php') ; ?>