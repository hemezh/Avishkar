<?php
if(isreg_admin_login()!=1)
	redirect('./');
?>
<html>
<head>
<title>R_ID</title>
<head>
<body>
<form action="./home.php?page=details" method="post">
<centre>
<table>
<tr><td>Avishkar Id </td><td> <input type="text" name="av_id" maxlength="10" /></td></tr>
<br><br><br>
<tr><td>
Registration type </td>
<td><select name="reg_type">
<?php 
$data = "select * from reg_category where valid = \"1\" " ;
$res = process_query($data);
while($result=mysql_fetch_array($res))
{
	echo "<option value=\"".$result['cat_id']."\">".$result['name']."</option>" ;
}
?>

</select></td></tr><tr></tr><tr></tr>
<tr><td colspan="2" align="center"><?php $data = "select count(*) from reg_user where icard = \"0\" " ; $c = get_value($data) ; echo "Without Icard ".$c ; ?></td></table>
<tr><td colspan="2" align="center"><input type="submit" value="Register" name="reg" /><input type="reset" value="reset"></td></table>
</center>
</form>
</body>
</html>

