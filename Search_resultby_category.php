<?php
	include("../connection.php");
	session_start();
	if(!isset($_SESSION['Username'])){
	header("location: ../login.php");
	}
	$txt_search = $_POST['category'];
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
            <a class="nav-link" href="List_home_all.php" >
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
            <a class="nav-link" href="#">
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
                    <h2>Services List</h2>
                    <p class="mb-md-0">View your desired services.</p>
                  </div>
                  <div class="d-flex">
                <?php $user = mysqli_query($link, "Select * From tblcategory");?>
                <form method = "Post" action = "Search_resultby_category.php">
                    <select class = "" name = "category" required>
					<option value = "" >Select Category</option>
					<?php
					while($rows = mysqli_fetch_array($user)){?>	
					<option value = "<?php echo $rows['Category']; ?>"><?php echo $rows['Category'];?></option>
					<?php
					}
					?>
					</select>
                  </div>
                  &nbsp; &nbsp;<input type = "submit" value = "OK!" class= "btn btn-primary mt-2 mt-xl-0">
				</form>
                </div>
               
              </div>
            </div>
			<div class = "center_posting_con">
			
			<?php
			
			if(isset($_GET['page'])){
					$page = $_GET['page'];
				}
				else{
					$page = 1;
				}
				$num_per_page = 3;
				$start_from = ($page-1)*3;
				
					
				//$query = "Select * From tblservices limit $start_from,$num_per_page";
				
			
			$sql="SELECT * FROM `tblservices` WHERE CONCAT (`Services_Desc`) LIKE 
					'%$txt_search%' limit $start_from,$num_per_page";
			$result = mysqli_query($link,$sql);
			echo '<h3 style = "margin-left:70px"> Search result for <a style = "color:blue" href ="#" >'.$txt_search.'</a></h3>';		
			echo '<br/>';
			echo '<div class = "box-area">';
			$userName = $_SESSION['Username'];
			$sqlCom = $link->query("SELECT * FROM `tblcompanyinfo` WHERE `Username` = '$userName'");
			$welcome_user = $sqlCom->fetch_array();
			$nameCom = $welcome_user['Company_Name'];
			$display = $link->query("Select * From `tblservices` Where `Username` = '$userName'");
			$welcome_client = $display->fetch_array();
			$ComName = $welcome_client['Company_Name'];
			$t = $link->query("Select * From `tblservices` Where `Username` = '$userName' AND `Company_Name` = '$ComName'");
			$setCom = mysqli_num_rows($t);
			$stmt = mysqli_stmt_init($link);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL statement failed";
			}else{
				mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);		
					while($row = mysqli_fetch_assoc($result)){
					if($row['Username'] !== $userWelcome){
					echo '<div class = "single-box">
							<div class = "img-text">';	
					$ComName = $row['Company_Name'];
					$t = $link->query("Select * From `tblservices` Where `Username` = '$userName' AND `Company_Name` = '$ComName'");
					$setCom = mysqli_num_rows($t);		
					echo '<a href = "../Services_pictures/'.$row['Services_Fullname'].'">
					<img class = "img-area" src = "../Service_provider/Services_pictures/'.$row['Services_Fullname'].'"/></a>';
					echo '<h3 style = "color:blue">'.$row['Services_title'].'</h3>
					<p style = "color:orange">'.$row['Services_Desc'].'</p>';
					
					//echo $row['Company_Name'].'<br/><br/>';
					$services_check = $link->query("SELECT * FROM `tblrequestservices` Where `Username` = '$userWelcome'");
					$services_exist = $services_check->fetch_array();
					$checking = $row['Services_title'];
					$checking_exist = $link->query("SELECT * FROM `tblrequestservices` Where `Username` = '$userWelcome' And `Services_Name` = '$checking' And `Status` = '0'");
					$d = mysqli_num_rows($checking_exist);
					if($row['Username'] == $userWelcome){
						echo "Your Services";					
						}else{
						if($d !== 1){
							echo '<a href = "Request_Services_page.php?cd= '.$row['IDServices'].'"><button>Inquire</button></a>';
						}else{
							echo '<a href = "Request_Services_page.php?cd= '.$row['IDServices'].'">Requesting...</a>';
						}
					}
					echo'</div>		
					</div>';
					}
				}
			}
				?>
			</div>
		</div>
					
			</div>
			<?php
					$pr_query = "Select * From tblservices";
					$pr_result = mysqli_query($link,$pr_query);
					$total_record = mysqli_num_rows($pr_result);
					
					$total_pages = ceil($total_record/$num_per_page);
					echo '<br/>';
					if($page>1){
						echo "<a style = 'hover:blue' href = 'Search_resultby_category.php?page=".($page-1)."' class = 'btn btn=primary'>Previous</a>";
					}
					
					for($i=1;$i<$total_pages;$i++){
						echo "<a style = 'hover:blue' href = 'Search_resultby_category.php?page=".$i."' class = 'btn btn=primary'>$i</a>";
					}
					
					if($i>$page){
						echo "<a style = 'hover:blue' href = 'Search_resultby_category.php?page=".($page+1)."' class = 'btn btn=primary'>Next</a>";
					}
					?>
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

