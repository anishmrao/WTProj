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
    $restaurant = mysqli_real_escape_string($conn, $obj->restaurant);
    $link = mysqli_real_escape_string($conn, $obj->link);
    $city = mysqli_real_escape_string($conn, $obj->city);
    $type = mysqli_real_escape_string($conn, $obj->type);
    $datetime = date('Y/m/d H:i:s');
    $date = explode(" ",$datetime)[0];
    $query = "SELECT * FROM location WHERE Restaurant = '$restaurant' and City = '$city'";
    if ($res = mysqli_query($conn, $query))
    {
      if (mysqli_num_rows($res) == 0)
      {
        $query = "INSERT INTO location(`Restaurant`, `City`) VALUES ('$restaurant', '$city')";
        if(!mysqli_query($conn, $query)){ echo "ERROR"; return;}
      }
    }
    else
        echo "Error: " . $query . "<br>" . mysqli_error($conn);

    $query = "UPDATE dish,details,uploads,dish_type,recipe_link,made_at SET Dish_Name = '$name', pic_name='$pic_name', Cuisine='$cuisine', Spicy='$spicy', Ingredients='$ing', upload_date='$date', Restaurant = '$restaurant', City='$city', Type_Name='$type', Link='$link' WHERE made_at.dish_id = dish.dish_id and recipe_link.d_id = dish.dish_id and dish_type.d_id = dish.dish_id and dish.dish_id = details.d_id and uploads.dish_id = dish.dish_id and dish.dish_id = '$dish_id'";
    if (mysqli_query($conn, $query))
        echo "Successfull";
    else
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
  }

?>
