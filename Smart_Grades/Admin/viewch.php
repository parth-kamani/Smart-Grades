<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_chapters WHERE ch_id = '".$_POST["ch_id"]."' AND cor_id=".$_GET['sel'];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$u=$row['active'];
						if($u==1)
					{
						$u1="Active";
					}
					else
					{
						$u1="Non-Active";
					}
           $output .= '    
                     <div class="form-group">
                  <label>Number</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ch_num'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ch_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Chapter Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['ch_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Status</label>
                  <input type="text" name="m_st" id="m_st" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$u1.'" disabled />
                </div>  
           ';  
      }  
      $output .= '  
           
      </div>  
      ';  
      echo $output;  
 }  
 if(isset($_POST["ch_id1"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_chapters WHERE ch_id = '".$_POST["ch_id1"]."' AND cor_id=".$_GET['tr'];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			
           $output .= '    
                     <div class="form-group">
                  <label>Number</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ch_num'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ch_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Chapter Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['ch_desc'].'</textarea>
                </div> 
           ';  
      }  
      $output .= '  
           
      </div>  
      ';  
      echo $output;  
 }  
 ?>