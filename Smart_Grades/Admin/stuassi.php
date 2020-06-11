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
		header("refresh:1 url=manageassi.php");
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
		//$gp=$_POST['cdate'];
		
		$yu=$_SERVER['REQUEST_URI'];
		
		
		//$u= $_SERVER['REQUEST_URI'];
 //echo $yu;

 $i = strpos($yu,"&&qt=");
 if($i == FALSE)
 {
	 $o=$yu;
	 $qw=$o;
		$qw.="&&qt=".$fp;
		//$qw.="&&qr=".$gp;
		header("location:".$qw);
 }
 else{
	 echo $i;
 $o= substr($yu,0,$i);
 
 $qw=$o;
 
		$qw.="&&qt=".$fp;
		//$qw.="&&qr=".$gp;
		header("location:".$qw);
		
 }
 
	}
	if(isset($_GET['qt']))
	{
		//$gp=$_GET['qr'];
		$fp=$_GET['qt'];
		
		
	}
	
?>         
		    
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | View Assignment</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
				
				  <a class="btn btn-success btn-xs" href="stuassi.php?cr=<?php echo $value2['cl_id'];?>&&tr=<?php echo $value2['cor_id'];?>" >Select</a> &nbsp;&nbsp;
				  
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
				
				  <a class="btn btn-success btn-xs" href="stuassi.php?cr=<?php echo $value2['cl_id'];?>&&tr=<?php echo $value2['cor_id'];?>" >Select</a> &nbsp;&nbsp;
				  
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
        View Assignment
        <?php
			if($type==2)
			{
		?>
        <small>Student Control Panel</small>
		<?php
			}
			if($type==4)
			{
		?>
        <small>Parent Control Panel</small>
		<?php
			}
		?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Assignment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
		<div class="row">
	   <div class="box box-warning">
            <div class="box-header ">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
		<?php
				
	if(isset($_GET['tr']))
	{
		//$g=$_GET['sel'];
		$sqlcl="SELECT cor_name from tbl_course WHERE cor_id=".$_GET['tr']."";
		$resultcl=mysqli_query($con,$sqlcl);
		//header("location:manageclasses.php");
		$valuecl = mysqli_fetch_array($resultcl);
		$g = $valuecl['cor_name'];
		$m = $_GET['tr'];
		
		}
		?>	
		
		
				<div class="row">
	    <div class="col-xs-12">
		<div id="h1">
          <div>
		  		  
            <div class="box-header">
             
            <!-- /.box-header -->
			<form role="form" method="POST" enctype="multipart/form-data" >
			<div class="box-footer" style="display: block;">
				
				<div class="form-group">
                  <label>Select Chapter</label>
				  <select class="form-control" id="ch_n" name="ch_n" value="<?php echo $fp; ?>" required>
                    <option selected hidden value="">Select Chapter</option>
				  <?php
				$sql10 = "SELECT ch_num,ch_name FROM tbl_chapters where cor_id=".$_GET['tr']." AND active=1";
$result10 = mysqli_query($con,$sql10);


while ($row10 = mysqli_fetch_array($result10)) {
    echo "<option value='" . $row10['ch_num'] ."'>" . $row10['ch_num'] ." : " . $row10['ch_name'] ."</option>";
}
				  
?></select>
<br/>
<button class="btn btn-info btn-xl" name="sub" id="sub">Search</button>
</div>

