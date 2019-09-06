<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$sql = "UPDATE task SET status_task = 0  WHERE id_task = '$idTask'" ;
		$conn->exec($sql);
?>