<!-- DB Connection -->
<?php
include 'libs/load.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Include all head tags -->
<?php require_once 'head.php';?>

<body>
<!-- login session Properties -->
<?php 
session::isvalid();
if(session::get('LAST_ACTIVITY')){

	if(session::get('login_test')){
?>
  <div class="container-scroller">
		<!-- header start -->
		<?php require_once 'header.php';?>
		<!-- header end -->
    <div class="container-fluid page-body-wrapper">
			<!-- menu Start -->
			<?php require_once 'menu.php';?>
			<!-- menu end -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-7 grid-margin stretch-card">
              <div class="card">
			   <!-- file uploaded sts Notification -->
			   <?php 
			  if(isset($_SESSION['inform1'])){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $_SESSION['inform1'];
			  unset($_SESSION["inform1"]);
			  ?>
			  </div><?php
			  }
			  ?>
			  <!-- file upload extension sts -->
			  <?php 
			  if(isset($_SESSION['inform2'])){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $_SESSION['inform2'];
			  unset($_SESSION["inform2"]);
			  ?>
			  </div><?php
			  }
			  ?>
			  <!-- file upload size sts -->
			  <?php 
			  if(isset($_SESSION['inform3'])){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $_SESSION['inform3'];
			  unset($_SESSION["inform3"]);
			  ?>
			  </div><?php
			  }
			  ?>
				<div class="card-body">
					<h4 class="card-title">Terms And Conditions File Update</h4>
					<?php if (isset($_GET['error'])): ?>
					<?php endif ?>
                  <form class="forms-sample"action="uploadterms.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>File upload</label>
                      <div class="input-group col-xs-12">
                        <input type="file" name="my_terms"  class="form-control file-upload-info"  placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="submit" name="submit">Upload</button>
                        </span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-12 grid-margin">
						<div class="row">
							<div class="col-12 col-xl-8 mb-4 mb-xl-0">
								<h3 class="font-weight-bold">Present File</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php 
					$sql = "SELECT * FROM terms";
					$res = mysqli_query($conn,  $sql);
					if ($images = mysqli_fetch_assoc($res)) { 
					?>
					<div class="col-md-2 grid-margin stretch-card">
						<div class="card ">
							<div class="card-people mt-auto">
								<a target="_blank"href="uploads/terms/<?=$images['pdf_url']?>"><img src="uploads/terms/doc.png" alt="people"></a>
							</div>
						</div>
					</div>
					<?php	
					}
					?>
				</div>
			</div>
        </div>
         <!-- Footer Start -->
		<?php require_once 'footer.php';?>
		<!-- Footer End -->
      </div>
    </div>
  </div>
  <!-- login Session Error Properties -->
 <?php 
	}else{
		require_once 'login.php';
	}
}else{
	require_once 'login.php';
}
?>
</body>

</html>
