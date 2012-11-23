<!--  initialize the slideshow when the DOM is ready -->
<table border="0" width="100%"><tr><td valign="top">
	<div id="sponsorHead"><a href="./sponsors.php">Previous Sponsors</a></div>
	<div class="shadow_all" style="background-color:#fff; padding:0px; margin-right:15px;width:200px;">
	<div class="slideshow">
		<img src="./sponsor/glozon.jpg" width="200px" height="115px" />
		<img src="./sponsor/scientech.jpg" width="200px" height="115px" />        <
		<img src="./sponsor/aricent.jpg" width="200px" height="115px" />
		<img src="./sponsor/nimbooz.jpg" width="200px" height="115px" />
		<img src="./sponsor/central_bank.png" width="200px" height="115px" />
		<img src="./sponsor/classmate.jpg" width="200px" height="115px" />
		<img src="./sponsor/fadoo_engineers.jpg" width="200px" height="115px" />
		<img src="./sponsor/madan.jpg" width="200px" height="115px" />
		<img src="./sponsor/esparsha.jpg" width="200px" height="115px" />
		<img src="./sponsor/dairy_fun.png" width="200px" height="115px" />
		<img src="./sponsor/indian_kwality.png" width="200px" height="115px" />
		<img src="./sponsor/bsa.jpg" width="200px" height="115px" />
		<img src="./sponsor/tcm.png" width="200px" height="115px" />
		<img src="./sponsor/adarsh.jpg" width="200px" height="115px" />
		<img src="./sponsor/karv.bmp" width="200px" height="115px" />
		<img src="./sponsor/career.jpg" width="200px" height="115px" />
		<img src="./sponsor/madagascar.jpg" width="200px" height="115px" />
		<img src="./sponsor/fbots_black.png" width="200px" height="115px" />
		<img src="./sponsor/techdefence.jpg" width="200px" height="115px" />
		<img src="./sponsor/zapak.jpg" width="200px" height="115px" />
		<img src="./sponsor/red_fm.jpg" width="200px" height="115px" />
		<img src="./sponsor/sahara_samay.jpg" width="200px" height="115px" />
		<img src="./sponsor/dainik_jagran.jpg" width="200px" height="115px" />
		<img src="./sponsor/hindustan_times.jpg" width="200px" height="115px" />		
	</div>
    </div>
    <br />
    </td></tr>
    <tr><td valign="top">
    
	<div id="updateHead"><a href="./updates.php">Updates</a></div>
    <div class="shadow_all" style="background-color:#0B7F9A; padding:0px; width:200px;">
    <div style="overflow: hidden; position: relative; height: 115px;" id="news-container">
	<ul style="	background: #111;">
	<?php
	$sponsorArray = getSponsors();
	while($sponsor = mysql_fetch_array($sponsorArray))
	{
		//echo "" ;
		echo "<li><a  href=\"".$sponsor['related_event_id']."\"><div>" ;
			echo $sponsor['content'] ;
			if($sponsor['new'] == 'y' )
			echo "<img src=\"./images/new.gif\" />" ;
		echo "</div></a></li>" ;
		//echo "</a>" ;
	}
	?>
	</ul>
</div>
</div><br />
<span style="padding:10px;"><a href="./updates.php">List All</a></span>
</td></tr></table>