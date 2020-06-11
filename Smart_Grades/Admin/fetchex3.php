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
	$co=$_GET['tr'];
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tmp_exam 
  WHERE cor_id='".$co."' AND e_built=1 AND view=1 AND (e_name LIKE '%".$search."%'
  OR e_date LIKE '%".$search."%'
  OR e_tm LIKE '%".$search."%')
  ORDER BY e_date DESC
 ";
}
else
{
	$co=$_GET['tr'];
 $query = "
  SELECT * FROM tmp_exam
  WHERE cor_id='".$co."'
  AND e_built=1
  ORDER BY e_date DESC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" width="100%">
   <table class="table table-hover">
   <tr>
                  <th>Exam ID</th>
                  <th>Name</th>
				  <th>Marks</th>
				  <th>Date</th>
                  <th>Course</th>
                  <th>Action </th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
	$co=$row['cor_id'];
	$query2="SELECT cor_name FROM tbl_course WHERE cor_id =".$co;
	$result12 = mysqli_query($connect,$query2);
	$val4 = mysqli_fetch_array($result12);
	$cor= $val4['cor_name'];
  $output .= '
   <tr>
    <td>'.$seq.'</td>
                  <td>'.$row['e_name'].'</td>
                  <td>'.$row['e_tm'].'</td>
				  <td>'.$row['e_date'].'</td>
                  <td>'.$cor.'</td>
	<td>
	<button type="button" class="btn btn-info btn-xs view_data1" data-toggle="modal" id="'.$row['e_id'].'">VIEW</button>&nbsp;&nbsp;
	
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
                  <th>Exam ID</th>
                  <th>Name</th>
				  <th>Marks</th>
				  <th>Date</th>
                  <th>Course</th>
                  <th>Action </th>
   </tr>
<tr>
<td colspan="7"><center><label>No Records</label></center></td>
</tr>
</table>
</div>
';
echo $output;
}
	}
?>