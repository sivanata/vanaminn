<!-- DB Connection -->
<?php
include 'libs/load.php';
$success = null;
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
if(isset($_POST['clandlinenumber'])and isset($_POST['cnumber'])and isset ($_POST['cwhatsapp']) and isset ($_POST['cemail'])){
$landlineNumber = $_POST['clandlinenumber'];
$landlineNumber = mysqli_real_escape_string($conn, $landlineNumber);
$phoneNumber = $_POST['cnumber'];
$phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
$whatsappNumber = $_POST['cwhatsapp'];
$whatsappNumber = mysqli_real_escape_string($conn, $whatsappNumber);
$email = $_POST['cemail'];
$email = mysqli_real_escape_string($conn, $email);
$query = "UPDATE `contacts` SET `clandlinenumber` = '$landlineNumber', `cnumber` = '$phoneNumber', `cwhatsapp` = '$whatsappNumber', `cemail` = '$email' WHERE `contacts`.`id` = 1";
mysqli_query($conn, $query);
$success = "Contact Info Details Successfully Updated";
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
		<?php
		$query = "SELECT clandlinenumber, cnumber, cwhatsapp, cemail FROM contacts";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="container " style="padding-top: 40px;">
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2 pt-3">Landline  </p><br>
                      <p><?php echo $row['clandlinenumber']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2 pt-3">Phone</p><br>
                      <p><?php echo $row['cnumber']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2 pt-3">Whatsapp </p><br>
                      <p><?php echo $row['cwhatsapp']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2 pt-3">Email I'd</p><br>
                      <p><?php echo $row['cemail']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	<!-- Notification -->
			<?php 
			if($success){?>
			<div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			<?php echo $success; ?>
			</div><?php
			}
			?>		
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
				<div class="card-body">
                  <h4 class="card-title">Contact Info Change</h4>
                  <form class="forms-sample"action="" method="post">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="profilelandlinenumber">Landline Number</label>
                      <div class="col-sm-9">
                        <input type="text" name="clandlinenumber" id="profilelandlinenumber"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="profilenumber">Phone Number</label>
                      <div class="col-sm-9">
                        <input type="number" name="cnumber" id="profilenumber"class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="profilewhatsapp">Whatsapp Number</label>
                      <div class="col-sm-9">
                        <input type="number" name="cwhatsapp" id="profilewhatsapp" class="form-control" maxlength="10" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"for="profileemail">Email I'd</label>
                      <div class="col-sm-9">
                        <input type="email" name="cemail" id="profileemail" class="form-control"  required>
                      </div>
                    </div>
                    <button type="submit" onclick="" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
		</div>
		<!-- only enter 10 digit in phone number tag -->
		<script>
		const profilenumber = document.getElementById('profilenumber');
		profilenumber.addEventListener('input', function(event) {
		const inputValue = event.target.value;
		if (inputValue.length >= 10) {
        event.preventDefault();
        profilenumber.value = inputValue.slice(0, 10);
		}
		});
		const profilewhatsapp = document.getElementById('profilewhatsapp');
		profilewhatsapp.addEventListener('input', function(event) {
		const inputValue = event.target.value;
		if (inputValue.length >= 10) {
        event.preventDefault();
        profilewhatsapp.value = inputValue.slice(0, 10);
		}
		});
		</script>
		
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
