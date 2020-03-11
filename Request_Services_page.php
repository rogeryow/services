<?php
	include("../connection.php");
	session_start();
	if(!isset($_SESSION['Username'])){
	header("location: ../login.php");
	}
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
	$welcome_user = $user->fetch_array();
	$name = $welcome_user['First_Name']; 
	$last_name = $welcome_user['Last_Name'];
	$profileImage = $welcome_user['Profile_image'];
	$get_Services = $_GET['cd'];
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
	$welcome_user = $user->fetch_array();
	$name = $welcome_user['First_Name']; 
	$last_name = $welcome_user['Last_Name'];
	$add = $welcome_user['Address'];
	$contactNo= $welcome_user['Phone_No'];
	$value = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Services On the go</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/req_design.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/SOTG_LOGO.jpg" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/SOTG_LOGO.jpg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/SOTG_LOGO.jpg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        
		<ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <form method = "Post" action = "services_search_result_client.php">	
			<div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
			  
              <input type="text" class="form-control" name = "txt_search" placeholder="Search now" required> 	 
			</div>
          </li>
		  <ul class="navbar-nav navbar-nav-right">
			<input type = "submit" name = "btnSearch" value = "Search" class= "btn btn-primary mt-2 mt-xl-0">
		  </ul>
        </ul>
			</form>
        <ul class="navbar-nav navbar-nav-right">         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php echo '<image src = "../pictures/'.$welcome_user['Profile_image'].'" alt="profile"/>';?>
              <span class="nav-profile-name"><?php echo $name." ".$last_name;?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Edit Info
              </a>
			  <a href = "chat_private.php" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Chat Inbox
              </a>
			  <a href = "upload_picture.php" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
				Change Profile Image
              </a>
              <a href = "sotg_logout.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
         
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Home Services</span>  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Requested Services</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Services_requested.php">Requesting </a></li>
                <li class="nav-item"> <a class="nav-link" href="Done_services.php">Done</a></li>
              </ul>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="../Service_Provider/SP_upload.php">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Your Services</span>  
            </a>
			</li>
			<li class="nav-item">
            <a class="nav-link" href="List_all_Services.php">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Other Services</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">About</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Client Basic info</h2>
                    <p class="mb-md-0">Please check your information before request</p>
                  </div>
                  <div class="d-flex">
                
                  </div>
                </div>
               
              </div>
            </div>
			<div class = "left-col_menu">
		
		<div class = "left-content">		
				<h2 style = "font-family:arial"><label style = "color:gray">Fullname:</label></h2>
				<h4><strong><?php echo $name." ".$last_name;?></strong></h4><br/>
				<h2 style = "font-family:arial"><label style = "color:gray">Complete Address:</label></h2>
				<h4> <strong><?php echo $add;?></strong><h4/><br/>
				<h2 style = "font-family:arial"><label style = "color:gray">Phone No.</label></h2>
				<h4><strong><?php echo $contactNo; ?></strong></h4>
		</div>
	</div>
			<div class = "center_posting_con">
				<br/><br/><br/>
				<div class = "box-area">
					<div class = "box-area">
						
				<?php
				$fullname = $name." ".$last_name;
				$get_Services = $_GET['cd'];
				$sql = "SELECT * FROM `tblservices` Where `IDServices` = '$get_Services'";
				$stmt = mysqli_stmt_init($link);
				$display = $link->query("Select * From `tblservices` Where `Username` = '$userWelcome'");
				$welcome_client = $display->fetch_array();
				$ComName = $welcome_client['Company_Name'];
				$t = $link->query("Select * From `tblservices` Where `Username` = '$userWelcome' AND `Company_Name` = '$ComName'");
				if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL statement failed";
				}else{
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);		
					$row = mysqli_fetch_assoc($result);
						echo '<div class = "single-box">
						<div class = "img-text">';
						$ComName = $row['Company_Name'];
						$t = $link->query("Select * From `tblservices` Where `Username` = '$userWelcome' AND `Company_Name` = '$ComName'");
						$setCom = mysqli_num_rows($t);	
						echo '<a href = "../Service_Provider/Services_pictures/'.$row['Services_Fullname'].'">
						<img class = "img-area" src = "../Service_Provider/Services_pictures/'.$row['Services_Fullname'].'"/></a>';
						echo '<h3 style = "color:blue">'.$row['Services_title'].'</h3>
						<h4 style = "color:orange">'.$row['Services_Desc'].'</h4>';
						//<h4 style = "color:orange">Price: '.$row['Services_Price'].'</h4>';
						echo '<a href = "View_SP_page.php?cd= '.$row['Username'].'">'.$row['Username'].'</a>';
						echo'</div>		
						</div>';
						
						//Checking if the current service is already request
						$services_check = $link->query("SELECT * FROM `tblrequestservices` Where `Username` = '$userWelcome'");
						$services_exist = $services_check->fetch_array();
						$checking = $row['Services_title'];
						$checking_exist = $link->query("SELECT * FROM `tblrequestservices` Where `Username` = '$userWelcome' And `Services_Name` = '$checking' And `Status` = '0'");
						$d = mysqli_num_rows($checking_exist);
						if($d == 0){
							$value = "Request";
						}else{
							$value = "Waiting";
						}
					
					$sql = $link->query("SELECT * FROM `tblrequestservices` WHERE `Username` = '$userWelcome' And `Status` = '0'" );
					$check_count = mysqli_num_rows($sql);
					
					if(isset($_POST['btnProceed'])){
					$services_picture = $row['Services_Fullname'];
					$services_name = $row['Services_title'];
					$services_type = $row['Services_Desc'];
					$services_price = $row['Services_Price'];
					$SP_company = $row['Company_Name'];
					$SP_Username = $row['Username'];
					$date = date("Y-m-d h:i:sa");
					if($d == 0 And $check_count <= 3){
						$services_req = $link->query("INSERT INTO `tblrequestservices` Values ('Null','$userWelcome','$fullname','$add','$contactNo',
						'$services_picture','$services_name','$services_type','$services_price','$SP_company','$SP_Username','$date','0')");
						if($services_req){							
							
							echo "<script>
								window.alert('You have Successfully Request this Service wait for the confirmation from Service Provider');
								window.location.href = 'Services_requested.php'
							   </script>";
						}
					}elseif($check_count > 3){
						echo "You reached the maximum request";	
					}else{
						echo "This services is already request";	
					}		
				}
			}
			$SP_Username = $row['Username'];
			?>
			<div style = "cursor:pointer" onclick = "document.getElementById('new-message').style.display = 'block'" class = "white-back">
			<p align = "center"><a onclick = "(<?php echo $SP_Username = $row['Username']; ?>);"><input value = "Chat" name = "btn_approved" type = "button" 
			title = "Click to chat..."></a></p>
			</div>
			<div id = "new-message">
			<p class = "m-header">Message to username:<?php echo " ".$SP_Username; ?></p>
			<p class = "m-body">
			<form align = "center" method = "Post">
				To: <input type = "text" list = "user" value = "<?php echo $SP_Username; ?>"
				onkeyup = "check_in_db()" class = "message-input" 
				placeholder = "Username" 
				name = "user_name" id = "user_name" readonly />
				<datalist id = "user"></datalist>
				<br><br>
				<textarea style = "resize:none" class = "message-input" name = "message" placeholder = "Write a Message" required></textarea><br><br>
				<input type = "submit" id = "send" value = "Send" name = "send"/>
				<button onclick = "document.getElementById('new-message').style.display = 'none'">Cancel</button>
			</form>
			</p>
			<p class = "m-footer">Click send to Message</p>
			</div>
		
		<?php
			require_once("../connection.php");
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
			}
		
		?>
	</div>
		<button id = "modalBtn" class = "button"><?php echo $value; ?></button>
	</div>		
	<div id = "simpleModal" class = "modal">
		<div class = "modal-content">
			<span class = "closeBtn">&times;</span>
			<p>
				<form method = "Post">
					<?php 
					if($d == 0){
					echo '<h2><label>Do you want to Proceed this service?</label></h2>';
					echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type = "submit" name = "btnProceed" value = "Yes">';
					echo '&nbsp; &nbsp;<input type = "submit" name = "" value = "No">';
					}else{
						echo "<h2>You are already requested this service please wait for the confirmation</h2>";
					}
					?>
				</form>
				
			</p>
		</div>
	</div>
	<?php
	$service_code = $row['Services_Fullname'];
	$service_name = $row['Services_title'];
	if(isset($_POST['Post_btn'])){
	
	$userWelcome5 = $_SESSION['Username'];
	$user2 = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome5'");
	$welcome_user = $user2->fetch_array();
	$firstname = $f_name = $welcome_user['First_Name']; 
	$lastname = $l_name = $welcome_user['Last_Name'];
	$cmt = $_POST['cmt'];
	$date = date("Y-m-d h:i:sa");
	if($cmt == ""){
	echo " <script>
			window.alert('Leave a Post Message');	
			</script>";
	}else{	
	$query = "INSERT INTO `tblposting` (ID,Username,First_Name,Last_Name,Comment,Services_Code,Services_Name,Date) 
	Values ('','$userWelcome','$firstname','$lastname','$cmt','$service_code','$service_name','$date')";
	$s = mysqli_query($link, $query);
	
	}
	}
	?>
		<form name = "frm" action = "" method = "Post">
			<textarea name = "cmt" id = "cmt" placeholder = "Feedback" required></textarea>
			<input type = "submit" value = "Ok" name = "Post_btn"><br/><br/>
		</form>
	<div id = "load_posting">
		<?php
				//Displaying all posted message
				$userCurrentLog = $_SESSION['Username'];
				//$id = $welcome_client['ID']; 
				$posted_msg = "SELECT * FROM `tblposting` Where `Services_Code` = '$service_code' ORDER BY `Date` DESC ";;
				$result = $link->query($posted_msg);
				while($row = $result->fetch_assoc()){
					/*Disabled a chat button in the user own posted message
					and can see the delete anchor tag only*/
					$userNametoCom = $row['Username'];
					$row_name = $row['First_Name'];
					$row_lastName = $row['Last_Name'];
					$fullname = $row_name." ".$row_lastName; 
					$ret2 = $link->query("Select * From `tblclient` Where `Username` = '$userCurrentLog' AND `First_Name` = '$row_name'");
					$rows = mysqli_num_rows($ret2);
					echo '<hr><div class = "design_post" ><a href = "#">' .$row['First_Name']." ".$row['Last_Name'].'</a>';
					echo '<p style = "color:gray">'.$row['Comment'].'</p></div>';
				}
				
				
			?>
		</div>	
							
				</div>
			</div>
          </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src = "modal.js"></script>
  <script src="js/sweetalert2.js"></script>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
</body>

</html>

