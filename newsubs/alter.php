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
		mysqli_close($conn);

	}
?>
