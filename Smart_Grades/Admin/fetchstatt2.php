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
	$cn=$_GET['qt'];
	$cor=$_GET['sel'];
	$dat=$_GET['qr'];
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_stuatt INNER JOIN tbl_detail ON tbl_stuatt.s_id=tbl_detail.login_id
  WHERE c_date='".$dat."' AND cor_id=".$cor." AND ch_id=".$cn."
  AND (name LIKE '%".$search."%')
  ORDER BY a_id ASC
 ";
}
else
{
	$cn=$_GET['qt'];
	$cor=$_GET['sel'];
	$dat=$_GET['qr'];
	
 $query = "
  SELECT * FROM tbl_stuatt INNER JOIN tbl_detail ON tbl_stuatt.s_id=tbl_detail.login_id
  WHERE c_date='".$dat."' AND cor_id=".$cor." AND ch_id=".$cn."
  ORDER BY a_id ASC
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
				  <th>Chapter</th>
				  <th>Date</th>
                  <th>Attendance</th>
				  <th>Action</th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
	 $x=$row['s_id'];
					$y=$row['cor_id'];
					$w=$row['c_date'];
					$v=$row['ch_id'];
					$u=$row['attend'];
					$q1="SELECT name FROM tbl_detail WHERE login_id=$x";
					$r1 = mysqli_query($connect,$q1);
					$v1 = mysqli_fetch_array($r1);
					$q2="SELECT cor_name FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($connect,$q2);
					$v2 = mysqli_fetch_array($r2);
					$q3="SELECT ch_name FROM tbl_chapters WHERE ch_id=$v";
					$r3 = mysqli_query($connect,$q3);
					$v3 = mysqli_fetch_array($r3);
					if($u==1)
					{
						$u1="Present";
					}
					else
					{
						$u1="Absent";
					}
  $output .= '
   <tr>
    <td>'.$seq.'</td>
                  <td>'.$v1['name'].'</td>
				  <td>'.$v2['cor_name'].'</td>
				  <td>'.$v." : ".$v3['ch_name'].'</td>
				  <td>'.$w.'</td>
				  <td>'.$u1.'</td>
	<td>
	<a class="btn btn-primary btn-xs" href="editstuatt.php?id='.$row['a_id'].'" 
					onclick="return confirm("sure to edit?");">EDIT</a>
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
				  <th>Chapter</th>
				  <th>Date</th>
                  <th>Attendance</th>
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