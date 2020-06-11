<?php

	include "connection.php";
	
	session_start();

	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{

		$log = $_SESSION['log'];
		
		$qry = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($con,$qry);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
		$pass = $value['password'];
		$p = $value['type'];
		$qid=$value['cl_id'];
		$sql = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$sql);
		$value1 = mysqli_fetch_array($result1);
		
		$n = $value1['name'];
		$i = $value1['profile_pic'];
		$dob = $value1['dob'];
		$g="";

		$sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id=0";
		$result2 = mysqli_query($con,$sql1);
		$value2 = mysqli_fetch_array($result2);
		$def =$value2['profile_pic'];
		
		if(isset($_GET['qt']))
		{
			$id1 = $_GET['qt'];
			$sqlcl="SELECT * FROM tmp_exam WHERE e_id=$id1";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$c_name = $valuecl['cl_id'];
		$e_name = $valuecl['e_name'];
		$e_date = $valuecl['e_date'];
		$e_mrk = $valuecl['e_tm'];
		}
?>
<?php
	
	if(isset($_POST['submit']))
	{
		$ic= $_GET['qt'];
		$nuact = $_POST['u_act'];
		
		$nview = $_POST['view'];
		
		if($nuact==0)
		{
			$nview=0;
		}
		$query = "UPDATE tmp_exam SET valid='$nuact',view='$nview' WHERE e_id='$ic'";
		
		$result = mysqli_query($con,$query);
		
			if(!$result)
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";
				
				header("refresh:0; url=manageexam.php?flag=1");
				
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Edit Exam</title>
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
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <style>
	#myDiv {
	border: 2px solid lightgray;
	height:210px;
	width:210px;
	float: left;
	}
	</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jqu*ery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  
  
</head>
<body class="hold-transition skin-purple sidebar-mini sidebar-collapse" onload="fun1()">
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
        Edit Exam
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
        <li class="active">Edit Exam</li>
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
			<div class="form-group">
                  <label>Course Name</label>
                  <input type="text" name="c_name" id="c_name" class="form-control" autocomplete="off" placeholder="Course Name" value="<?php echo $c_name; ?>" disabled />
                </div>
			<div class="form-group">
                  <label>Exam Name</label>
                  <input type='text' name='e_name' id='e_name' class='form-control' autocomplete='off' placeholder='Exam Name' value="<?php echo $e_name; ?>" disabled />
                </div>	  
			<div class="box-header with-border">
              <h3 class="box-title">Edit Exam Details</h3>
            </div>
              <form role="form" method="POST" enctype="multipart/form-data" >
                <!-- text input -->
                <div class="form-group">
                  <label>Exam Date</label>
                  <input type="text" name="e_date" class="form-control" placeholder="Exam Date" value="<?php echo $e_date ?>" required readonly />
                </div>
                <div class="form-group">
                  <label>Marks</label>
                  <input type="number" name="mark" class="form-control" placeholder="Total Marks" value="<?php echo $e_mrk ?>" required readonly />
                </div>
				<?php
                if(isset($_GET['qt']))
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT valid,view from tmp_exam WHERE e_id=".$_GET['qt']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['valid'];
		$m = $valuecl['view'];
		
		?>
	
		<div class="form-group" id ="h1" style="display: none;"><br/>
                  <label>Active</label>
                  <select class="form-control" name="u_act" id="type"  onchange="fun()" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">Inactive</option>
                    <option value="1">Active</option>
                  </select>
				  </div> 
		<script type="text/javascript">
		document.getElementById("type").value="<?php echo $g ?>";			
		var h = document.getElementById("h1");			
		h.style.display ="block";
		</script>
		
		<div class="form-group" id ="h2" style="display: none;"><br/>
                  <label>Display to Student</label>
                  <select class="form-control" name="view" id="view" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">Don't Display</option>
                    <option value="1">Display</option>
                  </select>
				  </div> 
		<script type="text/javascript">
		document.getElementById("view").value="<?php echo $m ?>";			
		function fun1()
			  {
			  var t1=document.getElementById("type").value;
		//var t2=document.getElementById("view").value;
		if(t1==0)
		{
			var h1 = document.getElementById("h2");			
		h1.style.display ="none";
		}
		else
			{
				var h1 = document.getElementById("h2");			
		h1.style.display ="block";
			}
			  }
		
		function fun()
			  {
			  var t1=document.getElementById("type").value;
		//var t2=document.getElementById("view").value;
		if(t1==0)
		{
			var h1 = document.getElementById("h2");			
		h1.style.display ="none";
		}
		else
			{
				var h1 = document.getElementById("h2");			
		h1.style.display ="block";
			}
			  }
		</script>
		<?php
		
		}
		?>
    
              <div class="box-footer" style="float:right;">
                <input type="submit" name="submit" id="submit" value="UPDATE" class="btn btn-primary">
              </div>
			  <!--<script>
			  function fun()
			  {
			  var t1=document.getElementById("type").value;
		var t2=document.getElementById("view").value;
		if(t1=0)
		{
			if(t2=1)
			{
				document.getElementById("submit").style.class="btn btn-primary disabled";
			}
			else
			{
				document.getElementById("submit").style.class="btn btn-primary";
			}
		}
		else
			{
				document.getElementById("submit").style.class="btn btn-primary";
			}
			  }
			  </script>-->
              </form>
			 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  
 
  <!-- /.content-wrapper -->
  <?php
	include("footer.php");
  ?>

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
