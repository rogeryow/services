<?php
	include("connection.php");
?>
<html>
	<head>	
		<title>Client Registration Form</title>
		<link rel = "stylesheet" type = "text/css" href = "Css/client_design_Reg.css">
	</head>
	<body>
	<?php
			
			
				$sql=$link->query("INSERT INTO tblclient values('Null',
				'$fname','$lname','$user_name','$pass','$passCon','$mobile_No','$add','$gen','none','none')");
				$sql2=$link->query("INSERT INTO tblcompanyinfo (Username) Values ('$user_name')");
				
				if($sql){
						$_SESSION['Username'] = $user_name;
						
				}
				
			
	
	?>
		<button>Send</button>
		<input type = "number" onkeyup = "phone_check()" name = "num" id = "phone_check_user" value="<?php echo $mobile_No;?>" placeholder = "Mobile No." required>
		<input type = "text" onkeyup = "phone_check()" name = "num" id = "phone_check_user" value="<?php echo $mobile_No;?>" placeholder = "Enter Code" required><br/><br/>
	</body>
</html>