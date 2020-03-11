<?php
	include("connection.php");
	session_start();
	if(isset($_POST['user'])){
		$txt_user = $_POST['user'];
		$userWelcome = $_SESSION['Username'];
		$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
		$welcome_client = $user->fetch_array();
		$user_current = $welcome_client['Username'];
		$q = 'SELECT * FROM `tblclient` WHERE `Username` = "'.$_POST['user'].'"';
		$r = mysqli_query($link, $q);
		if($r){
			$userLength = strlen($txt_user);
			if(mysqli_num_rows($r) >0 And $txt_user = $_POST['user'] !== $user_current){
				echo '<span style = "color:red">Username already exist</span>';
			}elseif($txt_user = $_POST['user'] == "" ){
				echo "";
			}elseif($userLength < 5){
				echo '<span style = "color:red">Username must be minimun of 5 Characters</span>';
			}elseif($txt_user = $_POST['user'] == $user_current){
				echo '<span style = "color:black">This is your current Username </span>';;
			}else{
				echo '<span style = "color:green">You can take this Username </span>';
			}
		}else{
			echo $q;
		}
		
	}
	
?>