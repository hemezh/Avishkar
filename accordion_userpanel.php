<?php 
		
?>
<div id="accordion" class="">
	<h2 class="">
    <div id="banner_lable_main" class="unhoverd" style="width:120px; z-index:12">User Panel</div></h2>
	<div style="display: block;" class="paneFixed">
	<ul style="margin-top:0">
        <a href="./home.php?page=profile"><li>Profile</li></a>
        <a href="./home.php?page=register_event"><li>Register for Events</li></a>
    <?php 
		if(isHead(getLoginID()))
		{
			echo "<a href=\"./home.php?page=getinfo\"><li>Get Detail</li></a>" ;
			echo "<a href=\"./home.php?page=getfulllist\"><li>Print Full List</li></a>" ;
			echo "<a href=\"./home.php?page=eventresult\"><li>Enter Result</li></a>" ;
		}
	?>
    </ul>
	</div>
</div>