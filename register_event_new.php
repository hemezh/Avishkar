<?php 
$stu_id=$_SESSION['stu_avishkar_id'];

?>
<script type="text/javascript">
counter=-1;
array=new Array();
</script>
<?php 
echo "<script type=\"text/javascript\">";
$c=-1;
$sql="select * from registered where stu_id=\"$stu_id\"";
$sql=process_query($sql);

while($arr1=mysql_fetch_array($sql))
{
	$c++;
	$eid=$arr1['event_id'];
	echo "array[".$c."]='$eid';";
}
echo "counter=".($c).";";
echo "</script>";
?>
<script type="text/javascript">


 function find_event(bid)
 {
	i=0;
	while(i<=counter)
	{
		 if(array[i]==bid)
			 return 0;
	 	i++;
	 }
	 return 1 ;
 }
 function addrow(content,eid)
 {
	err=0;
	
	counter=counter+1;
if(counter<1)
{
		document.getElementById('not_registered').style.display="none";
	
}
	if(counter>=0)
	{
		document.getElementById('cont').style.display="none";
		document.getElementById('table').style.display="block";
		
	}
	
   a=find_event(eid);
	if(a==0)
	{
		alert("You have already registered for this event.");
		counter--;
		err=1;
 	}	

	if(err==0){
		
		rowis=document.getElementById('table').insertRow(-1);
	array[counter]=eid;
	count_row=counter+1;
	rowid="row"+count_row;
	rowis.setAttribute("id", rowid);
	
	text='<td>'+count_row+'</td><td id="content'+count_row+'">'+content+'</td><td><img src="del.gif" height="20" width="20" onclick="delrow('+count_row+')" /></td>';
	text='<tr><td  class="noBorderInIE"><div style="width:256px; height:30px;" id="row'+count_row+'"><span style="float:left; width:30px;">'+count_row+'</span><span style="width:176px; float:left; text-align:left; padding-left:20px;" id=\'content'+count_row+'\'><strong>'+content+'</strong></span><span style="float:left;width:30px;"><img  src="./images/fancy_close.png" height="20" width="20" onclick="delrow('+count_row+')" /></span></div></td></tr>';

$("#"+rowid).html(text);
//	document.getElementById(''+rowid).innerHTML=text;
    storedata();
	}
 }
 
 function delrow(id)
 {
	
	 var i=id;
	
	 while(i<=counter)
	 {
		  j=parseInt(i)+parseInt(1);
		 rowid1="row"+i;
		 rowid2="row"+j;
		 count_row=i;
		 con_id="content"+j;
		//alert(counter);
		 content=$("#"+con_id).html();
		//text='<td>'+count_row+'</td><td id="content'+i+'">'+content+'</td><td><img src="del.gif" height="20" width="20" onclick="delrow('+count_row+')" /></td>';
		text='<tr><td class="noBorderInIE"><div style="width:256px; height:30px;border:0;" id="row'+i+'"><span style="float:left; width:30px;">'+count_row+'</span><span style="width:176px; float:left; text-align:left; padding-left:20px;" id="content'+count_row+'"><strong>'+content+'</strong></span><span style="float:left;width:30px;"><img  src="./images/fancy_close.png" height="20" width="20" onclick="delrow(\''+count_row+'\')" /></span></div></td></tr>';
		$("#"+rowid1).html(text);
		 array[i-1]=array[i];		
		 i++;
	 }
	array[i-1]=null;
	 document.getElementById('table').deleteRow(-1);
	 counter--;
	 if(counter==-1)
	 {
		 document.getElementById('cont').style.display="block";
		 document.getElementById('table').style.display="none";
		document.getElementById('not_registered').style.display="block";
	 }
      storedata();
 }
 
var obj;
function storedata()
{

	str=array.toString();
	$.get("store.php?choices="+str+"&size="+counter);
	
}

</script>



<style type="text/css">
div{
	display:block;
}
</style>
	

</head>
<body>

  



      <strong><div class="top-heading"> Event Registration</div>
      </strong>

<div class="css-panes-user" style="display:block;">
  <div class="flash" align="center" style="display:block;">
