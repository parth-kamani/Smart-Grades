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
		$tml="";
		$tml1="1";
		$tml2="2";
		$e_n1="";
		if(isset($_POST['sub']))
	{
		if($_GET['jk']==0)
		{
			$f=$_SERVER['REQUEST_URI'];
			$i2 = strpos($f,"&&jk=");
 if($i2 == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		$qw.="&&jk=".$_POST['quen'];
		header("location:".$qw);
 }
 else{
	 
 $o= substr($f,0,$i2);
 
 $qw=$o;
 
		$qw.="&&jk=".$_POST['quen'];
		header("location:".$qw);
		}
		}
		else
		{
			$_GET['jk']=$_POST['quen'];
		}
			
 $ac = "SELECT * FROM tmp_mod WHERE m_id=".$_GET['qp'];
		$ac = mysqli_query($con,$ac);
		$value3c = mysqli_fetch_array($ac);
		$e_n1 = $value3c['e_id'];
		$m_n1 = $value3c['m_id'];
		//$i=1;
		$qe=$_POST['quen'];
		for($i1=1;$i1<=$qe;$i1++)
		{
				$query = "INSERT INTO tmp_que (q_num,q_queid,q_mrk,m_id,e_id,valid) VALUES('$i1',0,0,$m_n1,$e_n1,1)";
		
		$result = mysqli_query($con,$query);
		}
	}
	if(isset($_POST['sub3']))
	{
		$rg=$_GET['qr'];
		$query7 = "UPDATE tmp_exam SET e_built=1 WHERE e_id=".$rg;
		
		$result7 = mysqli_query($con,$query7);
			if(!$result7)
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";
				
				$qry3 = "SELECT * FROM tbl_classes WHERE cl_id=".$c_id;
		$result3 = mysqli_query($con,$qry3);
		$value3 = mysqli_fetch_array($result3);
		
		$c_name = $value3['cl_name'];
		$c_lm = $value3['cl_lmark'];
		$c_city = $value3['cl_city'];
		$c_pin = $value3['cl_pin'];
		$c_st = $value3['cl_state'];
			
		$e_i = $_GET['qr'];	
		$qry5 = "SELECT * FROM tmp_exam WHERE e_id=".$e_i;
		
		$result5 = mysqli_query($con,$qry5);
		$value5 = mysqli_fetch_array($result5);
		$co_id = $value5['cor_id'];
		$e_nam = $value5['e_name'];
		$e_dat = $value5['e_date'];
		$totm = $value5['e_tm'];
		$s_t = $value5['s_time'];
		$e_t = $value5['e_time'];
		$qry6 = "SELECT cor_name FROM tbl_course WHERE cor_id=".$co_id;
		$result6 = mysqli_query($con,$qry6);
		$value6 = mysqli_fetch_array($result6);
		$c_nam = $value6['cor_name'];
				require_once('tcpdf/tcpdf.php');
				class MYPDF extends TCPDF {

		// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}
				
      $obj_pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Exam Paper");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      //$obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '<hr/>
      <h1 align="center"><b>'.$c_name.'</b></h1><h5 align="center"><b><i>'.$c_lm.', '.$c_city.' - '.$c_pin.'</i></b></h5>
	  <table width="520" border="0" cellspacing="0" cellpadding="5">
	  <tr><td width="350"><b>Exam:</b> '.$e_nam.'</td><td></td></tr>
	  <tr><td width="350"><b>Course:</b> '.$c_nam.'</td><td></td></tr>
	  <tr><td width="350"><b>Date:</b> '.$e_dat.'</td><td><b>Time:</b> '.$s_t.' to '.$e_t.'</td></tr>
	  <tr><td width="350"><b>Marks:</b> '.$totm.'</td><td><b>ID:</b>____________________</td></tr>
	  </table><br/><hr/>
	  <br/>
      <table width="520" border="0" cellspacing="0" cellpadding="5">
	  <tr><td></td></tr>';    
		   $ac = "SELECT * FROM tmp_mod WHERE m_id=".$_GET['qp'];
		$ac = mysqli_query($con,$ac);
		$value3c = mysqli_fetch_array($ac);
		$e_n1 = $value3c['e_id'];
		   echo "ko: ".$e_n1;
		   $sql3 = "SELECT * FROM tmp_que WHERE e_id=".$e_n1;  
      $res4 = mysqli_query($con, $sql3);

//$m1= $row1['m_id'];
				  
      while($row1 = mysqli_fetch_array($res4))  
      {     
		$sql4 = "SELECT m_num FROM tmp_mod WHERE m_id=".$row1['m_id']; 
			
      $res5 = mysqli_query($con, $sql4);
	  
	  while($row2 = mysqli_fetch_array($res5))
	  {
		  if($row1['q_queid']!=0)
			  {
	  $sql5 = "SELECT que_desc FROM tbl_qdb WHERE que_id=".$row1['q_queid'];  
      $res6 = mysqli_query($con, $sql5);
	  
		while($row3 = mysqli_fetch_array($res6))
		{
		$content .='
		<tr>
				<td width="50">'.$row2["m_num"].') '.$row1["q_num"].'. </td>
                <td width="420" align="left">'.$row3["que_desc"].'</td>
				<td width="50">'.$row1["q_mrk"].'</td>  
                 
           </tr>  
      ';  
		}
			  }
	  }
	  }
      //$content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);
ob_end_clean();	  
      $pdf_string= $obj_pdf->Output('samplepaper.pdf', 'S');
	  file_put_contents('./paper/samplepaper.pdf', $pdf_string);
	  
	 $location="paper/samplepaper.pdf";
			touch("paper/samplepaper.pdf");
			$rnd = mt_rand(100000, 999999);
			$rnd1 = mt_rand(1000, 99999);
			$dat = date("d-m-Y");
			$dat= str_replace("-", "", $dat);
			$dt=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
			$rnd.="_".$dt;
			$rnd.=$dat;
			$rnd.="_".$rnd1;
			$re=explode(".", "samplepaper.pdf");
			$ext = end($re);
			rename("paper/samplepaper.pdf","paper/".$rnd.".".$ext);
			$location="paper/".$rnd.".".$ext;
			
			$qry4 = "UPDATE tmp_exam SET p_url='$location' WHERE e_id=".$_GET['qr'];
		
		$res7 = mysqli_query($con,$qry4);
			
			if(!$res7)
			{
				echo "Not Updated...";
			}
			
			else
			{
				echo "Updated successfully....";	
				?>
				<script type="text/javascript">location.href = 'buqp.php?flag=1';</script>
				<?php	
			}
			}
	}
