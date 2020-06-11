<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_stuassi WHERE a_id = '".$_POST["ch_id"]."' AND cor_id=".$_GET['sel']." AND ch_id=".$_GET['qt'];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$q2="SELECT cor_name FROM tbl_course WHERE cor_id=".$_GET['sel'];
			$r2 = mysqli_query($connect,$q2);
			$v2 = mysqli_fetch_array($r2);
			$q3="SELECT ch_name FROM tbl_chapters WHERE ch_id=".$_GET['qt'];
			$r3 = mysqli_query($connect,$q3);
			$v3 = mysqli_fetch_array($r3);
			$u=$row['valid'];
			$a=$row['a_url'];
			$b=substr($a,11);
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
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_num'].'" disabled />
                </div>
		  <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Assignment Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['a_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Marks</label>
                  <input type="number" name="m_mr" id="m_mr" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_mrk'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Course</label>
                  <input type="text" name="m_co" id="m_co" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$v2['cor_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Chapter</label>
                  <input type="text" name="m_ch" id="m_ch" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ch_id']." : ".$v3['ch_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Deadline</label>
                  <input type="text" name="m_dline" id="m_dline" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_dline'].'" disabled />
                </div> 
           ';  
        
      $output .= '  
           
      </div>
	  <div style="float:left">
			<a class="btn btn-primary" href="viewpdf.php?ida='.$b.'" 
					target="_blank">View Assignment</a>&nbsp
				<a href="'.$a.'" class="btn btn-primary" target="_blank" download>Download Assignment</a>
			</div>
      ';  
      echo $output;  
	  }
 } 
if(isset($_POST["ch_id1"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_stuassi WHERE a_id = '".$_POST["ch_id1"]."' AND cor_id=".$_GET['tr']." AND ch_id=".$_GET['qt']." AND valid=1";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$q2="SELECT cor_name FROM tbl_course WHERE cor_id=".$_GET['tr'];
			$r2 = mysqli_query($connect,$q2);
			$v2 = mysqli_fetch_array($r2);
			$q3="SELECT ch_name FROM tbl_chapters WHERE ch_id=".$_GET['qt'];
			$r3 = mysqli_query($connect,$q3);
			$v3 = mysqli_fetch_array($r3);
			$a=$row['a_url'];
			$b=substr($a,11);
						
           $output .= '    
                     
				<div class="form-group">
                  <label>Number</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_num'].'" disabled />
                </div>
		  <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Assignment Description</label>
                  <textarea class="form-control" rows="3" name="m_desc" placeholder="Enter Address..." disabled>'.$row['a_desc'].'</textarea>
                </div>
				<div class="form-group">
                  <label>Marks</label>
                  <input type="number" name="m_mr" id="m_mr" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_mrk'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Course</label>
                  <input type="text" name="m_co" id="m_co" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$v2['cor_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Chapter</label>
                  <input type="text" name="m_ch" id="m_ch" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['ch_id']." : ".$v3['ch_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Deadline</label>
                  <input type="text" name="m_dline" id="m_dline" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['a_dline'].'" disabled />
                </div> 
           ';  
       
      $output .= '  
           
      </div>
	  <div style="float:left">
			<a class="btn btn-primary" href="viewpdf.php?ida='.$b.'" 
					target="_blank">View Assignment</a>&nbsp
				<a href="'.$a.'" class="btn btn-primary" target="_blank" download>Download Assignment</a>
			</div>
      ';  
      echo $output;  
	  }
 }   
 ?>