<?php
	include("../connection.php");
	if(isset($_POST['btnReg'])){
		$type = $_POST['category'];
		
		if($type == "Client"){
			echo "<script type='text/javascript'>
				window.location.href = '../client_Registration.php'
				</script>";
		}else{
			echo "<script type='text/javascript'>
				window.location.href = '../Service_Provider/SP_edit_ComInfo.php'
				</script>";
		}
	}

?>