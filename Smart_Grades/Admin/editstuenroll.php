<?php

	include "connection.php";
	
	session_start();

	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{
		/*if(isset($_GET['ep']))
	{
		echo "<script>alert('Student Enrolled');</script>";
		header("refresh:1 url=enrollstudent.php");
	}*/
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
		$m1="";
		$name="";
		$email="";
		$oldphone="";
		$cname="";
		$cfee="";
		$cdesc="";
		$ccomp="";
		$act="";
?>
<?php
	
	if(isset($_GET['id']))
	{
			$id = $_GET['id'];
			//$url="change.php?id=".$id;
			$sql4="SELECT * from tbl_stuenro WHERE s_id=$id";
		$result4=mysqli_query($con,$sql4);
		//header("location:manageclasses.php");
		$value4 = mysqli_fetch_array($result4);
			$login_id = $value4['login_id'];
			$cor_id = $value4['cor_id'];
			$fees_paid = $value4['fees_paid'];
			$ccomp = $value4['comp'];
			$act = $value4['active'];
			$sql5="SELECT name FROM tbl_detail WHERE login_id=$login_id";
			$result5=mysqli_query($con,$sql5);
			$value5 = mysqli_fetch_array($result5);
			$name=$value5['name'];
			$sql6="SELECT email_id,phone_no FROM tbl_login WHERE login_id=$login_id";
			$result6=mysqli_query($con,$sql6);
			$value6 = mysqli_fetch_array($result6);
			$email=$value6['email_id'];
			$oldphone=$value6['phone_no'];
			
			$sql7="SELECT cor_name,cor_desc,cor_fee FROM tbl_course WHERE cor_id=$cor_id";
			$result7=mysqli_query($con,$sql7);
			$value7 = mysqli_fetch_array($result7);
			$cname=$value7['cor_name'];
			$cdesc=$value7['cor_desc'];
			$cfee=$value7['cor_fee'];
	}
			
?>	
<?php
	
	if(isset($_POST['submit']))
	{
	$nfp = $_POST['f_paid'];
		$ncomp = $_POST['ccomp'];
		$nact = $_POST["act"];
		$query = "UPDATE tbl_stuenro SET fees_paid='$nfp',comp='$ncomp',active='$nact' WHERE s_id='$id'";
		
		$result = mysqli_query($con,$query);
			if(!mysqli_query($con,$sql))
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";
				
				header("refresh:0; url=managestuenroll.php?flag=1");
				
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Edit Student Enrollment</title>
  
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
        Edit Student Enrollment
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
        <li class="active">Edit Enrollment</li>
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
				
        
		
              <form role="form" method="POST" enctype="multipart/form-data" >
                
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Student Name" required readonly />
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Student Email" required readonly />
                </div>
				<div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="phone" class="form-control" value="<?php echo $oldphone; ?>" placeholder="Student Phone Number" pattern="[6789][0-9]{9}" oninput="setCustomValidity('')" title='Enter 10 Digit mobile
number starting with 6 or 7 or 8 or 9' required readonly />
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
                  <select class="form-control" id="f_paid" name="f_paid" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
				  <script type="text/javascript">
		document.getElementById("f_paid").value="<?php echo $fees_paid ?>";
		</script>
				  </div>
				 <div class="form-group">
                  <label>Completion</label>
                  <select class="form-control" id="ccomp" name="ccomp" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
				  <script type="text/javascript">
		document.getElementById("ccomp").value="<?php echo $ccomp ?>";
		</script>
				  </div>
				  <div class="form-group">
                  <label>Active</label>
                  <select class="form-control" id="act" name="act" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">Non-Active</option>
                    <option value="1">Active</option>
                  </select>
				  <script type="text/javascript">
		document.getElementById("act").value="<?php echo $act ?>";
		</script>
				  </div>
			  <div class="box-footer" style="float:right;display: block;">
                <input type="submit" id="submit" name="submit" value="UPDATE" class="btn btn-primary" />
              </div>
                  			
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
