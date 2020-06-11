<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_qdb WHERE que_id = ".$_POST["ch_id"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
				<div class="form-group">
                  <label>Question Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['que_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Marks</label>
                  <input type="text" name="m_mr" id="m_mr" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['que_mrk'].'" disabled />
                </div>  
           ';  
      }  
      $output .= '  
           
      </div>  
      ';  
      echo $output;  
 }  
 ?>