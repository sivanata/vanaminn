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
$result = null;
if(isset($_POST['email_address']) && isset($_POST['password'])){
$user = $_POST['email_address'];
$pass = $_POST['password'];
$result = user::samplelogin($user, $pass);
	if($result){
		session::set('login_test', $result);
		$_SESSION['LAST_ACTIVITY'] = time();
	}else{
		$msg4 = "Invalid Username or Password";
		$_SESSION['msg4'] = "$msg4";
	}
}
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
				<div class="col-md-12 grid-margin">
				  <div class="row">
					<div class="col-12 col-xl-8 mb-4 mb-xl-0">
					  <h3 class="font-weight-bold">Welcome To Vanam Holidays Inn!</h3>
					  
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

