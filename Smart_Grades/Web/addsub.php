<?php

	include "connection.php";

		
		$email = $_POST['email'];
		
		
			
			$sql = "INSERT INTO tbl_sub(sub_email,active) VALUES('$email','1')";
				
			if(!mysqli_query($con,$sql))
			{
				echo "Not inserted...";
			}
			
			else
			{
				echo "inserted successfully....";
				header("refresh:0; url=index.php?flag=24");
			}
		
?>