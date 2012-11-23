<div id="accordion" class="">
	<h2 class="">
    <div id="banner_lable_main" class="unhoverd" style="width:120px; z-index:12"><?php  echo getPageNameByID($parentPage) ?></div></h2>
	<div style="display: block;" class="pane">
	<ul style="margin-top:0">
        <?php
			$result = getPageByParent($parentPage) ;
			while($res = mysql_fetch_array($result))
			{  
				echo "<a href=\"#".$res[0]."\" onclick=\"refreshPages('".$res[0]."')\"><li>".getPageNameByID($res[0])."</li></a>" ;
			}
		?>
    </ul>
	</div>
</div>