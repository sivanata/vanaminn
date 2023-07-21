<!-- DB Connection -->
<?php
include 'libs/load.php';
$success1 = null;
?>
<!DOCTYPE html>
<html lang="en">
<!-- Font Awsome  -->
<link href="../css/style.css" rel="stylesheet">
<!-- Include all head tags -->
<?php require_once 'head.php';?>
<body>
<!-- login session Properties -->
<?php 
session::isvalid();
if(session::get('LAST_ACTIVITY')){
if(session::get('login_test')){
?>
<?php
// database upload
if(isset($_POST['facebook'])and isset ($_POST['instagram']) and isset ($_POST['youtube']) and isset ($_POST['twitter'])){
$fb = $_POST['facebook'];
$fb = mysqli_real_escape_string($conn, $fb);
$insta = $_POST['instagram'];
$insta = mysqli_real_escape_string($conn, $insta);
$utube = $_POST['youtube'];
$utube = mysqli_real_escape_string($conn, $utube);
$twit = $_POST['twitter'];
$twit = mysqli_real_escape_string($conn, $twit);
$query = "UPDATE `social` SET `facebook` = '$fb', `instagram` = '$insta', `youtube` = '$utube', `twitter` = '$twit' WHERE `social`.`id` = 2";
mysqli_query($conn, $query);
$success1 = "Social Media Links successfully Updated!";
}
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
					<!-- file uploaded sts Notification -->
				  <?php 
				  if($success1){?>
				  <div class="px-4 py-3 m-2" style="background:#f5f5f5; border-radius: 10px; ">
				  <?php echo $success1; ?>
				  </div><?php
				  }
				  ?>
				<div class="card-body">
                  <h4 class="card-title">Social Media Links Updates</h4>
                  <form class="forms-sample" action="" method="post">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Face Book</label>
                      <div class="col-sm-9">
                        <input type="url" name="facebook" id="profilefb"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Instagram</label>
                      <div class="col-sm-9">
                        <input type="url" name="instagram" id="profileinstagram"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Youtube</label>
                      <div class="col-sm-9">
                        <input type="url" name="youtube" id="profileyoutube" class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Twitter</label>
                      <div class="col-sm-9">
                        <input type="url" name="twitter" id="profiletwitter" class="form-control"  required>
                      </div>
                    </div>
                    <button type="submit" onclick="" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>  
			<?php
			$query = "SELECT facebook, instagram, youtube, twitter FROM social";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			?>
		  <div class="container " style="padding-top: 40px;">
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
			  
				<div class="card-body">
                  <h4 class="card-title pb-3">Present Social Media Links</h4>
                  
                    <div class="form-group row">
						<label class="col-sm-1 pt-2"><a target="_blank" href="<?php echo $row['facebook']; ?>" style="margin:0px 3px;"> 
						<img src="../images/rating/facebook.png" alt="facebook"> 
						</a></label>
						<label class="col-sm-2 col-form-label">Face Book</label>
						<label class="col-sm-9 form-control"><?php echo $row['facebook']; ?></label>
						
                    </div>
                    <div class="form-group row">
						
						<label class="col-sm-1 pt-2"><a target="_blank" href="<?php echo $row['instagram']; ?>" style="margin:0px 3px;"> 
						<img src="../images/rating/instagram.png" alt="instagram">
						</a></label>
						<label class="col-sm-2 col-form-label">Instagram</label>
						<label class="col-sm-9 form-control"><?php echo $row['instagram']; ?></label>
                    </div>
                    <div class="form-group row">
						
						<label class="col-sm-1 pt-2"><a target="_blank" href="<?php echo $row['youtube']; ?>" style="margin:0px 3px;">
						<img src="../images/rating/youtube.png" alt="youtube"> 
						</a></label>
						<label class="col-sm-2 col-form-label">Youtube</label>
						<label class="col-sm-9 form-control"><?php echo $row['youtube']; ?></label>
                    </div>
                    <div class="form-group row">
                        
						<label class="col-sm-1 pt-2"><a target="_blank" href="<?php echo $row['twitter']; ?>" style="margin:0px 3px;">
						<img src="../images/rating/twitter.png" alt="twitter"> 
						</a></label>
						<label class="col-sm-2 col-form-label">Twitter</label>
						<label class="col-sm-9 form-control"><?php echo $row['twitter']; ?></label>
                    </div>
                </div>
				
              </div>
            </div>
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
