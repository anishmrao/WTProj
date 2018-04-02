<?php
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query = "SELECT * from dish,details,uploads where dish.dish_id=details.d_id and uploads.dish_id = dish.dish_id";
		$res = mysqli_query($conn, $query);
		$return ="";

		if (mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_assoc($res))
				$return = $return.$row['Dish_ID']."*".$row['Dish_Name']."*".$row['pic_name']."*".$row['Ingredients']."*".$row['Cuisine']."*".$row['Spicy']."*".$row['u_id']."#";
			echo $return;
		}
		else
			return "Error in fetching result.";
	}
?>
