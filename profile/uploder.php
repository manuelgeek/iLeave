<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	include '../db.php';
	include '../login.php';

$query = "SELECT * FROM users WHERE email='$_SESSION[userSession]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);


	if(isset($_POST['upload_info']))
	{		

		

		$phone = $_POST['phone'];// user name
		$gender = $_POST['gender'];
		$phone_2 = $_POST['phone_2'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($phone)){
			$errMSG = "Please Enter Your Phone Number";
		
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}else if(empty($gender)){
			$errMSG = "Please Select Gender.";
		}else if(empty($phone_2)){
			$errMSG = "Please Select Secondary Contact.";
		}
	
		 else{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		

		
			// if no error occured, continue ....
		if(!isset($errMSG))
		{


		
		if (!$row['user_photo']=="") {
				
			// select image from db to delete
		$stmt_select = $MySQLi_CON->query("SELECT photo FROM users WHERE email='$_SESSION[userSession]'");
	//	$stmt_select->execute(array('$_SESSION[userSession]'=>$_GET['upload_pic']));
		$imgRow=$stmt_select->fetch_array();
		unlink("user_images/".$imgRow['photo']); }

			$stmt = $MySQLi_CON->prepare("UPDATE  users SET photo='$userpic', phone='$phone', gender ='$gender', phone_2='$phone_2' WHERE email='$_SESSION[userSession]'");
			//$stmt->bindParam(':uname',$username);
			//$stmt->bindParam(':ujob',$userjob);
			//$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new Photo and Info succesfully Updated ...";
				header("refresh:3;profile"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}


	}
?>

<!--*************PHP PROFILE PHOTO******-->
