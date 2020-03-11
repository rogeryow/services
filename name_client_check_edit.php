<?php
	require_once("connection.php");
	if(isset($_POST['fname_lname_valid'])){
		$txt_fname = $_POST['fname_lname_valid'];
		$p = 'SELECT * FROM `tblclient` WHERE `First_Name` = "'.$_POST['fname_lname_valid'].'"';
		$s = mysqli_query($link, $p);
			if($s){
				if (!preg_match("/^[a-zA-Z ]*$/",$txt_fname)) {
					echo '<span style = "color:red">Invalid Name</span>';
				}
			}else{
				echo $p;	
			}
	
	}
?>