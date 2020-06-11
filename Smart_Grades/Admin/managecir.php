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
		header("refresh:1 url=managecir.php");
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
		$fp="";
		$gp="";
?>       
<?php
				
	if(isset($_GET['del']))
	{
		
		$sql1="UPDATE tbl_cir SET valid=0 WHERE ci_id=".$_GET['del']."";
		$result=mysqli_query($con,$sql1);
		header("location:manageusers.php");
	}
?>		    
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Manage Circular</title>
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
        Manage Circular
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
		<li class="active">Manage Circular</li>
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
				
	/*if(isset($_GET['sel']))
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT cor_name from tbl_course WHERE cor_id=".$_GET['sel']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['cor_name'];
		$m = $_GET['sel'];
		
		}*/
		?>	
		
		<div>
		<form role="form" method="POST" enctype="multipart/form-data" >
				
				<div class="row">
	    <div class="col-xs-12">
		
<div>
<br/>&nbsp;
			 <div class="btn-group" >
			  
    <a class="btn btn-primary" id ="all" href="managecir.php?show=all">All</a>
	<a class="btn btn-primary" id ="active" href="managecir.php?show=active">Active</a>
    <a class="btn btn-primary" id ="n-active" href="managecir.php?show=non-active">Non-active</a>
           
  </div></div><br/>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>Uploaded Date</th>
				  <th>Name</th>
				  <th>Description</th>
                  <th>Status</th>
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
							$query="SELECT * FROM tbl_cir WHERE cl_id=$c_id ORDER BY ci_date DESC";
						}
						else if($show == "active")
						{	
							echo "
								<script type=\"text/javascript\">
								document.getElementById('active').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_cir WHERE cl_id=$c_id AND valid=1 ORDER BY ci_date DESC";
						}
						else if($show == 'non-active')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('n-active').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_cir WHERE cl_id=$c_id AND valid=0 ORDER BY ci_date DESC";
						}
					}
					else if(!isset($_GET['show']))
					{
						echo "
								<script type=\"text/javascript\">
								document.getElementById('all').className = 'btn btn-primary active';
								</script>
							";
						$query="SELECT * FROM tbl_cir WHERE cl_id=$c_id ORDER BY ci_date DESC";
					}
					$result2 = mysqli_query($con,$query);
					
					$count= mysqli_num_rows($result2);
					$seq=1;
					$r=0;
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
						
					$x=$value2['ci_name'];
					$y=$value2['cl_id'];
					$w=$value2['ci_date'];
					//$v=$value2['ch_id'];
					$b=$value2['ci_desc'];
					$u=$value2['valid'];
					$a=$value2['ci_url'];
					
					if($u==1)
					{
						$u1="Active";
					}
					else
					{
						$u1="Non-Active";
					}
					$hj=strlen($value2['ci_desc']);
					//$bv="";
					if($hj>25)
					{
						$bv=substr($value2['ci_desc'],0,25);
						$bv.="...";
					}
					else
					{
						$bv=$value2['ci_desc'];
					}
				?>
                
                <tr>
                  <td><?php echo $w;?></td>
                  <td><?php echo $x;?></td>
				  <td><?php echo $bv;?></td>
				  <td><?php echo $u1;?></td>				  
				  <td>
				  <button type="button" class="btn btn-info btn-xs view_data" data-toggle="modal" id="<?php echo $value2['ci_id'];?>">VIEW</button>&nbsp;&nbsp;
				  <a class="btn btn-primary btn-xs" href="editcir.php?id=<?php echo $value2['ci_id'];?> " 
					onclick="return confirm('sure to edit?');">EDIT</a>
					 <a class="btn btn-danger btn-xs" href="?del=<?php echo $value2['ci_id'];?>" 
					onclick="return confirm('sure to delete?');">DELETE</a>
					</td>
				</tr>
				
				<?php
					$seq++;
					//$d++;
					}
						}
					else
					{
						?>
						<td colspan="6"><center><label>No Records</label></center></td>
						<?php
					}
					
					?>

              </table>
			  </div>
			  <div id="dataModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Circular Details</h4>  
                </div>  
                <div class="modal-body" id="ch_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
 <script>  
 $(document).ready(function(){
			$(document).on('click', '.view_data', function(){  
           var ch_id = $(this).attr("id");  
           if(ch_id != '')  
           {  
                $.ajax({  
                     url:"viewcir.php",  
                     method:"POST",  
                     data:{ch_id:ch_id},  
                     success:function(data){  
                          $('#ch_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });
</script>
			  </form>
            </div>
</div>			
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
	format: 'yyyy-mm-dd',
   
    endDate: '+0d',
    autoclose: true
});  });
</script>
<!-- jQuery 3 -->
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