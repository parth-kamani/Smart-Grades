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
		
		$sql = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($con,$sql);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
		$email = $value['email_id'];
		$phone = $value['phone_no'];
		$type = $value['type'];
		$c_id=$value['cl_id'];
		
		$qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$qry);
		$value1 = mysqli_fetch_array($result1);
		
		$n = $value1['name'];
		$i = $value1['profile_pic'];
		$dob = $value1['dob'];
		$g="";
?><?php
				
	if(isset($_GET['del']))
	{
		
		$sql1="UPDATE tmp_exam SET valid=0 WHERE e_id=".$_GET['del']."";
		
		$result=mysqli_query($con,$sql1);
		header("location:buqp.php");
	}
?>
				
       

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Manage Non-Completed Papers</title>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
        Manage Non-Completed Papers
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
		<li class="active">Manage Non-Completed Papers</li>
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
          <div>
		  
		  <?php
		  if(isset($_GET['sel']))
		  {
			  $g1=$_GET['sel'];
			  $u1="buqp.php?sel=".$_GET['sel']."&&show=all";
			  $u2="buqp.php?sel=".$_GET['sel']."&&show=active";
			  $u3="buqp.php?sel=".$_GET['sel']."&&show=deleted";
		  ?>
            <div class="box-header">
			
              
				<div style="float:right">
			  <div class="btn-group">
    <a class="btn btn-primary" id ="all" href="<?php echo $u1;?>">All</a>
	<a class="btn btn-primary" id ="active" href="<?php echo $u2;?>">Active</a>
    <a class="btn btn-primary" id ="deleted" href="<?php echo $u3;?>">Deleted</a>
  </div>
 
  </div>
<div class="form-group">
                  <label>*NOTE: Exam Paper will appeare in Question Paper Build Page until the Marks will be same as mentioned</label>
                </div>   
            </div>
			
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>Exam ID</th>
                  <th>Name</th>
				  <th>Marks</th>
				  <th>current Marks</th>
				  <th>Date</th>
                  <th>Course</th>
                  <th>Action </th>
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
							$query="SELECT * FROM tmp_exam WHERE cl_id=".$c_id." AND e_built=0 AND cor_id=".$g1;
						}
						else if($show == "active")
						{	
							echo "
								<script type=\"text/javascript\">
								document.getElementById('active').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tmp_exam WHERE cl_id=".$c_id." AND e_built=0 AND valid=1 AND cor_id=".$g1;
						}
						else if($show == 'deleted')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('deleted').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tmp_exam WHERE cl_id=".$c_id." AND e_built=0 AND valid=0 AND cor_id=".$g1;
						}
					}
					else if(!isset($_GET['show']))
					{
						echo "
								<script type=\"text/javascript\">
								document.getElementById('all').className = 'btn btn-primary active';
								</script>
							";
						$query="SELECT * FROM tmp_exam WHERE cl_id=".$c_id." AND e_built=0 AND cor_id=".$g1;	
					}
					$result2 = mysqli_query($con,$query);
					$seq=1;
					while($value2 = mysqli_fetch_array($result2))
					{
						$co=$value2['cor_id'];
						$query2="SELECT cor_name FROM tbl_course WHERE cor_id =".$co;
					$result12 = mysqli_query($con,$query2);
					$val4 = mysqli_fetch_array($result12);
					$cor= $val4['cor_name'];
						$query1="SELECT SUM(q_mrk) as sum FROM tmp_que WHERE e_id =".$value2['e_id'];
					$result11 = mysqli_query($con,$query1);
					$val3 = mysqli_fetch_array($result11);
					$rf= $val3['sum'];
					if(!$rf)
					{
						$rf1="0.00";
					}
					else
					{
						$rf1=$rf;
					}
					$v= $value2['valid'];
				?>
                <tr>
                  <td><?php echo $seq;?></td>
                  <td><?php echo $value2['e_name'];?></td>
                  <td><?php echo $value2['e_tm'];?></td>
				  <td><?php echo $rf1;?></td>
				  <td><?php echo $value2['e_date'];?></td>
                  <td><?php echo $cor;?></td>
				  
				  <td> <?php 
				  if($v!=0)
				  {
				  ?>
				  <a class="btn btn-success btn-xs" href="creqp.php?qr=<?php echo $value2['e_id'];?> " 
				  onclick="return confirm('sure to edit?');">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="?del=<?php echo $value2['e_id'];?>" 
					onclick="return confirm('sure to delete?');">DELETE</a><?php }
					if($v==0)
					{
						?>
						<a class="btn btn-info btn-xs" href="editexam.php?qt=<?php echo $value2['e_id'];?> " 
				  onclick="return confirm('sure to edit?');">EDIT</a>
						<?php
					}
					?>
					</td>
				</tr>
				
				<?php
					$seq++;
					}
					
					?>
					

              </table>
            </div>
            <!-- /.box-body -->
			
			<?php  
		  }
				
			?>
			
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