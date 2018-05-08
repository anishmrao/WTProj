<?php
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query = "SELECT * from foodart";
		$res = mysqli_query($conn, $query);
		$return ="";
		
		if (mysqli_num_rows($res) > 0) 
		{
			while($row = mysqli_fetch_assoc($res)) 
				$return = $return.$row['name']."*".$row['description']."*".$row['source']."#";
			echo $return;
		}
		else
			return "Error in fetching result.";
	}
?>