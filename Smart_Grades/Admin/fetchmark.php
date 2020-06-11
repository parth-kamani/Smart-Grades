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
		$qu=$_GET['qu'];
	$cn=$_GET['cn'];
	$mar=$_GET['mar'];
	
if(isset($_POST["query"]))
{
	
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_qdb 
  WHERE cl_id='$cid' AND ch_id='$cn' AND que_mrk='$mar' AND valid=1 AND (que_desc LIKE '%".$search."%')
 ";
}
else
{
 $query = "
  SELECT * FROM tbl_qdb
  WHERE cl_id='$cid' AND ch_id='$cn' AND que_mrk='$mar' AND valid=1 ORDER BY que_desc ASC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
   <tr>
    <th>Question</th>
	<th>Action</th>
   </tr>
 ';
 $seq=1;
 $p=0;
 $u= $_SERVER['HTTP_REFERER'];
 //echo $u;

 $i = strpos($u,"&&se=");
 if($i == FALSE)
 {
	 $o=$u;
 }
 else{
 $o= substr($u,0,$i);
 }
 //echo $o;
 while($row = mysqli_fetch_array($result))
 {
	 if($p<3)
	  {
	 
  $output .= '
   <tr>
    <td>'.$row["que_desc"].'</td>
	<td><a class="btn btn-success btn-xs" href="'.$o.'&&se='.$row["que_id"].'" onclick="return confirm("sure to SELECT? $row["cor_id"]");">SELECT</a></td>
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