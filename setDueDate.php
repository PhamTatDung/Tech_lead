<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$dueDate = $_POST["dueDate"];
		$sql = "UPDATE task SET dueDate = '$dueDate'  WHERE id_task = '$idTask'" ;
		$conn->exec($sql);
?>