<?php
	include("connection.php");
	session_start();
	if(!isset($_SESSION['Username'])){
	header("location: login.php");
	}
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
	$welcome_client = $user->fetch_array();
	$id = $welcome_client['ID']; 
	
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$file = $_FILES['image'];
		
		$fileSize = $file["size"];
		
		$img = $_FILES['image']['name'];
		$sql_update = $link->query("UPDATE `tbladmin` SET `Image_admin` = '$img' Where `Username` = '$userWelcome'");
		if($sql_update And $fileSize < 2000000 And $fileSize != 0 ){
			move_uploaded_file($_FILES['image']['tmp_name'], "admin_pictures/$img");
			echo "<script>alert('".$fileSize."B Image has been Uploaded')</script>";
		}else{
			echo "<script>alert('Image size is greater than 2000000B!')</script>";
			echo "<script>alert('Upload Failed')</script>";
		}
		
	}
	
?>

<html>
	<head>
		<title>Image Upload</title>
		<link rel = "stylesheet" type = "text/css" href = "Css/client_design_Reg.css">
	</head>
	
	<body>
		
		<form action = "" method = "post" enctype = "multipart/form-data">
			
			<div class = "file_inner_image">
			<h2 style = "color:black" class = "infoprofile">Profile Picture</h2>
			<label style = "color:white">Name</label>
			<input type = "text" name = "name" required>
			<br>
			<label style = "color:white">Select Image to Upload (2000000B or 2MB)</label>
			<label style = "color:white"><input type = "file" name = "image" required></label>
			<input type = "submit" name = "submit" value = "Upload"><br>
			<input type = "button" id = "butt" value = "Next" onclick="window.location.href='List_all_Services.php';">
			</div>
		</form>
		</div>
	</body>
</html>