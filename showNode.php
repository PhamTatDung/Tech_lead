<?php
	require 'connect.php';
	$idTask = $_POST["idTask"];
	// $node = $_POST["node"];
	$select ="SELECT * FROM task WHERE id_task ='$idTask'";
	$statement=$conn->prepare($select);
	foreach ($conn->query($select) as $row){
		echo $row['node'];
	}
?>