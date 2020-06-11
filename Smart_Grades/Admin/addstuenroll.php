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
	
	if(isset($_POST['submit']))
	{
		
			$login_id = $_GET['q'];
			$cor_id = $_GET['sel'];
			$fees_paid = $_POST['f_paid'];
			//$updated = mysqli_query($con,"UPDATE tbl_login SET email_id='$email',phone_no='$newphone' WHERE login_id='$id'");
			$updated2 = mysqli_query($con,"INSERT INTO tbl_stuenro (login_id,cor_id,fees_paid,active,cl_id) VALUES($login_id,$cor_id,$fees_paid,1,$c_id)");
			
			
			if($updated2)
			{
				header("location:addstuenroll.php?ep=1");		
			}
			else
			{
				echo "<font style='color:red'>Error...</font>";
			}
		
		
	}
			
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Add Student Enrollment</title>
  
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
        Enroll Student
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
        <li class="active">Student Enrollment</li>
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
			<br/>
			<?php
				if(isset($_GET['flag'])){
				if($_GET['flag']==1)
					{
						echo "<center><font style='color:green; text-align:center'>User Added Successfully</font></center><br/>";
					
					}
				}
			?>	
			<br/>
				
        
		<?php
				
	if(isset($_GET['q']))
	{
		$g=$_GET['q'];
		$sqlcl="SELECT tbl_login.email_id,tbl_login.phone_no,tbl_detail.name FROM tbl_login INNER JOIN tbl_detail ON tbl_login.login_id=tbl_detail.login_id WHERE tbl_login.login_id=".$_GET['q']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$name = $valuecl['name'];
		$email = $valuecl['email_id'];
		$oldphone = $valuecl['phone_no'];
		}
		?>
              <form role="form" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                  <label>Student Name</label>
				  <div id="search_area">
                  <input type="text" name="class_search" id="class_search" class="form-control" autocomplete="off" placeholder="Search" value="<?php echo $name; ?>" />
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
   url:"fetchstu.php",
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
                </div>
				
				
				<div class="form-group">
                  <label>Student's Name</label>
                  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Student's Name" required readonly />
                </div>
				<div class="form-group">
                  <label>Student's Email</label>
                  <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Student's Email" required readonly />
                </div>
				<div class="form-group">
                  <label>Student's Phone Number</label>
                  <input type="text" name="phone" class="form-control" value="<?php echo $oldphone; ?>" placeholder="Student's Phone Number" pattern="[6789][0-9]{9}" oninput="setCustomValidity('')" title='Enter 10 Digit mobile
number starting with 6 or 7 or 8 or 9' required readonly />
                </div>
				<?php
				if(isset($_GET['q']))
				{
				?>
				<br/><br/>
				<?php
				
	if(isset($_GET['sel']))
	{
		//$g=$_GET['sel'];
		$sql3="SELECT cor_name,cor_fee,cor_desc FROM tbl_course WHERE cor_id=".$_GET['sel']." AND cl_id=".$c_id;
		$result3=mysqli_query($con,$sql3);
		//header("location:manageclasses.php");
		$value3 = mysqli_fetch_array($result3);
		$cname = $value3['cor_name'];
		$cfee = $value3['cor_fee'];
		$cdesc = $value3['cor_desc'];
		}
		?>
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
   url:"fetchcor1.php",
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
                  <label>Course Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $cname ?>" placeholder="Course Name" required readonly />
                </div>
                  
				<div class="form-group">
                  <label>Fees(<i class="fa fa-inr"></i>)</label>
				  
                  <input type="number" name="fees" maxlength="8" class="form-control" value="<?php echo $cfee ?>" placeholder="Course Fees" readonly required />
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="desc" placeholder="Course Description" required readonly ><?php echo $cdesc ?></textarea>
                </div>
				<div class="form-group">
                  <label>Fees Paid</label>
                  <select class="form-control" name="f_paid" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
				  </div>
				 
			  <div class="box-footer" style="float:right;display: block;">
                <input type="submit" id="submit" name="submit" value="ADD" class="btn btn-primary" />
              </div>
                  <?php
	}
				  ?>				  
				 </div>
              </form>
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
