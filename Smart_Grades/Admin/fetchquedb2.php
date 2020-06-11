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
	$c_id=$_GET['cl'];
	$cor=$_GET['sel'];
	$cn=$_GET['cn'];
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_qdb 
  WHERE cl_id=".$c_id." AND cor_id=".$cor." AND ch_id=".$cn."
  AND (que_desc LIKE '%".$search."%'
  OR que_mrk LIKE '%".$search."%')
  ORDER BY que_id ASC
 ";
}
else
{
	$c_id=$_GET['cl'];
	$cor=$_GET['sel'];
	$cn=$_GET['cn'];
 $query = "
  SELECT * FROM tbl_qdb
  WHERE cl_id=".$c_id." AND cor_id=".$cor." AND ch_id=".$cn."
  ORDER BY que_id ASC
 ";
}
$query1 = "SELECT cl_name FROM tbl_classes,tbl_course WHERE tbl_course.cl_id = tbl_classes.cl_id";
$result3 = mysqli_query($connect,$query1);
$value3 = mysqli_fetch_array($result3);
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" width="100%">
   <table class="table table-hover">
   <tr>
                  <th>Question ID</th>
                  <th>Question</th>
				  <th>Marks</th>
                  <th>Action </th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
	 $hj=strlen($row['que_desc']);
	 if($hj>25)
	 {
	 $bv=substr($row['que_desc'],0,25);
	 $bv.="...";
	 }
	 else
	 {
	 $bv=$row['que_desc'];
	 }
  $output .= '
   <tr>
    <td>'.$seq.'</td>
                  <td>'.$bv.'</td>
                  <td>'.$row['que_mrk'].'</td>
	<td>
	<button type="button" class="btn btn-info btn-xs view_data1" data-toggle="modal" id="'.$row['que_id'].'">VIEW</button>&nbsp;&nbsp;
				  <a class="btn btn-success btn-xs" href="editquedb.php?qt='.$row['que_id'].'" 
				  onclick="return confirm("sure to edit?");">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="?del='.$row['que_id'].'" 
					onclick="return confirm("sure to delete?");">DELETE</a>
   </tr>
    

  ';
  $seq++;
 }
 
 echo $output;
 $output.='
 </table>
 </div>
 ';
}
else
{
$output.='
<div class="table-responsive">
   <table class="table table-hover">
   <tr>
                  <th>Question ID</th>
                  <th>Question</th>
				  <th>Marks</th>
                  <th>Action </th>
   </tr>
<tr>
<td colspan="5"><center><label>No Records</label></center></td>
</tr>
</table>
</div>
';
echo $output;
}
	}
?>