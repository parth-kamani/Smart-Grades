<?php
	if(isset($_GET['ida']))
	{
		$file = 'assignment/'.$_GET['ida'];
  $filename = $_GET['ida'];
  header('Content-type: application/pdf');
  header('Content-Disposition: inline;filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
	}
	if(isset($_GET['idc']))
	{
		$file = 'circular/'.$_GET['idc'];
  $filename = $_GET['idc'];
  header('Content-type: application/pdf');
  header('Content-Disposition: inline;filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
	}
	if(isset($_GET['ide']))
	{
		$file = 'paper/'.$_GET['ide'];
  $filename = $_GET['ide'];
  header('Content-type: application/pdf');
  header('Content-Disposition: inline;filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
	}
?>
