
 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
 <?php 
				$sql = "SELECT * FROM logo";
				$res = mysqli_query($conn,  $sql);
				if ($images = mysqli_fetch_assoc($res)) { 
			?>
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="uploads/logo/<?=$images['logo_url']?>" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="uploads/logo/<?=$images['logo_url']?>" alt="logo"/></a>
      </div>
	  <?php 
				}
		?>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown d-none d-lg-flex ">
		   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/admin.png" alt="profile"/>
            </a>
			<h5 class="m-2 pt-1 "style="color:green"> Welcome <?php echo($_SESSION['login_test']);?> !</h5>
          </li> 
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>