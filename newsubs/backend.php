<?php
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query = "SELECT * from dish,details,uploads,made_at,recipe_link,dish_type where dish.dish_id=details.d_id and uploads.dish_id = dish.dish_id and recipe_link.D_id = dish.dish_id and made_at.Dish_ID = dish.dish_id and dish_type.d_id = dish.dish_id";
		if($res = mysqli_query($conn, $query))
		{
			$return ="";

			if (mysqli_num_rows($res) > 0)
			{
				while($row = mysqli_fetch_assoc($res))
					$return = $return.$row['Dish_ID']."*".$row['Dish_Name']."*".$row['pic_name']."*".$row['Ingredients']."*".$row['Cuisine']."*".$row['Spicy']."*".$row['u_id']."*".$row['Restaurant']
					."*".$row['City']."*".$row['Link']."*".$row['Type_Name']."#";
				echo $return;
			}
			else
				return "Error in fetching result.";
		}
		else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}
?>
