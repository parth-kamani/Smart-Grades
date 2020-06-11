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
			$id = $_GET['qt'];
			//$url="change.php?id=".$id;
			$sqlcl="SELECT * from tbl_qdb WHERE que_id=".$id;
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['cor_id'];
		$t = $valuecl['ch_id'];
		$sqlcl1="SELECT cor_name from tbl_course WHERE cor_id=".$g;
		$resultcl1=mysqli_query($con,$sqlcl1);
		//header("location:manageclasses.php");
		$valuecl1 = mysqli_fetch_array($resultcl1);
		$g1 = $valuecl1['cor_name'];
		
		$sqlcl12="SELECT ch_name from tbl_chapters WHERE ch_num=".$t." AND cor_id=".$g;
		$resultcl12=mysqli_query($con,$sqlcl12);
		//header("location:manageclasses.php");
		$valuecl12 = mysqli_fetch_array($resultcl12);
		$g2 = $valuecl12['ch_name'];
		$t2 = $t." : ".$g2;
		
		
			$q_desc = $valuecl['que_desc'];
			$q_m = $valuecl['que_mrk'];
			$valid = $valuecl['valid'];
		}
?>
<?php
	
	if(isset($_POST['submit']))
	{
	$nmark = $_POST['mark'];
		
		$ndesc = $_POST['desc'];
		
		$query = "UPDATE tbl_qdb SET que_desc='$ndesc',que_mrk='$nmark' WHERE que_id=".$_GET['qt'];
		
		$result = mysqli_query($con,$query);
				
			if(!$result)
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";
				
				header("refresh:0; url=managequedb.php?flag=1");
				
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Edit Question</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  
  
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
        Edit Question
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
        <li class="active">Edit Question</li>
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
                  <input type="text" name="cor_n" id="cor_n" class="form-control" autocomplete="off" placeholder="Course Name" value="<?php echo $g1 ?>" disabled />
                </div>
			<div class="form-group">
                  <label>Chapter Number : Chapter Name</label>
                  <input type="text" name="ch_n" id="ch_n" class="form-control" autocomplete="off" placeholder="Chapter Number : Chapter Name" value="<?php echo $t2 ?>" disabled />
                </div>
			<div class="box-header with-border">
              <h3 class="box-title">Enter Course Details</h3>
            </div>
              <form role="form" method="POST" enctype="multipart/form-data" >
                <!-- text input -->
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Question</label>
                  <textarea class="form-control" rows="3" name="desc" placeholder="Question" required><?php echo $q_desc ?></textarea>
                </div>
				<div class="form-group">
                  <label>Mark</label>
                  <select class="form-control" id="mark" name="mark" required>
                    <option selected hidden value="">Select Mark</option>
					<option value="1.00">1</option>
					<option value="2.00">2</option>
					<option value="3.00">3</option>
					<option value="4.00">4</option>
					<option value="5.00">5</option>
					<option value="6.00">6</option>
					<option value="7.00">7</option>
					<option value="8.00">8</option>
					<option value="9.00">9</option>
					<option value="10.00">10</option>
                  </select>
				  <script type="text/javascript">
		document.getElementById("mark").value="<?php echo $q_m ?>";
		</script>
				  </div>
              <div class="box-footer" style="float:right;">
                <input type="submit" name="submit" value="UPDATE" class="btn btn-primary">
              </div>
			  
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
