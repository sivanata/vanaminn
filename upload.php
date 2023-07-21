<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image']) && isset($_POST['my_name'])) {
	include_once 'libs/load.php';
	$myname = $_POST['my_name'];
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 5e+6) {
			$em = "Sorry, your file is too large.";
			$msg6 = "Sorry, your file is too large.";
			$_SESSION['msg6'] = "$msg6";
		    header("Location: add_pic.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$myname.'/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO $myname(image_url) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
				$done2 = "Image Successfully Uploaded";
				$_SESSION['done2'] = "$done2";
				header("Location: add_pic.php");
			}else {
				$em = "You can't upload files of this type";
				$msg5 = "Please Upload jpg, jpeg, png Files";
				$_SESSION['msg5'] = "$msg5";
		        header("Location: add_pic.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: add_pic.php?error=$em");
	}

}else {
	header("Location: add_pic.php");
}