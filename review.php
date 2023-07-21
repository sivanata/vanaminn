<!-- DB Connection -->
<?php
include 'libs/load.php';
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
if(isset($_POST['delete_rev'])){
$id = $_POST['delete_rev'] ;
$sql = "DELETE FROM `review` WHERE `review`.`id` = $id";
$result = mysqli_query($conn, $sql);
}?> 
<?php
if(isset($_POST['rname'])and isset($_POST['rreview'])){		
$rname = $_POST['rname'];
$rname = mysqli_real_escape_string($conn, $rname);
$rreview = $_POST['rreview'];
$rreview = mysqli_real_escape_string($conn, $rreview);
$query = "INSERT INTO review (name, reviews) VALUES ('$rname', '$rreview')";
mysqli_query($conn, $query);
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
                <div class="card-body">
                  <h4 class="card-title">Reviews Updates</h4>
                  <form class="forms-sample" action="" method="post">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Client Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="rname" id="rname"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Comment</label>
                      <div class="col-sm-10">
                        <textarea  name="rreview" id="rreview" class="form-control"  rows="4" required ></textarea>
                      </div>
                    </div>
                    <button type="submit" onclick="" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
			<?php
			$query = "SELECT id, name, reviews FROM review ORDER BY id DESC";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)) {
			?>
		<div class="container " style="padding-top: 40px;">
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-12 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2 pt-3"><?php echo $row['name']; ?></p><br>
                      <p><?php echo $row['reviews']; ?></p>
                    </div>
					<form action="review.php"method="post">
						<input type="hidden" name ="delete_rev" value="<?php echo$row['id'];?>">
						<button class="btn m-3"type="submit" name="delete" style="background:#fff;">Delete</button>
					</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		
			<?php  
			}	
			?> 
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
