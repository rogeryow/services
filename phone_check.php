<?php
	require_once("connection.php");
	if(isset($_POST['phonetoC'])){
		$phoneLength = "";
		$txt_phone = $_POST['phonetoC'];
		$p = 'SELECT * FROM `tblclient` WHERE `Phone_No` = "'.$_POST['phonetoC'].'"';
		$s = mysqli_query($link, $p);
		$phoneLength = strlen($txt_phone);
		if($phoneLength > 10 ){
			if($s){
				if(mysqli_num_rows($s) >0){
					echo '<span style = "color:red">Phone No already exist</span>';
				}elseif($phoneLength > 11){
					echo '<span style = "color:red">Invalid Mobile #</span>';
				}elseif($phoneLength == 0){
					echo "";
				}elseif($phoneLength < 10){
					echo '<span style = "color:red">Invalid Mobile #</span>';
				}else{
					echo '<span style = "color:green">You can take this Phone No </span>';
				}
			}else{
				echo $q;	
			}
		
		
		}elseif($phoneLength == 0){
					echo "";
		}else{
			echo '<span style = "color:red">Invalid Mobile #</span>';
		}
	}
?>