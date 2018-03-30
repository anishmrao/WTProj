<?php
  $conn = mysqli_connect("localhost", "root", "", "subdata");
  if(!$conn)
    echo mysqli_connect_error();
  else
  {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT User_Name FROM users WHERE User_ID = '$username' and Password = '$password'";

    $return ="";

		if ($res = mysqli_query($conn, $query))
		{
      if(mysqli_num_rows($res) > 0)
      {
        $row = mysqli_fetch_assoc($res);
        $return = $return."1*".$row['User_Name'];
        echo $return;
      }
      else {
        echo "0";
      }
    }
    else {
      echo "0";
    }
  }
?>
