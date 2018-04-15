<?php
	//echo "in alter";
	$sent = $_GET['q'];
	echo $sent;
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{


				$vals = explode("*", $sent);
				//print_r($vals);
				$dish_id = mysqli_real_escape_string($conn, $vals[0]);
				$name = mysqli_real_escape_string($conn, $vals[1]);
				$pic_name = mysqli_real_escape_string($conn, $vals[2]);
				$cuisine = mysqli_real_escape_string($conn, $vals[3]);
				$spicy = mysqli_real_escape_string($conn, $vals[4]);
				$ing = mysqli_real_escape_string($conn, $vals[5]);
				$user_id = mysqli_real_escape_string($conn, $vals[6]);
				$restaurant = mysqli_real_escape_string($conn, $vals[7]);
				$city = mysqli_real_escape_string($conn, $vals[8]);
				$type = mysqli_real_escape_string($conn, $vals[9]);
				$link = mysqli_real_escape_string($conn, $vals[10]);
				$query = "INSERT INTO dish (`dish_id`, `dish_name`, `pic_name`) VALUES ('$dish_id','$name','$pic_name')";
				if (mysqli_query($conn, $query))
				    echo "New record created successfully";
				else
				    echo "Error: " . $query . "<br>" . mysqli_error($conn);

				$query = "INSERT INTO details (`d_id`, `Ingredients`, `Cuisine`, `Spicy`) VALUES ('$dish_id', '$ing', '$cuisine', '$spicy')";
				if (mysqli_query($conn, $query))
						echo "New record created successfully";
				else
						echo "Error: " . $query . "<br>" . mysqli_error($conn);
				$datetime = date('Y/m/d H:i:s');
				$date = explode(" ",$datetime)[0];
				$query = "INSERT INTO uploads (`dish_id`, `u_id`, `upload_date`) VALUES ('$dish_id', '$user_id', '$date')";
				if (mysqli_query($conn, $query))
						echo "New record created successfully";
				else
						echo "Error: " . $query . "<br>" . mysqli_error($conn);

						$query = "SELECT * FROM location WHERE Restaurant = '$restaurant' AND City = '$city'";
						if ($result = mysqli_query($conn, $query))
						{
							if(mysqli_num_rows($result) > 0)
							{
								$query = "INSERT INTO made_at (`Dish_Id`, `Restaurant`, `City`) VALUES ('$dish_id', '$restaurant', '$city')";
								if (mysqli_query($conn, $query))
										echo "New record created successfully";
								else
										echo "Error: " . $query . "<br>" . mysqli_error($conn);
							}
							else
							{
								$query = "INSERT INTO location (`Restaurant`, `City`) VALUES ('$restaurant', '$city')";
								if (mysqli_query($conn, $query))
								{
											echo "New record created successfully";
											$query = "INSERT INTO made_at (`Dish_Id`, `Restaurant`, `City`) VALUES ('$dish_id', '$restaurant', '$city')";
											if (mysqli_query($conn, $query))
													echo "New record created successfully";
											else
													echo "Error: " . $query . "<br>" . mysqli_error($conn);
								}
								else
										echo "Error: " . $query . "<br>" . mysqli_error($conn);
							}
						}
						else
								echo "Error: " . $query . "<br>" . mysqli_error($conn);
						$query = "INSERT INTO dish_type (`D_id`, `Type_Name`) VALUES ('$dish_id', '$type')";
						if (mysqli_query($conn, $query))
								echo "New record created successfully";
						else
								echo "Error: " . $query . "<br>" . mysqli_error($conn);

								$query = "INSERT INTO recipe_link (`Link`,`D_id`, `U_id`) VALUES ('$link', '$dish_id', '$user_id')";
								if (mysqli_query($conn, $query))
										echo "New record created successfully";
								else
										echo "Error: " . $query . "<br>" . mysqli_error($conn);
		mysqli_close($conn);

	}
?>
