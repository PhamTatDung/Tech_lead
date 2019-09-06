<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$content = $_POST["content"];
		$sql = "UPDATE task SET content_task = '$content'  WHERE id_task = '$idTask'" ;
		$conn->exec($sql);
?>