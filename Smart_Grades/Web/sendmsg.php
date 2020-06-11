<?php

	include "connection.php";

		$name = $_POST['cname'];
		$phone = $_POST['cphone'];
		$email = $_POST['cemail'];
		$cmsg = $_POST['cmsg'];
		
		
			
			$sql = "INSERT INTO tbl_msg(sen_name,sen_phone,sen_email,sen_msg,msg_solved,active) VALUES('$name','$phone','$email','$cmsg','0','1')";
				
			if(!mysqli_query($con,$sql))
			{
				echo "Not inserted...";
			}
			
			else
			{
				echo "inserted successfully....";
			}
		}
?>