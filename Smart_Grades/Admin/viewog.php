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
		$name="";

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
  <title>Smart Grades | Overall Analysis</title>
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
        Overall Analysis
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
        <li class="active">Overall Analysis</li>
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
			<?php
				
	if(isset($_GET['q']))
	{
		$g=$_GET['q'];
		$sqlcl="SELECT tbl_login.email_id,tbl_login.phone_no,tbl_detail.name FROM tbl_login INNER JOIN tbl_detail ON tbl_login.login_id=tbl_detail.login_id WHERE tbl_login.login_id=".$_GET['q']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$name = $valuecl['name'];
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
   url:"fetchstu1.php",
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


<?php 
if(isset($_GET['m']))
{
$query1="SELECT * FROM tbl_stuatt WHERE cor_id=".$_GET['m']." AND s_id=".$_GET['q']." AND attend=1";

				
					$res1 = mysqli_query($con,$query1);
					
					$count1= mysqli_num_rows($res1);
					
					$r1=0;
					$c1=0;
					if($count1>0)
						{
					while($v1 = mysqli_fetch_array($res1))
					{
						$query12="SELECT COUNT(a_id) as count FROM tbl_stuatt WHERE cor_id=".$_GET['m']." AND s_id=".$_GET['q'];
						$res12 = mysqli_query($con,$query12);
					
					$count12= mysqli_num_rows($res12);
					if($count12>0)
						{
					while($v12 = mysqli_fetch_array($res12))
					{
						$c1=$v12['count'];
					}
						}
						$r1=$r1+$v1['attend'];
						
					}
						}
$query2="SELECT * FROM tbl_fmrk WHERE cor_id=".$_GET['m']." AND stu_id=".$_GET['q']." AND a_id IS NOT NULL";

//echo $query2;				
					$res2 = mysqli_query($con,$query2);
					
					$count2= mysqli_num_rows($res2);
					$r2=0;
					$c2=0;
					if($count2>0)
						{
					while($v2 = mysqli_fetch_array($res2))
					{
						$r2=$r2+$v2['ob_m'];
						$y2=$v2['a_id'];
						$query22="SELECT * FROM tbl_stuassi WHERE a_id=".$y2." AND cor_id=".$_GET['m'];
						
						$res22 = mysqli_query($con,$query22);
					
					$count22= mysqli_num_rows($res22);
					if($count22>0)
						{
					while($v22 = mysqli_fetch_array($res22))
					{
						$c2=$c2+$v22['a_mrk'];
					}
						}
					}
						}
						//echo $r2;
$query3="SELECT * FROM tbl_fmrk WHERE cor_id=".$_GET['m']." AND stu_id=".$_GET['q']." AND e_id IS NOT NULL";

//echo $query2;				
					$res3 = mysqli_query($con,$query3);
					
					$count3= mysqli_num_rows($res3);
					$r3=0;
					$c3=0;
					if($count3>0)
						{
					while($v3 = mysqli_fetch_array($res3))
					{
						//SUM(ob_m) as sum
						$r3=$r3+$v3['ob_m'];
						$y3=$v3['e_id'];
						$query32="SELECT * FROM tmp_exam WHERE e_built=1 AND e_id=".$y3." AND cor_id=".$_GET['m'];
						$res32 = mysqli_query($con,$query32);
					//echo $query32;
					$count32= mysqli_num_rows($res32);
					if($count32>0)
						{
					while($v32 = mysqli_fetch_array($res32))
					{
						//SUM(e_tm) as count
						$c3=$c3+$v32['e_tm'];
					}
						}
					}
						}
if($c1!=0)
{
$t1=($r1/$c1)* 20;
}
else
{
	$t1=0;
}
if($c2!=0)
{
$t2=($r2/$c2)* 30;
}
else
{
	$t2=0;
}
if($c3!=0)
{
$t3=($r3/$c3)* 50;
}
else
{
	$t3=0;
}
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">


            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Order', 'Amount'],
                        ['Exam Marks '+<?php echo round($c3,2); ?>, parseInt('<?php echo $r3; ?>')],
                        ['Assignment Marks '+<?php echo round($c2,2);?>,       parseInt('<?php echo $r2; ?>')],
						['attendance '+<?php echo round($c1,2); ?>,       parseInt('<?php echo $r1; ?>')]
                ]); 

                var options = {
					pieHole: 0.4,
					sliceVisibilityThreshold:0,
                };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
					//draw(data, );

                    chart.draw(data, options);
                }

        </script>				
				
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Student Name" required readonly />
                </div>
				<br/><br/>
				<?php
				if(isset($_GET['q']))
				{
					?>
					<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Overall Analysis</h3>

            </div><center>
            <div class="box-body" style="width:100%; height:500px;">
              <div id="piechart" style="width:100%; height:100%;"></div>
			 </div></center><hr>
			 <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
			  <tr>
			  <td>
			  <label>Exam Average: </label>
			  </td>
			  <td  align="right">
			  <label><?php echo round($t3,2) ?></label>
			  </td>
			  <td><label>/ 50%</label>
			  </td>
			  </tr>
			  <tr>
			  <td>
			  <label>Assignment Average:</label>
			  </td>
			  <td  align="right">
			  <label><?php echo round($t2,2) ?></label>
			  </td>
			  <td><label>/ 30%</label>
			  </td>
			  </tr>
			  <tr>
			  <td>
			  <label>Attendance Average:</label> 
			  </td>
			  <td  align="right"><label><?php echo round($t1,2) ?></label>
			  </td>
			  <td><label>/ 20%</label>
			  </td>
			  </tr>
			  <tr>
			  <td>
			  <label>Total:</label>
			  </td>
			  <td align="right"><label><?php echo round(($t1+$t2+$t3),2) ?></label>
			  </td>
			  <td><label>/ 100%</label>
			  </td></tr>
            </table>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
					<?php
				}
}
				?>
              </form>
			 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
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
<script src="bower_components/chart.js/Chart.js"></script>
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
