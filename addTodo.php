<?php
	require 'connect.php';
	if(isset($_POST["content"])){

	}
			
			OM task WHERE id_list = '$idList' ORDER BY id_task DESC LIMIT 1";
			echo $conn->lastInsertId();
		
?>