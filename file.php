<?php
require 'connect.php';
$idTask = $_GET['idTask'];
$sql = "SELECT * FROM file WHERE id_Task = '$idTask'";
$statement=$conn->prepare($sql);
foreach ($conn->query($sql) as $row){ ?>

  <li style="display: flex;">
    <img src="image/jpg.png">
    <a style="width: 217px; " href="xlDownLoad.php?fileName=<?php echo $row['fileName'] ?>"><?php echo $row['fileName'] ?> </a>
    <a href="xll.php?idFile=<?php echo $row['id_file'] ?>">
      <svg class="delete" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill-rule="evenodd"> <g id="delete"> <path d="M10.72,9.9975 L13.86,6.8575 C14.04,6.6575 14.04,6.3375 13.86,6.1375 C13.66,5.9575 13.34,5.9575 13.14,6.1375 L10,9.2775 L6.86,6.1375 C6.66,5.9575 6.34,5.9575 6.14,6.1375 C5.96,6.3375 5.96,6.6575 6.14,6.8575 L9.28,9.9975 L6.14,13.1375 C5.96,13.3375 5.96,13.6575 6.14,13.8575 C6.24,13.9575 6.38,13.9975 6.5,13.9975 C6.62,13.9975 6.76,13.9575 6.86,13.8575 L10,10.7175 L13.14,13.8575 C13.24,13.9575 13.38,13.9975 13.5,13.9975 C13.62,13.9975 13.76,13.9575 13.86,13.8575 C14.04,13.6575 14.04,13.3375 13.86,13.1375 L10.72,9.9975 Z" id="4"></path> </g> </g> </svg>
    </a>
  </li>
  <?php } ?>