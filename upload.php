<?php
	$type = $_POST["typeFile"];
	$fileName = $_POST["fileName"];
	$idTask = $_POST["idTask"];
	$typefile =  array("jpg","png","jpg","docx","txt","jpeg");
	if (!in_array(strtolower($type), $typefile)) {
  	 echo "file k dung dinh dang";
  	}
  	else{
  		move_uploaded_file($_FILES['files']['tmp_name'], 'upload/' . $_FILES['files']['name']);
  		$sql = "INSERT INTO file VALUES (null, '$fileName', null, '$idTask')";
		$conn->exec( $sql);
  		echo "Thanh cong";
  	}
?>