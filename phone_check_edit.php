<?php
	require_once("connection.php");
	session_start();
	if(isset($_POST['phonetoC'])){
		$userName = $_SESSION['Username'];
		$user = $link->query("Select * From `tblclient` Where `Username` = '$userName'");
		$welcome_client = $user->fetch_array();
		$id = $welcome_client['ID']; 
		$user_current = $welcome_client['Username'];
		$Phone_No = $welcome_client['Phone_No'];
		$phoneLength = "";
		$txt_phone = $_POST['phonetoC'];
		$p = 'SELECT * FROM `tblclient` WHERE `Phone_No` = "'.$_POST['phonetoC'].'"';
		$s = mysqli_query($link, $p);
		$phoneLength = strlen($txt_phone);
		if($phoneLength > 10 ){
			if($s){
				if(mysqli_num_rows($s) > 0 And $txt_phone = $_POST['phonetoC'] !== $Phone_No){
					echo '<span style = "color:red">Phone No already exist</span>';
				}elseif($phoneLength > 11){
					echo '<span style = "color:red">Invalid Mobile #</span>';
				}elseif($phoneLength == 0){
					echo "";
				}elseif($txt_phone = $_POST['phonetoC'] == $Phone_No){
					echo "This is your current Mobile No";
				}elseif($phoneLength < 10){
					echo '<span style = "color:red">Invalid Mobile # < 11</span>';
				}else{
					echo '<span style = "color:green">You can take this Phone No</span>';
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