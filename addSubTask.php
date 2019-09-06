<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$subTask = $_POST["subTask"];
		$sql = "INSERT INTO subtask(content_subtask,status_subtask,id_task) VALUES ('$subTask',1,'$idTask') " ;
		$conn->exec($sql);
		$select = "SELECT id_subtask FROM subtask WHERE id_task = '$idTask' ORDER BY id_task DESC LIMIT 1";
		echo $conn->lastInsertId();
?>