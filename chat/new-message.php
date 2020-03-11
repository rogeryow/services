	<div id = "new-message">
			<p class = "m-header">New Message</p>
			<p class = "m-body">
			<form align = "center" method = "Post">
				<input type = "text" list = "user" 
				onkeyup = "check_in_db()" class = "message-input" 
				placeholder = "Username" 
				name = "user_name" id = "user_name"/>
				<datalist id = "user"></datalist>
				<br><br>
				<textarea style = "resize:none" class = "message-input" name = "message" placeholder = "Write a Message" required></textarea><br><br>
				<input type = "submit" id = "send" value = "Send" name = "send"/>
				<button onclick = "document.getElementById('new-message').style.display = 'none'">Cancel</button>
			</form>
			</p>
			<p class = "m-footer">Click send new Message</p>
	</div>
		
		<?php
			require_once("connection.php");
			if(isset($_POST['send'])){
				//For sender fullname
				$userWelcome = $_SESSION['Username'];
				$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
				$welcome_user = $user->fetch_array();
				$full_S = $welcome_user['First_Name'];
				$full_S2 = $welcome_user['Last_Name'];
				$s1 = $full_S;
				$s2 = $full_S2;
				$S_fullname = $s1." ".$s2; 
				$sender_name = $_SESSION['Username'];
				//For receiver full name
				$receiver_name = $_POST['user_name'];
				$receiver = $link->query("Select * From `tblclient` Where `Username` = '$receiver_name'");
				$re_user = $receiver->fetch_array();
				$full_R = $re_user['First_Name'];
				$full_R2 = $re_user['Last_Name'];
				$r1 = $full_R;
				$r2 = $full_R2;
				$R_fullname = $r1." ".$r2;
				
				$sender_name = $_SESSION['Username'];
				$receiver_name = $_POST['user_name'];
				
				$message = $_POST['message'];
				$date = date("Y-m-d h:i:sa");
				
				$q = 'INSERT INTO `tblchat_messages` (`id`,`sender_name`,`receiver_name`,`messages_text`,`date_time`)
				VALUES("","'.$sender_name.'","'.$receiver_name.'","'.$message.'","'.$date.'")';
				$r = mysqli_query($link, $q);
				if($r){
					header("location:chat_private.php?user=".$receiver_name);
				}else{
					echo $q;
				}
			}
		
		?>
		
<script src = "jquery.js"></script>
<script>
	document.getElementById('send').disabled = true;
	function check_in_db(){
		var user_name = document.getElementById("user_name").value;
		$.post("chat/check_in_db.php",
		{
			user: user_name
		},
		function(data, status){
			if(data == '<option value = "no user">'){
				document.getElementById('send').disabled = true;
			}else{
				document.getElementById('send').disabled = false;
			}
			document.getElementById('user').innerHTML = data;
		}
		);
	}

</script>