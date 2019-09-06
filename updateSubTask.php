<?php
	require 'connect.php';
		$idSubTask = $_POST["idSubTask"];
		$sql = "UPDATE subtask SET status_subtask = 0  WHERE id_subtask = '$idSubTask'" ;
		$conn->exec($sql);
?>