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
		$type = $value['type'];
		if($type==1)
		{
			$role="Admin";
		}
	if($type==3)
	{
		$role="Tutor";
	}
	if($type==0)
	{
		$role="Master Admin";
	}
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
		$m1="";
		$name="";
		$email="";
		$oldphone="";
		$cname="";
		$cfee="";
		$cdesc="";
?>

<?php
	if(isset($_POST['sub1']))
	{
		$f=$_SERVER['REQUEST_URI'];
		$q = $_POST['s_n'];
		//$mr = $_POST['mar_n'];
		
 $i = strpos($f,"&&q=");
 if($i == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		$qw.="&&q=".$q;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 }
 else{
	 //echo $i;
 $o= substr($f,0,$i);
 
 $qw=$o;
 
		$qw.="&&q=".$q;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 } 
	}
	if(isset($_POST['sub2']))
	{
		$f=$_SERVER['REQUEST_URI'];
		$q = $_POST['e_n'];
		//$mr = $_POST['mar_n'];
		
 $i = strpos($f,"&&e=");
 if($i == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		$qw.="&&e=".$q;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 }
 else{
	 //echo $i;
 $o= substr($f,0,$i);
 
 $qw=$o;
 
		$qw.="&&e=".$q;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 } 
 
	}
	if(isset($_POST['sub3']))
	{
		$a2=$_GET['sel'];
		$b2=$_GET['q'];
		$c2=$_GET['e'];
		//$d2=$_GET['qh'];
		$e2=$_POST['omrk'];
		$f2=$_POST['mrk'];
		if($e2<$f2 && $e2>=0)
		{
		//$d="entmrk.php?sel=".$a."&&q=".$b."&&e=".$c;
		//header("location:".$d);
		$qry9="UPDATE tbl_fmrk SET ob_m='$e2' WHERE stu_id='$b2' AND a_id='$c2' AND cor_id='$a2'";
		//echo $qry1;
		$updated = mysqli_query($con,$qry9);
			if($updated)
			{
				header("location:addstuamark.php?sel=".$a2."&&q=0");		
			}
			else
			{
				echo "<font style='color:red'>Error...</font>";
			}
		}
		else
		{
			?>
			<script>alert("Obtained marks should be less than Assignment marks and greater than zero");</script>
			<?php
		}
	}
	if(isset($_POST['sub4']))
	{
		$a=$_GET['sel'];
		$b=$_GET['q'];
		$c=$_GET['e'];
		//$d=$_GET['qh'];
		$e=$_POST['omrk'];
		$f=$_POST['mrk'];
		if($e<$f && $e>=0)
		{
		$qry1="INSERT INTO tbl_fmrk (stu_id,a_id,cor_id,ob_m,valid) VALUES($b,$c,$a,$e,1)";
		
		$updated2 = mysqli_query($con,$qry1);
			if($updated2)
			{
				header("location:addstuamark.php?sel=".$a."&&q=0");		
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
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Add Marks</title>
  
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
				if(isset($_GET['flag'])){
				if($_GET['flag']==1)
					{
						echo "<center><font style='color:green; text-align:center'>User Added Successfully</font></center><br/>";
					
					}
				}
			?>	
				
				<?php
				
	if(isset($_GET['sel']))
	{
		//$g=$_GET['sel'];
		$sql3="SELECT cor_name,cor_fee,cor_desc FROM tbl_course WHERE cor_id=".$_GET['sel']." AND cl_id=".$c_id;
		$result3=mysqli_query($con,$sql3);
		//header("location:manageclasses.php");
		$value3 = mysqli_fetch_array($result3);
		$cname = $value3['cor_name'];
		}
		?>
		<form role="form" method="POST" enctype="multipart/form-data" >
				<div class="form-group">
                  <label>Course Name</label>
				  <div id="search_area1">
                  <input type="text" name="class_search1" id="class_search1" class="form-control" autocomplete="off" placeholder="Search" value="<?php echo $cname; ?>" />
				  </div>
				  <br />
				  <br />
				  <div id="class_data1"></div>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchcor.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#class_data1').html(data);
   }
  });
 }
 $('#class_search1').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>				    
                </div>
				
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $cname ?>" placeholder="Enter Name" required readonly />
                </div>
                  <?php
	
				  ?>				  
				 <br/>
				
				<?php
				if(isset($_GET['sel']))
				{
					$coid= $_GET['sel'];
	if(isset($_GET['q']))
	{
		$g=$_GET['q'];
		$sqlcl="SELECT tbl_detail.name FROM tbl_login INNER JOIN tbl_detail ON tbl_login.login_id=tbl_detail.login_id WHERE tbl_login.login_id=".$_GET['q']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$name = $valuecl['name'];
		}
		?>
              <form role="form" method="POST" enctype="multipart/form-data" >
			<div style="display: block;">
			
				<div class="form-group">
                  <label>Select Student</label>
				  <select class="form-control" id="s_n" name="s_n" required onchange="ab(this)">
                    <option selected hidden value="0">Select Student</option>
				  <?php
				$sql10 = "SELECT login_id FROM tbl_stuenro where cor_id=".$coid." AND active=1 AND comp=0";
				
$result10 = mysqli_query($con,$sql10);

$seq=1;
while ($row10 = mysqli_fetch_array($result10)) {
	
$sqlcl="SELECT tbl_detail.name,tbl_login.login_id FROM tbl_login INNER JOIN tbl_detail ON tbl_login.login_id=tbl_detail.login_id WHERE tbl_login.login_id=".$row10['login_id']."";
		$resultcl=mysqli_query($con,$sqlcl);
		$valuecl = mysqli_fetch_array($resultcl);
		$name = $valuecl['name'];
		$log= $valuecl['login_id'];
		
    echo "<option value='" . $log ."'>" .$seq." : ".$name."</option>";
	$seq++;
}
				  
?></select>
</div>
<button class="btn btn-info btn-xl" name="sub1" id="sub1">Select</button>
</div>
</form>
<br/>
<?php
if(isset($_GET['q']))
					{
						?>
						<script type="text/javascript">
		document.getElementById("s_n").value="<?php echo $_GET['q']; ?>";
		//document.getElementById("h2").style.display ="block";
		</script>
		<form role="form" method="POST" enctype="multipart/form-data" >
			<div style="display: block;">
			
				<div class="form-group">
                  <label>Select Assignment</label>
				  <select class="form-control" id="e_n" name="e_n" required onchange="ab(this)">
                    <option selected hidden value="">Select Assignment</option>
				  <?php
				$sql11 = "SELECT a_id,a_name,a_num FROM tbl_stuassi where cor_id=".$_GET['sel']." AND valid=1";
				
$result11 = mysqli_query($con,$sql11);

$seq1=1;
while ($row11 = mysqli_fetch_array($result11)) {

		$ename = $row11['a_name'];
		$ei= $row11['a_id'];
		
    echo "<option value='" . $ei ."'>" .$seq1." : ".$ename."</option>";
	$seq1++;
}
				  
?></select>
</div>
<button class="btn btn-info btn-xl" name="sub2" id="sub2">Select</button>
</div>
</form><br/>
<?php
if(isset($_GET['e']))
{
?>
<script type="text/javascript">
		document.getElementById("e_n").value="<?php echo $_GET['e']; ?>";
		//document.getElementById("h2").style.display ="block";
		</script>
		<?php
		if(($_GET['e'])!=0)
					{
						$a1=$_GET['sel'];
						$b1=$_GET['q'];
						$c1=$_GET['e'];
						//$d1=$_GET['qh'];
						$qry5 = "SELECT ob_m FROM tbl_fmrk WHERE cor_id='$a1' AND stu_id='$b1' AND a_id='$c1'";
						$result5 = mysqli_query($con,$qry5);
						//$sqlcl="SELECT * FROM tmp_que WHERE e_id=".$_GET['e']."";
		$sql40="SELECT a_mrk FROM tbl_stuassi WHERE a_id=".$_GET['e']."";
	
$res40 = mysqli_query($con,$sql40);
$ro40 = mysqli_fetch_array($res40);
$q_mrk=$ro40['a_mrk'];
						if($value5 = mysqli_fetch_array($result5))
						{
						$t1 = $value5['ob_m'];
						?>
							<form role="form" method="POST" enctype="multipart/form-data" >
		<div class="form-group">
                  <label>Assignment Marks</label>
                  <input type="text" name="mrk" class="form-control" value="<?php echo $q_mrk ?>" placeholder="Assignment Marks" required readonly />
                </div>
		<div class="form-group">
                  <label>Obtain Marks</label>
                  <input type="number" name="omrk" class="form-control" value="<?php echo $t1 ?>" placeholder="Enter Obtained Marks" required />
                </div>
				<div class="box-footer" style="float:right;">
				<button class="btn btn-primary btn-xl" name="sub3" id="sub3">save</button>
				</div>
				</form>
						<?php
						}
						else
						{
						?>
						
		<form role="form" method="POST" enctype="multipart/form-data" >
		<div class="form-group">
                  <label>Assignment Marks</label>
                  <input type="text" name="mrk" class="form-control" value="<?php echo $q_mrk ?>" placeholder="Assignment Marks" required readonly />
                </div>
		<div class="form-group">
                  <label>Obtain Marks</label>
                  <input type="number" name="omrk" class="form-control" placeholder="Enter Obtained Marks" required />
                </div>
				<div class="box-footer" style="float:right;">
				<button class="btn btn-primary btn-xl" name="sub4" id="sub4">Save</button>
				</div>
				</form>
		<?php
					}
					
					}
		?>
					<?php
}
					}
					
				}
				?>
              </form>
            </div>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->

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
