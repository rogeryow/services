
<div id = "right-col-container">
	<div id = "messages-container">
	<?php
	require_once("connection.php");
	if(!isset($_SESSION['Username'])){
		header("location: login.php");
	}
		$userWelcome = $_SESSION['Username'];
		$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
		$welcome_client = $user->fetch_array();
		$image = $welcome_client['Profile_image'];
		
		$no_message = false;
		if(isset($_GET['user'])){
			$_GET['user'] = $_GET['user'];
		}else{
			$q = 'SELECT `sender_name`, `receiver_name` FROM `tblchat_messages`
			WHERE `sender_name` = "'.$_SESSION['Username'].'"
			OR `receiver_name` = "'.$_SESSION['Username'].'"
			ORDER BY `date_time` DESC LIMIT 1';
			
			$r = mysqli_query($link, $q);
			if($r){
				if(mysqli_num_rows($r) > 0){
					while($row = mysqli_fetch_assoc($r)){
						$sender_name = $row['sender_name'];
						$receiver_name = $row['receiver_name'];
						if($_SESSION['Username'] == $sender_name){
							$_GET['user'] = $receiver_name;	
						}else{
							$_GET['user'] = $sender_name;
						}
					}
				}else{
					echo '<p style = "text-align:center">No messages from you</p>';
					$no_message = true;
				}
				
		}
		}
		if($no_message == false){
		$q = 'SELECT *FROM `tblchat_messages` WHERE `sender_name` = "'.$_SESSION['Username'].'"
		AND `receiver_name` = "'.$_GET['user'].'" OR `sender_name` = "'.$_GET['user'].'"
		AND `receiver_name` = "'.$_SESSION['Username'].'"';
		$user = $_GET['user'];
		$sql_update = $link->query("Select * From `tblclient` Where `Username` = '$user'");
		$receiver_image = $sql_update->fetch_array();
		$image_R = $receiver_image['Profile_image']; 
		$r = mysqli_query($link, $q);
		$com = $link->query('SELECT * FROM `tblcompanyinfo` Where `Username` = "'.$_GET['user'].'"');
		$check = $com->fetch_array();
		$nameCom = $check['Company_Name'];
	
		if($r){
		while($row = mysqli_fetch_assoc($r)){
			$sender_name = $row['sender_name'];
			$receiver_name = $row['receiver_name'];
			$message = $row['messages_text'];
			$date = $row['date_time'];
			if($sender_name == $_SESSION['Username']){
				?>
				
				<p style = "color:red" class = "date-chat"><?php echo ' '.$date;?></p>
				<div class = "user-photo_sender">
					<?php echo '<image src = "pictures/'.$welcome_client['Profile_image'].'" id = "image-profile"/>';?>
				</div>
				<div class = "grey-message">
				<p><h3 class = "me-chat" style = "color:black">Me</h3></p>
				
				<p><?php echo ' '.$message;?></p>
				</div> 
				<?php			
			}else{
				?>
				<p style = "color:green" class = "date-chat2"><?php echo ' '.$date;?></p>
				<div class = "user-photo_receiver">
				<?php echo '<image src = "pictures/'.$receiver_image['Profile_image'].'" id = "image-profile"/>';?>
				</div>
				<div class = "white-message">
				<?php echo '<h3 style = "color:blue">'.$sender_name." ".$nameCom.'</h3>'; ?>
				<p><?php echo $message; ?></p>
				</div>
				<?php
				}
			}
		}else{
		echo $q;
	}
	}	
		?>
		
		</div>
		<form method = "Post" id = "message-form">
		<textarea class = "textarea" name = "message_text" id = "message_text" placeholder = "Type a Message" required></textarea>	
		</form>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src = "jquery.js"></script>
	<script>
		$("document").ready(function(event){
			
			$("#right-col-container").on('submit', '#message-form', function(e){
				
				e.preventDefault();
				
				const a = $("#right-col-container").scroll(0);
				
				var message_text = $("#message_text").val();
				$.post("chat/sending_process.php?user=<?php echo $_GET['user'];?>",
				{
					text: message_text,
				
				},
					function (data, status){
						
						console.log(data);
	
						$("#message_text").val("");
						
						document.getElementById("messages-container").innerHTML += data;
					}
				);
			});
			
			$("#right-col-container").keypress(function(e){
				if(e.keyCode == 13 && !e.shiftKey){
					$("#message-form").submit();
				}
			});
			
		});
	</script>	
	