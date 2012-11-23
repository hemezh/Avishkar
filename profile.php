<?php 
if(!isset($func))
	die ;
$id= $_SESSION['stu_avishkar_id'];
if( !chk_loggin() )
		redirect('./login.php');
// $info = "select * from per_info where stu_id =  $id" ;	data from the database
$info=mysql_query("SELECT * FROM `per_info` WHERE `stu_id` = \"$id\" ");
 // echo $info;
   if(mysql_num_rows($info) > 0)
        {
			$arr = mysql_fetch_row($info);
               /* while($row1 = mysql_fetch_row($info))
                {
                        for($i=0;$i<11;$i++)
                                $arr[$i]=$row1[$i];
                }
				*/
                                
        }
	//	print_r($arr);
 ?>
 <div class="top-heading"><?php echo $arr[1];?></div>
        <div class="css-panes2 skin2">
		<div style="display: block;" id="tab_content1">
<center>

 <table width="100%" cellpadding="10px" border="0" align="center">
        <tr><td>Avishkar Id </td>
        <td> <?php echo "AK11".$arr[0];?></td></tr>
        <tr><td>Name</td>
        <td> <?php echo $arr[1];?></td><td><a href="./home.php?page=name_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr>
        <tr><td>Email Id</td>
        <td> <?php echo $arr[2];?></td></tr>
		<tr><td>Password</td>
        <td> <?php echo "******";?></td><td><a href="./home.php?page=pass_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr>
        <tr><td>Gender</td>
        <td> <?php
		if($arr[4]=="m")
			echo "Male";
		if($arr[4]=="f")
			echo "Female";
		?></td></tr>
        <tr><td>Mobile</td>
        <td> <?php echo $arr[5];?></td><td><a href="./home.php?page=mobile_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr></tr>
        <tr><td>Address</td>
        <td> <?php echo $arr[6];?></td><td><a href="./home.php?page=address_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr></tr>
        <tr><td>College</td>
        <td> <?php echo $arr[7];?></td><td><a href="./home.php?page=college_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr></tr>
        <tr><td>Graduation Scheme</td>
        <td> <?php echo $arr[8];?></td><td><a href="./home.php?page=grad_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr></tr>
        <tr><td>Subject Major/ Branch</td>
        <td> <?php echo $arr[9];?></td><td><a href="./home.php?page=branch_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr></tr>
        <tr><td>Current Year</td>
        <td> <?php echo $arr[10]."".numSufix($arr[10])." Year" ;?></td><td><a href="./home.php?page=year_edit"><img src="./images/edit.png" alt="edit"></img></a></td></tr></tr>
        
        
        </table></center></div>