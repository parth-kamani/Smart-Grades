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
	$c_id=$_GET['sel'];
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_course 
  WHERE cl_id='$c_id' AND (cor_name LIKE '%".$search."%'
  OR cor_desc LIKE '%".$search."%')
  ORDER BY cor_name ASC
 ";
}
else
{
	$c_id=$_GET['sel'];
 $query = "
  SELECT * FROM tbl_course 
  WHERE cl_id='$c_id'
  ORDER BY cor_name ASC
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
                  <th>ID</th>
                  <th>Name</th>
				  <th>Fees</th>
				  <th>Description</th>
                  <th>Days Required</th>
				  <th>Classes</th>
                  <th>Action</th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
	 
	 $u=$row['active'];
	 if($u==1)
	 {
	 $u1="Active";
	 }
	 else
	 {
	 $u1="Non-Active";
	 }
	 $hj=strlen($row['cor_desc']);
	 if($hj>25)
	 {
	 $bv=substr($row['cor_desc'],0,25);
	 $bv.="...";
	 }
	 else
	 {
	 $bv=$row['cor_desc'];
	 }
  $output .= '
   <tr>
    <td>'.$seq.'</td>
                  
                  <td>'.$row['cor_name'].'</td>
				  <td>'.$row['cor_fee'].'</td>
                  <td>'.$bv.'</td>
				  <td>'.$row['cor_days'].'</td>
                  <td>'.$value3['cl_name'].'</td>
	<td>
	<button type="button" class="btn btn-info btn-xs view_data1" data-toggle="modal" id="'.$row['cor_id'].'">VIEW</button>&nbsp;&nbsp;
				  
				  <a class="btn btn-success btn-xs" href="editcourses.php?id='.$row['cor_id'].'" 
					onclick="return confirm("sure to edit?");">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="?del='.$row['cor_id'].'" 
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
    <th>ID</th>
                  <th>Name</th>
				  <th>Fees</th>
				  <th>Description</th>
                  <th>Days Required</th>
				  <th>Classes</th>
                  <th>Action</th>
   </tr>
<tr>
<td colspan="8"><center><label>No Records</label></center></td>
</tr>
</table>
</div>
';
echo $output;
}
	}
?>