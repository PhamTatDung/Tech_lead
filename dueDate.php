<?php
	require 'connect.php';
	$idTask = $_GET["idTask"];
	$select ="SELECT * FROM task WHERE id_task ='$idTask'";
	$statement=$conn->prepare($select);
	foreach ($conn->query($select) as $row){
		echo $row['dueDate'];
	}
?>