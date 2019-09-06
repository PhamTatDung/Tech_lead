<?php
	require 'connect.php';
		$idTask = $_POST["idTask"];
		$node = $_POST["node"];
		$sql = "UPDATE task SET node = '$node' WHERE id_task = '$idTask'" ;
		$conn->exec($sql);
  ?>
    