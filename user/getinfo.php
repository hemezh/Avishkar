<?php
if(!isset($func))
	die ;
if( !chk_loggin() )
		redirect('./login.php');
if(!isHead(getLoginID()))
		redirect('./home.php');
$id= $_SESSION['stu_avishkar_id'];
		//print_r($_POST);
		$error = 0 ;   
		$errormsg = "" ;
		
?>
<style type="text/css">
.listing li { padding:10px; list-style:none}
</style>
<div class="top-heading">Get information by Avishkar ID</div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>
<form action="" method="post">
<table width="100%" cellpadding="5px" border="0" align="center">
<tr><td width="30%">
Enter Avishkar ID</td><td><input type="text" name="avishkarid" value="<?php if(isset($_POST['avishkarid'])) echo $_POST['avishkarid'] ; ?>"/></td><td><input type="submit" name="getinfo" value="Submit" style="width:150px; height:30px;" /></td></tr>
<tr>
<td colspan="3" style="border:thin; border-color:#CCC">
<?php 
if(count($_POST)>0  && isset($_POST['getinfo']) ) 
{
	$avishkarID = $_POST['avishkarid'];
	$result = getUserByAKID($avishkarID);
	if(!$result)
	{
		echo "<h4>No such user exist</h4>" ;
	}
	else
	{
		echo "<ul class=\"listing\">" ;
		echo "<li><b>Avishkar ID: </b> ".$result['stu_id']."</li>";
		echo "<li><b>Name: </b> ".$result['name']."</li>";
		echo "<li><b>Email ID: </b> ".$result['email']."</li>";
		echo "<li><b>Gender: </b> ".genderMap($result['gender'])."</li>";
		echo "<li><b>Contact Num: </b> ".$result['mobile']."</li>";
		echo "<li><b>Graduation Year: </b> ".$result['graduation_yr']."".numSufix($result['graduation_yr'])."</li>";
		echo "<li><b>Degree: </b> ".$result['prog']."</li>";
		echo "<li><b>Branch: </b> ".$result['branch']."</li>";
		echo "<li><b>College: </b> ".$result['college']."</li>";
		echo "<li><b>Address: </b> ".$result['address']."</li>";
		echo "</ul>" ;
		echo "<pre>" ;
		//print_r($result);
		echo "</pre>" ;
	}
}
?>

</td>
</tr>
</table></form></center></div></div>			                                                    		                                                 