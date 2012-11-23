<?php
// connect function 

$DB = "avishkar2011" ;
$func = "#$%^&*(" ;
function sql_connect()
{
		$host="localhost";
		$user="root";
		$password="";
		
		$connection = mysql_connect($host,$user,$password) or die("Server is facing some problem.");
		return 	$connection;
}

function genderMap($a)
{
	if($a == "m")
		return "Male";
	else if($a == "f" )
		return "Female" ;
	return NULL ;
}

// redirect function
function redirect( $url ) 
{
		echo '<script language="javascript">';	
		echo	"window.location.href= \"$url\"  ";
       	echo	'</script>';
}		

function numSufix($i)
  {
	  $last = $i%10 ;
	  switch($last)
	  {
		  case 1 : return "st" ;
		  case 2 : return "nd" ;
		  case 3 : return "rd" ;
		  default : return "th" ;
	  }
  }

function alert($message)
{
      echo "<script>
      alert( \"$message\" );
      </script>";
         
}

function palert($message,$tourl)
{
      echo "<script>
      alert( \"$message\" );
      </script>";
         redirect($tourl);
}
// all functions of mysql
function process_query ($query_string)
{
	global $DB;
	$dbase = $DB ;
	mysql_select_db($dbase) or die("Server is facing some technical problem, please try after sometime.");
	$result = mysql_query( $query_string ) or die (mysql_error());
	return $result;
}		

function value ( $column , $table, $variable, $value )
{
	global $DB;
	$dbase = $DB ;
   $get_map_query = "SELECT $column from $table WHERE $variable = '$value' ";
  	
	$get_map_res = process_query(  $get_map_query);
   
 return $got_value = mysql_fetch_array($get_map_res);
   
}

function get_value($query_string)
{
	global $DB;
	$dbase = $DB ;
	mysql_select_db($dbase) or die("Server is facing some technical problem, please try after sometime.");
	$query = mysql_query( $query_string) or die (mysql_error());
	$result = mysql_fetch_array($query);
	return $result[0];
}

function getMonth($i)
{
	$i = trim($i);
	switch($i)
	{
		case 1 : return "Jan" ;
		case 2 : return "Feb" ;
		case 3 : return "MArch" ;
		case 4 : return "April" ;
		case 5 : return "May" ;
		case 6 : return "June" ;
		case 7 : return "July" ;
		case 8 : return "Aug" ;
		case 9 : return "Sept" ;
		case 10 : return "Oct" ;
		case 11 : return "Nov" ;
		case 12 : return "Dec" ;
	}
}

function process_array(  $query_string)
{
	global $DB;
	$dbase = $DB ;
	mysql_select_db($dbase) or die("Server is facing some technical problem, please try after sometime.");
	$query = mysql_query( $query_string) or die (mysql_error());
	$result = mysql_fetch_array($query);
	return $result;
}

// to get after hash of url
function chkeventID($eventID)
{
	$data = "select count(*) from events where eventid=\"".$eventID."\"" ; 
	return get_value($data);
}
function chkPageID($pageID)
{
	$data = "select count(*) from pages where pageid=\"".$pageID."\"" ; 
	return get_value($data);
}
function chkPageFile($pageID)
{
	$data = "select count(*) from pages where pagelink=\"".$pageID."\"" ; 
	return get_value($data);
}
function getfilename($url)
{
	$start = strrpos($url,'/');
	return substr($url,$start+1) ;
}
function getEventNameByID($eventID)
{
	$data = "select name from events where eventid=\"".$eventID."\"" ; 
	return get_value($data);
}

function isHeadAvishkarID($avID)
{
	$data = "select head from events where head_id = \"".$avID."\" " ;
	$res = get_value($data);
	if($res==1)
		return true ;
		else
		return false ;
}

function gethash($url)
{
	
	if(($hash=substr($url,"#"))== false)
		$hash="";
	else
		$hash=substr($hash,1);
	
	return $hash ;

}
function getParent($eventID)
{
	$data = "select parentid from events where eventid=\"".$eventID."\"" ; 
	return get_value($data);
}

function getPageLinkByID($pageID)
{
	$data = "select pagelink from pages where pageid=\"".$pageID."\"" ; 
	return get_value($data);
}

function getPageNameByID($pageID)
{
	$data = "select pagename from pages where pageid=\"".$pageID."\"" ; 
	return get_value($data);
}

function getpageIDbyPagelink($pagelink)
{
	$data = "select pageid from pages where pagelink=\"".$pagelink."\"" ; 
	return get_value($data);
}

function getSponsors()
{
	$query = "SELECT * FROM updates WHERE valid = 1 order by priority desc";
	$eventArray = process_query($query);
	return $eventArray ;
}

function getUserUpdates($user_id)
{
	$data = "select * form user_updates where related_event_id in ( select event_id from  registered where stu_id = \"".$user_id."\"  ) " ;
	$update_array = process_query($data);
	return $update_array ;
}


function chk_loggin()
{
	if(isset($_SESSION['stu_avishkar_id']))
		{
			$data = "select count(*) from per_info where stu_id = \"".$_SESSION['stu_avishkar_id']."\" " ;
			if(get_value($data)==1)
				return true;
				else
				return false;
		}
		return false ;
}
function getLoginID()
{
	return $_SESSION['stu_avishkar_id'] ;
}

function getTabArray($eventID)
{
	// this will return an array and each index will give the present of tabs, for example arr[0] = 1 , then information is there, if arr[0] = 0 then information is not there
	return $tabArray ;
}
function getTabMap($mapID)
{
	// this is lookup type table :)
	switch($mapID)
	{
		case 0 : return "information" ;
		case 1 : return "rules" ;
		// etc etc
	}
}

function getContentByTab($tabName)
{
	// generally we pass value return by getTabMap function
	return $content ;
}

function getPageByParent($parentPage)
{
	// this will return an array of all the event of the argument parent ID
	$query = "SELECT pageid FROM pages WHERE parentmenu LIKE \"$parentPage\" order by priority ASC";
	$eventArray = process_query($query);
	return $eventArray ;
}

function getEventsByParent($parentID)
{
	// this will return an array of all the event of the argument parent ID
	$query = "SELECT eventid FROM events WHERE parentid LIKE \"$parentID\" order by eventid ASC";
	$eventArray = process_query($query);
	return $eventArray ;
}
function isHead($userid)
		{
			$data = "select count(*) from events where head_id  = \"".$userid."\" " ;
			$res = get_value($data);
			if($res==1)
				return true ;
			return false ;
		}
function getUserByAKID($akid)
{
	$akid = substr($akid,4);
	$data = "select count(*) from per_info where stu_id  = \"".$akid."\" " ;
	$res = get_value($data);
	if($res==0)
		return false ;
	$data = "select * from per_info where stu_id  = \"".$akid."\" " ;
	$res = process_array($data);
	return $res ;
}
function getStudentByEvent($eventID)
{
	$data = "SELECT * FROM `per_info` as info , registered as reg WHERE info.stu_id = reg.stu_id and reg.event_id = \"".$eventID."\" " ;
	$res = process_query($data);
	return $res ;
}
function getEventID($headID)
		{
			$data = "select eventid from events where head_id = \"".$headID."\" " ;
			return get_value($data) ;
		}
sql_connect();
?>
