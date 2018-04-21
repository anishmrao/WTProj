<?php
$name=$_GET['q'];
$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query="SELECT dish.Dish_ID , Dish_Name , Spicy ,Cuisine , pic_name FROM details,dish WHERE dish.Dish_ID=details.d_id AND Dish_Name LIKE '%$name%' ";
		$res = mysqli_query($conn, $query);

		$store=  array();
		if(mysqli_num_rows($res) > 0)
		{
			while($row=mysqli_fetch_assoc($res))
			{

				$file = file_get_contents("newsubs/uploads/".$row['pic_name']);
				$row['pic_name']=base64_encode($file);
				array_push($store,$row);
			}
			//print_r($store);
			$jsonarray=JSON_encode($store);
			echo $jsonarray;
		}
		else
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
?>
