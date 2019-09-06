<?php
	require 'connect.php';
			$comment = $_POST["comment"];
			$idTask = $_POST["idTask"];
			$sql = "INSERT INTO comment(comment,id_task) VALUES('$comment','$idTask')";
			$conn->exec($sql);
			$select = "SELECT id_comment FROM comment WHERE id_task = '$idTask' ORDER BY id_comment DESC LIMIT 1";
			echo $conn->lastInsertId();
?>