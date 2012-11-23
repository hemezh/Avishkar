<!--  initialize the slideshow when the DOM is ready -->
<table border="0" width="100%"><tr><td valign="top">
	<div class="shadow_all" style="background-color:#88010b; padding:10px; width:160px;">
	<div class="slideshow">
		<img src="./sponsor/1.jpg" width="160px" height="115px" />
		<img src="./sponsor/2.jpg" width="160px" height="115px" />
		<img src="./sponsor/3.jpg" width="160px" height="115px" />
		<img src="./sponsor/4.jpg" width="160px" height="115px" />
	</div>
    </div>
    <br />
    </td></tr>
    <tr><td valign="top">
    
    <div class="shadow_all" style="background-color:#88010b; padding:1px; width:160px;">
    <div style="overflow: hidden; position: relative; height: 126px;" id="news-container">
	<ul style="	background: #88010b;">
    <?php
	$sponsorArray = getSponsors();
	while($sponsor = mysql_fetch_array($sponsorArray))
	{
		echo "<a href=\"./events.php#".$sponsor['related_event_id']."\">" ;
		echo "<li><div>" ;
			echo $sponsor['content'] ;
		echo "</div></li>" ;
		echo "</a>" ;
	}
	?>

    <!-- 
		<li>
			<div>
				1) Lorem ipsum dolor sit amet, porta at, imperdiet id neque. more info
			</div>
		</li> 
		<li>
        	<div>
				2) Lorem ipsum dolor sit amet, consectetur adipiscing elit. more info
			</div>
		</li> 
		<li>
			<div>
				3) Lorem ipsum dolor sit amet more info more info more info more info
			</div>
		</li>   
		<li>
        	<div>
				4) jugbit.com jquery vticker more info more info more info more info more info
			</div>
		</li>
        <li>
			<div>
				5) Lorem ipsum dolor sit amet, porta at, imperdiet id neque. more info
			</div>
		</li> 
		<li>
        	<div>
				6) Lorem ipsum dolor sit amet, consectetur adipiscing elit. more info
			</div>
		</li> 
		<li>
			<div>
				7) Lorem ipsum dolor sit amet more info more info more info more info
			</div>
		</li>   
		<li>
        	<div>
				8) jugbit.com jquery vticker more info more info more info more info more info
			</div>
		</li>
        
        -->
	</ul>
</div>
</div>
</td></tr></table>