<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_classes WHERE cl_id = ".$_POST["ch_id"];  
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
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="text" name="m_mail" id="m_mail" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_eid'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="m_phno" id="m_phno" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_phno'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['cl_addr'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Land Mark</label>
                  <input type="text" name="m_lmark" id="m_lmark" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_lmark'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Pin Code</label>
                  <input type="text" name="m_pin" id="m_pin" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_pin'].'" disabled />
                </div>
				<div class="form-group">
                  <label>City</label>
                  <input type="text" name="m_city" id="m_city" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_city'].'" disabled />
                </div>
				<div class="form-group">
                  <label>State</label>
                  <input type="text" name="m_state" id="m_state" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cl_state'].'" disabled />
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
 ?>