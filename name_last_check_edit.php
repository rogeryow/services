<?php
	require_once("connection.php");
	if(isset($_POST['lname_valid'])){
		$txt_lname = $_POST['lname_valid'];
		$p = 'SELECT * FROM `tblclient` WHERE `Last_Name` = "'.$_POST['lname_valid'].'"';
		$s = mysqli_query($link, $p);
			if($s){
				if (!preg_match("/^[a-zA-Z ]*$/",$txt_lname)) {
					echo '<span style = "color:red">Invalid Name</span>';
				}
			}else{
				echo $p;	
			}
	
	}
?>