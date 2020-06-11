<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_course WHERE cor_id = ".$_POST["ch_id"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$query1 = "SELECT cl_name FROM tbl_classes,tbl_course WHERE tbl_course.cl_id = tbl_classes.cl_id";
			$result3 = mysqli_query($connect,$query1);
			$value3 = mysqli_fetch_array($result3);
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
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cor_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Fees</label>
                  <input type="text" name="m_fee" id="m_fee" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cor_fee'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['cor_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Required Days</label>
                  <input type="text" name="m_dy" id="m_dy" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cor_days'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Classes</label>
                  <input type="text" name="m_cl" id="m_cl" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$value3['cl_name'].'" disabled />
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
      $query = "SELECT * FROM tbl_course WHERE cor_id = ".$_POST["ch_id1"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$query1 = "SELECT cl_name FROM tbl_classes,tbl_course WHERE tbl_course.cl_id = tbl_classes.cl_id";
			$result3 = mysqli_query($connect,$query1);
			$value3 = mysqli_fetch_array($result3);
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
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cor_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Fees</label>
                  <input type="text" name="m_fee" id="m_fee" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cor_fee'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['cor_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Required Days</label>
                  <input type="text" name="m_dy" id="m_dy" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['cor_days'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Classes</label>
                  <input type="text" name="m_cl" id="m_cl" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$value3['cl_name'].'" disabled />
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