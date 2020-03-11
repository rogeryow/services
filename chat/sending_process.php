<?php

	session_start();
	require_once("connection.php");
	if(isset($_SESSION['Username']) and isset ($_GET['user'])){
		if(isset ($_POST['text'])){
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
				$receiver_name = $_GET['user'];
				$receiver = $link->query("Select * From `tblclient` Where `Username` = '$receiver_name'");
				$re_user = $receiver->fetch_array();
				$full_R = $re_user['First_Name'];
				$full_R2 = $re_user['Last_Name'];
				$r1 = $full_R;
				$r2 = $full_R2;
				$R_fullname = $r1." ".$r2;
				$message = $_POST['text'];
				$date = date("Y-m-d h:i:sa");
					
				$q = 'INSERT INTO `tblchat_messages` (`id`,`Sender_full_name`,`sender_name`,`Receiver_full_name`,`receiver_name`,`messages_text`,`date_time`)
				VALUES("","'.$S_fullname.'","'.$sender_name.'","'.$R_fullname.'","'.$receiver_name.'","'.$message.'","'.$date.'")';
				$r = mysqli_query($link, $q);
				
				if($r){
				?>
				<div class = "grey-message">
				<a href = "#">Me</a>
				<p><?php echo $message;?></p>
				</div> 
				<?php	
				}else{
					echo $q;
				}
				
			}else{
				echo 'Please write a message';
			}
		}else{
			echo 'Problem with text';
		}	
	

?>