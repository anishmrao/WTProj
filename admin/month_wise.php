<?php
$conn = mysqli_connect("localhost", "root", "", "subdata");
	if(!$conn)
		echo mysqli_connect_error();
	else
	{
		$query="SELECT count(*) as count,extract(month from upload_date) as month FROM uploads GROUP BY extract(month from upload_date) ORDER BY upload_date ";
		$res = mysqli_query($conn, $query);
			
		$store=  array();
		if(mysqli_num_rows($res) > 0)
		{
			while($row=mysqli_fetch_assoc($res))
				array_push($store,$row);
			$jsonarray=JSON_encode($store);
			echo $jsonarray;
		}
		else
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
?>