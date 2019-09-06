<?php
$fileName = $_GET['fileName'];
$file = fopen('upLoad/'.$fileName,"rb");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$fileName);
fpassthru($file);
fclose($file);
?>