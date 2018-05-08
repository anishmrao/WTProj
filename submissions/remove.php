<?php
  $sent = $_GET['q'];
  echo $sent;
  $conn = mysqli_connect("localhost", "root", "", "subdata");
  if(!$conn)
    echo mysqli_connect_error();
  else
  {
    $dish_id = mysqli_real_escape_string($conn, $sent);
    $query = "SELECT pic_name from dish where dish_id = '$dish_id'";
    if ($res = mysqli_query($conn, $query))
        $pic_name = mysqli_fetch_assoc($res)['pic_name'];
    else
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return;
    }
    $query = "DELETE FROM dish WHERE dish_id='$dish_id'";
    if (mysqli_query($conn, $query))
        echo "Record deleted";
    else
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return;
    }
    $file = "uploads\\".$pic_name;
    if(!unlink($file))
      echo "Error deleting file";
    else
      echo "Success";
  }
?>
