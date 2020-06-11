<?php

	include "connection.php";
	
	session_start();

	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{
		if(isset($_GET['ep']))
	{
		echo "<script>alert('Student Enrolled');</script>";
		header("refresh:1 url=addstuenroll.php");
	}
		$log = $_SESSION['log'];
		
		$qry = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($con,$qry);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
		$c_id = $value['cl_id'];
		$sql = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$sql);
		$value1 = mysqli_fetch_array($result1);
		
		$n = $value1['name'];
		$i = $value1['profile_pic'];
		$dob = $value1['dob'];

		$sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id=0";
		$result2 = mysqli_query($con,$sql1);
		$value2 = mysqli_fetch_array($result2);
		$def =$value2['profile_pic'];
		$g="";
		$m="";
		$gh="0.00";
		$t6="";
?>

<?php
	if(isset($_POST['sub1']))
	{
		$f=$_SERVER['REQUEST_URI'];
		$q = $_POST['s_n'];
		//$mr = $_POST['mar_n'];
		
 $i = strpos($f,"&&qh=");
 if($i == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		$qw.="&&qh=".$q;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 }
 else{
	 //echo $i;
 $o= substr($f,0,$i);
 
 $qw=$o;
 
		$qw.="&&qh=".$q;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 } 
	}
	if(isset($_POST['sub2']))
	{
		$a=$_GET['sel'];
		$b=$_GET['q'];
		$c=$_GET['e'];
		$d=$_GET['qh'];
		$e=$_POST['omrk'];
		$f=$_POST['mrk'];
		if($e<$f && $e>=0)
		{
		$qry1="INSERT INTO tbl_stures (stu_id,e_id,q_id,cor_id,ob_mark,valid) VALUES($b,$c,$d,$a,$e,1)";
		
		$updated2 = mysqli_query($con,$qry1);
			if($updated2)
			{
				header("location:entmrk.php?sel=".$a."&&q=".$b."&&e=".$c."&&qh=0");		
			}
			else
			{
				echo "<font style='color:red'>Error...</font>";
			}
		}
		else
		{
			?>
			<script>alert("Obtained marks should be less than Question marks and greater than zero");</script>
			<?php
		}
	}
	if(isset($_POST['sub3']))
	{
		$a2=$_GET['sel'];
		$b2=$_GET['q'];
		$c2=$_GET['e'];
		$d2=$_GET['qh'];
		$e2=$_POST['omrk'];
		$f2=$_POST['mrk'];
		if($e2<$f2 && $e2>=0)
		{
		//$d="entmrk.php?sel=".$a."&&q=".$b."&&e=".$c;
		//header("location:".$d);
		$qry9="UPDATE tbl_stures SET ob_mark='$e2' WHERE stu_id='$b2' AND e_id='$c2' AND q_id='$d2' AND cor_id='$a2'";
		//echo $qry1;
		$updated = mysqli_query($con,$qry9);
			if($updated)
			{
				header("location:entmrk.php?sel=".$a2."&&q=".$b2."&&e=".$c2."&&qh=0");		
			}
			else
			{
				echo "<font style='color:red'>Error...</font>";
			}
		}
		else
		{
			?>
			<script>alert("Obtained marks should be less than Question marks and greater than zero");</script>
			<?php
		}
	}
	if(isset($_POST['sub4']))
	{
		$a3=$_GET['sel'];
		$b3=$_GET['q'];
		$c3=$_GET['e'];
		//$d3=$_GET['qh'];
		
		$sql11 = "SELECT SUM(ob_mark) as sum FROM tbl_stures where stu_id='$b3' AND e_id='$c3' AND cor_id='$a3'";
				
$result11 = mysqli_query($con,$sql11);
$ro1 = mysqli_fetch_array($result11);
$count=mysqli_num_rows($result11);
if($count>0)
{
	//$t5=$ro1['sum'];
	$t6=$ro1['sum'];
}
else
{
	//$t5="No Marks Added";
	$t6='0.00';
}
		
		
		$sql21 = "SELECT re_id FROM tbl_fmrk where stu_id='$b3' AND e_id='$c3' AND cor_id='$a3'";
				
$result21 = mysqli_query($con,$sql21);
$ro21 = mysqli_fetch_array($result21);
$count21=mysqli_num_rows($result21);
if($count21==0)
{
	$query21 = "INSERT INTO tbl_fmrk (stu_id,e_id,cor_id,ob_m,valid) VALUES('$b3','$c3','$a3','$t6',1)";
		
		$result51 = mysqli_query($con,$query21);
			//echo $query21;
			if(!$result51)
			{
				echo "Not inserted...";
			}
			
			else
			{
				echo "inserted successfully....";
			}
}
else if($count21==1)
{
	$query52 = "UPDATE tbl_fmrk SET ob_m='$t6' WHERE stu_id='$b3' AND e_id='$c3' AND cor_id='$a3'";
		//echo $query52;
		$result = mysqli_query($con,$query);
			
			if(!mysqli_query($con,$sql))
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";
				
				header("refresh:0; url=managechap.php?flag=1");
				
			}
}
			?>
			<script>alert("Entered marks have been registered");</script>
			<?php
				header("location:addstuemark.php?sel=".$a3."&&q=0&&e=".$c3."");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades| Add Student Marks</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
  
  <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  
  
  <style>
	#myDiv {
	border: 2px solid lightgray;
	height:210px;
	width:210px;
	float: left;
	}
	</style>
  
  
