<?php
	include("../connection.php");
	session_start();
	if(!isset($_SESSION['Username'])){
	header("location: login.php");
	}
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
	$welcome_client = $user->fetch_array();
	$id = $welcome_client['ID']; 
	$f_name = $welcome_client['First_Name']; 
	$l_name = $welcome_client['Last_Name'];
	$user_current = $welcome_client['Username'];
	$add_current = $welcome_client['Address']; 
	$pass_current = $welcome_client['Password'];
	$Phone_No = $welcome_client['Phone_No'];
?>
<html>
	<head>
	<title>Editing Client Info</title>
	<link rel = "stylesheet" type = "text/css" href = "Css/client_design_Reg.css">
	</head>
	<body>
<?php
// define variables and set to empty values
$nameErr = $addErr = $passErr = $passLengthErr = $mobile_noErr = "";
$fname = $lname = $pass = $user_name = $passCon = $add = $mobile_No = $current_passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $nameErr = "Only letters and white space allowed in Name"; 
	}
  }
  if (empty($_POST["lname"])) {
    $nameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $nameErr = "Only letters and white space allowed in Name"; 
    }
  }
  $pass = test_input($_POST["pass"]);
  $passCon = test_input($_POST["passCon"]);
	if($pass !== $passCon){
		$passErr = "Password did not match";
	}
   $passLength = strlen($pass);
  if($passLength < 6){
	 $passLengthErr = "Password must be minimum of 6 characters";
  }
	//$gender = test_input($_POST["gender"]);
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['btnEdit'])){
	$pass_con = $_POST['current_pass'];
	$current_pass = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome' And `Password` = '$pass_con'");
	$rows = mysqli_num_rows($current_pass);
	if($nameErr != "Only letters and white space allowed in Name"){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$user_name = $_POST['username'];
			$pass = $_POST['pass'];
			$passCon = $_POST['passCon'];
			$mobile_No = $_POST['num'];
			$add = $_POST['add'];
			$gen = $_POST['gender'];
			$new_user = $user_name = $_POST['username'];
			$new_first_name = $fname = $_POST['fname'];
			$new_last_name = $lname = $_POST['lname'];
			$fullnameEdit = $new_first_name." ".$new_last_name;
			if($rows !== 1){
				$current_passErr = "Your current Password is incorrect";
			}
			if($pass !== $passCon){
					$passErr= "Password did not match";
			}
			// Updating the table tblclient in the database
			if($rows == 1 And $pass == $passCon And $passLength >= 6){
			$sql=$link->query("UPDATE `tblclient` SET `First_Name` = '$fname',`Last_Name` = '$lname',
			`Username` = '$user_name', `Password` = '$pass',
			`Password_Con` = '$passCon',`Phone_No` = '$mobile_No',`Address` = 
			'$add',`Gender` = '$gen' Where `ID` = '$id'");
			$_SESSION['Username'] = $user_name;
			// Updating the username of the chat sender and receiver to tblchat_messages table in the database
			$chat_sender_sql=$link->query("UPDATE `tblchat_messages` SET `Sender_full_name` = '$fullnameEdit',`sender_name` = '$new_user' Where `sender_name` = '$userWelcome'");
			$chat_receiver_sql=$link->query("UPDATE `tblchat_messages` SET `Receiver_full_name` = '$fullnameEdit',`receiver_name` = '$new_user' Where `receiver_name` = '$userWelcome'");
			$chat_receiver_sql1=$link->query("UPDATE `tblposting` SET `First_Name` = '$new_first_name', `Last_Name` = '$new_last_name',
			`Username` = '$new_user' Where `Username` = '$userWelcome'");
			$servicesList=$link->query("UPDATE `tblservices` SET `Username` = '$new_user' Where `Username` = '$userWelcome'");
			$company_info=$link->query("UPDATE `tblcompanyinfo` SET `Username` = '$new_user' Where `Username` = '$userWelcome'");
					if($sql){
						$_SESSION['Username'] = $user_name;
						echo " <script>
								window.alert('Updated');
								window.location.href = 'upload_picture.php'
							   </script>";		
					}
			}else{
				echo "Error in Updating";
			}
	}
}
?>
		<div class = "wrap">
			<form method = "Post" action = "">
				<h2>Editing Client Info</h2>
				<span class="error"> <?php echo $current_passErr; ?></span><br>
				<input type = "password" id = "button" value = "" name = "current_pass" placeholder = "Enter current password" required><br>
				<span id = "name_valid_check" class="error"> <?php echo $nameErr;?></span><br>
				<input type = "text" onkeyup = "checking_name_first()" id = "f_name_check" name = "fname" value="<?php echo $f_name;?>" placeholder = "First Name" required>
				<input type = "text" onkeyup = "checking_name_last()" id = "l_name_check" name = "lname" value="<?php echo $l_name;?>" placeholder = "Last Name" required><br>
				<div id = "checking"></div>
				<input type = "text" name = "username" id = "user_name" onkeyup = "check_user()" value = "<?php echo $user_current;?>" placeholder = "Username" required><br>
				<input type = "password" onkeyup = "pass_checking()" value = "<?php echo $pass_current;?>"id = "pass_check" name = "pass" placeholder = "New Password" required>
				<?php echo '<span style = color:red>'.$passLengthErr.'</span>';?> <br>
				<span class="error" style = "color:red"> <?php echo $passErr;?></span><br>
				<input type = "password" onkeyup = "pass_checking()" id = "pass_check_con" value = "<?php echo $pass_current;?>" name = "passCon" placeholder = "Confirm Password" required><br>
				<div id = "checking_phone"></div>
				<input type = "number" onkeyup = "phone_check()" name = "num" id = "phone_check_user" value="<?php echo $Phone_No;?>" placeholder = "Mobile No." required>
				<input type = "text" name = "mobileNo_Con" placeholder = "Enter a code"><br><br>
				<span style = "font-size:18px;">Address</span><br>
				<textarea name = "add" placeholder = "Address" required ><?php echo $add_current;?></textarea><br>
				<h4>Gender</h4>
				<input type = "radio" name = "gender" value = "Male" required>Male
				<input type = "radio" name = "gender" value = "Female" required>Female<br><br><br>
				<input type = "submit" id = "register" name = "btnEdit" value = "Update!">
				<input type = "button" value = "Cancel" onclick="window.location.href='List_all_Services.php';" id = "butt">
			</form>
			<script src = "jquery.js"></script>
	<script>
		
		function check_user(){
			var user_name = document.getElementById("user_name").value;
			$.post("user_check_edit.php",
			{
				user: user_name
			},
			function(data, status){
				if(data == '<span style = "color:red">Username already exist</span>'){
					document.getElementById("register").disabled = true;
				}
				else if(data == '<span style = "color:red">Username must be minimun of 5 Characters</span>'){
					document.getElementById("register").disabled = true;
				}
				else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("checking").innerHTML = data;
				
			}
			
			);
			
		}

		function phone_check(){
			var phone = document.getElementById("phone_check_user").value;
			$.post("phone_check_edit.php",
			{
				phonetoC: phone
			},
			function(data, status){
				if(data == '<span style = "color:red">Phone No already exist</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<span style = "color:red">Invalid Mobile #</span>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("checking_phone").innerHTML = data;
				
			}
			
			);
			
		}
		function checking_name_first(){
			var valid_name_f = document.getElementById("f_name_check").value;
			$.post("name_client_check_edit.php",
			{
				fname_lname_valid: valid_name_f
			},
			function(data, status){
				if(data == '<span style = "color:red">Phone No already exist</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<span style = "color:red">Invalid Name</span>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("name_valid_check").innerHTML = data;
				
			}
			
			);
			
		}
		function checking_name_last(){
			var valid_name_l = document.getElementById("l_name_check").value;
			$.post("name_last_check_edit.php",
			{
				lname_valid: valid_name_l
			},
			function(data, status){
				if(data == '<span style = "color:red">Phone No already exist</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<span style = "color:red">Invalid Name</span>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("name_valid_check").innerHTML = data;
				
			}
			
			);
			
		}
		
	</script>
		</div>
</body>
</html>