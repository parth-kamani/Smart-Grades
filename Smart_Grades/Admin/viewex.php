<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tmp_exam WHERE e_id =".$_POST["ch_id"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$a=$row['p_url'];
			$b=substr($a,6);
			$co=$row['cor_id'];
			$query2="SELECT cor_name FROM tbl_course WHERE cor_id =".$co;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$cor= $val4['cor_name'];
           $output .= '    
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['e_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Marks</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['e_tm'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Exam Date</label>
                  <input type="text" name="m_dat" id="m_dat" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['e_date'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Course</label>
                  <input type="text" name="m_cor" id="m_cor" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$cor.'" disabled />
                </div>  
           ';  
      }  
      $output .= '  
           <div style="float:left">
			<a class="btn btn-primary" href="viewpdf.php?ide='.$b.'" 
					target="_blank">View Paper</a>&nbsp
				<a href="'.$a.'" class="btn btn-primary" target="_blank" download>Download Paper</a>
			</div>
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 <?php  
 if(isset($_POST["ch_id1"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tmp_exam WHERE e_id =".$_POST["ch_id1"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			$a=$row['p_url'];
			$b=substr($a,6);
			$co=$row['cor_id'];
			$query2="SELECT cor_name FROM tbl_course WHERE cor_id =".$co;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$cor= $val4['cor_name'];
           $output .= '    
				<div class="form-group">
                  <label>Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['e_name'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Marks</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['e_tm'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Exam Date</label>
                  <input type="text" name="m_dat" id="m_dat" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$row['e_date'].'" disabled />
                </div>
				<div class="form-group">
                  <label>Course</label>
                  <input type="text" name="m_cor" id="m_cor" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$cor.'" disabled />
                </div>  
           ';  
      }  
      $output .= '  
           <div style="float:left">
			<a class="btn btn-primary" href="viewpdf.php?ide='.$b.'" 
					target="_blank">View Paper</a>&nbsp
				<a href="'.$a.'" class="btn btn-primary" target="_blank" download>Download Paper</a>
			</div>
      </div>  
      ';  
      echo $output;  
 }  
 ?>