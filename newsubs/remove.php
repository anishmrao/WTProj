<?php
  $sent = $_GET['q'];
  echo $sent;
  $conn = mysqli_connect("localhost", "root", "", "subdata");
  if(!$conn)
    echo mysqli_connect_error();
  else
  {
    $dish_id = mysqli_real_escape_string($conn, $sent);
    $query = "DELETE FROM dish WHERE dish_id='$dish_id'";
    if (mysqli_query($conn, $query))
        echo "New record created successfully";
    else
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
?>
