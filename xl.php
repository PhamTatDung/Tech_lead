<?php
session_start();
include 'connect.php';

if (isset($_POST['save'])) {
	if (empty($_POST["txtListName"])) {
		// header('location: wunderlist.php');
	}else{
		$id = $_SESSION['id'];
		$nameList = $_POST["txtListName"];
		$insertList = "INSERT INTO list VALUES (null, '$nameList', 1, '$id')";
		$conn->exec( $insertList);
		// header('location: wunderlist.php');
	}
}


// if (empty($_POST["add-to-do"])) {
// 	// header('location: wunderlist.php');
// }else{
// 	$contentTask = $_POST["add-to-do"];
// 	$idL = $_SESSION['id_list'];
// 	$Task = "INSERT INTO task(content_task,node,status_task,id_list) VALUES('$contentTask',null,1,'$idL')";
// 	$conn->exec($Task);
	// header('location: wunderlist.php');

if (empty($_POST["txtsubtask"])) {
	// header('location: wunderlist.php');
}else{
	$contentSubTask = $_POST["txtsubtask"];
	$idTask = $_SESSION['id_task'];
	$subTask = "INSERT INTO subtask(content_subtask,status_subtask,id_task) VALUES('$contentSubTask',1,'$idTask')";
	$conn->exec($subTask);
	// header('location: wunderlist.php');
}


if (empty($_GET["txtTitle"])) {
}
else{
	$id_task = $_SESSION['id_task'];
	$txtTitle = $_GET["txtTitle"];
	$updateTask = "UPDATE task SET content_task = '$txtTitle'  WHERE id_task = '$id_task'" ;
    $conn->exec($updateTask); 
}
  header('location: wunderlist.php');

if (empty($_POST["cmt"])) {
	// header('location: wunderlist.php');
}
else{
	$comment = $_POST["cmt"];
	$idTask = $_SESSION['id_task'];
	$cmt = "INSERT INTO comment(comment,id_task) VALUES('$comment','$idTask')";
	$conn->exec($cmt);
	// header('location: wunderlist.php');
}

?>

