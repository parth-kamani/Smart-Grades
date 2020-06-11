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
		header("refresh:1 url=managestuatt.php");
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
		$mq="";
?>
<?php
				
	if(isset($_POST['sub']))
	{
		$fp=$_POST['ch_n'];
		$gp=$_POST['cdate'];
		
		$yu=$_SERVER['REQUEST_URI'];
		
		
		//$u= $_SERVER['REQUEST_URI'];
 //echo $yu;

 $i = strpos($yu,"&&qt=");
 if($i == FALSE)
 {
	 $o=$yu;
	 $qw=$o;
		$qw.="&&qt=".$fp;
		$qw.="&&qr=".$gp;
		header("location:".$qw);
 }
 else{
	 echo $i;
 $o= substr($yu,0,$i);
 
 $qw=$o;
 
		$qw.="&&qt=".$fp;
		$qw.="&&qr=".$gp;
		header("location:".$qw);
 }
 
	}
	if(isset($_GET['qr']))
	{
		$gp=$_GET['qr'];
		$fp=$_GET['qt'];
		$t="managestuatt.php?sel=".$_GET['sel']."&&qt=".$_GET['qt']."&&qr=".$_GET['qr']."&&show=all";
			   $y="managestuatt.php?sel=".$_GET['sel']."&&qt=".$_GET['qt']."&&qr=".$_GET['qr']."&&show=pre";
			   $u="managestuatt.php?sel=".$_GET['sel']."&&qt=".$_GET['qt']."&&qr=".$_GET['qr']."&&show=ab";
		
	}
	
?>         
		    
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Manage Student Attendance</title>
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
        Manage Student Attendance
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
		<li class="active">Manage Student Attendance</li>
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
		<div id="h1" style="display: none;">
          <div>
		  		  
            <div class="box-header">				
  
            <!-- /.box-header -->
			<form role="form" method="POST" enctype="multipart/form-data" >
			<div class="box-footer" style="float:right;display: block;">
			<div class="form-group" >
                <label>Date:</label>

					<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="cdate" class="form-control pull-right" placeholder="Date of Lecture Conducted" id="datepicker" autocomplete="off" value="<?php echo $gp; ?>" required />
					</div>
					<!-- /.input group -->
				</div>
				
				<div class="form-group">
                  <label>Select Chapter</label>
				  <select class="form-control" id="ch_n" name="ch_n" value="<?php echo $fp; ?>" required>
                    <option selected hidden value="">Select Chapter</option>
				  <?php
				$sql10 = "SELECT ch_num,ch_name FROM tbl_chapters where cor_id=".$_GET['sel'];
$result10 = mysqli_query($con,$sql10);


while ($row10 = mysqli_fetch_array($result10)) {
    echo "<option value='" . $row10['ch_num'] ."'>" . $row10['ch_num'] ." : " . $row10['ch_name'] ."</option>";
}
				  
?></select>
<br/>
<button class="btn btn-info btn-xl" name="sub" id="sub">Search</button>
</div>

<div id="h2" style="display: none;">
<div style="float:left" class="input-group col-xs-5">
			<!--<div class="col-xs-2">-->
			
                  <span class="input-group-addon" id ="cs"><span class="glyphicon glyphicon-search"></span></span>
				  
                  <input type="text" name="class_search3" id="class_search3" class="form-control" autocomplete="off" placeholder="Search by Date" value="<?php echo $mq; ?>" onkeydown="a()" />
			
	
            </div>
				<div style="float:right">
			  <div class="btn-group" >
			  
    <a class="btn btn-primary" id ="all" href=<?php echo $t ?>>All</a>
	<a class="btn btn-primary" id ="present" href=<?php echo $y ?>>Present</a>
    <a class="btn btn-primary" id ="absent" href=<?php echo $u ?>>Absent</a>
        </div>   
  </div><br/><br/>
			<div id="div2" style="display:block">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>ID</th>
				  <th>Name</th>
                  <th>Course Name</th>
				  <th>Chapter</th>
				  <th>Date</th>
                  <th>Attendance</th>
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
							$query="SELECT * FROM tbl_stuatt WHERE cor_id=$m AND c_date='$gp' AND ch_id=$fp";
						}
						else if($show == "pre")
						{	
							echo "
								<script type=\"text/javascript\">
								document.getElementById('present').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuatt WHERE cor_id=$m AND attend=1 AND c_date='$gp' AND ch_id=$fp";
						}
						else if($show == 'ab')
						{
							echo "
								<script type=\"text/javascript\">
								document.getElementById('absent').className = 'btn btn-primary active';
								</script>
							";
							$query="SELECT * FROM tbl_stuatt WHERE cor_id=$m AND c_date='$gp' AND attend=0 AND ch_id=$fp";
						}
					}
					else if(!isset($_GET['show']))
					{
						echo "
								<script type=\"text/javascript\">
								document.getElementById('all').className = 'btn btn-primary active';
								</script>
							";
						$query="SELECT * FROM tbl_stuatt WHERE cor_id=$m AND c_date='$gp' AND ch_id=$fp";
					}
					$result2 = mysqli_query($con,$query);
					
					$count= mysqli_num_rows($result2);
					$seq=1;
					$r=0;
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
						
					$x=$value2['s_id'];
					$y=$value2['cor_id'];
					$w=$value2['c_date'];
					$v=$value2['ch_id'];
					$u=$value2['attend'];
					$q1="SELECT name FROM tbl_detail WHERE login_id=$x";
					$r1 = mysqli_query($con,$q1);
					$v1 = mysqli_fetch_array($r1);
					$q2="SELECT cor_name FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($con,$q2);
					$v2 = mysqli_fetch_array($r2);
					$q3="SELECT ch_name FROM tbl_chapters WHERE ch_id=$v";
					$r3 = mysqli_query($con,$q3);
					$v3 = mysqli_fetch_array($r3);
					if($u==1)
					{
						$u1="Present";
					}
					else
					{
						$u1="Absent";
					}
				?>
                
                <tr>
                  <td><?php echo $seq;?><input type="text" id="p" name="<?php echo 'p['.$d.']';?>" value="<?php echo $x;?>" hidden></td>
                  <td><?php echo $v1['name'];?></td>
				  <td><?php echo $v2['cor_name'];?></td>
				  <td><?php echo $v." : ".$v3['ch_name'];?></td>
				  <td><?php echo $w;?></td>
				  <td><?php echo $u1;?></td>
				  
			<td>
			<a class="btn btn-primary btn-xs" href="editstuatt.php?id=<?php echo $value2['a_id'];?> " 
					onclick="return confirm('sure to edit?');">EDIT</a>
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
						<td colspan="7"><center><label>No Records</label></center></td>
						<?php
					}
					
					?>

              </table>
			  </div>
			  </div>
			  </form>
            </div>
			<div id="div1" style="display:none">
          <div id="class_data8"></div>
		  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
	 var a= <?php echo $_GET['sel'];?>;
	 var d = getQueryVariable("qr");
	 function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
	 //var b=d.toString();
	 var c=<?php echo $_GET['qt'];?>;
  $.ajax({
   url:"fetchstatt2.php?sel="+a+"&&qr="+d+"&&qt="+c,
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
		<?php
	
					if(isset($_GET['qt']))
					{
						
					?>		
		<script type="text/javascript">
		document.getElementById("ch_n").value="<?php echo $_GET['qt']; ?>";
		document.getElementById("h2").style.display ="block";
		</script>
		<?php
					}
		?>
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