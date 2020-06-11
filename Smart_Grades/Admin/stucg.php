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
		$type = $value['type'];
		$qid=$value['cl_id'];
		$sql = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$sql);
		$value1 = mysqli_fetch_array($result1);
		
		$n = $value1['name'];
		$i = $value1['profile_pic'];
		$d = $value1['dob'];
		$g="";

		$sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id=0";
		$result2 = mysqli_query($con,$sql1);
		$value2 = mysqli_fetch_array($result2);
		$def =$value2['profile_pic'];
		$name="";

?>
<?php
if(isset($_POST['sub2']))
	{
		$q=$_GET['cr'];
		$m=$_GET['tr'];
		$c=$_POST['ch_n'];
		$d="stucg.php?cr=".$q."&&tr=".$m."&&ch=".$c;
		header("location:".$d);
 
	}
	?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Chapterwise Analysis</title>
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
		include("head2.php");
		?>
		<div class="modal fade" id="select" tabindex="-1" role="dialog" aria-labelledby="select" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
			   <div style="float:left">
                  <h3 class="modal-title" id="select">Select Course</h3>
				  </div>
                  
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form role="form" method="POST" enctype="multipart/form-data" >
                        <div class="fields-grid"><center>
                         <div class="control-group form-group">
						 <div id="div2" style="display:block">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>Course</th>
				  <th>Classes</th>
                  <th></th>
                </tr>
						 <?php
						 if($type==2)
						 {
						 $query="SELECT * FROM tbl_stuenro WHERE login_id='$id' AND active=1";
						 
						 $result2 = mysqli_query($con,$query);
					$count= mysqli_num_rows($result2);
					$seq=1;
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
					$x=$value2['cl_id'];
					$y=$value2['cor_id'];
					
					$q2="SELECT cor_name,cl_id FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($con,$q2);
					$v2 = mysqli_fetch_array($r2);
					
					$q1="SELECT cl_name FROM tbl_classes WHERE cl_id=$x";
					$r1 = mysqli_query($con,$q1);
					$v1 = mysqli_fetch_array($r1);
					$y=$v1['cl_name'];
					?>
                <tr>
                  <td><?php echo $v2['cor_name'];?></td>
				  <td><?php echo $v1['cl_name'];?></td>
				  
				  <td>
				
				  <a class="btn btn-success btn-xs" href="stucg.php?cr=<?php echo $value2['cl_id'];?>&&tr=<?php echo $value2['cor_id'];?>" >Select</a> &nbsp;&nbsp;
				  
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
						<td><div class="controls">
                         <button type="submit" class="btn subscrib-btnn btn-danger btn-lg btn-block" formaction="../Admin/logout.php">Logout</button>
						 </div>
						 </td>
						<?php
					}
						 }
						 if($type==4)
						 {
							$rowsql = mysqli_query($con,"SELECT stu_id FROM tbl_detail WHERE login_id='$id'");
			
		$row = mysqli_fetch_array($rowsql);
		$rid = $row['stu_id']; 
						 $query="SELECT * FROM tbl_stuenro WHERE login_id='$rid' AND active=1";
						 
						 $result2 = mysqli_query($con,$query);
					$count= mysqli_num_rows($result2);
					$seq=1;
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
					$x=$value2['cl_id'];
					$y=$value2['cor_id'];
					
					$q2="SELECT cor_name,cl_id FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($con,$q2);
					$v2 = mysqli_fetch_array($r2);
					
					$q1="SELECT cl_name FROM tbl_classes WHERE cl_id=$x";
					$r1 = mysqli_query($con,$q1);
					$v1 = mysqli_fetch_array($r1);
					$y=$v1['cl_name'];
					?>
                <tr>
                  <td><?php echo $v2['cor_name'];?></td>
				  <td><?php echo $v1['cl_name'];?></td>
				  
				  <td>
				
				  <a class="btn btn-success btn-xs" href="stucg.php?cr=<?php echo $value2['cl_id'];?>&&tr=<?php echo $value2['cor_id'];?>" >Select</a> &nbsp;&nbsp;
				  
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
						<td><div class="controls">
                         <button type="submit" class="btn subscrib-btnn btn-danger btn-lg btn-block" formaction="../Admin/logout.php">Logout</button>
						 </div>
						 </td>
						<?php
					}
						 }
					?>
					

              </table>
            </div>
					
                        </div>
						</div>
						</div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <?php
		include("menu.php");
	  ?>
		<?php
if(!isset($_GET['tr']))
			{
			?>
			<script>
    $(window).on('load',function(){
        $('#select').modal('show');
    });
	</script>
	<?php
			}
	?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chapterwise Analysis
        <?php
if($type==2)
{
	?>
	<small>Student Panel Control</small>
	<?php
}
else if($type==4)
{
	?>
	<small>Parent Panel Control</small>
	<?php
}
		?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Chapterwise Analysis</li>
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
				
	if(isset($_GET['tr']))
	{
		$g=$id;
		$sqlcl="SELECT tbl_login.email_id,tbl_login.phone_no,tbl_detail.name FROM tbl_login INNER JOIN tbl_detail ON tbl_login.login_id=tbl_detail.login_id WHERE tbl_login.login_id=".$id."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$name = $valuecl['name'];
		}
		?>
             
