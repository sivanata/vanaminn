<?php 

if (isset($_POST['submit']) && isset($_FILES['my_policy'])) {
	include 'libs/load.php';

	$img_name = $_FILES['my_policy']['name'];
	$img_size = $_FILES['my_policy']['size'];
	$tmp_name = $_FILES['my_policy']['tmp_name'];
	$error = $_FILES['my_policy']['error'];

	if ($error === 0) {
		if ($img_size > 5e+6) {
			$em = "Sorry, your file is too large.";
			$inform4 = "Sorry, your file is too large.";
			$_SESSION['inform4'] = "$inform4";
		    header("Location: policy.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("pdf"); 
			
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_logo_name = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/policy/'.$new_logo_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE `policy` SET `pdf_url` = '$new_logo_name' WHERE `policy`.`id` = 1";
				mysqli_query($conn, $sql);
				$inform5 = "PDF Successfully Updated";
				$_SESSION['inform5'] = "$inform5";
				header("Location: policy.php");
			}else {
				$em = "You can't upload files of this type";
				$inform6 = "Please Upload pdf Files";
				$_SESSION['inform6'] = "$inform6";
		        header("Location: policy.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: policy.php?error=$em");
	}

}else {
	header("Location: policy.php");
}