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
 $cor = $_GET['tr'];
 $query = "
  SELECT * FROM tbl_chapters
  WHERE cor_id=".$cor." AND (ch_name LIKE '%".$search."%'
  OR ch_num LIKE '%".$search."%'
  OR ch_desc LIKE '%".$search."%') AND active=1 ORDER BY ch_num ASC
 ";
}
else
{
	$cor = $_GET['tr'];
 $query = "
  SELECT * FROM tbl_chapters 
  WHERE cor_id=".$cor." AND active=1 ORDER BY ch_num ASC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-hover">
   <tr>
    <th>ID</th>
	<th>Number</th>
				  <th>Name</th>
				  <th>Description</th>
				  <th>Action</th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
	 
					
					$hj=strlen($row['ch_desc']);
					//$bv="";
					if($hj>25)
					{
						$bv=substr($row['ch_desc'],0,25);
						$bv.="...";
					}
					else
					{
						$bv=$row['ch_desc'];
					}
  $output .= '
   <tr>
    <td>'.$seq.'</td>
    <td>'.$row['ch_num'].'</td>
	<td>'.$row['ch_name'].'</td>
    <td>'.$bv.'</td>
	<td>
					<button type="button" class="btn btn-info btn-xs view_data1" data-toggle="modal" id="'.$row['ch_id'].'">VIEW</button>&nbsp;&nbsp;
					
					</td>
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
<div class="table-responsive" >
   <table class="table table-hover">
   <tr>
    <th>ID</th>
	<th>Number</th>
				  <th>Name</th>
				  <th>Description</th>
				  <th>Action</th>
   </tr>
<tr>
<td colspan="6"><center><label>No Records</label></center></td>
</tr>
</table>
</div>
';
echo $output;
}
	}
?>