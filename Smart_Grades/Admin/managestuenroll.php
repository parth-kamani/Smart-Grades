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
			echo "<script>alert('Student Enrollment Updated');</script>";
		header("refresh:1 url=managestuenroll.php");
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
		$mq="";
?>
				
<?php
				
	if(isset($_GET['del']))
	{
		
		$sql1="UPDATE tbl_stuenro SET active=0 WHERE s_id=".$_GET['del']."";
		$result=mysqli_query($con,$sql1);
		header("location:managestuenroll.php");
	}
?>
             

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Manage Student Enrollement</title>
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
        Manage Student Enrollement
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
		<li class="active">Manage Student Enrollement</li>
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
		<?php
				
	if(isset($_GET['sel']))
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT cor_name from tbl_course WHERE cor_id=".$_GET['sel']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['cor_name'];
		$m = $_GET['sel'];
		
			   $t="managestuenroll.php?sel=".$_GET['sel']."&&show=all";
			   $y="managestuenroll.php?sel=".$_GET['sel']."&&show=paid";
			   $u="managestuenroll.php?sel=".$_GET['sel']."&&show=unpaid";
			   $k="managestuenroll.php?sel=".$_GET['sel']."&&show=completed";
			   $l="managestuenroll.php?sel=".$_GET['sel']."&&show=uncompleted";
			   $j="managestuenroll.php?sel=".$_GET['sel']."&&show=non-active";
		}
		?>	
		
		<div>
		<form role="form" method="POST" enctype="multipart/form-data" >
				<div class="form-group">
                  <label>Course Name</label>
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
   url:"fetchcor.php",
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
				</div>
				<div class="row">
	    <div class="col-xs-12">
		<div id="h1" style="display: none;">
          <div>
		  		  
            <div class="box-header">
			<div style="float:left" class="input-group col-xs-5">
			<!--<div class="col-xs-2">-->
			
                  <span class="input-group-addon" id ="cs"><span class="glyphicon glyphicon-search"></span></span>
				  
                  <input type="text" name="class_search3" id="class_search3" class="form-control" autocomplete="off" placeholder="Search" value="<?php echo $mq; ?>" onkeydown="a()" />
			
	
            </div>
				<div style="float:right">
			  <div class="btn-group">
			  
    <a class="btn btn-primary" id ="all" href=<?php echo $t ?>>All</a>
	<a class="btn btn-primary" id ="paid" href=<?php echo $y ?>>Paid</a>
    <a class="btn btn-primary" id ="unpaid" href=<?php echo $u ?>>Unpaid</a>
	<a class="btn btn-primary" id ="comp" href=<?php echo $k ?>>Course Completed</a>
	<a class="btn btn-primary" id ="ucomp" href=<?php echo $l ?>>Course Uncompleted</a>
	<a class="btn btn-primary" id ="nact" href=<?php echo $j ?>>Non-Active</a>
  </div>         
  </div>
  
            </div>
            <!-- /.box-header -->
			<div id="div2" style="display:block">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>ID</th>
				  <th>Name</th>
                  <th>Course Name</th>
				  <th>Fees Paid</th>
                  <th>Action</th>
                </tr>
				
				<?php
				
					if(isset($_GET['show']))
					{
						$show= $_GET['show'];
						if($show == "all")
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('all').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m";
						}
						else if($show == "paid")
						{	
							echo "
								<script type=\"text/javascript\">
								document.getElementById('paid').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m AND fees_paid=1 AND active=1";
						}
						else if($show == 'unpaid')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('unpaid').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m AND fees_paid=0 AND active=1";
						}
						else if($show == 'completed')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('comp').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m AND comp=1 AND active=1";
						}
						else if($show == 'uncompleted')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('ucomp').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m AND comp=0 AND active=1";
						}
						else if($show == 'non-active')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('nact').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m AND active=0";
						}
					}
					else if(!isset($_GET['show']))
					{
						echo "
								<script type=\"text/javascript\">
								document.getElementById('all').className = 'btn btn-primary active';
								</script>
							";
						$query="SELECT * FROM tbl_stuenro WHERE cor_id=$m";
					}
					
					$result2 = mysqli_query($con,$query);
					$count= mysqli_num_rows($result2);
					$seq=1;
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
					$x=$value2['login_id'];
					$y=$value2['cor_id'];
					$q1="SELECT name FROM tbl_detail WHERE login_id=$x";
					$r1 = mysqli_query($con,$q1);
					$v1 = mysqli_fetch_array($r1);
					$q2="SELECT cor_name FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($con,$q2);
					$v2 = mysqli_fetch_array($r2);
					if($value2['fees_paid']==0)
					{
						$fp="NO";
					}
					else
					{
						$fp="YES";
					}
				?>
                <tr>
                  <td><?php echo $seq;?></td>
                  
                  <td><?php echo $v1['name'];?></td>
				  <td><?php echo $v2['cor_name'];?></td>
                  <td><?php echo $fp;?></td>
				  
				  <td>
				<?php
				$comp= $value2['comp'];
				  if($comp==0)
				  {
					  ?>
				  <a class="btn btn-success btn-xs" href="editstuenroll.php?id=<?php echo $value2['s_id'];?> " 
					onclick="return confirm('sure to edit?');">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="?del=<?php echo $value2['s_id'];?>" 
					onclick="return confirm('sure to delete?');">DELETE</a>
					
					<?php
				  }
				  else
				  {
					  ?>
					  <label>Completed</label>
					  <?php
				  }
					?>
					</td>
				</tr>
				
				<?php
					$seq++;
					}
					}
						else
					{
						?>
						<td colspan="8"><center><label>No Records</label></center></td>
						<?php
					}
					?>
					

              </table>
            </div>
			</div>
			<div id="div1" style="display:none">
          <div id="class_data8"></div>
		  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
	 var a= <?php echo $_GET['sel'];?>;
	
  $.ajax({
   url:"fetchstuenro2.php?sel="+a,
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#class_data8').html(data);
   }
  });
 }
 $('#class_search3').keyup(function(){
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
<script>
			function a() {
					var t = document.getElementById("class_search3").value;
					//var x = document.getElementById("myDIV1");
					var y = document.getElementById("div1");
					var z = document.getElementById("div2");
					if(t.value == "")
					{
						
					  y.style.display = "none";
					  if (z.style.display == "none") {
						z.style.display = "block";
						
					  }
					}
					
					else if(t.value != "")
					{
						z.style.display = "none";
					  if (y.style.display == "none") {
						  
						y.style.display = "block";
						document.getElementById('all').className = 'btn btn-primary active';
						document.getElementById('present').className = 'btn btn-primary';
						document.getElementById('absent').className = 'btn btn-primary';
					  }
					}
					
					 					
					else {
						y.style.display = "none";
						z.style.display = "block";
					  }	
				}
				</script>
			<?php
				
	if(isset($_GET['sel']))
	{
		?>
	
		<script type="text/javascript">		
		document.getElementById("h1").style.display ="block";
		</script>
		
		<?php
		
		}
		?>
            <!-- /.box-body -->
			</div>
			
			
          </div>
          <!-- /.box -->
		  
	
        </div>
        </div>
      <!-- /.row (main row) -->
</div>
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