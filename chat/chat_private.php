<?php
	include("connection.php");
	session_start();
	if(isset($_SESSION['Username'])){
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
	$welcome_user = $user->fetch_array();
	$name = $welcome_user['First_Name']; 
	$last_name = $welcome_user['Last_Name'];
	?>
<!DOCTYPE html>
<html>
	<head>
	<title>Chat</title>
	<link rel = "stylesheet" type = "text/css" href = "../Css/chat_private.css">
	</head>
	<style>
		<?php require_once("../css/chat_private.php");?>
			
	</style>
	<body>
		<?php require_once("new-message.php");?>
		
		<div id = "container">
			<div id = "menu">
			<?php echo $name." ".$last_name;
			echo '<a style = "float:right"href = "../sotg_logout.php">Logout</a>';
			?>
			
		</div>
		
		<div id = "left-col">
		
			<?php require_once("left-col.php");?>
		</div>
		<div id = "right-col">

			<?php require_once("right-col.php");?>
		</div>
		</div>
	</body>
</html>
<?php
	}else{
		header("location:../login.php");
	}
?>
<script>
	
</script>