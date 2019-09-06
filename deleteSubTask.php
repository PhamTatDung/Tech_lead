<?php
	require 'connect.php';
		$idSubtask = $_POST["idSubtask"];
		$sql = "DELETE FROM subtask WHERE id_subtask = '$idSubtask'" ;
		$conn->exec($sql);
?>