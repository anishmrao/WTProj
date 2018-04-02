<?php
  $conn = mysqli_connect("localhost", "root", "", "subdata");
  if(!$conn)
    echo mysqli_connect_error();
  else
  {
    $obj = json_decode($_POST['object']);
    print_r($obj);
    $dish_id = mysqli_real_escape_string($conn, $obj->dish_id);
    $name = mysqli_real_escape_string($conn, $obj->nameval);
    $pic_name = mysqli_real_escape_string($conn, $obj->pic_name->name->name);
    $cuisine = mysqli_real_escape_string($conn, $obj->cuisine);
    $spicy = mysqli_real_escape_string($conn, $obj->spicy);
    $ing = mysqli_real_escape_string($conn, $obj->ing);
    $user_id = mysqli_real_escape_string($conn, $obj->user_id);
    $datetime = date('Y/m/d H:i:s');
    $date = explode(" ",$datetime)[0];
    $query = "UPDATE dish,details,uploads SET Dish_Name = '$name', pic_name='$pic_name', Cuisine='$cuisine', Spicy='$spicy', Ingredients='$ing', upload_date='$date' WHERE dish.dish_id = details.d_id and uploads.dish_id = dish.dish_id and dish.dish_id = '$dish_id'";
    if (mysqli_query($conn, $query))
        echo "Successfull";
    else
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
  }

?>
