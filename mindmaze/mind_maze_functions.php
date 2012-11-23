<?php
function chkTeamName($teamname)
{
	$data = "select count(*) from mindmaze_teams where teamname = \"".$teamname."\" " ;
	$res = get_value($data) ;
	return $res ;
}

function chkNewTeamName($teamname)
{
	if(trim($teamname)=="")
		return 0;
	if(chkTeamName($teamname)>0)
		return -1;
	return 1;
}

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

function islogin()
{
	if(isset($_SESSION['mind_maze_team_id']))
	{
		if(chkTeamName(getTeamNameByTeamID($_SESSION['mind_maze_team_id']))==1)
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

function getTeamID($teamname)
{
	if( chkTeamName($teamname) != 1 ) 
	{
		echo "Unusual erro ocurred" ;
		die ;
	}
	$data = "select team_id from mindmaze_teams where teamname = \"".$teamname."\" " ; 
	$teamid = get_value($data);
	return $teamid ;
}

function chkTeamAndPassword($teamname,$password)
{
	if( chkTeamName($teamname) > 1 )
		return -5 ;
	if( chkTeamName($teamname) == 0 )
		return -1 ;
	if( chkTeamName($teamname) == 1 )
		{
			$getpass = "select password from mindmaze_teams where teamname = \"".$teamname."\" " ;
			$pass = get_value($getpass);
			if( $pass == md5($password) )
				return 1;
				else
				return 0;
		}
	return -5 ;
}

function getTeamNameByTeamID($teamID)
{
	$data = "select teamname from mindmaze_teams where team_id  = \"".$teamID."\" " ;
	return get_value($data);
}

function chkcontest()
{
	 $data = "select value from mindmaze_mapping where field =\"complete\"";
	$res = get_value($data);
	if( $res != 0 )
		return false ;
		else 
		return true ;
}

function mapQuestionNoToID($question_no)
{
	// return quest_id
}

function returnQuestionSet($teamID)
{
	// return an array having all 10 questions
}

function returnQuestionArrayByID($questionID)
{
	// return an question
}

function allotQuestionToTeam($teamID)
{
	// question allotment for a teaam
}

function get_time_difference( $start, $end )
{
    $uts['start']      =    strtotime( $start );
    $uts['end']        =    strtotime( $end );
    if( $uts['start']!==-1 && $uts['end']!==-1 )
    {
        if( $uts['end'] >= $uts['start'] )
        {
			$is_correct = 1 ;
            $diff    =    $uts['end'] - $uts['start'];
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('iscorrect'=>1 ,'days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        }
        else
        {
			$temp = $uts['end'] ; 
			$uts['end']  = $uts['start'];
			$uts['start'] = $temp ;
            $is_correct = -1 ;
            $diff    =    $uts['end'] - $uts['start'];
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('iscorrect'=>-1 ,'days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        }
    }
    else
    {
        trigger_error( "Invalid date/time data detected", E_USER_WARNING );
    }
    return( false );
}


function chkQuestionByTeam()
{
	
}

?>