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
		//echo $id;
if(isset($_POST["query"]))
{
	$cor=$_GET['sel'];

 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_stuenro INNER JOIN tbl_detail ON tbl_stuenro.login_id=tbl_detail.login_id
  WHERE cor_id=".$cor."
  AND (name LIKE '%".$search."%')
  ORDER BY s_id ASC
 ";
}
else
{
	$cor=$_GET['sel'];
	
 $query = "
  SELECT * FROM tbl_stuenro INNER JOIN tbl_detail ON tbl_stuenro.login_id=tbl_detail.login_id
  WHERE cor_id=".$cor."
  ORDER BY s_id ASC
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
                  <th>Course Name</th>
				  <th>Fees Paid</th>
                  <th>Action</th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
					$x=$row['login_id'];
					$y=$row['cor_id'];
					$q1="SELECT name FROM tbl_detail WHERE login_id=$x";
					$r1 = mysqli_query($connect,$q1);
					$v1 = mysqli_fetch_array($r1);
					$q2="SELECT cor_name FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($connect,$q2);
					$v2 = mysqli_fetch_array($r2);
					if($row['fees_paid']==0)
					{
						$fp="NO";
					}
					else
					{
						$fp="YES";
					}
  $output .= '
   <tr>
    <td>'.$seq.'</td>
                  
                  <td>'.$v1['name'].'</td>
				  <td>'.$v2['cor_name'].'</td>
                  <td>'.$fp.'</td>
	<td>';
	$comp= $row['comp'];
				  if($comp==0)
				  {
			$output.='
				  <a class="btn btn-success btn-xs" href="editstuenroll.php?id='.$row['s_id'].'" 
					onclick="return confirm("sure to edit?");">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="?del='.$row['s_id'].'" 
					onclick="return confirm("sure to delete?");">DELETE</a>
					';
				  }
				  else
				  {
			$output.='
					  <label>Completed</label>
					  ';
				  }
			$output.='
					</td>
				</tr>
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
                  <th>Course Name</th>
				  <th>Fees Paid</th>
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