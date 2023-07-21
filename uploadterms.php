<?php 

if (isset($_POST['submit']) && isset($_FILES['my_terms'])) {
	include 'libs/load.php';

	$img_name = $_FILES['my_terms']['name'];
	$img_size = $_FILES['my_terms']['size'];
	$tmp_name = $_FILES['my_terms']['tmp_name'];
	$error = $_FILES['my_terms']['error'];

	if ($error === 0) {
		if ($img_size > 5e+6) {
			$em = "Sorry, your file is too large.";
			$inform1 = "Sorry, your file is too large.";
			$_SESSION['inform1'] = "$inform1";
		    header("Location: terms.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("pdf"); 
			
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_logo_name = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/terms/'.$new_logo_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE `terms` SET `pdf_url` = '$new_logo_name' WHERE `terms`.`id` = 1";
				mysqli_query($conn, $sql);
				$inform2 = "PDF Successfully updated";
				$_SESSION['inform2'] = "$inform2";
				header("Location: terms.php");
			}else {
				$em = "You can't upload files of this type";
				$inform3 = "Please Upload pdf Files";
				$_SESSION['inform3'] = "$inform3";
		        header("Location: terms.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: terms.php?error=$em");
	}

}else {
	header("Location: terms.php");
}