</head>
<body class="hold-transition skin-purple sidebar-mini sidebar-collapse">
<div class="wrapper">

  <?php
		include("head.php");
		include("menu.php");
	  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Student Marks
        <?php
if($type==1)
{	
		?>
        <small>Admin Panel Control</small>
		<?php
}
else if($type==3)
{
	?>
	<small>Tutor Panel Control</small>
	<?php
}
		?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Student Marks</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php
				if(isset($_GET['sel']))
				{
					$coid= $_GET['sel'];
	if(isset($_GET['e']))
	{
		$g=$_GET['e'];
		
		}
		?>
		
              <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>Question ID</th>
                  <th>Question</th>
				  <th>Marks</th>
				  <th>Obtained Marks</th>
                  <th>Action </th>
                </tr>
				<?php
				
					if(isset($_GET['e']))
					{
						$sqlcl="SELECT * FROM tmp_que WHERE e_id=".$_GET['e']."";
		$sql40="SELECT e_tm FROM tmp_exam WHERE e_id=".$_GET['e']."";
	
$res40 = mysqli_query($con,$sql40);
$ro40 = mysqli_fetch_array($res40);
$gh=$ro40['e_tm'];

		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		while($valuecl = mysqli_fetch_array($resultcl))
		{
		$q_queid = $valuecl['q_queid'];
		$m_id= $valuecl['m_id'];
		$q_mrk= $valuecl['q_mrk'];
		$q_num= $valuecl['q_num'];
		$q_id= $valuecl['q_id'];
		
				  
				$sql10 = "SELECT que_desc FROM tbl_qdb where que_id=".$q_queid;
				
$result10 = mysqli_query($con,$sql10);
$a3=$_GET['sel'];
		$b3=$_GET['q'];
		$c3=$_GET['e'];

$seq=1;
while ($row10 = mysqli_fetch_array($result10)) {

$sql11 = "SELECT ob_mark FROM tbl_stures where stu_id='$b3' AND q_id='$q_id' AND e_id='$c3' AND cor_id='$a3'";
				
$result11 = mysqli_query($con,$sql11);
$ro1 = mysqli_fetch_array($result11);
$count=mysqli_num_rows($result11);
if($count>0)
{$t4=$ro1['ob_mark'];}
else
{$t4="No Marks Added";}

						?>
				<tr>
                  <td><?php echo "Q".$m_id.") ".$q_num.". ";?></td>
                  <td><?php echo $row10['que_desc'];?></td>
                  <td><?php echo $q_mrk;?></td>
				  <td><?php echo $t4;?></td>
				  <td>
				  <a class="btn btn-success btn-xs" href="entmrk.php?sel=<?php echo $_GET['sel']; ?>&&q=<?php echo $_GET['q']; ?>&&e=<?php echo $_GET['e']; ?>&&qh=<?php echo $q_id;?> " 
				  onclick="return confirm('sure to edit?');">EDIT</a> 
					</td>
				</tr>
				
				<?php
}
		}
					}
					else
					{
				?>
				<td colspan="4"><b>No Records</b></td>
				<?php
					}
					$sql11 = "SELECT SUM(ob_mark) as sum FROM tbl_stures where stu_id='$b3' AND e_id='$c3' AND cor_id='$a3'";
				
$result11 = mysqli_query($con,$sql11);
$ro1 = mysqli_fetch_array($result11);
$count=mysqli_num_rows($result11);
if($count>0)
{
	$t5=$ro1['sum'];
	$t6=$t5;
}
else
{
	$t5="No Marks Added";
	$t6='0.00';
}
				?>
				<tr>
				
				<td colspan="3" align="right"><label>Total Obtained Marks :</label></td> 
				<td colspan="2"><label><?php echo $t5 ?> : <?php echo $gh ?></label></td>
				</tr>
				</table>
   </div><br/>
   <form role="form" method="POST" enctype="multipart/form-data" >
		<div class="box-footer" style="float:right;">
                <input type="submit" name="sub4" value="Save" class="btn btn-primary">
              </div>
		</form>
<?php
				}
