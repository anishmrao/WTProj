<?php
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query = "SELECT source from foodart";
		$res = mysqli_query($conn, $query);
		$return =[];
		
		if (mysqli_num_rows($res) > 0) 
		{
			while($row = mysqli_fetch_assoc($res)) 
				array_push($return, $row['source']);
			//print_r($return);
			header("Content-Type: image/jpg");
			foreach($return as $filename)
			{
			  $file = file_get_contents("uploads/".$filename);
			  echo $filename."*".base64_encode($file)."#";
			}
		}
		else
			return "Error in fetching result.";
	}
?>