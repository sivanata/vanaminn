<!-- DB Connection -->
<?php
include 'libs/load.php';
$success5 = null;
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
if(isset($_POST['book'])and isset ($_POST['quick'])){
$book = $_POST['book'];
$book = mysqli_real_escape_string($conn, $book);
$quick = $_POST['quick'];
$insta = mysqli_real_escape_string($conn, $quick);
$query = "UPDATE `djubo` SET `book` = '$book', `quick` = '$quick' WHERE `djubo`.`id` = 1";
mysqli_query($conn, $query);
$success5 = "Djubo Links successfully Updated!";
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
			  <!-- Notifiction -->
				  <?php 
				  if($success5){?>
				  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
				  <?php echo $success5; ?>
				  </div><?php
				  }
				  ?>
				<div class="card-body">
                  <h4 class="card-title">Djubo Links Updates</h4>
                  <form class="forms-sample" action="" method="post">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Book Now</label>
                      <div class="col-sm-10">
                        <input type="url" name="book" id="book"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <!--<label class="col-sm-2 col-form-label">Quick Pay</label>-->
                      <div class="col-sm-10">
                        <input type="hidden" name="quick" id="quick"class="form-control"  required>
                      </div>
                    </div>
                    <button type="submit" onclick="" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>  
			<?php
			$query = "SELECT book, quick FROM djubo";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			?>
		  <div class="container " style="padding-top: 40px;">
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
			  
				<div class="card-body">
                  <h4 class="card-title pb-3">Present Djubo Links</h4>
                  
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label pt-4">Book Now</label>
						<label class="col-sm-10 form-control" style="padding-bottom:60px ;"><?php echo $row['book']; ?></label>
						
                    </div>
                    <!--<div class="form-group row">
						
						<label class="col-sm-2 col-form-label">quick Pay</label>
						<label class="col-sm-10 form-control"><?php echo $row['quick']; ?></label>
                    </div>-->
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
