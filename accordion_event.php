<div id="accordion">
<?php 
$result = getEventsByParent("root") ;
while($res = mysql_fetch_array($result))
{
?>
	<h2 class=""><div class="unhoverd"><?php echo getEventNameByID($res[0]) ?></div>
<?php
	echo "<a id=\"banner_lable_main\" class=\"hoverd ".$res[0]."\"  href=\"#".$res[0]."\" onclick=\"refreshPages('".$res[0]."')\">"; ?>    <div onClick="refreshPages('<?php echo getPageLinkByID($res[0]); ?>')"><?php echo getEventNameByID($res[0]) ?></div></a>
   </h2>
	<div class="pane"  style="display:none;">
	<ul>
        <?php 
			$sub_result = getEventsByParent($res[0]) ;
			while($sub_res = mysql_fetch_array($sub_result))
			{
				echo "<a href=\"#".$sub_res[0]."\" onclick=\"refreshPages('".$sub_res[0]."')\"><li>".getEventNameByID($sub_res[0])."</li></a>" ;
			}
		?>
    </ul>
	</div>
<?php } ?>	


</div>