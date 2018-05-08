<?php
  $sent = $_GET['q'];
  echo $sent;
  $conn = mysqli_connect("localhost", "root", "", "subdata");
  if(!$conn)
    echo mysqli_connect_error();
  else
  {
    
  }
?>
