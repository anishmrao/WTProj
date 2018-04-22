<?php
	//echo "in alter";
	$sent = $_GET['q'];
	echo $sent;
	$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		//if (mysqli_query($conn, "DELETE from foodart"))
		//{ 
			$subs = explode("#", $sent);
			foreach($subs as $data)
			{
				$vals = explode("*", $data);
				//print_r($vals);
				$name = mysqli_real_escape_string($conn, $vals[0]);
				$desc = mysqli_real_escape_string($conn, $vals[1]);
				$src = mysqli_real_escape_string($conn, $vals[2]);
				$query = "INSERT INTO foodart (`name`, `description`, `source`) VALUES ('$name','$desc','$src')";
				if (mysqli_query($conn, $query)) 
				    echo "New record created successfully";
				else 
				    echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		//}
		mysqli_close($conn);
	}
?>