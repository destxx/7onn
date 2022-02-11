<?php 
	require_once "config.php";
	
	if (isset($_POST['pname'])) {
		$pname = $_POST['pname'];
		$pdesc = $_POST['pdesc'];
		$pprice = $_POST['pprice'];
		$pquantity = $_POST['pquantity'];
		
		$img_name = $_FILES['my_image']['name'];
		$img_size = $_FILES['my_image']['size'];
		$tmp_name = $_FILES['my_image']['tmp_name'];
		$error = $_FILES['my_image']['error'];
		
		if ($error === 0) {
			if ($img_size > 125000) {
				$em = "Plik jest za duży.";
				header("Location: index.php?error=$em");
			}else {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);

				$allowed_exs = array("jpg", "jpeg", "png"); 

				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
					$img_upload_path = 'photos_watches/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);

					// Wstawianie do bazy
					$zapytanie2 = "INSERT INTO products(name, image, price, quantity, description)
					VALUES ('$pname', '$new_img_name', '$pprice', '$pquantity', '$pdesc')";
					$wynik2 = mysqli_query($conn, $zapytanie2)
					or die('Źle');
				}else {
					$em = "Nie możesz wysłać pliku tego typu.";
					header("Location: index.php?error=$em");
				}
			}
		}else {
			$em = "Wystąpił błąd";
			header("Location: index.php?error=$em");
		}
	}
	header('Location: ./edycja.php');

?>