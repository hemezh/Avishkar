<?php


function chkRegisteredAvishkarID($avishkarID)
{
	$avis = substr($avishkarID,4);
	$data = "select count(*) from mindmaze_teams where avishkarid1 = \"".$avis."\" " ;
	$res1 = get_value($data) ;
	$data = "select count(*) from mindmaze_teams where avishkarid1 = \"".$avis."\" " ;
	$res2 = get_value($data) ;
	if($res1 >1  || $res2 >1 )
		return true ;
	else
		return false ;
}

function isreg_admin_login()
{
	if(isset($_SESSION['reg_admin_id']))
	{
			return true ;	
	}
	else 
		return false ;
}


function chkAvishkarID($avishkarID)
{
	$avis = substr($avishkarID,4);
	$data = "select count(*) from per_info where stu_id = \"".$avis."\" " ;
	$res = get_value($data) ;
	if($res == 1 )
		return true ;
	else
		return false ;
}



?>