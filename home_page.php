<?php $id= $_SESSION['stu_avishkar_id'];
$name = get_value("SELECT name FROM `per_info` WHERE `stu_id` = \"$id\" ") ;  ?>
<div class="top-heading"><?php echo $name; ?></div>
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
		//redirect('./');
		?>
        </p>
        </div></div>