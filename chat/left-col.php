<?php
include("connection.php");


?>
<html lang = "en">
	<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width-device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content = "ie-edge">
	<title>Chat</title>
	</head>
	<body>
	<div class = "txt-search_chat">
	<form method = "POST">
	<input type = "text" id ="search_txt" name = "search_txt" onkeyup = "load_res()" 
	placeholder = "Search">
	</form>
	</div>
	<div id = "left-col-container">
	<div style = "cursor:pointer" onclick = "document.getElementById('new-message').style.display = 'block'" class = "white-back">
		<p align = "center">New Message</p>
	</div>
								
	
	
<?php 
	
	$q = 'SELECT DISTINCT `sender_name`,`receiver_name` 
	FROM `tblchat_messages` WHERE 
	`sender_name` = "'.$_SESSION['Username'].'" OR
	`receiver_name` = "'.$_SESSION['Username'].'"
	ORDER BY `date_time` DESC';
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("SELECT * FROM `tblclient` Where `Username` = '$userWelcome'");
	$welcome_user = $user->fetch_array();
	$r = mysqli_query($link, $q);
	if($r){
		if(mysqli_num_rows($r) > 0){
			$counter = 0;
			$added_user = array();
			while($row = mysqli_fetch_assoc($r)){
				$sender_name = $row['sender_name'];
				$receiver_name = $row['receiver_name'];
				$com = $link->query('SELECT * FROM `tblcompanyinfo` Where `Username` = "'.$receiver_name = $row['receiver_name'].'"');
				$check = $com->fetch_array();
				$nameCom = $check['Company_Name'];
				if($_SESSION['Username'] == $sender_name){
					if(in_array($receiver_name, $added_user)){
						
					}else{	
						
						?>
						<div class = "grey-back">
						<img src = "" class = "image" >	
						<?php
							echo '<a href = "?user='.$receiver_name.'">'.$receiver_name.'</a> -'.$nameCom;?>			
						</div>
						<?php
						$added_user = array($counter => $receiver_name);
						$counter++;
					}
				
				}elseif($_SESSION['Username'] == $receiver_name){
					if(in_array($sender_name, $added_user)){
						
					}else{
						?>
						<div class = "grey-back">
						<img src = "" class = "image" >	
							<?php echo '<a href ="?user='.$sender_name.'">'.$sender_name.'</a>'; ?>	
						</div>
						<?php
						$added_user = array($counter => $sender_name);
						$counter++;
					}
				}
			}
		}else{
			echo '<br><p style = "text-align:center">(Empty)</p>';
		}
}else{
		echo $q;
}
	
?>
	</div>
	</body>
</html>