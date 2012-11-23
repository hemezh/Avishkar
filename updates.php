<?php 
	include('./header.php');
?>
<div id="main">
 <table border="0" width="100%">
 		<tr>
        <td style="padding-top:15px;" colspan="2">
        <div id="permalink"></div>
        </td>
       	<td width="150px" valign="top" rowspan="2">
        <br />
        <?php 
			include('./sponsor.php');  
		?>
        </td>
        </tr>
        <tr>
        <td valign="top" width="160px"><?php $parentPage = "sponsors" ; include('./accordion_updates.php'); ?></td>
        <td style="vertical-align:top;" id="main_area">
        <div id="centered_contents">
        <div class="css-panes skin2">
        <div id="tab_content1" style="display:block">
        
        <?php
			$getDate = htmlentities($_GET['date']) ;
			
			$list = explode("-",$getDate);
			if(isset($_GET['date']) && !checkdate ( $list[1] , $list[2] , $list[0]))
			{
				echo "<p>Invalid Date</p>" ;
			}
			else
			{
			$start_time = $getDate." 00:00:00" ;
			$end_time = $getDate." 23:59:59" ;
			if( isset($_GET['date']) )
			$data = "select * from updates where valid = \"1\" and date_time > \"".$start_time."\" and date_time < \"".$end_time."\" order by date_time desc" ;
			else
			$data = "select * from updates where valid = \"1\" order by date_time desc limit 0 , 10" ;
			$result = process_query($data);
			$count=0;
			while($res = mysql_fetch_array($result))
				{  
					$count++ ;
					echo "<p>" ;
					echo $res['content']; 
					/*
					if($res['new'] == 'y' )
						echo "<img src=\"./images/new.gif\" />" ;
					*/
					if(trim($res['related_event_id'])!="" && trim($res['related_event_id'])!= "#")
					echo "<span class=\"readmore\" style=\"float:right\"><a href=\"".$res['related_event_id']."\">Read More</a></span>" ;
					echo "</p>" ;
					//echo "hi";
					echo "<br/>";
				}
				if($count==0)
				{
					echo "<p>No updates for selected date</p>" ;
				}
			}
		?>
        </div>
        </div>
        </div>
        </td>
        </tr>
        </table>
	</div>
<?php include('./footer.php') ; ?>