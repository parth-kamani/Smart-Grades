<?php

		include "connection.php";
			
		session_start();
	
		$log = $_POST['email-phone'];
		
		$pass = $_POST['pass'];
		
		
		$qry = "SELECT * FROM tbl_login WHERE (email_id='$log' AND password='$pass') OR (phone_no='$log' AND password='$pass')";
		echo $qry;
		$result = mysqli_query($con,$qry);
		
		$value = mysqli_fetch_array($result);
	
		$count = mysqli_num_rows($result);
		
		if($count==1 && $value['password']==$pass)
		{
			if($value['type']==2 || $value['type']==4)
			{
				$_SESSION['log'] = $value['email_id'];
				
				$status = $value['status'];
			
				if($status==0)
				{
					$id = $value['login_id'];
						
					$otp = rand(100000,999999);
						
					$sql = "INSERT INTO otp_tbl(otp_id,login_id,otp) VALUES('','$id','$otp')";
						
					$result1 = mysqli_query($con,$sql);
						
					if($result1)
					{
						header("location:../AdminLTE-2.4.5Copy1/verification.php");
					}
						
				}
					
				else
				{
					header("location:../Admin/dashboard.php");	
				}
			
			}
			else
			{
				header("location:index.php?flag=2");
			}
		}
		else
		{
			header("location:index.php?flag=1" );
		}
		
	
?>