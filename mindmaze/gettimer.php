<meta 
     HTTP-EQUIV="Refresh" CONTENT="1">
</meta>
<?php
require_once('../functions.php');
require_once("./mind_maze_functions.php") ;
function getMapValue($field)
{
	$data = "SELECT value FROM mindmaze_mapping where field = \"".$field."\" " ;
	return get_value($data) ;
}
//echo "<br />start" ;
$starttime =  getMapValue("start_time");
//echo "<br />end" ;
$endtime =  getMapValue("end_time");
//echo "<br />current" ;
$current = date("y-m-d H:i:s", time()) ;
$started = 0 ;
//echo "<br />" ;
// chking about event start 
//echo $current_timestamp =  strtotime("now");
//$current = date("y-m-d H:i:s", $current_timestamp) ;
$duration = get_time_difference($starttime,$endtime);
$arr_chk_contest_start = get_time_difference($current,$starttime);
//print_r($arr_chk_contest_start);
$arr_chk_contest_end = get_time_difference($current,$endtime);
//print_r($arr_chk_contest_end);
if($arr_chk_contest_start['iscorrect']==1)
{
	// time remaining
	// contest not started
	//$arr = get_time_difference($current,$starttime);
	$label = "Event Will start in" ;
	$data = "update mindmaze_mapping set value = 1 where field = \"complete\" " ;
	$res = process_query($data);
	$diff = get_time_difference($current,$starttime);
}
else if ( $arr_chk_contest_start['iscorrect'] == -1 && $arr_chk_contest_end['iscorrect'] == -1 )
{
	$label = "Event over before" ;
	$data = "update mindmaze_mapping set value = 1 where field = \"complete\" " ;
	$res = process_query($data);
	alert('Contest Over');
	$diff = get_time_difference($endtime,$current);
}
else
{
	// contest started 
	$label = "Event end in" ;
	$data = "update mindmaze_mapping set value = 0 where field = \"complete\" " ;
	$res = process_query($data);
	$diff = get_time_difference($current,$endtime);
}
//print_r($diff);
if($diff['days']==0 && $diff['hours'] == 0 && $diff['minutes'] && $diff['seconds'] == 0 )
{
	$data = "update mindmaze_mapping set value = 1 where field = \"complete\" " ;
	$res = process_query($data);
	alert('Contest Over');
}
//echo "<hr />" ;
$diff['label'] = $label ;
echo "<font size=\"+1\">".$label."</font>" ;
echo "<br />";
if($diff['days']!=0)
echo $diff['days'].":"; 
echo "<font size=\"+3\">" ;
echo $diff['hours'].":".$diff['minutes'].":".$diff['seconds'] ;
echo "</font>";
//print_r($diff);
//echo "<hr />" ;
//echo "bye" ; 
?>