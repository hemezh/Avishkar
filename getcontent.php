<?php 
require_once("./functions.php");
$is_page=0;
$tab = htmlentities(trim($_GET['category']));
$valid = chkeventID($tab);
if($valid==0)
{
	$valid=chkPageFile($tab);
	if($valid==0)
		die("Process could not be completed!!");
	else
		$is_page=1;
}
$query = "SELECT * FROM tabs WHERE id LIKE \"$tab\" ORDER BY tab_no ASC";
$result = process_query($query);
$num_tabs = mysql_num_rows($result);

if($num_tabs==0)
	$is_page=1;

if($is_page == 1)
{
	$content = value("content","pages","pagelink",$tab);
	$name_a = value("pagename","pages","pagelink",$tab);
	$name = $name_a[0];
	$cont = $content[0];
	if(empty($name_a)||empty($content))
	{
		echo "hi";
		redirect("index.php");
		die();
	}
	if(strcmp($name,"Home")!=0)
		echo "<div class=\"top-heading\">$name</div><br />";
		
	echo "<div class=\"css-panes skin2\">";
	echo "<div style=\"display: block;\" id=\"tab_content1\">".$cont."</div>";
	echo "</div>";
	die();
}

$name_a = value("name","events","eventid",$tab);
$name = $name_a[0];
echo "<div class=\"top-heading\">$name</div><br />";
$query = "SELECT * FROM tabs WHERE id LIKE \"$tab\" ORDER BY tab_no ASC";
$result = process_query($query);
$num_tabs = mysql_num_rows($result);
$class = "current";
echo "<ul class=\"css-tabs skin2\" >";
while($arr = mysql_fetch_array($result))
{
	$name = $arr['name'];
	$tab_no = $arr['tab_no'];
	$display = $arr['display'];
	
	if(strcmp($display,"y")!=0)
		continue;
	$id = "tab".$tab_no;
	echo "<li id=\"$id\"><a class=\"$class\" href=\"#$tab\" onClick=\"gettabstodiv($tab_no,$num_tabs)\">$name</a></li>";
	$class = "";
}
echo "</ul>";
$result = process_query($query);
echo "<div class=\"css-panes skin2\">";
$class = "currenttab";
while($arr = mysql_fetch_array($result))
{
	$description = $arr['description'];
	$display = $arr['display'];
	$tab_no = $arr['tab_no'];
	$id = "tab_content".$tab_no;
	if(strcmp($display,"y")!=0)
		continue;
	echo "<div class=\"$class\" id=\"$id\">".$description."</div>";
	$class = "";
}
echo "</div>";
?>