<?php
session_start();
$name=$_GET['q'];
$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		query='select Dish_ID Dish_Name Spicy Cuisine pic_name from dish,details where dish.Dish_ID=details.Dish_ID and Dish_Name LIKE '%$name%'';
		$res = mysqli_query($conn, $query);
		if($res = mysqli_query($conn, $query))
		{	
			$array= array();
			if(mysqli_num_rows($res) > 0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$file = file_get_contents("uploads/".$row['pic_name']);
					$row['pic_name']=base64_encode($file);
					array_push($array, $row);
				}
				$jsonarray=JSON_encode($array);
				echo $jsonarray;
			}
				
		}
		else
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
?>
