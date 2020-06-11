<?php

	include "connection.php";
		
	
		$name = $_POST['nam'];
		$phone = $_POST['num'];
		$email = $_POST['email'];
		$address = $_POST['addr'];
		
		$pass1 = $_POST['pass1'];
		
		$dob = $_POST['dob'];
		
		$gender = $_POST['options'];
	
		//$user_type = $_POST['user_type'];
		
		$location="photos/Default.png";
		$user_type="2";
		
						
			$pname = $_POST['pnam'];
		$pphone = $_POST['pnum'];
		$pemail = $_POST['pemail'];
		
		$ppass1 = $_POST['ppass1'];
		
	
		//$puser_type = "4";
			
		
			$plocation="photos/Default.png";
			
			$query = "INSERT INTO tbl_login(login_id,email_id,phone_no,password,status,type,active) VALUES('','$email','$phone','$pass1','0','2','1')";
			echo $query;
		
		$result = mysqli_query($con,$query);
		
		$rowsql = mysqli_query($con,"SELECT login_id FROM tbl_login WHERE email_id='$email'");
			
		$row = mysqli_fetch_array($rowsql);
		$id = $row['login_id'];

			$pquery = "INSERT INTO tbl_login(login_id,email_id,phone_no,password,status,type,active) VALUES('','$pemail','$pphone','$ppass1','0','4','1')";
		echo $pquery;
		$presult = mysqli_query($con,$pquery);
		
		$prowsql = mysqli_query($con,"SELECT login_id FROM tbl_login WHERE email_id='$pemail'");
			
		$prow = mysqli_fetch_array($prowsql);
		$pid = $prow['login_id'];
			
			
			$sql = "INSERT INTO tbl_detail(detail_id,login_id,name,dob,gender,address,profile_pic) VALUES('','$id','$name','$dob','$gender','$address','$location')";
			
			echo $sql;
			
			
			
			if(!mysqli_query($con,$sql))
			{
				echo "Not inserted...";
			}
			else
			{
				echo "inserted successfully....";	
			}
			$sql1 = "INSERT INTO tbl_detail(detail_id,login_id,name,profile_pic,stu_id) VALUES('','$pid','$pname','$plocation','$id')";	
			echo $sql1;
			if(!mysqli_query($con,$sql1))
			{
				echo "Not inserted parent data...";
			}
			
			else
			{
				echo "inserted successfully....";
				
				header("refresh:0; url=index.php?flag=23");
				
			}
		
?>