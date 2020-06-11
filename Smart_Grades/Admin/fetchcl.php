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
  SELECT * FROM tbl_classes 
  WHERE active=1 AND (cl_name LIKE '%".$search."%' 
  OR cl_city LIKE '%".$search."%' 
  OR cl_lmark LIKE '%".$search."%'
  OR cl_state LIKE '%".$search."%') 
 ";
}
else
{
 $query = "
  SELECT * FROM tbl_classes 
  WHERE active=1 ORDER BY cl_name ASC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
   <tr>
    <th>Classes Name</th>
	<th>Landmark</th>
	<th>Address</th>
    <th>City</th>
    <th>State</th>
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
    <td>'.$row["cl_name"].'</td>
	<td>'.$row["cl_lmark"].'</td>
	<td>'.$row["cl_addr"].'</td>
    <td>'.$row["cl_city"].'</td>
    <td>'.$row["cl_state"].'</td>
	<td><a class="btn btn-success btn-xs" href="?sel='.$row["cl_id"].'" onclick="return confirm("sure to SELECT? $row["cl_id"]");">SELECT</a></td>
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