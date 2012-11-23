<?php
// load library
require 'class.excel.php';
// create a simple 2-dimensional array
$row_num = $_POST['row_num'] ;
$col_num = $_POST['col_num'] ;
$head=array();
for($i=0;$i<$col_num;$i++)
{
	$id = "forexcelheader_".$i ;
	$head[$i] = $_POST[$id];
}
$forExcel = array( 0 => $head );

for( $i=1;$i<$row_num;$i++)
{
	for($j=0;$j<$col_num;$j++)
	{
		$id = "forexcel_".$i."_".$j ; 
		$forExcel[$i][$j]=$_POST[$id];
	}
}
//echo "<pre>".print_r($forExcel)."</pre>";

// generate file (constructor parameters are optional)

//print_r($forExcel);
$xls = new Excel_XML('UTF-8', false, 'Workflow Management');
$xls->addArray($forExcel);
$xls->generateXML('Avishkar 2011 User List');

?> 