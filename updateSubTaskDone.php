<?php
	require 'connect.php';
		$idSubTask = $_POST["idSubTask"];
		$sql = "UPDATE subtask SET status_subtask = 1  WHERE id_subtask = '$idSubTask'" ;
		$conn->exec($sql);
?>