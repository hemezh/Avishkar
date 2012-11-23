<?php
if(!isset($HEADER	)) die();
?>
  
<div class="top-heading">Message</div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
        <p>
        <?php
//		$expire=time()+60*60;
/*		$expire=time()+60*60*24*30;
		setcookie("message", "You have sucessfully registered,<br />Proceed to <a href=\"./login.php\">login</a>", $expire);
		echo $_COOKIE['message'];
		print_r($_COOKIE);
		/*
		if($message!="")
		{
			
		}
		else
		{
			echo "<a href=\"./\">Click here to Avishkar.in</a>" ;
		}
		*/
		redirect('./');
		?>
        </p>
        </div></div>