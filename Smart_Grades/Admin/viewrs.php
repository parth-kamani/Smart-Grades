<?php  
 if(isset($_POST["ch_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sg_db");  
      $query = "SELECT * FROM tbl_fmrk WHERE re_id =".$_POST["ch_id"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      {  
			//$a=$row['p_url'];
			//$b=substr($a,6);
			$co=$row['cor_id'];
			$st=$row['stu_id'];
			$query2="SELECT cor_name FROM tbl_course WHERE cor_id =".$co;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$cor= $val4['cor_name'];
			$query2="SELECT name FROM tbl_detail WHERE login_id =".$st;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$stu= $val4['name'];
			$query2="SELECT comp FROM tbl_stuenro WHERE login_id =".$st;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$comp= $val4['comp'];
			if($comp==1)
			{
				$d="Completed";
			}
			else
			{
				$d="Not Completed";
			}
			$typ1 = $row['e_id'];
					$typ2 = $row['a_id'];
					$ob= $row['ob_m'];
			if($typ1!=NULL)
					{
						$type="Exam";
						$query2="SELECT e_date,e_tm FROM tmp_exam WHERE e_id =".$typ1;
					$result12 = mysqli_query($connect,$query2);
					$val4 = mysqli_fetch_array($result12);
					$cdate= $val4['e_date'];
					$mar= $val4['e_tm'];
					}
					if($typ2!=NULL)
					{
						$type="Assignment";
						$query2="SELECT a_dline,a_mrk FROM tbl_stuassi WHERE a_id =".$typ2;
					$result12 = mysqli_query($connect,$query2);
					$val4 = mysqli_fetch_array($result12);
					$cdate= $val4['a_dline'];
					$mar= $val4['a_mrk'];
					}
					$tr=$ob." / ".$mar;
           $output .= '    
				<div class="form-group">
                  <label>Student Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$stu.'" disabled />
                </div>
				<div class="form-group">
                  <label>Type</label>
                  <input type="text" name="m_ename" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$type.'" disabled />
                </div>
				<div class="form-group">
                  <label>Obtained Marks</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$ob.'" disabled />
                </div>
				<div class="form-group">
                  <label>Date</label>
                  <input type="text" name="m_dat" id="m_dat" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$cdate.'" disabled />
                </div>
				<div class="form-group">
                  <label>Course</label>
                  <input type="text" name="m_cor" id="m_cor" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$cor.'" disabled />
                </div>
				<div class="form-group">
                  <label>Course Completed</label>
                  <input type="text" name="m_cc" id="m_cc" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$d.'" disabled />
                </div>
           ';  
      }  
      $output .= '  
           
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
      $query = "SELECT * FROM tbl_fmrk WHERE re_id =".$_POST["ch_id1"];  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="form-group">  
           ';  
      while($row = mysqli_fetch_array($result))  
      { 
			$co=$row['cor_id'];
			$st=$row['stu_id'];
			$query2="SELECT cor_name FROM tbl_course WHERE cor_id =".$co;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$cor= $val4['cor_name'];
			$query2="SELECT name FROM tbl_detail WHERE login_id =".$st;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$stu= $val4['name'];
			$query2="SELECT comp FROM tbl_stuenro WHERE login_id =".$st;
			$result12 = mysqli_query($connect,$query2);
			$val4 = mysqli_fetch_array($result12);
			$comp= $val4['comp'];
			if($comp==1)
			{
				$d="Completed";
			}
			else
			{
				$d="Not Completed";
			}
			$typ1 = $row['e_id'];
					$typ2 = $row['a_id'];
					$ob= $row['ob_m'];
			if($typ1!=NULL)
					{
						$type="Exam";
						$query2="SELECT e_date,e_tm FROM tmp_exam WHERE e_id =".$typ1;
					$result12 = mysqli_query($connect,$query2);
					$val4 = mysqli_fetch_array($result12);
					$cdate= $val4['e_date'];
					$mar= $val4['e_tm'];
					}
					if($typ2!=NULL)
					{
						$type="Assignment";
						$query2="SELECT a_dline,a_mrk FROM tbl_stuassi WHERE a_id =".$typ2;
					$result12 = mysqli_query($connect,$query2);
					$val4 = mysqli_fetch_array($result12);
					$cdate= $val4['a_dline'];
					$mar= $val4['a_mrk'];
					}
					$tr=$ob." / ".$mar;
           $output .= '    
				<div class="form-group">
                  <label>Student Name</label>
                  <input type="text" name="m_name" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$stu.'" disabled />
                </div>
				<div class="form-group">
                  <label>Type</label>
                  <input type="text" name="m_ename" id="m_name" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$type.'" disabled />
                </div>
				<div class="form-group">
                  <label>Obtained Marks</label>
                  <input type="number" name="m_num" id="m_num" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$ob.'" disabled />
                </div>
				<div class="form-group">
                  <label>Date</label>
                  <input type="text" name="m_dat" id="m_dat" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$cdate.'" disabled />
                </div>
				<div class="form-group">
                  <label>Course</label>
                  <input type="text" name="m_cor" id="m_cor" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$cor.'" disabled />
                </div>
				<div class="form-group">
                  <label>Course Completed</label>
                  <input type="text" name="m_cc" id="m_cc" class="form-control" autocomplete="off" placeholder="Enter Parent name ..." value="'.$d.'" disabled />
                </div>
           ';  
      }  
      $output .= '  
           
      </div>  
      ';  
      echo $output;  
 }  
 ?>