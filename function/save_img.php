<?php 
	$uploaddir = '../images/';
	$uploadfile = $uploaddir.basename($_FILES['file']['name']);
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		echo $uploadfile;
	} else {
		echo "Возможная атака с помощью файловой загрузки!\n";
	}
?>