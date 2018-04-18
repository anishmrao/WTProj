<?php
  $conn = mysqli_connect("localhost", "root", "", "subdata");
  if(!$conn)
    echo mysqli_connect_error();
  else
  {
    $query = "SELECT User_ID,User_Name,upload_date FROM users,uploads u where user_id = u_id and upload_date = (select max(upload_date) from uploads where u_id = u.u_id) order by upload_date desc";
    if($res = mysqli_query($conn, $query))
		{
      $array = array();
      if (mysqli_num_rows($res) > 0)
      {
        while($row = mysqli_fetch_assoc($res))
          array_push($array, $row);
        $jsonarray = JSON_encode($array);
        echo $jsonarray;
      }
    }
    else
      echo "Error: " . $query . "<br>" . mysqli_error($conn);

  }
?>
