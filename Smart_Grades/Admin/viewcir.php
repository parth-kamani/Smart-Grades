<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_cir WHERE ci_id =".$_POST["ch_id"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$a=$row['ci_url'];
			$b=substr($a,9);
						
           $output .= '    
                   
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ci_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Circular Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['ci_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Uploaded Date</label>
                  <input type="text" name="m_dline" id="m_dline" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ci_date'].'" disabled />
                </div>
				
           ';  
      }  
      $output .= '  
           
      </div>
	  <div style="float:left">
			<a class="btn btn-primary" href="viewpdf.php?idc='.$b.'" 
					target="_blank">View Circular</a>&nbsp
				<a href="'.$a.'" class="btn btn-primary" target="_blank" download>Download Circular</a>
			</div><br/><br/>
      ';  
      echo $output;  
 }  
 ?>