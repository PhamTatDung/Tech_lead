<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$reminder = $_POST["reminder"];
		$sql = "UPDATE task SET reminder = '$reminder' WHERE id_task = '$idTask'";
		$conn->exec($sql);
?>