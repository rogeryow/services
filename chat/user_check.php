<?php
	require_once("connection.php");
	if(isset($_POST['user'])){
		$txt_user = $_POST['user'];
		$q = 'SELECT * FROM `tblclient` WHERE `Username` = "'.$_POST['user'].'"';
		$r = mysqli_query($link, $q);
		if($r){
			$userLength = strlen($txt_user);
			if(mysqli_num_rows($r) >0){
				echo '<p style = "color:red">Username already exist</p>';
			}elseif($txt_user = $_POST['user'] == "" ){
				echo "";
			}elseif($userLength < 5){
				echo '<p style = "color:red">Username must be minimun of 5 Characters</p>';
			}else{
				echo '<p style = "color:green">You can take this Username </p>';
			}
		}else{
			echo $q;
		}
		
	}
	
?>