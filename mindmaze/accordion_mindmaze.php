<div id="accordion" class="">
	<h2 class="">
    <div id="banner_lable_main" class="unhoverd" style="width:120px; z-index:12">Questions Set</div></h2>
	<div style="display: block;" class="pane">
	<ul style="margin-top:0">
        <?php
			for($i=1;$i<10;$i++)
			{
				echo "<a href=\"?page=question".$i."\"><li>Question ".$i."</li></a>" ;
			}
			echo "<a href=\"?page=rules\"><li><u>Rules</u></li></a>" ;
		?>
        
    </ul>
	</div>
</div>