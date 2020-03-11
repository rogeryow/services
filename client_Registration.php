<?php
include ("connection.php");
session_start();
if(isset($_POST['Username'])){
	header("location: menu.php");
}
$userErr = $phoneErr = "";
?>
<html>
	<head>
	<title>Client Registration Form</title>
	<link rel = "stylesheet" type = "text/css" href = "Css/client_design_Reg.css">
	</head>
	<body>
	
	<?php
// define variables and set to empty values
$nameErr = $addErr = $passErr = $passLengthErr = $mobile_noErr = "";
$fname = $lname = $pass = $user_name = $passCon = $add = $mobile_No = "";

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
	$gender = test_input($_POST["gender"]);
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['btnReg'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$user_name = $_POST['username'];
			$pass = $_POST['pass'];
			$passCon = $_POST['passCon'];
			$mobile_No = $_POST['num'];
			$add = $_POST['add'];
			$gen = $_POST['gender'];
	if($nameErr != "Only letters and white space allowed in Name"){
		$userLength = strlen($user_name);
		if($userLength < 5){
				$userErr = "Username must be minimum of 5 Characters";
		}
			//check the password length
		if($pass !== $passCon){
			$passErr= "Password did not match";
		}
		if($pass == $passCon And $passLength >= 6 And $userLength >= 5){
			echo " <scr
			dow.location.href = 'Phone_verification.php'
					 </script>"; 
		}
	}
				
}
?>
		<div class="wrap step1">
			<form id="signup">
				<h2>Client Sign Up!</h2>
				<span class="error" style = "color:red"> <?php echo $nameErr;?></span>
				<div id = "name_valid_check"></div>
				<input type = "text" id = "f_name_check" name = "fname" value="<?php echo $fname;?>" placeholder = "First Name" required>
				<input type = "text" id = "l_name_check"name = "lname" value="<?php echo $lname;?>" placeholder = "Last Name" required><br>
				<div id = "checking"></div>
				<input type = "text" name = "username" id = "user_name"  value = "<?php echo $user_name;?>" placeholder = "Username" required><br>	
				<input type = "password"  id = "pass_check" name = "pass" placeholder = "Password" required>
				<?php echo '<span style = color:red>'.$passLengthErr.'</span>';?> <br>
				<input type = "password" id = "pass_check_con" name = "passCon" placeholder = "Confirm Password" required>
				<?php echo '<span style = color:red>'.$passErr.'</span>';?><br>
				<div id = "checking_phone"></div>
				<input type = "number" name = "mobile_no" value = "<?php echo $user_name;?>" placeholder = "Mobile No." required><br>
				<span style = "font-size:18px;">Address</span><br>
				<textarea name = "add" placeholder = "Address" required><?php echo $add;?></textarea><br><br>
				<h4>Gender</h4>
				<input type = "radio" name = "gender" value = "Male" required>Male
				<input type = "radio" name = "gender" value = "Female" required>Female<br><br>
				<input type = "submit" id = "register" name = "btnReg" value = "Sign Up!">
				<input type = "button" value = "Cancel" onclick="window.location.href='login.php';" id = "butt">
			</form>
	    </div>
		
		<div class="step2 hide">
		<h1>Please wait...</h1>
		</div>

	
	<script src = "jquery.js"></script>
	
	<script src="js/signUp.js" type="module"></script>

	</body>
</html>