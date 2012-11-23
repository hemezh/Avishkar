<?php

echo"<form action=\"./home.php?page=pr_vid\" method=\"post\">";
echo "<centre><table>";
echo "<tr><td>Avishkar ID</td><td>";
echo "<input type=\"text\" name=\"a_id\" /></td></tr>";
echo "<tr><td>Volunteering FoR</td><td><select name=\"field\">";
$data=process_query("select * from volunteer_category");
while($row=mysql_fetch_array($data))
{
echo "<option>".$row['name']."</option>";
}
echo "</select>";
?>
</td></tr>
<tr><td colspan="2" align="center"><?php $data = "select count(*) from volunteer where icard = \"0\" " ; $c = get_value($data) ; echo "Without Icard ".$c ; ?></td></tr>
<?php 
echo "<tr><td colspan=\"2px\" align=\"center\"><input type=\"submit\" value=\"Submit\" name=\"reg\" /></td></tr>";


?>
</table></center></form>