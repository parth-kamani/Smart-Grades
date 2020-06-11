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
 $ch = $_GET['qt'];
 $query = "
  SELECT * FROM tbl_stuassi 
  WHERE cor_id=".$cor." AND ch_id=".$ch." AND (a_name LIKE '%".$search."%' 
  OR a_desc LIKE '%".$search."%') ORDER BY a_num ASC
 ";
}
else
{
	$cor = $_GET['tr'];
 $ch = $_GET['qt'];
 $query = "
  SELECT * FROM tbl_stuassi 
  WHERE cor_id=".$cor." AND ch_id=".$ch." ORDER BY a_num ASC
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
				  <th>Name</th>
				  <th>Description</th>
				  <th>Marks</th>
                  <th>Course</th>
				  <th>Chapter</th>
				  <th>Deadline Date</th>
				  <th>Action</th>
   </tr>
 ';
	$seq=1;
	$r=0;
 while($row = mysqli_fetch_array($result))
 {
	 $x=$row['a_name'];
	 $y=$row['cor_id'];
	 $w=$row['a_dline'];
	 $v=$row['ch_id'];
	 $b=$row['a_desc'];
	 $a=$row['a_url'];
	 $mrk=$row['a_mrk'];
	 $q2="SELECT cor_name FROM tbl_course WHERE cor_id=$y";
	 $r2 = mysqli_query($connect,$q2);
	 $v2 = mysqli_fetch_array($r2);
	 $q3="SELECT ch_name FROM tbl_chapters WHERE ch_id=$v";
	 $r3 = mysqli_query($connect,$q3);
	 $v3 = mysqli_fetch_array($r3);
	 
	 $hj=strlen($row['a_desc']);
	 if($hj>25)
	 {
	 $bv=substr($row['a_desc'],0,25);
	 $bv.="...";
	 }
	 else
	 {
	 $bv=$row['a_desc'];
	 }
  $output .= '
   <tr>
    <td>'.$seq.'</td>
    <td>'.$x.'</td>
	<td>'.$bv.'</td>
	<td>'.$mrk.'</td>
	<td>'.$v2['cor_name'].'</td>
	<td>'.$v." : ".$v3['ch_name'].'</td>
	<td>'.$w.'</td>
	<td>
	<button type="button" onclick="p21()" class="btn btn-info btn-xs view_data1" data-toggle="modal" id="'.$row['a_id'].'">VIEW</button>&nbsp;&nbsp;

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
				  <th>Description</th>
				  <th>Marks</th>
                  <th>Course</th>
				  <th>Chapter</th>
				  <th>Deadline Date</th>
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