<?php
if(isset($_GET['tr']))
					{
						?>
						<form role="form" method="POST" enctype="multipart/form-data" >
			<div style="display: block;">
			
				<div class="form-group">
                  <label>Select Chapter</label>
				  <select class="form-control" id="ch_n" name="ch_n" required onchange="ab(this)">
                    <option selected hidden value="">Select Chapter</option>
				  <?php
				$sql10 = "SELECT ch_num,ch_name FROM tbl_chapters where cor_id=".$_GET['tr'];
$result10 = mysqli_query($con,$sql10);


while ($row10 = mysqli_fetch_array($result10)) {
    echo "<option value='" . $row10['ch_num'] ."'>" . $row10['ch_num'] ." : " . $row10['ch_name'] ."</option>";
}
				  
?></select>
</div>
<button class="btn btn-info btn-xl" name="sub2" id="sub2">Select</button>
</div>
</form>
						<?php
					}
						?>

<?php 
if(isset($_GET['ch']))
{
	
$query1="SELECT * FROM tbl_stuatt WHERE cor_id=".$_GET['tr']." AND ch_id=".$_GET['ch']." AND s_id=".$id." AND attend=1";

				
					$res1 = mysqli_query($con,$query1);
					
					$count1= mysqli_num_rows($res1);
					
					$r1=0;
					$c1=0;
					if($count1>0)
						{
					while($v1 = mysqli_fetch_array($res1))
					{
						$query12="SELECT COUNT(a_id) as count FROM tbl_stuatt WHERE cor_id=".$_GET['tr']." AND ch_id=".$_GET['ch']." AND s_id=".$id;
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
$query2="SELECT * FROM tbl_stuassi WHERE ch_id=".$_GET['ch']." AND cor_id=".$_GET['tr'];

//echo $query2;				
					$res2 = mysqli_query($con,$query2);
					
					$count2= mysqli_num_rows($res2);
					$r2=0;
					$c2=0;
					if($count2>0)
						{
					while($v2 = mysqli_fetch_array($res2))
					{
						$c2=$c2+$v2['a_mrk'];
						$y2=$v2['a_id'];
						$query22="SELECT * FROM tbl_fmrk WHERE a_id=".$y2." AND cor_id=".$_GET['tr']." AND stu_id=".$id." AND a_id IS NOT NULL";
						$res22 = mysqli_query($con,$query22);
					
					$count22= mysqli_num_rows($res22);
					if($count22>0)
						{
					while($v22 = mysqli_fetch_array($res22))
					{
						$r2=$r2+$v22['ob_m'];
						
					}
						}
					}
						}
						//echo $r2;
$query3="SELECT * FROM tbl_fmrk WHERE cor_id=".$_GET['tr']." AND stu_id=".$id." AND e_id IS NOT NULL";

//echo $query2;				
					$res3 = mysqli_query($con,$query3);
					
					$count3= mysqli_num_rows($res3);
					$r3=0;
					$c3=0;
					if($count3>0)
					{
						while($v3 = mysqli_fetch_array($res3))
						{
							$y3=$v3['e_id'];
							$query32="SELECT * FROM tbl_stures WHERE stu_id=".$id." AND e_id=".$y3." AND cor_id=".$_GET['tr'];
							$res32 = mysqli_query($con,$query32);
							$count32= mysqli_num_rows($res32);
							if($count32>0)
							{
								while($v32 = mysqli_fetch_array($res32))
								{
									$y31=$v32['q_id'];
									$query323="SELECT * FROM tmp_que WHERE e_id=".$y3." AND q_id=".$y31;
									$res323 = mysqli_query($con,$query323);
									$count323= mysqli_num_rows($res323);
									if($count323>0)
									{
										while($v323 = mysqli_fetch_array($res323))
										{
											$y31=$v323['q_queid'];
											$query3231="SELECT * FROM tbl_qdb WHERE ch_id=".$_GET['ch']." AND que_id=".$y31." AND cor_id=".$_GET['tr'];
											$res3231 = mysqli_query($con,$query3231);
											$count3231= mysqli_num_rows($res3231);
											if($count3231>0)
											{
												while($v3231 = mysqli_fetch_array($res3231))
												{
													$c3=$c3+$v3231['que_mrk'];
													$r3=$r3+$v32['ob_mark'];
												}
											}
										}
									}
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
<script type="text/javascript">
		document.getElementById("ch_n").value="<?php echo $_GET['ch']; ?>";
		//document.getElementById("h2").style.display ="block";
		</script>
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
				<br/> 
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Student name ..." required readonly />
                </div>
				<br/><br/>
				<?php
				if(isset($_GET['ch']))
				{
					?>
					<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Chapter Analysis</h3>

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