?>		    
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Create Question Paper</title>
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
        Create Question Paper
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
		<li class="active">Create Question Paper</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!--- Small boxes (Stat box) -->
      <!-- Main row -->
		<div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
		
		<div>
		<form role="form" method="POST" enctype="multipart/form-data" >
			
<div id="h3">
			<div class="form-group">
                  <label>*NOTE: Save Button will appeare when the total marks is same</label>
                </div>   
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tab">
                <tr>
                  <th>ID</th>
				  <th>Module Number</th>
                  <th>Exam Name</th>
				  <th>Valid</th>
				  <th>Action</th>
                </tr>
				<?php
					if(isset($_GET['qr']))
					{
					$id=$_GET['qr'];
					$query="SELECT * FROM tmp_mod WHERE e_id ='$id'";
					$count=0;
					$result2 = mysqli_query($con,$query);
					
					$count= mysqli_num_rows($result2);
					
					$seq=1;
					$r=0;
					
					if($count>0)
						{
					while($value2 = mysqli_fetch_array($result2))
					{
						
					$x=$value2['m_num'];
					$y=$value2['e_id'];
					$qry7="SELECT e_name FROM tmp_exam WHERE e_id =".$y;
					$res8 = mysqli_query($con,$qry7);
					$val5 = mysqli_fetch_array($res8);
					$etn= $val5['e_name'];
					$u=$value2['valid'];
					if($u==1)
					{
						$u1="Active";
					}
					else
					{
						$u1="Non-Active";
					}
					
				?>
                
                <tr>
                  <td><?php echo $seq;?><input type="text" id="p" name="<?php echo 'p['.$d.']';?>" value="<?php echo $x;?>" hidden></td>
                  <td><?php echo $x;?></td>
				  <td><?php echo $etn;?></td>
				  <td><?php echo $u1;?></td>
				  
			<td>
			<?php
			$f=$_SERVER['REQUEST_URI'];
		
 $i = strpos($f,"&&qp=");
 if($i == FALSE)
 {
	 $o=$f;
	 $qw=$o;
		
		$qw.="&&qp=".$value2['m_id'];
		$qry2="SELECT MAX(q_num) as max FROM tmp_que WHERE m_id=".$value2['m_id']." AND e_id=".$_GET['qr'];
					$res2 = mysqli_query($con,$qry2);
			$val2 = mysqli_fetch_array($res2);
		
			$ne2 = $val2['max'];
			if($ne2>=1)
			{
				$ne3=$ne2;
			}
			else
			{
				$ne3=0;
			}
			$qw.="&&jk=".$ne3;
 }
 else{
	 //echo $i;
 $o= substr($f,0,$i);
 
 $qw=$o;
 
		$qw.="&&qp=".$value2['m_id'];
		$qry2="SELECT MAX(q_num) as max FROM tmp_que WHERE m_id=".$value2['m_id']." AND e_id=".$_GET['qr'];
					$res2 = mysqli_query($con,$qry2);
			$val2 = mysqli_fetch_array($res2);
		
			$ne2 = $val2['max'];
			if($ne2>=1)
			{
				$ne3=$ne2;
			}
			else
			{
				$ne3=0;
			}
			$qw.="&&jk=".$ne3;
 } 
			?>
			<a class="btn btn-primary btn-xs" href="<?php echo $qw ?>" id="<?php echo "r".$value2['m_id'];?>"
					onclick="return confirm('sure to edit?');">EDIT</a>
					</td>
					
					
				</tr>
				
				<?php
					$seq++;
					$d++;
					//$count++;
					}
						}
					else
					{
						?>
						<td colspan="4"><center><label>No Records</label></center></td>
						<?php
					}
					}
					?>

              </table>
			  </div>
			  </form>
            </div>
			</div>
