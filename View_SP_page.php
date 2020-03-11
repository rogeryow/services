<?php
	session_start();
	include("../connection.php");
	$cduser = $_GET['cd'];
	if(!isset($_SESSION['Username'])){
	header("location: ../login.php");
	}
	$userWelcome = $_SESSION['Username'];
	$user = $link->query("Select * From `tblclient` Where `Username` = '$userWelcome'");
	$welcome_user = $user->fetch_array();
	$name = $welcome_user['First_Name']; 
	$last_name = $welcome_user['Last_Name'];
	$profileImage = $welcome_user['Profile_image'];
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Services On the go</title>
  <style type="text/css">
  	.card img {
	  height: 250px;
	  object-fit: cover;
  	}
  	.services-title {
  		margin-bottom: 10px;
  	}
  	.services-price {
  		font-size: 90%;
  		color: #f57224;
  	}
  	.services-btn {
  		margin-top: 30px;
    	width: 100%;
  	}
  </style>
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
  <link rel="shortcut icon" href="" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href=""><img src="images/SOTG_LOGO.jpg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href=""><img src="images/SOTG_LOGO.jpg" alt="logo"/></a>
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
              <a href = "sotg_edit_client.php" class="dropdown-item">
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
            <a class="nav-link" href="List_All_Services_Home.php">
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
			<li class="nav-item">
            <a class="nav-link" href="../Service_Provider/SP_upload.php">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Your Services</span>  
            </a>
			</li>	
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
					<?php
						echo $cduser;
					?>
					<h3 class="services-title">Services Offered</h3>
					<!-- pokemon -->
						<div id="divServices">
							<div class="card-deck">
							  <div class="card">
							    <img src="https://images.all-free-download.com/images/graphiclarge/office_work_background_working_man_desk_icons_decor_6837962.jpg" class="card-img-top" alt="...">
							    <div class="card-body">
							      <h5 class="card-title">Aircon Repair</h5>
							      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							      <p class="card-text"><small class="services-price">₱1,000 - ₱2,000</small></p>
							      <!-- services button -->
							      <button type="button" class="services-btn btn btn-secondary">Inquire</button>
							      <!-- services button -->
							    </div>
							  </div>
							  <div class="card">
							    <img src="https://images.all-free-download.com/images/graphiclarge/office_work_background_working_man_desk_icons_decor_6837962.jpg" class="card-img-top" alt="...">
							    <div class="card-body">
							      <h5 class="card-title">Card title</h5>
							      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
							      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							    </div>
							  </div>
							  <div class="card">
							    <img src="https://images.all-free-download.com/images/graphiclarge/office_work_background_working_man_desk_icons_decor_6837962.jpg" class="card-img-top" alt="...">
							    <div class="card-body">
							      <h5 class="card-title">Card title</h5>
							      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
							      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							    </div>
							  </div>
							</div>
						</div>
						<br>
						<div id="divServices">
							<div class="card-deck">
							  <div class="card">
							    <img src="..." class="card-img-top" alt="...">
							    <div class="card-body">
							      <h5 class="card-title">Card title</h5>
							      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							    </div>
							  </div>
							  <div class="card">
							    <img src="..." class="card-img-top" alt="...">
							    <div class="card-body">
							      <h5 class="card-title">Card title</h5>
							      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
							      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							    </div>
							  </div>
							  <div class="card">
							    <img src="..." class="card-img-top" alt="...">
							    <div class="card-body">
							      <h5 class="card-title">Card title</h5>
							      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
							      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							    </div>
							  </div>
							</div>
						</div>
					<!-- pokemon -->
					<br/><br/>
					<div style = "cursor:pointer" onclick = "document.getElementById('new-message').style.display = 'block'" class = "white-back">
					<p align = "center"><a onclick = "(<?php echo $SP_Username = $row['Username']; ?>);"><input value = "Chat" name = "btn_approved" type = "button" 
					title = "Click to chat..."></a></p>
					</div>
					<div id = "new-message">
					<p class = "m-header">Message to username:<?php echo " ".$SP_Username; ?></p>
					<p class = "m-body">
					<form align = "center" method = "Post">
					To: <input type = "text" list = "user" value = "<?php echo $cduser; ?>"
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
                
               
              </div>
            </div>
			<div class = "box-area">
			
						
				<?php
				/*
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}
				else{
					$page = 1;
				}
				$num_per_page = 3;
				$start_from = ($page-1)*3;
				*/
				
							$sql = "SELECT * FROM `tblservices` WHERE `Username` = '$cduser'";
							$stmt = mysqli_stmt_init($link);
							if(!mysqli_stmt_prepare($stmt, $sql)){
								echo "SQL statement failed";
							}else{
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);		
								while($row = mysqli_fetch_assoc($result)){
								echo '<div class = "single-box">
										<div class = "img-text">';
								echo '<a href = "Services_pictures/'.$row['Services_Fullname'].'">
								<img class = "img-area" src = "Services_pictures/'.$row['Services_Fullname'].'"/></a>';
								echo '<h3 style = "color:blue">'.$row['Services_title'].'</h3>
									<p style = "color:orange">'.$row['Services_Desc'].'</p>
									<p style = "color:orange">Price: '.$row['Services_Price'].'</p>';
								echo $welcome_user['Company_Name'];
								$service_code = $row['Services_Fullname'];
								$feedback = $link->query("SELECT * FROM `tblposting` WHERE `Services_Code` = '$service_code'");
								$fb_count = mysqli_num_rows($feedback);	
									
								?><br/>
				
									<br/><a style = "text-decoration:none"href = "#">View Feedback <?php echo "(".$fb_count.")";?></a><br/>
								<?php
								echo'</div>		
								</div>';	
							}
						}
					
					
				?>
				
				</div>
				
			</div>
			<?php
				/*
					$pr_query = "Select * From tblservices";
					$pr_result = mysqli_query($link,$pr_query);
					$total_record = mysqli_num_rows($pr_result);
					
					$total_pages = ceil($total_record/$num_per_page);
					echo '<br/>';
					if($page>1){
						echo "<a style = 'hover:blue' href = 'View_SP_page.php?page=".($page-1)."' class = 'btn btn=primary'>Previous</a>";
					}
					
					for($i=1;$i<$total_pages;$i++){
						echo "<a style = 'hover:blue' href = 'View_SP_page.php?page=".$i."' class = 'btn btn=primary'>$i</a>";
					}
					
					if($i>$page){
						echo "<a style = 'hover:blue' href = 'View_SP_page.php?page=".($page+1)."' class = 'btn btn=primary'>Next</a>";
					}
					
					*/?>
          </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
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

