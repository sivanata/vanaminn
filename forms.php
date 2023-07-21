<!-- DB Connection -->
<?php
include 'libs/load.php';
 $done = null;
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
  <div class="container-scroller">
		<!-- header start -->
		<?php require_once 'header.php';?>
		<!-- header end -->
    <div class="container-fluid page-body-wrapper">
			<!-- menu Start -->
			<?php require_once 'menu.php';?>
			<!-- menu end -->
      <div class="main-panel"> 
		<!-- conditions -->
        <?php
			if (isset($_POST['room_a'])){
			$username='rooms';
			   // printf($username);
			   $userobj = new user($username);
			   $amount1 =$_POST['room_a'];
			   $amount2 =$_POST['room_b'];
			   $amount3 =$_POST['room_c'];
			   $userobj->setroom_a($amount1);
			   $userobj->setroom_b($amount2);
			   $userobj->setroom_c($amount3);
			   $done = "Rooms Prices successfully Modified!";
			}
		?>
		<?php
    
			$result=null;

                //if email nd pass get go to login checking 
			if (isset($_POST['email_address'])and isset ($_POST['password'])){
			$user = $_POST['email_address'];
			$pass = $_POST['password'];
			$result = user::samplelogin($user, $pass);
			$session ="$result" ;
			session::set('user', $session);
			}
			?>
	  
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
			  <?php 
			  if($done){?>
			  <div class="px-4 py-3 m-2 text-danger" style="background:#f5f5f5; border-radius: 10px; ">
			  <?php echo $done; ?>
			  </div><?php
			  }
			  ?>
                <div class="card-body">
                  <h4 class="card-title">Rooms Price Change</h4>
                  <form class="forms-sample"action="" method="post">
                    <!--<div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" name="email_address" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label"> Password</label>
                      <div class="col-sm-9">
                        <input type="password" name="password"  class="form-control" required>
                      </div>
                    </div>-->
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Deluxe Room New Price</label>
                      <div class="col-sm-9">
                        <input type="number" name="room_a" id="exampleInputMobile"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Super Delux Room New Price</label>
                      <div class="col-sm-9">
                        <input type="number" name="room_b" id="exampleInputMobile"class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Premium Room New Price</label>
                      <div class="col-sm-9">
                        <input type="number" name="room_c" id="exampleInputMobile" class="form-control"  required>
                      </div>
                    </div>
                    <button type="submit" onclick="" class="btn btn-primary mr-2">Modify</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
		<div class="container " style="padding-top: 40px;">
            <div class="row roomslist">
				<div class="col-lg-4 col-md-4">
                    <div class="room-item">
                        <div class="position-relative">
							<img class="img-fluid" src="../images/new_03/rooms-page/deluxe-room/1.jpg" width="100%" alt="img"style="transition: transform .2s;">
                        </div>
                        <div class="room-description">
                            <div class="d-lg-flex-justify-content-lg-between">
                                <h5 style="font-family: exotc350_dmbd_btdemi-bold;font-size: 17px;">Deluxe Room</h5>
								 <h4 class="pri">
								<?php
								$username = "rooms";
								$userobj = new user($username);
								$userobj->getroom_a();
								?>/ Night
								</h4>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4 col-md-4">
                    <div class="room-item">
                        <div class="position-relative">
							<img class="img-fluid" src="../images/new_03/rooms-page/super-deluxe-room/1.png" width="100%" alt="img"style="transition: transform .2s;">
                        </div>
                        <div class="room-description">
                            <div class="d-lg-flex-justify-content-lg-between">
                                <h5 style="font-family: exotc350_dmbd_btdemi-bold;font-size: 17px;">Super Deluxe Room</h5> 
								<h4 class="pri">
								<?php
								$username = "rooms";
								$userobj = new user($username);
								$userobj->getroom_b();
								?>/ Night
								</h4>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4 col-md-4">
                    <div class="room-item">
                        <div class="position-relative">
                            <img class="img-fluid" src="../images/new_03/rooms-page/premium-room/2.png" width="100%" alt="img"style="transition: transform .2s;">
                        </div>
                        <div class="room-description">
                            <div class="d-lg-flex-justify-content-lg-between">
                                <h5 style="font-family: exotc350_dmbd_btdemi-bold;font-size: 17px;">Premium Room</h5>
								 <h4 class="pri">
								<?php
								$username = "rooms";
								$userobj = new user($username);
								$userobj->getroom_c();
								?>/ Night
								</h4>
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
