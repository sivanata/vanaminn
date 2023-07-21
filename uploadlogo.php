<?php 

if (isset($_POST['submit']) && isset($_FILES['my_logo'])) {
	include 'libs/load.php';

	$img_name = $_FILES['my_logo']['name'];
	$img_size = $_FILES['my_logo']['size'];
	$tmp_name = $_FILES['my_logo']['tmp_name'];
	$error = $_FILES['my_logo']['error'];

	if ($error === 0) {
		if ($img_size > 3e+6) {
			$em = "Sorry, your file is too large.";
			$msg7 = "Sorry, your file is too large.";
			$_SESSION['msg7'] = "$msg7";
		    header("Location: profile_logo.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 
			
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_logo_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/logo/'.$new_logo_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE `logo` SET `logo_url` = '$new_logo_name' WHERE `logo`.`id` = 1";
				mysqli_query($conn, $sql);
				$msg8 = "Logo Successfully Uploaded";
				$_SESSION['msg8'] = "$msg8";
				header("Location: profile_logo.php");
			}else {
				$em = "You can't upload files of this type";
				$msg9 = "Please Upload jpg, jpeg, png Files";
				$_SESSION['msg9'] = "$msg9";
		        header("Location: profile_logo.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: profile_logo.php?error=$em");
	}

}else {
	header("Location: profile_logo.php");
}