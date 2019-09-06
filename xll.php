<?php
	include 'connect.php';
	if (isset($_GET['idSubTask'])) {
		$idSubTaskDelete = $_GET['idSubTask'];
		$DeleTask = "DELETE FROM subtask WHERE id_subtask = '$idSubTaskDelete'";
		$conn->exec($DeleTask);
	}
	///////////////////////////////////////////////////
	if (isset($_GET['idCmt'])) {
		$idCmtDelete = $_GET['idCmt'];
		$DeleCmt = "DELETE FROM comment WHERE id_comment = '$idCmtDelete'";
		$conn->exec($DeleCmt);
	}
	////////////////////////////////////////////////
	if (isset($_GET['idFile'])) {
		$idFileDelete = $_GET['idFile'];
		$DeleFile = "DELETE FROM file WHERE id_file = '$idFileDelete'";
		$conn->exec($DeleFile);
	}
	////////////////////////////////////////////////
	if (isset($_GET['idTask'])) {
		$idTaskDelete = $_GET['idTask'];
		$DeleTask = "DELETE FROM task WHERE id_task = '$idTaskDelete'";
		$conn->exec($DeleTask);
	}
	//////////////////////////////////////////////////

	header('location: wunderlist.php');
?>