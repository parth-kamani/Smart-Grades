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
		$c_id = $value['cl_id'];
		$type = $value['type'];
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
		
		$dline = date("Y-m-d");
		$m="";
		$g="";
		$sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id=0";
		$result2 = mysqli_query($con,$sql1);
		$value2 = mysqli_fetch_array($result2);
		$def =$value2['profile_pic'];
?>
<?php
	
	if(isset($_POST['submitb']))
	{
		$file = $_FILES['image']['tmp_name'];
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"circular/" . $_FILES["image"]["name"]);
			
			$location="circular/" . $_FILES["image"]["name"];
			touch("circular/" .$image_name);
			$rnd = mt_rand(100000, 999999);
			$rnd1 = mt_rand(1000, 99999);
			$dat = date("d-m-Y");
			$dat= str_replace("-", "", $dat);
			$dt=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
			$rnd.="_".$dt;
			$rnd.=$dat;
			$rnd.="_".$rnd1;
			$re=explode(".", $image_name);
			$ext = end($re);
			rename("circular/" .$image_name,"circular/".$rnd.".".$ext);
			$location="circular/".$rnd.".".$ext;
		
			
			$name = $_POST['name'];
			$desc = $_POST['desc'];
			$cdate = $_POST['cdate'];
			
		$query = "INSERT INTO tbl_cir (ci_name,ci_desc,ci_date,ci_url,cl_id,valid) VALUES('$name','$desc','$dline','$location','$c_id','1')";
		
		$result = mysqli_query($con,$query);
			
			if(!$result)
			{
				echo "Not inserted...";
			}
			
			else
			{
				echo "inserted successfully....";
				
				header("refresh:0; url=addcir.php?flag=1");
				
			}
		
	}
	if(isset($_GET['flag']))
	{
	if($_GET['flag']==1)
					{
						header("refresh:1; url=addcir.php");
					}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Grades | Add Circular</title>
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
  <script src="pdf.js"></script>
<script src="pdf.worker.js"></script>
<style type="text/css">

#upload-button {
	display: block;
	margin: 20px auto;
}

#file-to-upload {
	display: none;
}

#pdf-main-container {
	width: 400px;
	margin: 20px auto;
}

#pdf-loader {
	display: none;
	text-align: center;
	color: #999999;
	font-size: 13px;
	line-height: 100px;
	height: 100px;
}

#pdf-contents {
	display: none;
}

#pdf-meta {
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons {
	float: left;
}

#page-count-container {
	float: right;
}

#pdf-current-page {
	display: inline;
}

#pdf-total-pages {
	display: inline;
}

#pdf-canvas {
	border: 1px solid rgba(0,0,0,0.2);
	box-sizing: border-box;
}

#page-loader {
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;
	color: #999999;
	font-size: 13px;
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
        Add Circular
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
        <li class="active">Add Circular</li>
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
                
<br/>
				<div class="form-group">
				<label><small>*NOTE: Please verify the circular before filling up details.</small></label>
                  <center><label>Select Circular To Upload</label></center>
				<center><button id="reupload-button" class="btn btn-primary" onclick="reupload()">Re-Upload</button></center>  
<button id="upload-button" class="btn btn-primary">Select Circular PDF</button> 
<input type="file" id="file-to-upload" name="image" accept="application/pdf" />

<div id="pdf-main-container">
	<div id="pdf-loader">Loading document ...</div>
	<div id="pdf-contents">
		<div id="pdf-meta">
			<div id="pdf-buttons">
				<button id="pdf-prev" class="btn btn-primary">Previous</button>
				<button id="pdf-next" class="btn btn-primary">Next</button>
			</div>
			<div id="page-count-container" class="form-group">Page <div id="pdf-current-page"></div> of <div id="pdf-total-pages"></div></div>
		</div>
		<canvas id="pdf-canvas" width="400"></canvas>
		<div id="page-loader">Loading page ...</div>
	</div>
</div>

<script>

