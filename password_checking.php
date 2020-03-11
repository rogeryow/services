<?php
	require_once("connection.php");
	if(isset($_POST['pass_check_var'])){
		$txt_pass = $_POST['pass_check_var'];
		$txt_pass_con = $_POST['pass_check_var_con'];
		$q = 'SELECT * FROM `tblclient` WHERE `Password` = "'.$_POST['pass_check_var'].'"';
		$r = mysqli_query($link, $q);
		if($r){
			$passLength = strlen($txt_pass);
			if(mysqli_num_rows($r) >0){
				
			}
			if($txt_pass = $_POST['pass_check_var'] !== $txt_pass_con = $_POST['pass_check_var_con']){
				echo '<p style = "color:red">Password did not match</p>';
			}
			elseif($txt_pass = $_POST['pass_check_var'] == "" ){
				echo "epoy";
			}elseif($passLength < 6){
				echo '<p style = "color:red">Password must be minimun of 6 Characters</p>';
			}else{
				echo '<p style = "color:green">Password has been ok </p>';
			}
		}else{
			echo $q;
		}
		
	}
	
?>