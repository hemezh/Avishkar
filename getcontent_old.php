<?php 
//print_r($_GET);
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

?>
<html>
<head>

	<!-- include the Tools -->
	<!-- tab styling -->	
	
	<!-- skin 2 -->
	
</head>
<body>
<?php

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
	echo "<ul class=\"css-tabs skin2\" ></ul>";
	echo "<div class=\"css-panes skin2\">";
	echo "<div style=\"display: block;\" id=\"tab_content1\">".$cont."</div>";
	echo "</div>";
	die();
}

$query = "SELECT * FROM tabs WHERE id LIKE \"$tab\" ORDER BY tab_no ASC";
$result = process_query($query);
$num_tabs = mysql_num_rows($result);
$class = "current";
echo "<div class=\"top-heading\">Events</div>";
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

/*

<!-- tabs -->
<!--
<ul class="css-tabs skin2">
	<li id="tab1"><a class="current" href="#" onClick="gettabstodiv(1,3) ">Tab 1</a></li>
	<li id="tab2"><a class="" href="#" onClick="gettabstodiv(2,3)">Second tab</a></li>
	<li id="tab3"><a class="" href="#" onClick="gettabstodiv(3,3)">A ultra long third tab</a></li>
</ul>
-->
<!-- panes -->

*/
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
/*
	<div style="display: block;" id="tab_content">
		<img src="skin2_files/eye192.png" alt="Flying screens" style="float: left; margin: 0pt 30px 20px 0pt;">
		<h2>Lorem ipsum dolor sit amet</h2>
		<br clear="all">
	</div>
	
	<div style="display: none;" id="tab_content2">
		<p>
			Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, 
molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, 
nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam 
vitae dui.
		</p> 
		<p>
			Pellentesque nisl. Ut adipiscing vehicula risus. Nam eget tortor. 
Maecenas id augue. Vivamus interdum nulla ac dolor. Fusce metus. 
Suspendisse eu purus. Maecenas quis lacus eget dui volutpat molestie.
		</p>
	</div>
	
	<div style="display: none;" id="tab_content3">
		<p>
			Maecenas at odio. Nunc laoreet lectus vel ante. Nullam imperdiet. Sed
 justo dolor, mattis eu, euismod sed, tempus a, nisl. Cum sociis natoque
 penatibus et magnis dis parturient montes, nascetur ridiculus mus.
		</p>
		
		<p>
			In sed dolor. Etiam eget quam ac nibh pharetra adipiscing. Nullam 
vitae ligula. Sed sit amet leo sit amet arcu mollis ultrices. Vivamus 
rhoncus sapien nec lorem. In mattis nisi. Vivamus at enim. Integer 
semper imperdiet massa. Vestibulum nulla massa, pretium quis, porta id, 
vestibulum vitae, velit.
		</p>
	</div>*/
	
echo "</div>";

?>



</body></html>

<?php /* 
<!-- $Id: example.html,v 1.4 2006/03/27 02:44:36 pat Exp $ -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Simple Tabber Example</title>
<script type="text/javascript" src="tabber.js"></script>
<link rel="stylesheet" href="example.css" TYPE="text/css" MEDIA="screen">
<script type="text/javascript">
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
</head>
<body>
<div class="tabber">
     <div class="tabbertab">
	  <h2>Tab 1</h2>
	  <p>Tab 1 content.</p>
     </div>
     <div class="tabbertab">
	  <h2>Tab 2</h2>
	  <p>Tab 2 content.</p>
     </div>
     <div class="tabbertab">
	  <h2>Tab 3</h2>
	  <p>Tab 3 content.</p>
     </div>

</div>

</body>
</html>
*/ ?>