<?php
include_once 'libs/load.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vanam Holidays Inn Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/vanam_logo/vanam-logo-01.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
			<?php 
				$sql = "SELECT * FROM logo";
				$res = mysqli_query($conn,  $sql);
				if ($images = mysqli_fetch_assoc($res)) { 
			?>
              <div class="brand-logo">
                <img src="uploads/logo/<?=$images['logo_url']?>" alt="logo" style="width:20%">
              </div>
			  <?php	
				}
			?>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="index.php" method="post">
                <div class="form-group">
                  <input name="email_address" type="email" class="form-control form-control-lg"id="floatingInput" placeholder="Email I'd">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg"  id="floatingPassword" placeholder="Password">
                </div>
				<?php 
			  if(isset($_SESSION['msg4'])){?>
			  <div class="px-1 pb-2 text-danger" style="background:#fff; border-radius: 10px; ">
			  <?php echo $_SESSION['msg4'];
			  unset($_SESSION["msg4"]);
			  ?>
			  </div><?php
			  }
			  ?>
                <div class="mt-3">
                  <button type="submit" onclick="" class="btn btn-primary mr-2">SIGN IN</button>
                </div>
                <!--<div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
