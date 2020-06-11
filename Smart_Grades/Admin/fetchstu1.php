<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "sg_db");
$output = '';
session_start();

	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	else
	{
		$log = $_SESSION['log'];
		
		$qry = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($connect,$qry);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT tbl_stuenro.cor_id,tbl_login.email_id,tbl_login.phone_no,tbl_login.login_id,tbl_detail.name,tbl_detail.profile_pic FROM tbl_login INNER JOIN tbl_detail tbl_detail ON tbl_login.login_id=tbl_detail.login_id INNER JOIN tbl_stuenro ON tbl_detail.login_id=tbl_stuenro.login_id INNER JOIN tbl_course ON tbl_stuenro.cor_id=tbl_course.cor_id
  WHERE tbl_detail.name LIKE '%".$search."%'
  AND tbl_stuenro.active=1 AND tbl_login.type=2
 ";
}
else
{
 $query = "
  SELECT tbl_stuenro.cor_id,tbl_login.email_id,tbl_login.phone_no,tbl_login.login_id,tbl_detail.name,tbl_detail.profile_pic FROM tbl_login INNER JOIN tbl_detail tbl_detail ON tbl_login.login_id=tbl_detail.login_id INNER JOIN tbl_stuenro ON tbl_detail.login_id=tbl_stuenro.login_id INNER JOIN tbl_course ON tbl_stuenro.cor_id=tbl_course.cor_id
  WHERE tbl_stuenro.active=1 AND tbl_login.type=2 ORDER BY tbl_detail.name ASC
 ";
}
//echo $query;
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-hover">
   <tr>
    <th>ID</th>
                  <th>User Name</th>
				  <th>Email</th>
				  <th>Phone</th>
                  <th>Profie Pic</th>
                  <th>Action</th>
   </tr>
 ';
 $seq=1;
 $p=0;
 while($row = mysqli_fetch_array($result))
 {
	 
	 $ph="";
	if($p<3)
	  {
  $output .= '
   <tr>
   <td>'.$seq.'</td>
    <td>'.$row["name"].'</td>
	<td>'.$row["email_id"].'</td>
	<td>'.$row["phone_no"].'</td>
    <td><img src="'.$row['profile_pic'].'" height="50" width="50" border="1px" alt="profile pic"></img></td>
	<td><a class="btn btn-success btn-xs" href="?q='.$row["login_id"].'&&m='.$row["cor_id"].'" onclick="return confirm("sure to SELECT? $row["login_id"]");">SELECT</a></td>
   </tr>
  ';
  $p++;
  $seq++;
	  }
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
	}
?>