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
		header("refresh:2 url=adduser.php");
	}
		$log = $_SESSION['log'];
		
		$qry = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($con,$qry);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
		$pass = $value['password'];
		$type = $value['type'];
		$c_id= $value['cl_id'];
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
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Add User</title>
  
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
        Add User
        <?php
if($type==0)
{
	?>
	<small>Master Admin Control</small>
	<?php
}
else if($type==1)
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
        <li class="active">Add User</li>
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
		
              <form role="form" method="POST" enctype="multipart/form-data" >
                <!-- select -->
                <div class="form-group">
                  <label>User Type</label>
                  <select class="form-control" name="user_type1" id="type" onchange="typeChange()" required>
                    <option selected hidden value="">Select Type</option>
					<option value="1">Classes User</option>
                    <option value="2">student</option>
                  </select>
				  
				
				  <?php
				
	if(isset($_GET['sel']))
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT cl_id,cl_name from tbl_classes WHERE cl_id=".$_GET['sel']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['cl_name'];
		$m = $valuecl['cl_id'];
		?>
	
		<div class="form-group" id ="h1" style="display: none;"><br/>
                  <label>Classes Name</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Search" value="<?php echo $g; ?>" readonly />
				  </div>
				  
		<script type="text/javascript">
		document.getElementById("type").value="1";			
		var h = document.getElementById("h1");			
		h.style.display ="block";
		</script>
		
		<?php
		
		}
		?>
		<?php
		if($c_id!=NULL)
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT cl_id,cl_name from tbl_classes WHERE cl_id=".$c_id."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['cl_name'];
		$m = $valuecl['cl_id'];
		?>
	
		<div class="form-group" id ="h1" style="display: none;"><br/>
                  <label>Classes Name</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Classes Name" value="<?php echo $g; ?>" readonly />
				  </div>
				  
		<script type="text/javascript">
		document.getElementById("type").value="1";			
		var h = document.getElementById("h1");			
		h.style.display ="block";
		</script>
		
		<?php
		
		}
		?>
                </div>
				
		
				<script>
				function typeChange() {
					var t = document.getElementById("type").value;
					//var x = document.getElementById("myDIV1");
					var y = document.getElementById("myDIV2");
					var a = document.getElementById("submit1");
					var b = document.getElementById("submit2");
					var c = document.getElementById("h1");
					if(t == "2")
					{
						/*y.style.display = "none";
						b.style.display = "none";
						//c.style.display = "none";
						alert(t);
					  if (x.style.display == "none") {
						x.style.display = "block";
						a.style.display ="block";
					  } */
					  location.href = 'addstudent.php';
					}
					
					else if(t == "1" || t == "3")
					{
						//x.style.display = "none";
						//a.style.display = "none";
						//alert(t);
					  if (y.style.display == "none") {
						  
						y.style.display = "block";
						b.style.display ="block";
						c.style.display ="block";
					  } 
					}
					
					 					
					else {
						x.style.display = "none";
						y.style.display = "none";
					  }	
				}
				</script>
				<?php if($c_id==NULL)
				{
					?>
				<div id="myDIV2" style="display: none;">
				<div class="form-group">
                  <label>Classes Name</label>
				  <div id="search_area">
                  <input type="text" name="class_search" id="class_search" class="form-control" autocomplete="off" placeholder="Search" value="<?php echo $m; ?>" />
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
   url:"fetchcl.php",
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
			</div>  
			<?php
				}
			?>
				<!-- text input -->
				<div class="form-group">
                  <label>Classes User Type</label>
                  <select class="form-control" name="user_type" required>
                    <option selected hidden value="">Select Type</option>
					<option value="1">Admin</option>
                    <option value="3">Tutor</option>
                  </select>
				  </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                </div>
				<!-- radio -->
                <div class="form-group">
				<label>Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="optionsRadios1" value="male" checked>
							Male
					 </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="optionsRadios2" value="female">
							Female
					  </label>
                  </div>
                  
                </div>
				<div class="form-group" >
                <label>Birth Date:</label>

					<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="dob1" class="form-control pull-right" placeholder="Enter Date of Birth" id="datepicker" autocomplete="off" required />
					</div>
					<!-- /.input group -->
				</div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                </div>
				<div class="form-group">
                  <label>Phone No</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" pattern="[6789][0-9]{9}" oninput="setCustomValidity('')" title='Enter 10 Digit mobile
number starting with 6 or 7 or 8 or 9' maxlength="10" required />
                </div>
				<div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass1" id ="pass1" class="form-control" placeholder="Enter Password" required />
                </div>
				<div class="form-group">
                  <label>Re-Enter Password</label>
                  <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Re Enter Password" oninput="check(this)" required />
					<script language='javascript' type='text/javascript'>
						function check(input) {
							if (input.value != document.getElementById('pass1').value) {
								input.setCustomValidity('Password Must be Matching.');
							} else {
								// input is valid -- reset the error message
								input.setCustomValidity('');
							}
						}
					</script>
                </div>
				<!-- textarea -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="address" placeholder="Enter Address" required></textarea>
                </div>    
				<div class="form-group">
                  <label>Add Profile Pic</label>
				  
                  <input type="file" id="profile-img" name="image" accept="image/png,image/jpg,image/jpeg" class="form-control" placeholder="">
					<div align="center"> 
						<!--<p class="square"> -->
					  <img src="<?php echo $def; ?>" id="profile-img-tag" alt="Profile Pic" width="200px" height="200px" style="border:5px solid #ffffff; background-color: #ffffff;" />


						<script type="text/javascript">
							function readURL(input) {
								if (input.files && input.files[0]) {
									var reader = new FileReader();
									
									reader.onload = function (e) {
										$('#profile-img-tag').attr('src', e.target.result);
									}
									reader.readAsDataURL(input.files[0]);
								}
							}
							$("#profile-img").change(function(){
								readURL(this);
							});
						</script>
					</div>	
					
				</div>
                
			  <div class="box-footer" style="float:right;display: block;">
                <input type="submit" id="submit2" name="submit" value="ADD" class="btn btn-primary" formaction="insert.php">
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
  <!-- Control Sidebar -->
   <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
$(document).ready(function () {
$('#datepicker').datepicker({  
	format: 'yyyy-mm-dd',
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
