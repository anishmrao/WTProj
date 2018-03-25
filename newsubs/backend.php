<?php
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query = "SELECT * from dish,details where dish.dish_id=details.d_id";
		$res = mysqli_query($conn, $query);
		$return ="";

		if (mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_assoc($res))
				$return = $return.$row['dish_id']."*".$row['dish_name']."*".$row['pic_name']."*".$row['Ingredients']."*".$row['Cuisine']."*".$row['Spicy']."#";
			echo $return;
		}
		else
			return "Error in fetching result.";
	}
?>
