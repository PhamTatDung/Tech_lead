<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$sql = "DELETE FROM task WHERE id_task = '$idTask'" ;
		$conn->exec($sql);
		echo("thành công");
?>