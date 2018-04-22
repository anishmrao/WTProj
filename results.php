<?php
$name=$_GET['q'];
$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query="SELECT dish.Dish_ID , Dish_Name , Spicy ,Cuisine , pic_name, uploads.u_id,Restaurant,City,Type_Name,Ingredients,Link FROM details,dish,uploads,dish_type,made_at,recipe_link WHERE dish.Dish_ID=details.d_id AND Dish_Name LIKE '%$name%' AND  dish.Dish_ID=uploads.dish_id AND  dish.Dish_ID=dish_type.D_id AND  dish.Dish_ID=made_at.Dish_ID  AND dish.Dish_ID=recipe_link.D_id ";
		$res = mysqli_query($conn, $query);
			
		$store=  array();
		if(mysqli_num_rows($res) > 0)
		{
			while($row=mysqli_fetch_assoc($res))
			{

				$file = file_get_contents("uploads/".$row['pic_name']);
				$row['pic_name']=base64_encode($file);
				array_push($store,$row);
			}
		
			$jsonarray=JSON_encode($store);
			echo $jsonarray;
		}
		else
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
?>