<div id="h2" style="display: none;">
	<!--<div style="float:left" class="input-group col-xs-5">
			<!--<div class="col-xs-2">-->
			
           <!--       <span class="input-group-addon" id ="cs"><span class="glyphicon glyphicon-search"></span></span>
				  
                  <input type="text" name="class_search1" id="class_search1" value="<?php echo $mq; ?>" class="form-control" autocomplete="off" placeholder="Search"  onkeydown="a()" />
			
	
            </div>-->
			 <br/>
			<div id="div2" style="display:block">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>ID</th>
				  <th>Name</th>
				  <th>Description</th>
				  <th>Marks</th>
                  <th>Course</th>
				  <th>Chapter</th>
				  <th>Deadline Date</th>
				  <th>Action</th>
                </tr>
				<?php
				
						$query="SELECT * FROM tbl_stuassi WHERE cor_id=$m AND ch_id=$fp AND valid=1 ORDER BY a_num ASC";
					
					$result2 = mysqli_query($con,$query);
					
					$count= mysqli_num_rows($result2);
					$seq=1;
					$r=0;
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
						
					$x=$value2['a_name'];
					$y=$value2['cor_id'];
					$w=$value2['a_dline'];
					$v=$value2['ch_id'];
					$b=$value2['a_desc'];
					$u=$value2['valid'];
					$a=$value2['a_url'];
					$mrk=$value2['a_mrk'];
					
					$q2="SELECT cor_name FROM tbl_course WHERE cor_id=$y";
					$r2 = mysqli_query($con,$q2);
					$v2 = mysqli_fetch_array($r2);
					$q3="SELECT ch_name FROM tbl_chapters WHERE ch_id=$v";
					$r3 = mysqli_query($con,$q3);
					$v3 = mysqli_fetch_array($r3);
					
					$hj=strlen($value2['a_desc']);
					//$bv="";
					if($hj>25)
					{
						$bv=substr($value2['a_desc'],0,25);
						$bv.="...";
					}
					else
					{
						$bv=$value2['a_desc'];
					}
				?>
                
                <tr>
                  <td><?php echo $seq;?><input type="text" id="p" name="<?php echo 'p['.$d.']';?>" value="<?php echo $x;?>" hidden></td>
                  <td><?php echo $x;?></td>
				  <td><?php echo $bv;?></td>
				  <td><?php echo $mrk;?></td>
				  <td><?php echo $v2['cor_name'];?></td>
				  <td><?php echo $v." : ".$v3['ch_name'];?></td>
				  <td><?php echo $w;?></td>				  
				  <td>
				  <button type="button" onclick="p2()" class="btn btn-info btn-xs view_data" data-toggle="modal" id="<?php echo $value2['a_id'];?>">VIEW</button>&nbsp;&nbsp;
				
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
						<td colspan="9"><center><label>No Records</label></center></td>
						<?php
					}
					
					?>

              </table>
			  </div>
			  <div id="dataModal" class="modal fade" onclick="p1()" role="dialog">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" onclick="p1()" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Assignment Details</h4>  
                </div>  
                <div class="modal-body" id="ch_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" onclick="p1()" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script type="text/javascript">
		function p1()
		{
			document.documentElement.style.overflow = 'auto';
    document.body.scroll = "yes";
		}
		function p2()
		{
			document.documentElement.style.overflow = 'hidden';
		document.body.scroll = "no";
		}
		</script>
			<script>  
 $(document).ready(function(){
			$(document).on('click', '.view_data', function(){  
           var ch_id = $(this).attr("id");  
           if(ch_id != '')  
           {  
                $.ajax({  
                     url:"viewassi.php?tr="+<?php echo $_GET['tr'];?>+"&&qt="+<?php echo $_GET['qt'];?>+"",  
                     method:"POST",  
                     data:{ch_id1:ch_id},  
                     success:function(data){  
                          $('#ch_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });
</script> 
			  </div></form>
            </div>
			
			<div id="div1" style="display:none">
			
          <div id="class_data1"></div>
		  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchassi3.php?tr="+<?php echo $_GET['tr'];?>+"&&qt="+<?php echo $_GET['qt'];?>,
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
<div id="dataModal1" class="modal fade" onclick="p11()" role="dialog">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" onclick="p11()" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Assignment Details</h4>  
                </div>  
                <div class="modal-body" id="ch_detail1">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" onclick="p11()" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
<script type="text/javascript">
		function p11()
		{
			document.documentElement.style.overflow = 'auto';
    document.body.scroll = "yes";
		}
		function p21()
		{
			document.documentElement.style.overflow = 'hidden';
		document.body.scroll = "no";
		}
		</script> 
			<script>  
 $(document).ready(function(){
			$(document).on('click', '.view_data1', function(){  
           var ch_id = $(this).attr("id");  
           if(ch_id != '')  
           {  
                $.ajax({  
                     url:"viewassi.php?tr="+<?php echo $_GET['tr'];?>+"&&qt="+<?php echo $_GET['qt'];?>+"",  
                     method:"POST",  
                     data:{ch_id1:ch_id},  
                     success:function(data){  
                          $('#ch_detail1').html(data);  
                          $('#dataModal1').modal('show');  
                     }  
                });  
           }            
      });  
 });
</script> 	  
</div>
<script>
			function a() {
					var t = document.getElementById("class_search1").value;
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
						document.getElementById('active').className = 'btn btn-primary';
						document.getElementById('non-active').className = 'btn btn-primary';
						
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
		document.documentElement.style.overflow = 'hidden';
		document.body.scroll = "no";
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
		document.documentElement.style.overflow = 'auto';
    document.body.scroll = "yes";
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