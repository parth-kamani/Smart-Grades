<?php

	include "connection.php";
	
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{
		$ulog = $_SESSION['log'];
		
		$a = "SELECT * FROM tbl_login WHERE email_id='$ulog'";
		$aa = mysqli_query($con,$a);
		$value = mysqli_fetch_array($aa);
		$id = $value['cl_id'];
		$uid = $value['login_id'];
		$type= $value['type'];
		
		$b = "SELECT * FROM tbl_detail WHERE login_id='$uid'";
		$bb = mysqli_query($con,$b);
		$bbb = mysqli_fetch_array($bb);
		
		$n = $bbb['name'];
		$i = $bbb['profile_pic'];
		$dob = $bbb['dob'];
		
		
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			//$url="change.php?id=".$id;
			$sql = "SELECT * FROM tbl_classes WHERE cl_id='$id'";
			$result = mysqli_query($con,$sql);
			$value = mysqli_fetch_array($result);
			
			$email = $value['cl_eid'];
			$oldphone = $value['cl_phno'];
			
			$name = $value['cl_name'];
			$lmark = $value['cl_lmark'];
			$address = $value['cl_addr'];
			$pin= $value['cl_pin'];
			$city = $value['cl_city'];
			$state = $value['cl_state'];
			$g = $value['active'];
		}
		else
		{
			$sql1 = "SELECT cl_id FROM tbl_login WHERE email_id='$ulog'";
			$result1 = mysqli_query($con,$sql1);
			$value1 = mysqli_fetch_array($result1);
			
			$id = $value1['cl_id'];
			$sql = "SELECT * FROM tbl_classes WHERE cl_id='$id'";
			$result = mysqli_query($con,$sql);
			$value = mysqli_fetch_array($result);
			
			$email = $value['cl_eid'];
			$oldphone = $value['cl_phno'];
			
			$name = $value['cl_name'];
			$lmark = $value['cl_lmark'];
			$address = $value['cl_addr'];
			$pin= $value['cl_pin'];
			$city = $value['cl_city'];
			$state = $value['cl_state'];
			$g = $value['active'];
		}
		
		
?>
<?php
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$newphone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$lmark = $_POST['lmark'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$pin = $_POST['pin'];
		$g = $_POST['cl_act'];
		//$updated = mysqli_query($con,"UPDATE tbl_login SET email_id='$email' WHERE login_id='$id'");
		//look at the admin an master admin if req change the query...
		$updated2 = mysqli_query($con,"UPDATE tbl_classes SET cl_name='$name',cl_addr='$address',cl_city='$city',cl_state='$state',cl_pin='$pin',cl_phno='$newphone',cl_eid='$email',cl_lmark='$lmark',active='$g' WHERE cl_id='$id'");
		//$updated3 = mysqli_query($con,"UPDATE tbl_login SET phone_no='$newphone' WHERE login_id='$id'");
		
		
		if($updated2)
		{
			if(isset($_GET['id']))
			{
				if($type==0)
				{
				header("location:manageclasses.php?ep=1");
				}
				else
				{
					header("location:dashboard.php?ep=2");
				}	
			}
			else
			{
				header("location:dashboard.php?ep=2");
			}
		}
		else
		{
				echo "<font style='color:red'>Error...</font>";
		}
	}
	/*else
	{
		$name = $_POST['name'];
		$newphone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$lmark = $_POST['email'];
		$city = $_POST['email'];
		$state = $_POST['email'];
		$pin = $_POST['email'];
		//$updated = mysqli_query($con,"UPDATE tbl_login SET email_id='$email' WHERE login_id='$id'");
		$updated2 = mysqli_query($con,"UPDATE tbl_classes SET cl_name='$name',cl_addr='$address',cl_city='$city',cl_state='$state',cl_pin='$pin',cl_phno='$newphone',cl_eid='$email',cl_lmark='$lmark' WHERE cl_id='$id'");
		//$updated3 = mysqli_query($con,"UPDATE tbl_login SET phone_no='$newphone' WHERE login_id='$id'");
		
		
		if($updated2)
		{
			if(isset($_GET['id']))
			{
				header("location:manageclasses.php?ep=1");
			}
			else
			{
				header("location:dashboard.php?ep=1");
			}
		}
		else
		{
				echo "<font style='color:red'>Error...</font>";
		}
	}*/
			
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Edit Classes</title>
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
        Edit Classes
        <?php
if($type==0)
{	
		?>
        <small>Master Admin Panel Control</small>
		<?php
}
else if($type==1)
{
	?>
	<small>Admin Panel Control</small>
	<?php
}
		?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Classes</li>
      </ol>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
	  
	  <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" enctype="multipart/form-data" >
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Classes Name" value="<?php echo $name ?>" required />
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Classes Email" value="<?php echo $email ?>" required />
                </div>
				<div class="form-group">
                  <label>Phone No</label>
                  <input type="text" name="phone" maxlength="10" class="form-control" placeholder="Classes Phone Number" pattern="[6789][0-9]{9}" oninput="setCustomValidity('')" title='Enter 10 Digit mobile
number starting with 6 or 7 or 8 or 9' value="<?php echo $oldphone ?>" required />
                </div>
				<div class="form-group">
                 
				
				
                <!-- textarea -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="address" placeholder="Classes Address" required><?php echo $address ?></textarea>
                </div>
				<div class="form-group">
                  <label>Landmark</label>
                  <input type="text" name="lmark" class="form-control" placeholder="Area Landmark ..." value="<?php echo $lmark ?>" required />
                </div>
               <div class="form-group">
                  <label>Pin Code</label>
                  <input type="text" name="pin" class="form-control" placeholder="Area pin Code" value="<?php echo $pin ?>" required />
                </div>
				<div class="form-group">
                  <label>City</label>
                  <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $city ?>" required />
                </div>
				<div class="form-group">
                  <label>State</label>
                  <input type="text" name="state" class="form-control" placeholder="State" value="<?php echo $state ?>" required />
                </div>
                
               
                </div>
				<?php
				
	if(isset($_GET['id']))
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT active from tbl_classes WHERE cl_id=".$_GET['id']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['active'];
		//$m = $valuecl['cl_id'];
		if($type==0)
		{
		?>
		
		<div class="form-group" id ="h1" style="display: none;"><br/>
                  <label>Active</label>
                  <select class="form-control" name="cl_act" id="type" required>
                    <option selected hidden value="">Select Type</option>
					<option value="0">Non-Active</option>
                    <option value="1">Active</option>
                  </select>
				  </div>
				  
		<script type="text/javascript">
		document.getElementById("type").value="<?php echo $g ?>";			
		var h = document.getElementById("h1");			
		h.style.display ="block";
		</script>
		<?php
		}
		}
		?>
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

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
$(document).ready(function () {
$('#datepicker').datepicker({    
    endDate: '+1d',
    autoclose: true
});  });
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