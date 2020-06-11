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
		$sel=$_GET['sel'];
	$e=$_GET['e'];
	//$mar=$_GET['mar'];
	
if(isset($_POST["query"]))
{
	
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tmp_que INNER JOIN tbl_qdb ON tmp_que.q_id=tbl_qdb.que_id
  WHERE tmp_que.e_id='$e' AND tmp_que.cor_id='$sel' AND tmp_que.valid=1 AND (tmp_que.que_desc LIKE '%".$search."%')
 ";
}
else
{
 $query = "
  SELECT tmp_que.q_id,tbl_qdb.que_desc,tbl_qdb.que_mark FROM tmp_que INNER JOIN tbl_qdb ON tmp_que.q_id=tbl_qdb.que_id
  WHERE tmp_que.e_id='$e' AND tmp_que.cor_id='$sel' AND tmp_que.valid=1
 ";
}
echo $query;
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
   <tr>
    <th>Question</th>
	<th>Marks</th>
	<th>Action</th>
   </tr>
 ';
 $seq=1;
 $p=0;
 $u= $_SERVER['HTTP_REFERER'];
 //echo $u;

 $i = strpos($u,"&&qh=");
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
  $output .= '
   <tr>
    <td>'.$row["que_desc"].'</td>
	<td>'.$row["que_mrk"].'</td>
	<td><a class="btn btn-success btn-xs" href="'.$o.'&&qh='.$row["que_id"].'" onclick="return confirm("sure to SELECT? $row["cor_id"]");">SELECT</a></td>
   </tr>
  ';
  $p++;
	  }
 
 echo $output;
}
else
{
 echo 'Data Not Found';
}
	}
?>