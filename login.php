<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/SOTG_LOGO.jpg" alt="logo">
              </div>
              <h4>Welcome!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
	<?php
	include 'connection.php';
	session_start();
	if(isset($_SESSION['Username']) ){
		header("location: List_all_Services.php");
	}
		$errorMsg = "";
		if(isset($_POST['btnLogin'])){
		$username = $_POST['txt_user'];
		$password = $_POST['txt_pass'];
		$ret2 = $link->query("Select * From `tblclient` Where `Username` = '$username' AND `Password` = '$password'");
		$retad = $link->query("Select * From `tbladminlogin` Where `Username_admin` = 'admin' AND `Password` = '$password'"); 
		$rows = mysqli_num_rows($ret2);
		$rowsad = mysqli_num_rows($retad);
		if($rowsad == 1 And $username = $_POST['txt_user'] == 'admin'){
			$_SESSION['Username_admin'] = $username;
			$_SESSION['Password'] = $password;	
			echo "<script type='text/javascript'>alert('Welcome to Admin page')
				window.location.href = 'admin/admin.php'
				</script>";
		}
		elseif($rows == 1){	
			$_SESSION['Username'] = $username;
			$_SESSION['Password'] = $password;	
			header("location:List_all_Services.php");
		}else{
			$errorMsg = "Invalid username or password!";
		}
	}
		
?>
			<br/><br/><h5 style = "color:red"><?php echo $errorMsg; ?></h5>
              <form method = "Post" class="pt-3">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name = "txt_user" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name = "txt_pass" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                  </div>
                  
                </div>
                <div class="my-3">
                  <input type = "submit" name = "btnLogin" value = "LOGIN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"/>
                </div>  
                <div class="text-center mt-4 font-weight-light">
                  Create user account? <a href="../Version_1/client_Registration.php" class="text-primary">Create</a><br/>
				  Login as Service Provider? <a href="../client_Registration.php" class="text-primary">Login</a>
				</div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2019  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>
