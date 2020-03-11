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
  <link rel="stylesheet" href="css/style.css">
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
            <form method = "Post" action = "">	
			<div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
			  
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search" required> 	 
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
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="../Service_Provider/SP_upload.php">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
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
                    <h2>Transaction List</h2>
         
                  </div>
                  <div class="d-flex">
                
					
                  </div>
                </div>
               
              </div>
            </div>
			<div class = "center_posting_con">
	<br/><br/><br/>
	<table id = "user">
			<tr>
				<div class = "right-content">
				<td>
		<div class = "box-area">
		<?php
		$sql = $link->query("SELECT * FROM `tblrequestservices` WHERE `Username` = '$userWelcome' And `Status` = '1'" );
		while($services_req = $sql->fetch_array()){	
		?>	
			
			<tr>
				<div class = "right-content">
				<td>
					<div class = "box-area">
							<?php															
									echo '<div class = "single-box">
											<div class = "img-text">';
									echo '<a href = "../Services_pictures/'.$services_req['Services_Pic'].'">
									<img class = "img-area" src = "../Service_Provider/Services_pictures/'.$services_req['Services_Pic'].'"/></a>';
									echo '<h3 style = "color:blue">'.$services_req['Services_Name'].'</h3>
										<p style = "color:orange">'.$services_req['Services_Type'].'</p>
										<p style = "color:orange">Price: '.$services_req['Services_Price'].'</p>';
									echo $services_req['SP_Name'];	
									echo'</div>		
									</div>';					
							?>	
					</div>
				</td>
				</div>
				<td>
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Date Requested <br/>
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $services_req['Date']; ?></td>
				
			</tr>
			
		<?php } ?>
					</div>
				</td>
				</div>
			
			</tr>
		</table>
				
	</div>
			</div>
          </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
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