var __PDF_DOC,
	__CURRENT_PAGE,
	__TOTAL_PAGES,
	__PAGE_RENDERING_IN_PROGRESS = 0,
	__CANVAS = $('#pdf-canvas').get(0),
	__CANVAS_CTX = __CANVAS.getContext('2d');
	$("#reupload-button").hide();
	
function reupload()
{
	location.reload();
}	
function showPDF(pdf_url) {
	$("#pdf-loader").show();
	
	$("#reupload-button").show();
	PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC = pdf_doc;
		__TOTAL_PAGES = __PDF_DOC.numPages;
		
		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-loader").hide();
		$("#pdf-contents").show();
		$("#pdf-total-pages").text(__TOTAL_PAGES);

		// Show the first page
		showPage(1);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-loader").hide();
		$("#upload-button").show();
		//$("#reupload-button").hide();
		alert(error.message);
	});;
}

function showPage(page_no) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;
	
	// Disable Prev & Next buttons while page is being loaded
	document.getElementById("pdf-next").className = "btn btn-primary disabled";
	document.getElementById("pdf-prev").className = "btn btn-primary disabled";
	//$("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas").hide();
	$("#page-loader").show();

	// Update current page in HTML
	$("#pdf-current-page").text(page_no);
	
	// Fetch the page
	__PDF_DOC.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX,
			viewport: viewport
		};
		
		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS = 0;

			// Re-enable Prev & Next buttons
			//$("#pdf-next, #pdf-prev").removeAttr('disabled');
			document.getElementById("pdf-next").className = "btn btn-primary";
			document.getElementById("pdf-prev").className = "btn btn-primary";
			// Show the canvas and hide the page loader
			$("#pdf-canvas").show();
			$("#page-loader").hide();
			
	if(__TOTAL_PAGES==1)
	{
			document.getElementById("pdf-next").className = "btn btn-primary disabled";
	document.getElementById("pdf-prev").className = "btn btn-primary disabled";
	}
	if(__CURRENT_PAGE==1)
	{
			
	document.getElementById("pdf-prev").className = "btn btn-primary disabled";
	}
	if(__CURRENT_PAGE==__TOTAL_PAGES)
	{
			document.getElementById("pdf-next").className = "btn btn-primary disabled";
	
	}
		});
	});
}

// Upon click this should should trigger click on the #file-to-upload file input element
// This is better than showing the not-good-looking file input element
$("#upload-button").on('click', function() {
	$("#file-to-upload").trigger('click');
});

// When user chooses a PDF file
$("#file-to-upload").on('change', function() {
	// Validate whether PDF
    if(['application/pdf'].indexOf($("#file-to-upload").get(0).files[0].type) == -1) {
        alert('Error : Not a PDF');
        return;
    }

	$("#upload-button").hide();

	// Send the object url of the pdf
	showPDF(URL.createObjectURL($("#file-to-upload").get(0).files[0]));
});

// Previous page of the PDF
$("#pdf-prev").on('click', function() {
	if(__CURRENT_PAGE != 1)
		showPage(--__CURRENT_PAGE);
});

// Next page of the PDF
$("#pdf-next").on('click', function() {
	if(__CURRENT_PAGE != __TOTAL_PAGES)
		showPage(++__CURRENT_PAGE);
});

</script>
						
				</div>
				
                <div class="form-group">
                  <label>Circular Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Circular Name" required />
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Circular Description</label>
                  <textarea class="form-control" rows="3" name="desc" placeholder="Enter Circular Description" required></textarea>
                </div>
				
				<div class="form-group">
				<label>Date:</label>	
					
					<input type="text" name="cdate" class="form-control pull-right" placeholder="Enter Circular Date" id="datepicker" autocomplete="off" value="<?php echo $dline ?>" readonly required />
					
					</div>
              <div class="box-footer" style="float:right;">
                <input type="submit" name="submitb" value="ADD" class="btn btn-primary">
              </div>
			  
					<!-- /.input group -->
				
              </form>
			 
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
   startDate:'+0d',
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
