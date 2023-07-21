
				<?php 
				if(isset($_POST['delete_img']) && isset($_POST['room'])  ){
				$id = $_POST['delete_img'] ;
				$room = $_POST['room'] ;
				$sql = "DELETE FROM $room WHERE `id` = $id";
				$res = mysqli_query($conn,  $sql);
				}?>
				<div class="row">
					<div class="col-md-12 grid-margin">
						<div class="row">
							<div class="col-12 col-xl-8 mb-4 mb-xl-0">
								<h3 class="font-weight-bold">Out Door Look Images</h3>
							</div>
						</div>
					</div>
					<?php 
					$sql = "SELECT * FROM deluxe ORDER BY id DESC ";
					$res = mysqli_query($conn, $sql);
					while ($images = mysqli_fetch_assoc($res)) {  ?>
					<div class="col-md-4 grid-margin stretch-card">
						<div class="card tale-bg">
							<div class="card-people mt-auto">
								<img src="uploads/deluxe/<?=$images['image_url']?>" alt="people">
							</div>
						<form action=""method="post"enctype="multipart/form-data"style="text-align: center;">
							<input type="hidden" name ="delete_img" value="<?php echo $images['id'];?>">
							<input type="hidden" name ="room" value="deluxe">
							<button class="btn "type="submit" name="delete" >Delete</button>
						</form>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				<div class="row">
					<div class="col-md-12 grid-margin">
						<div class="row">
							<div class="col-12 col-xl-8 mb-4 mb-xl-0">
								<h3 class="font-weight-bold">Rooms Images</h3>
							</div>
						</div>
					</div>
					<?php 
					$sql = "SELECT * FROM super ORDER BY id DESC ";
					$res = mysqli_query($conn, $sql);
					while ($images = mysqli_fetch_assoc($res)) {  ?>
					<div class="col-md-4 grid-margin stretch-card">
						<div class="card tale-bg">
							<div class="card-people mt-auto">
								<img src="uploads/super/<?=$images['image_url']?>" alt="people">
							</div>
						<form action=""method="post"enctype="multipart/form-data"style="text-align: center;">
							<input type="hidden" name ="delete_img" value="<?php echo $images['id'];?>">
							<input type="hidden" name ="room" value="super">
							<button class="btn "type="submit" name="delete" >Delete</button>
						</form>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				<div class="row">
					<div class="col-md-12 grid-margin">
						<div class="row">
							<div class="col-12 col-xl-8 mb-4 mb-xl-0">
								<h3 class="font-weight-bold">Sit Out Area Images</h3>
							</div>
						</div>
					</div>
					<?php 
					$sql = "SELECT * FROM premium ORDER BY id DESC ";
					$res = mysqli_query($conn, $sql);
					while ($images = mysqli_fetch_assoc($res)) {  ?>
					<div class="col-md-4 grid-margin stretch-card">
						<div class="card tale-bg">
							<div class="card-people mt-auto">
								<img src="uploads/premium/<?=$images['image_url']?>" alt="people">
							</div>
						<form action=""method="post"enctype="multipart/form-data"style="text-align: center;">
							<input type="hidden" name ="delete_img" value="<?php echo $images['id'];?>">
							<input type="hidden" name ="room" value="premium">
							<button class="btn "type="submit" name="delete" >Delete</button>
						</form>
						</div>
					</div>
					<?php
					}
					?>
				</div>