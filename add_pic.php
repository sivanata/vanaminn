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
			  <!-- file uploaded sts -->
			  <?php 
			  if(isset($_SESSION['done2'])){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $_SESSION['done2'];
			  unset($_SESSION["done2"]);
			  ?>
			  </div><?php
			  }
			  ?>
			  <!-- file upload extension sts -->
			  <?php 
			  if(isset($_SESSION['msg5'])){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $_SESSION['msg5'];
			  unset($_SESSION["msg5"]);
			  ?>
			  </div><?php
			  }
			  ?>
			  <!-- file upload size sts -->
			  <?php 
			  if(isset($_SESSION['msg6'])){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $_SESSION['msg6'];
			  unset($_SESSION["msg6"]);
			  ?>
			  </div><?php
			  }
			  ?>
                <div class="card-body">
					<h4 class="card-title">Gallery Images upload</h4>
					<?php if (isset($_GET['error'])): ?>
					<?php endif ?>
                  <form class="forms-sample"action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>File upload <span class="text-danger pt-3"> ( width : 360px , Height : 240px )</span></label>
                      <!--<input type="file" name="my_image" class="file-upload-default">-->
                      <div class="input-group col-xs-12">
                        <input type="file" name="my_image"  class="form-control file-upload-info"  placeholder="Upload logo" >
						<select class="form-control file-upload-info"name="my_name" id="my_name">
						  <option value="deluxe">Out Door Look</option>
						  <option value="super">Rooms</option>
						  <option value="premium">Sit Out Area </option>
						</select>
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
				<!-- gallery Start -->
				<?php require_once 'pages/index/gallery_view.php';?>
				<!-- gallery end -->
			</div>
        </div>
		
		<!-- Footer Start -->
				<?php require_once 'footer.php';?>
		<!-- Footer End -->
		
      </div>
    </div>
  </div>
	<!-- login Session Error Statement -->
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
