<html>
<head>
<style type="text/css">
.main-header .logo {
  font-family: "Courier New", Courier, monospace;
  font-size: 24px;
}
</style>
</head>
<body>
 
<header class="main-header" >
    <!-- Logo -->
    <a href="dashboard.php" class="logo" style="color:#AB988B; background-color: #054950;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini logo" style="color:#AB988B; background-color: #054950;"><b style="color:#EB8540; background-color: #054950;">S</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg logo" style="color:#AB988B; background-color: #054950;" ><b style="color:#EB8540; background-color: #054950;">Smart</b>Student</span>
    </a>
		
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #054950;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color:#AB988B; background-color: #054950;">
        <span class="sr-only" style="color:#AB988B; background-color: #054950;">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <li class="dropdown user user-menu" style="background-color: #054950;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			
              <img src="<?php echo $i; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="color:#D4E7ED; background-color: #054950;"> <?php echo $n; ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="color:#D4E7ED; background-color: #789A9F;">
                <img src="<?php echo $i; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $n; ?>
                  <small><?php echo $dob; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="changepass.php">Change Password</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="editprofile.php">Edit Profile</a>
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-left">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  </body>
  </html>