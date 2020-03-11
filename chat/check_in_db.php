<?php
	require_once("connection.php");
	session_start();
	if(!isset($_SESSION['Username'])){
	header("location: login.php");
	}
	if(isset($_POST['user'])){
		$q = 'SELECT * FROM `tblclient` WHERE `Username` = "'.$_POST['user'].'"';
		$r = mysqli_query($link, $q);
		if($r){
			if(mysqli_num_rows($r) > 0){
				while($rows = mysqli_fetch_assoc($r)){				
				echo '<option value = "'.$user_name.'">';
			}
			}else{
				echo '<option value = "no user">';	
			}	
		}
	}
		
	
	
?>