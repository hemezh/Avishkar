<?php
if(isreg_admin_login()==1)
	{
?>
<div id="accordion" class="">
	<h2 class="">
    <div id="banner_lable_main" class="unhoverd" style="width:120px; z-index:12">Options</div></h2>
	<div style="display: block;" class="pane">
	<ul style="margin-top:0">
        <a href="?page=reg"><li>Register a student </li></a>
        <a href="?page=search"><li>Search Candidate </li></a>
        <a href="?page=prc"><li>Calculate price </li></a>
        <a href="./print_oid.php"><li>Print I-card</li></a>
        <a href="?page=vid"><li>Enter Volunteer Information</li></a>
        <a href="./print_vid.php"><li>Print Volunteer I-card</li></a>
		<a href="./outside_list.php"><li>Outsider's List</li></a>
    </ul>
	</div>
</div>

<?php 
	}
?>