<div id="h2" style="display:none;">
<br/>
			  <div>
		  		  
            <div class="box-header">
              <h3 class="box-title">Add Question Paper Detail</h3>
				<form role="form" method="POST" enctype="multipart/form-data" >
			<div class="box-footer" style="display: block;">
            <div class="box-body table-responsive no-padding">
			
			
			<?php
			if(isset($_GET['jk']))
			{
				$rt=$_GET['qp'];
				$rt1=$_GET['qr'];
				$qry1="SELECT * FROM tmp_que WHERE m_id=".$rt." AND e_id=".$rt1;
					
					$res = mysqli_query($con,$qry1);
					
					$count1= mysqli_num_rows($res);
					if($count1==0)
						{
			?>
                  <div class="form-group">
				  <label>Number of Questions</label>
                  <input type="number" name="quen" class="form-control" maxlength="4" placeholder="Enter Number of Questions" required />
                </div>
				<button class="btn btn-info btn-xl" name="sub" id="sub">Search</button>
				<?php
						}
			else
			{
				
			?>
			<div class="form-group">
				  <label>Number of Questions</label>
                  <input type="number" name="quen1" class="form-control" maxlength="4" placeholder="Number of Questions" value="<?php echo $_GET['jk'] ?>" required readonly />
                </div>
             <table class="table table-hover" id="tab1">
                <tr>
                  <th>ID</th>
				  <th>Question Number</th>
                  <th>Question</th>
				  <th>Marks</th>
				  <th>Action</th>
                </tr>
				<?php
					if(isset($_GET['jk']))
					{
					$mid=$_GET['qp'];
					$eid=$_GET['qr'];
					$queryjk="SELECT * FROM tmp_que WHERE m_id='$mid' AND e_id ='$eid'";
					$countjk=0;
					$result2jk = mysqli_query($con,$queryjk);
					
					$countjk= mysqli_num_rows($result2jk);
					
					$seqjk=1;
					$rjk=0;
					
					if($countjk>0)
						{
					while($value2jk = mysqli_fetch_array($result2jk))
					{
						
					$xjk=$value2jk['q_num'];
					$yjk=$value2jk['q_queid'];
					$ujk=$value2jk['q_mrk'];
					$sql2="SELECT que_desc FROM tbl_qdb WHERE que_id=".$yjk;
			$res3=mysqli_query($con,$sql2);
			$val3 = mysqli_fetch_array($res3);
				?>
                
                <tr>
                  <td><?php echo $seq;?><input type="text" id="p" name="<?php echo 'p['.$d.']';?>" value="<?php echo $x;?>" hidden></td>
                  <td><?php echo $xjk;?></td>
				  <td><?php echo $val3['que_desc'];?></td>
				  <td><?php echo $ujk;?></td>
				  
			<td>
			<?php
			
			
			$n1=$value2jk['q_id'];
			$n2= "selque.php?qu=".$n1."&&jk=2";
			//<?php echo "j".$value2jk['m_id'];
			?>
			<a class="btn btn-primary btn-xs" href="<?php echo $n2 ?>" 
					onclick="return confirm('sure to edit?');">EDIT</a>
					</td>
					
					
				</tr>
				<?php
					$seq++;
					$d++;
					//$count++;
					}
						}
					else
					{
						?>
						<td colspan="4"><center><label>No Records</label></center></td>
						<?php
					}
					}
					?>
				<tr>
				<?php
				if(isset($_GET['jk']))
				{
				$mid=$_GET['qp'];
					$eid=$_GET['qr'];
					
					$sqlm = "SELECT SUM(q_mrk) as sum FROM tmp_que WHERE m_id='$mid' AND e_id ='$eid'";
			$resultm = mysqli_query($con,$sqlm);
			$valuem = mysqli_fetch_array($resultm);
			
			$tml = $valuem['sum'];
			
			$sqlm1 = "SELECT SUM(q_mrk) as sum FROM tmp_que WHERE e_id ='$eid'";
			$resultm1 = mysqli_query($con,$sqlm1);
			$valuem1 = mysqli_fetch_array($resultm1);
			$tml1=$valuem1['sum'];
			$sqlm2 = "SELECT e_tm FROM tmp_exam WHERE e_id ='$eid'";
			$resultm2 = mysqli_query($con,$sqlm2);
			$valuem2 = mysqli_fetch_array($resultm2);
			$tml2=$valuem2['e_tm'];
				}
				?>
				<th colspan="3" class="text-right">Total Module Marks:</th>
				<th><?php echo $tml ?></th>
				<th></th>
				</tr>
				<tr>
				<th colspan="3" class="text-right">Total Marks:</th>
				<th><?php echo $tml1." / ".$tml2 ?></th>
				<th></th>
				</tr>
              </table>
			  <?php
			}
	}
				?>
			  </div>
			  </div>
			  </div>
			  </form>
			  <?php
			if($_GET['qr']!=0)
					{
						if($tml1==$tml2)
						{
						?>
            <div class="box-header">
						<form role="form" method="POST" enctype="multipart/form-data" >
						<div class="box-footer" style="float:right;display: block;">
						<button class="btn btn-primary btn-xl" name="sub3" id="sub3">Save</button>
						</div>
</form></div>
						<?php
						}
					}
				?>
			  </div>
			  <!--</div>-->
			  <?php
				if(isset($_GET['qp']))
				{
				
					$f1="r".$_GET['qp'];
					
					?>		
		<script type="text/javascript">
		document.getElementById("<?php echo $f1;?>").className = 'btn btn-primary btn-xs active'
		document.getElementById("h2").style.display ="block";
		</script>
		<?php
				}
			  ?>
	
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