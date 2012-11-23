<?php
	include('./header.php');	
?>

<div id="main" >

 <table border="0" width="100%" >
 		<tr>
        <td style="padding-top:25px;" colspan="2">
        <span id="permalink"></span>
        </td>
       	<td width="160px" valign="top" rowspan="2">
        <?php 
			include('./sponsor.php'); 
		?>
        </td>
        </tr>
        <tr>
        <td style="vertical-align:top; padding-left:20px;" id="main_area">
		<div id="prize_money">
		<div class="css-panes skin2">
		<p align="center" style="font-weight:bolder; font-size:16px; background-color:#072330; color:#F0F0F0; box-shadow:0 0 10px black inset; font-family:'Lucida Sans Unicode','Lucida Grande',sans-serif; opacity:0.95" >Prizes worth 5 Lakhs to be won !!!</p>	
        </div></div>
        <div id="homeImage">
        <?php 
			//include('./slider.html');
		?>
		<div align="center" style="padding-top:10px; padding-bottom:10px;"><iframe width="650" height="303" src="http://www.youtube.com/embed/9KunP3sZyI0?rel=0&amp;hd=1" frameborder="0" allowfullscreen></iframe></div>
        </div>
        <div id="centered_content">
        <br /><br /><br /><br /><br /><center><img src="./images/loader.gif" /></center>	
        </div>
        </td>
        </tr>
        </table>
        <!-- 
        <div id="content">
       		 <div id="navigation">
                    <div class="navigation active" id="cyberquest"> EVENTS<div class="back Nav"><<</div></div>
             		
                    <br />
            		<div class="navigation event" id="cyber">Cyberquest<div class="front Nav"><<</div></div>
                	<div class="navigation event" id="hemesh">Adifice<div class="front Nav"><<</div></div>
                	<div class="navigation  event" id="saurabh">Electromania<div class="front Nav"><<</div></div>
                	<div class="navigation event" id="mohit">Mechrocosm<div class="front Nav"><<</div></div>
                	<div class="navigation event" id="mechro">Online Treasure Hunt <div class="front Nav"><<</div></div>
              </div>
        </div> 
        -->
        <!-- /content -->
        <!-- 
		<div id="sideBar">
        	<div id="sponsors">
            </div>
            
            <div id="updates">
            </div>
			
		</div>
		-->
    </div>
<?php include('./footer.php') ; ?>