<?php
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query = "SELECT dish_id,pic_name from dish";
		$res = mysqli_query($conn, $query);
		$return =[];

		if (mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_assoc($res))
				$return[$row['dish_id']] = $row['pic_name'];

			//print_r($return);
			header("Content-Type: image/jpg");
			foreach($return as $id => $filename)
			{
			  $file = file_get_contents("uploads/".$filename);
			  echo $id."*".$filename."*".base64_encode($file)."#";
			}
		}
		else
			return "Error in fetching result.";
	}
?>
