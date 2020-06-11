<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "sg_db");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_classes 
  WHERE cl_name LIKE '%".$request."%' 
  OR cl_city LIKE '%".$request."%' 
  OR cl_lmark LIKE '%".$request."%'
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>cl Name</th>
    <th>cl_city</th>
    <th>cl_lmark</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["cl_name"];
   $data[] = $row["cl_city"];
   $data[] = $row["cl_lmark"];
   $html .= '
   <tr>
    <td>'.$row["cl_name"].'</td>
    <td>'.$row["cl_city"].'</td>
    <td>'.$row["cl_lmark"].'</td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>