<div id="accordion" class="">
	<h2 class="">
    <div id="banner_lable_main" class="unhoverd" style="width:120px; z-index:12">Updates</div></h2>
	<div style="display: block;" class="pane">
	<ul style="margin-top:0">
        <?php
			$data = "select * from updates where valid = \"1\" order by date_time desc" ;
			$result = process_query($data);
			$set_date = NULL ;
			while($res = mysql_fetch_array($result))
			{  
				$res_date = $res['date_time'];
				$new_date = substr($res_date,0,strpos($res_date," ")+1) ;
				if($new_date != $set_date )
				{
					$list = explode("-",$new_date);
					echo "<a href=\"?date=".$new_date."\"><li>".intval(trim($list[2]))."".numSufix(trim($list[2])).", ".getMonth($list[1])."-".$list[0]."</li></a>" ;
					$set_date = $new_date ;
				}
			}
		?>
        </ul>
	</div>
</div>