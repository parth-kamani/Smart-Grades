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
  WHERE (cl_name LIKE '%".$search."%' 
  OR cl_addr LIKE '%".$search."%'
  OR cl_pin LIKE '%".$search."%'
  OR cl_lmark LIKE '%".$search."%'
  OR cl_city LIKE '%".$search."%'
  OR cl_state LIKE '%".$search."%'
  OR cl_phno LIKE '%".$search."%'
  OR cl_eid LIKE '%".$search."%') ORDER BY cl_name ASC
 ";
}
else
{
 $query = "
  SELECT * FROM tbl_classes 
  ORDER BY cl_name ASC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" width="100%">
   <table class="table table-hover">
   <tr>
				  <th>ID</th>
                  <th>Name</th>
				  <th>Email</th>
				  <th>Phone</th>
                  <th>Address</th>
                  <th>city</th>
				  <th>Status</th>
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
	 $hj=strlen($row['cl_addr']);
	 if($hj>25)
	 {
	 $bv=substr($row['cl_addr'],0,25);
	 $bv.="...";
	 }
	 else
	 {
	 $bv=$row['cl_addr'];
	 }
  $output .= '
   <tr>
    <td>'.$seq.'</td>
                  <td>'.$row['cl_name'].'</td>
                  <td>'.$row['cl_eid'].'</td>
				  <td>'.$row['cl_phno'].'</td>
                  <td>'.$row['cl_addr'].'</td>
                  <td>'.$row['cl_city'].'</td>
				  <td>'.$u1.'</td>
	<td>
	<button type="button" class="btn btn-info btn-xs view_data1" data-toggle="modal" id="'.$row['cl_id'].'">VIEW</button>&nbsp;&nbsp;
				  
				  <a class="btn btn-success btn-xs" href="editclasses.php?id='.$row['cl_id'].'" 
					onclick="return confirm("sure to edit?");">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="?del='.$row['cl_id'].'" 
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
				  <th>Email</th>
				  <th>Phone</th>
                  <th>Address</th>
                  <th>city</th>
				  <th>Status</th>
                  <th>Action</th>
   </tr>
<tr>
<td colspan="9"><center><label>No Records</label></center></td>
</tr>
</table>
</div>
';
echo $output;
}
	}
?>