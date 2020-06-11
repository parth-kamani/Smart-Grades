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
		$cid = $value['cl_id'];
if(isset($_POST["query"]))
{

 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_course 
  WHERE cl_id='$cid' AND active=1 AND (cor_name LIKE '%".$search."%' 
  OR cor_desc LIKE '%".$search."%')
 ";
}
else
{
 $query = "
  SELECT * FROM tbl_course 
  WHERE active=1 AND cl_id='$cid' ORDER BY cor_name ASC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
   <tr>
    <th>Course Name</th>
	<th>Course Fees</th>
	<th>Action</th>
   </tr>
 ';
 $seq=1;
 $p=0;
 while($row = mysqli_fetch_array($result))
 {
	 if($p<3)
	  {
	 
  $output .= '
   <tr>
    <td>'.$row["cor_name"].'</td>
	<td>'.$row["cor_fee"].'</td>
	<td><a class="btn btn-success btn-xs" href="?sel='.$row["cor_id"].'" onclick="return confirm("sure to SELECT? $row["cor_id"]");">SELECT</a></td>
   </tr>
  ';
  $p++;
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