?>
<br/>
<?php
if(($_GET['qh'])!=0)
					{
						$a1=$_GET['sel'];
						$b1=$_GET['q'];
						$c1=$_GET['e'];
						$d1=$_GET['qh'];
						$qry5 = "SELECT ob_mark FROM tbl_stures WHERE cor_id='$a1' AND stu_id='$b1' AND e_id='$c1' AND q_id='$d1'";
						$result5 = mysqli_query($con,$qry5);
						if($value5 = mysqli_fetch_array($result5))
						{
						$t1 = $value5['ob_mark'];
						?>
							<form role="form" method="POST" enctype="multipart/form-data" >
		<div class="form-group">
                  <label>Question Marks</label>
                  <input type="text" name="mrk" class="form-control" value="<?php echo $q_mrk ?>" placeholder="Question Marks" required readonly />
                </div>
		<div class="form-group">
                  <label>Obtain Marks</label>
                  <input type="number" name="omrk" class="form-control" value="<?php echo $t1 ?>" placeholder="Enter Obtained Marks" required />
                </div>
				<button class="btn btn-info btn-xl" name="sub3" id="sub3">Submit</button>
				</form>
						<?php
						}
						else
						{
						?>
						
		<form role="form" method="POST" enctype="multipart/form-data" >
		<div class="form-group">
                  <label>Question Marks</label>
                  <input type="text" name="mrk" class="form-control" value="<?php echo $q_mrk ?>" placeholder="Question Marks" required readonly />
                </div>
		<div class="form-group">
                  <label>Obtain Marks</label>
                  <input type="number" name="omrk" class="form-control" placeholder="Enter Obtained Marks" required />
                </div>
				<button class="btn btn-info btn-xl" name="sub2" id="sub2">Submit</button>
				</form>
		<?php
					}
					?>
					<script type="text/javascript">
		document.getElementById("s_n").value="<?php echo $_GET['qh']; ?>";
		//document.getElementById("h2").style.display ="block";
		</script>
					<?php
					}
		?>
		
		
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->
</div></div>
    </section>
    
  
  
 
  <!-- /.content-wrapper -->
  <?php
	include("footer.php");
  ?>
  <!-- /.content -->
</div>
  <!-- /.content -->
</div>
  <!-- Control Sidebar -->
   <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
$(document).ready(function () {
$('#datepicker').datepicker({    
    endDate: '+1d',
    autoclose: true
});  });
</script>
<!-- jQuery 3 --><!--
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->

<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php
	}

?>