<table width="90%" cellpadding="10" height="100px">
	<tr>
		<td width="48%" valign="top">
			<table width="100%"  border="0" cellpadding="0">
                <tr height="30px" style="border-bottom:thick">
                    <td height="59" align="center" valign="top"><strong>You can register for the following events.</strong><br>
                    Click on the event to register.</td>
                </tr>

                <tr height="200px">
                    <td style="padding-top:00px" align="center" id="links">
                        <div class="head_table">
                        </div>
                        <div id="accordion" style="margin-top:0; display:block;">
                        <?php 
                        $result = getEventsByParent("root") ;
                        while($res = mysql_fetch_array($result))
                        {
                        ?>
                            <h2 class=""><div class="unhoverd" style="width:140px;" ><?php echo getEventNameByID($res[0]) ?></div>
                        <?php
                            echo "<a id=\"banner_lable_main\" class=\"hoverd mozMarginLeft\" style=\"width:140px; margin-left:-5px;\"  href=\"#".$res[0]."\" >"; ?><?php echo getEventNameByID($res[0]) ?> </a>
                           </h2>
                            <div class="pane"  style="display:none; margin-left:-23px;">
                            <ul>
                                <?php 
                                    $sub_result = getEventsByParent($res[0]) ;
                                    while($sub_res = mysql_fetch_array($sub_result))
                                    {
										
                                        $content="<strong>".getEventNameByID($sub_res[0])."</strong>";
                                        echo "<a href=\"#".$sub_res[0]."\" onclick=\"addrow('".$content."','".$sub_res[0]."')\"><li style=\"width:155px;\">".getEventNameByID($sub_res[0])."</li></a>" ;
                                    }
                                ?>
                            </ul>
                            </div>
                        <?php } ?>	
                        
                        
                        </div><?php
                            //echo "<strong><font color=\"#EFDCAC\">$rows results found</font></strong><br><br>";
                            
                                
                            $count = 0 ;
                                /*$result = getEventsByParent("root") ;
                                while($res = mysql_fetch_array($result))
                                    {
                                        $result1 = getEventsByParent($res[0]) ;
                                        while($res_events=mysql_fetch_array($result1))
                                        {
                                            $eventId=$res_events['eventid'];
                                            //$eventId= getNameFromId($eventId);
                                            $content="<strong>$eventId</strong>";
                                ?>
                                <a href="#" onclick="addrow('<?php echo $content;?>','<?php echo $eventId;?>')"><?php echo $content;?></a><br /><br />
                                <?php 
                                            $count++;
                                        }
                                    }
                                    echo $count ;*/
                        ?></td>
                </tr>
			</table>
		</td>
		<td width="52%" valign="top">
			<table width="100%" height="323" border="0" cellpadding="">
				<tr height="30px" >
					<td height="59" align="center" valign="top">Your are registered in the following events.</td>
                </tr>
				<tr>
					<td align="center" height="100px" valign="top" style="padding:0 0 0 0"><div id="cont" style="display:none"></div>
    					<div style="box-shadow:0 -2px 2px #6C6C6C; width:260px; height:40px; display:none; color:#2D2D2D; background:#EAEAEA; font-size:18px;">
  								<span style="float:left; width:45px;">S. No.</span>
                                <span style="width:180px; float:left;" >Event Name </span>
  								<span style="float:left; ">Rem.</span>
                         </div>
                         <div style="box-shadow:0 0 2px #C9C9C9;  padding:20px 0 5px 10px;" >
                         <table id="table"  cellpadding="0" cellspacing="0" style="display:block">
                        
<!--[if lte IE 8]>
<tr><td><br></td></tr>

<![endif]-->
    						<?php
 
   $sql="select * from registered where stu_id=\"$stu_id\"";
  $query=process_query($sql);
  $cno=0;
  echo "<div id=\"not_registered\" style=\"display:none;\">You are not registered in any event. Select events from the right block to register.<br>
<br></div>
";
 
  while($arr=mysql_fetch_array($query)) {
	  $cno++;
	  $eventId=$arr['event_id'];
					$eventId=getEventNameByID($eventId);
					$content="<strong>$eventId</strong>";
		$rowid="row".($cno);
	?> <tr><td  class="noBorderInIE">
        <div style="width:256px; height:30px;" id="<?php echo $rowid;?>"><span style="float:left; width:30px;"><?php echo $cno;?></span><span style="width:176px; float:left; text-align:left; padding-left:20px; " id="content<?php echo $cno; ?>"><?php echo $content;?></span><span style="float:left;width:30px;"><img  src="./images/fancy_close.png" height="20" width="20" onClick="delrow('<?php echo $cno;?>')" /></span></div>
 </td></tr>
    <?php } ?>	</table>
    </div>
    						
  					
                    </td>
                </tr>
            </table>
		</td>
    </tr>
</table>
         
      <br />
  </div>
</div>

</body></html>
<script type="text/javascript">
 if(counter==-1)
 {
	
		document.getElementById('not_registered').style.display="block";
 	document.getElementById('cont').style.display="block";
 }
 else
 {
	document.getElementById('table').style.display="block";
 }
 </script>
