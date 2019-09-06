<?php
	require 'connect.php';
		$idCmt = $_POST["idCmt"];
		$sql = "DELETE FROM comment WHERE id_comment = '$idCmt'" ;
		$conn->exec($sql);
?>