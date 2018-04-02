<?php
extract($_POST);
$conn = mysqli_connect("localhost", "root", "", "food art");
	if(!$conn)
		echo mysqli_connect_error();
else
{
	$query="select User_name from users where User_name='$username' "; 
	$result=mysqli_query($conn,$query);

	if(trim($password)==trim($repeatpassword))
	{
		if(mysqli_num_rows($result)==0)
		{
			$query="INSERT INTO Users ('User_name',Name,Password,Door_No, Street, City) VALUES ('$username','$name','$password','$address')";
			if (mysqli_query($conn, $query))
				    echo "New account created successfully";
				else
				    echo "Error: " . $query . "<br>" . mysqli_error($conn); 
		}
		else
		{
			echo "Try a different user name";
		}
	}
	else
	{
		echo "Enter the same password please";
	}
}
?>