<?php

	include "connection.php";
	
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	else
	{
		if(isset($_GET['flag']))
		{
			echo "<script>alert('Student Attendance Marked');</script>";
		header("refresh:1 url=addstuatt.php");
		}
		$log = $_SESSION['log'];
		
		$g="";
		
		$sql = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($con,$sql);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
		$email = $value['email_id'];
		$phone = $value['phone_no'];
		$type = $value['type'];
		$c_id = $value['cl_id'];
		
		$qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$qry);
		$value1 = mysqli_fetch_array($result1);
		
		$n = $value1['name'];
		$i = $value1['profile_pic'];
		$dob = $value1['dob'];
		$q="";
		$c="";
?>
             
<?php
	if(isset($_GET['qu']))
	{
		$ei=$_GET['qu'];
		$qry2 = "SELECT e_id FROM tmp_que WHERE q_id='$ei'";
		$result2 = mysqli_query($con,$qry2);
		$value2 = mysqli_fetch_array($result2);
		$eid = $value2['e_id'];
		$qry1 = "SELECT cor_id FROM tmp_exam WHERE e_id='$eid'";
		$result1 = mysqli_query($con,$qry1);
		$value1 = mysqli_fetch_array($result1);
		$coid = $value1['cor_id'];
		
	}
	if(isset($_POST['sub']))
	{
		
		$f=$_SERVER['REQUEST_URI'];
		$ch = $_POST['ch_n'];
		//$mr = $_POST['mar_n'];
		echo $ch;
 $i = strpos($f,"&&cn=");
 if($i == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		$qw.="&&cn=".$ch;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 }
 else{
	 //echo $i;
 $o= substr($f,0,$i);
 
 $qw=$o;
 
		$qw.="&&cn=".$ch;
		//$qw.="&&mar=".$mr;
		header("location:".$qw);
 } 
	}
	if(isset($_POST['sub1']))
	{
		
		$f=$_SERVER['REQUEST_URI'];
		//$ch = $_POST['ch_n'];
		$mr = $_POST['mar_n'];
		echo $ch;
 $i = strpos($f,"&&mar=");
 if($i == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		//$qw.="&&cn=".$ch;
		$qw.="&&mar=".$mr;
		header("location:".$qw);
 }
 else{
	 //echo $i;
 $o= substr($f,0,$i);
 
 $qw=$o;
 
		//$qw.="&&cn=".$ch;
		$qw.="&&mar=".$mr;
		header("location:".$qw);
 } 
	}
	if(isset($_POST['sub2']))
	{
		$tp=$_GET['qu'];
		$to=$_GET['jk'];
		$qry3 = "SELECT e_id,m_id FROM tmp_que WHERE q_id='$ei'";
		$result3 = mysqli_query($con,$qry3);
		$value3 = mysqli_fetch_array($result3);
		$e1 = $value3['e_id'];
		$m1 = $value3['m_id'];
		$qry4 = "UPDATE tmp_que SET q_queid='".$_GET['se']."', q_mrk='".$_GET['mar']."' WHERE q_id='$ei'";
		//echo $e1.":".$m1.":".$to;
		$url11= "creqp.php?qr=".$e1."&&qp=".$m1."&&jk=".$to;
		//echo $url11;
		$result4 = mysqli_query($con,$qry4);
			if(!$result4)
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";	
				header("refresh:0; url=".$url11);
				
			}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Select Question</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<style>
	.btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
}
	</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!--<link href="bootstrap3.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->
  
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
        Select Question
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
		<li class="active">Select Question</li>
      </ol>
    </section>
	<section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
	  <div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <div>
		  		  
            <div class="box-header">
				
  
            <!-- /.box-header -->
			<form role="form" method="POST" enctype="multipart/form-data" >
			<div style="display: block;">
			
				<div class="form-group">
                  <label>Select Chapter</label>
				  <select class="form-control" id="ch_n" name="ch_n" required onchange="ab(this)">
                    <option selected hidden value="">Select Chapter</option>
				  <?php
				$sql10 = "SELECT ch_num,ch_name FROM tbl_chapters where cor_id=".$coid;
				
$result10 = mysqli_query($con,$sql10);


while ($row10 = mysqli_fetch_array($result10)) {
    echo "<option value='" . $row10['ch_num'] ."'>" . $row10['ch_num'] ." : " . $row10['ch_name'] ."</option>";
}
				  
?></select>
</div>
<button class="btn btn-info btn-xl" name="sub" id="sub">Search</button>
</form>
</div></div>
<?php
	
					if(isset($_GET['cn']))
					{
						?>
						<script type="text/javascript">
		document.getElementById("ch_n").value="<?php echo $_GET['cn']; ?>";
		//document.getElementById("h2").style.display ="block";
		</script>
		<div>
		  		  
            <div class="box-header">
						<form role="form" method="POST" enctype="multipart/form-data" >
			<div style="display: block;">
			
				<div class="form-group">
                  <label>Select Mark</label>
				  <select class="form-control" id="mar_n" name="mar_n" required onchange="ab(this)">
                    <option selected hidden value="">Select Mark</option>
				  <?php
				
				$sql11 = "SELECT DISTINCT que_mrk FROM tbl_qdb WHERE cor_id=".$coid." AND cl_id=".$c_id." AND ch_id=".$_GET['cn']." AND valid=1";
$result11 = mysqli_query($con,$sql11);


while ($row11 = mysqli_fetch_array($result11)) {
    echo "<option value='" . $row11['que_mrk'] ."'>" . $row11['que_mrk'] ."</option>";
}
				  
?></select>
</div>
<button class="btn btn-info btn-xl" name="sub1" id="sub1">Search</button>
</form>
</div></div></div>
						
						
				<?php
					}
				
					if(isset($_GET['mar']))
					{
						?>
						<script type="text/javascript">
		document.getElementById("mar_n").value="<?php echo $_GET['mar']; ?>";
		//document.getElementById("h2").style.display ="block";
		</script>
		<form role="form" method="POST" enctype="multipart/form-data" >
				<div class="form-group">
                  <label>Question</label>
                  <div id="search_area">
                  <input type="text" name="class_search" id="class_search" class="form-control" autocomplete="off" placeholder="Search" value="<?php echo $g; ?>" />
				  </div>
				  <br />
				  <br />
				  <div id="class_data"></div>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchmark.php?qu="+<?php echo $_GET['qu']?>+"&&cn="+<?php echo $_GET['cn']?>+"&&mar="+<?php echo $_GET['mar']?>,
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#class_data').html(data);
   }
  });
 }
 $('#class_search').keyup(function(){
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
                </div></form>
		<?php
					}
					if(isset($_GET['se']))
					{
						?>
						
		  		  
            <div class="box-header">
						<form role="form" method="POST" enctype="multipart/form-data" >
						<div class="box-footer" style="float:right;display: block;">
						<button class="btn btn-primary btn-xl" name="sub2" id="sub2">Save</button>
						</div>
</form></div>
						<?php
					}
				?>
				</div>
				</div>
	</section>
</div>
  <!-- /.content-wrapper -->
  <?php
	include("footer.php");
  ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
$(document).ready(function () {
$('#datepicker').datepicker({ 
	format: 'yyyy-mm-dd',
   startDate:'-7d',
	endDate: '+0d',
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