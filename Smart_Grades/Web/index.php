<?php

	include "connection.php";
	
	session_start();

?>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Smart Grades | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scholastic a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
<!-- /fonts -->
<!-- css files -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/footer-pic.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/staff.css" rel="stylesheet" type="text/css" media="all"/>
<link href='css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- /css files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
<style type="text/css">
$(document).ready(function(){
  $("button").click(function(){
    $("body").removeAttr("style");
  });
});
</style>
<style>
::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align: center;  
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}
.btn-primary.outline:hover, .btn-primary.outline:focus, .btn-primary.outline:active, .btn-primary.outline.active, .open > .dropdown-toggle.btn-primary {
	color: #33a6cc;
	border-color: #FFFFFF;
}
.btn-primary.outline:active, .btn-primary.outline.active {
	border-color: #FFFFFF;
	color: #FFFFFF;
	box-shadow: none;
}
.btn-primary.outline {
	border: 2px solid #0099cc;
	color: #0099cc;
}

.btn.outline {
	background: none;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
input[type=date]::-webkit-inner-spin-button, 
input[type=date]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
.buying-selling.active {
    background: #7BB712;   
}

.buying-selling {
    width: 130px; 
    padding: 10px;
    position: relative;
}

.buying-selling-word {
    font-size: 15px;
    font-weight: 600;
    margin-left: 22px;
}

.radio-dot:before, .radio-dot:after {
    content: "";
    display: block;
    position: absolute;
    background: #fff;
    border-radius: 100%;
}

.radio-dot:before {
    width: 20px;
    height: 20px;
    border: 1px solid #ccc;
    top: 10px;
    left: 16px;
}

.radio-dot:after {
    width: 12px;
    height: 12px;
    border-radius: 100%;
    top: 14px;
    left: 20px;
}

.buying-selling.active .buying-selling-word {
    color: #fff;
}

.buying-selling.active .radio-dot:after {
    background: #426C2A;
}

.buying-selling.active .radio-dot:before {
    background: #fff;
    border-color: #699D17;
}

.buying-selling:hover .radio-dot:before {
    border-color: #adadad;
}

.buying-selling.active:hover .radio-dot:before {
    border-color: #699D17;
}


.buying-selling.active .radio-dot:after {
    background: #426C2A;
}

.buying-selling:hover .radio-dot:after {
    background: #e6e6e6;
}

.buying-selling.active:hover .radio-dot:after {
    background: #426C2A;
    
}

@media (max-width: 400px) {
    
    .mobile-br {
        display: none;   
    }

    .buying-selling {
        width: 49%;
        padding: 10px;
        position: relative;
    }
}
</style>
<style>
.nb
{
  font-family: 'Lato', sans-serif;
  color:#FAFAD2;
  font-size: 30px;
  font-weight:bolder;
  margin: 0px;
}
</style>
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</head>
<body>
<!-- navigation -->
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span class="nb">Smart Grades</span></a>
			</div>
			<div style="float:right;">
			<?php
				if(!isset($_SESSION['log']))
				{
			?>
			<span data-toggle="modal" data-target="#exampleModal">
			<button type="button" id="f1" data-toggle="tooltip"  data-placement="bottom" title="Login" style="width:50px" class="btn btn-primary outline"><b> <span class="fa fa-user"></span></b></button>&nbsp;&nbsp;
			</span>
			<span data-toggle="modal" data-target="#exampleModal1">
			<button type="button" id="f2" style="width:50px" data-toggle="tooltip"  data-placement="bottom" title="Register" class="btn btn-primary outline"> <span class="fa fa-user-plus"></span></button>&nbsp;&nbsp;
			</span>
			<?php
				}
				else
				{
			?>
			<span>
			<a href="../Admin/dashboard.php" type="button" id="f4" data-toggle="tooltip"  data-placement="bottom" title="Dashboard" style="width:50px" class="btn btn-primary outline" ><b> <span class="fa fa-desktop"></span></b></a>&nbsp;&nbsp;
			</span>
			<span data-toggle="modal" data-target="#exampleModal3">
			<button type="button" id="f3" data-toggle="tooltip"  data-placement="bottom" title="Logot" style="width:50px" class="btn btn-primary outline" ><b> <span class="fa fa-power-off"></span></b></button>
			</span>
			<?php
				}
			?>
							  </div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav cl-effect-18">
					<li class="active"><a href="index.php" class="page-scroll" data-hover="Home">Home</a></li>
					<li><a href="#about" class="page-scroll" data-hover="About">About</a></li>
					<li><a href="#service" class="page-scroll" data-hover="Services">Services</a></li>
					<li><a href="#team" class="page-scroll" data-hover="Team">Team</a></li>
					<li><a href="#portfolio" class="page-scroll" data-hover="Portfolio">Portfolio</a></li>
					<li><a href="#contact" class="page-scroll" data-hover="Contact">Contact</a></li>
					<li>
                              
                    </li>
				</ul>
			</div>
			
			
			
        </nav>
	</div>	
</div>
<!-- /navigation -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
			   <div style="float:left">
                  <h3 class="modal-title" id="exampleModalLabel">Login</h3>
				  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form role="form" method="POST" enctype="multipart/form-data" >
                        <div class="fields-grid"><center>
                         <div class="control-group form-group">
                    <div class="controls">
                        
                        <input type="email" class="form-control" placeholder="Enter your Email address" name="email-phone" id="email-phone" required data-validation-required-message="Please enter your email address.">
                    </div><br/>
						<div class="controls">
                        
                        <input type="password" class="form-control" placeholder="Enter your Password" name="pass" id="pass" required data-validation-required-message="Please enter your password.">
                        
                    </div><br/>
					<div class="controls">
                         <button type="submit" class="btn subscrib-btnn btn-danger btn-lg btn-block" formaction="check.php">Login</button>
						 </div>
                        </div>
						<center>
						</div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
			   <div style="float:left">
                  <h3 class="modal-title" id="exampleModalLabel1">Sign Up</h3>
				  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form role="form" method="POST" enctype="multipart/form-data" >
                        <div class="fields-grid">
                         <div class="control-group form-group">
						 <div class="controls">
                        
                        <input type="text" class="form-control" placeholder="Enter your Name" name="nam" id="nam" required data-validation-required-message="Please enter your Name.">
                    </div>
                    <div class="controls">
                        
                        <input type="email" class="form-control" placeholder="Enter your Email address" name="email" id="email" required data-validation-required-message="Please enter your Email Address.">
                    </div>
					<div class="controls">
                        
                        <input type="number" class="form-control" placeholder="Enter your Phone Number" name="num" id="num" required data-validation-required-message="Please enter your Phone Number." maxlength="10">
                    </div>
						<div class="controls">
                        
                        <input type="password" class="form-control" placeholder="Enter Password" name="pass1" id="pass1" required data-validation-required-message="Please enter your Password.">
                        
                    </div>
					<div class="controls">
                        
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="pass2" id="pass2" oninput="check(this)" required data-validation-required-message="Please enter confirm Password.">
                        <script language='javascript' type='text/javascript'>
						function check(input) {
							if (input.value != document.getElementById('pass1').value) {
								input.setCustomValidity('Password Must be Matching.');
							} else {
								// input is valid -- reset the error message
								input.setCustomValidity('');
							}
						}
					</script>
                    </div><center>
					<div class="controls">
					<label>Gender</label>
                  <div class="buying-selling-group" id="buying-selling-group" data-toggle="buttons">
        <label class="btn btn-default buying-selling">
            <input type="radio" name="options" id="option1" value="male" autocomplete="off">
            <span class="radio-dot"></span>
            <span>Male</span>
        </label>
    
        <label class="btn btn-default buying-selling">
            <input type="radio" name="options" id="option2" value="female" autocomplete="off">
            <span class="radio-dot"></span>
            <span>Female</span>
        </label>
</div>
         </div></center>
		 <div class="controls">
					
                  <textarea class="form-control" rows="3" name="addr" placeholder="Enter your Address" required data-validation-required-message="Please enter your Address."></textarea>
                </div> 
<div class="controls">
					
					<input type="date" name="dob" class="form-control" id="dat" autocomplete="off" placeholder="Enter your Date of Birth" required data-validation-required-message="Please enter your Birth Date." />
					</div>
					<div class="controls">
					
					<input type="text" name="pnam" class="form-control" id="pnam" autocomplete="off" placeholder="Enter your Parent's Name" required data-validation-required-message="Please enter your Parent's Name." />
					</div>
					<div class="controls">
                        
                        <input type="email" class="form-control" placeholder="Enter your Parent's Email address" name="pemail" id="pemail" required data-validation-required-message="Please enter your Parent's Email Address.">
                    </div>
					<div class="controls">
                        
                        <input type="number" class="form-control" placeholder="Enter your Parent's Phone Number" name="pnum" id="pnum" required data-validation-required-message="Please enter your Parent's Phone Number." maxlength="10">
                    </div>
					<div class="controls">
                        
                        <input type="password" class="form-control" placeholder="Enter Parent's Password" name="ppass1" id="ppass1" required data-validation-required-message="Please enter your Parent's Password.">
                        
                    </div>
					<div class="controls">
                        
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="ppass2" id="ppass2" oninput="check1(this)" required data-validation-required-message="Please enter confirm Password.">
                        <script language='javascript' type='text/javascript'>
						function check1(input) {
							if (input.value != document.getElementById('ppass1').value) {
								input.setCustomValidity('Password Must be Matching.');
							} else {
								// input is valid -- reset the error message
								input.setCustomValidity('');
							}
						}
					</script>
                    </div>
						 <button type="submit" class="btn subscrib-btnn btn-danger btn-lg btn-block" formaction="addu.php" >Register</button>
                        <center><label>Contact us for Classes Registration</label></center>
						</div>
						
						</div>
                    </form> 
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
			   <div style="float:left">
                  <h3 class="modal-title" id="exampleModalLabel3">Logout</h3>
				  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form role="form" method="POST" enctype="multipart/form-data" >
                        <div class="fields-grid"><center>
                         <div class="control-group form-group">
					<div class="controls">
                         <button type="submit" class="btn subscrib-btnn btn-danger btn-lg btn-block" formaction="../Admin/logout.php">Logot</button>
						 <button type="button" class="btn subscrib-btnn btn-info btn-lg btn-block" data-dismiss="modal">Cancel</button>
						 </div>
                        </div>
						<center>
						</div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>	  
<!-- banner section -->

<section class="banner-w3ls">
	<div class='header'>
	<div class='header'>
		<div class="container">
			<div class="banner-agileits">
				<h2>Smart Grades Is The Sound Of The Future Grading System</h2>	
				<ul class="social-icons1">
					<li><a href="https://www.facebook.com/Smart-Grades-610340192773158" target="_blank"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>
		</div>
	</div>	
</section>
<!-- /banner section -->
<!-- info section -->
<section class="info-w3l" id="info" data-aos="zoom-in">
	<div class="col-lg-4 col-md-4 col-sm-12 info-wthree1">
		<div class="col-xs-2">
			<i class="fa fa-university" aria-hidden="true"></i>
		</div>
		<div class="col-xs-10">
			<div class="info-agile">
				<h3>Registered Classes</h3>
				<p>The registered classes have many functionilities to make their work easy and persistant. They have various task, which make their work even simpler by using Smart Grades.</p>
			</div>
		</div>
		<div class="clearfix"></div>
		<hr>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 info-wthree2">
		<div class="col-xs-2">
			<i class="fa fa-certificate" aria-hidden="true"></i>
		</div>
		<div class="col-xs-10">
			<div class="info-agile">
				<h3>Result</h3>
				<p>Exact result is calculated by Smart Analysis tool, it displays many different kind of result view, the result can be viewed in form of tables and pie-charts.</p>
			</div>
		</div>
		<div class="clearfix"></div>
		<hr>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 info-wthree3">
		<div class="col-xs-2">
			<i class="fa fa-cogs" aria-hidden="true"></i>
		</div>
		<div class="col-xs-10">
			<div class="info-agile">
				<h3>Managing options</h3>
				<p>Student can manage different classes records and based on selection student can access only selected classes information, this can be done on starting og Smart Grades.</p>
			</div>
		</div>
		<div class="clearfix"></div>
		<hr>
	</div>
	<div class="clearfix"></div>
</section>
<!-- /info section -->
<!-- services section -->
<section class="service-w3l" id="service">
	<div class="container">
		<div class="col-lg-4 col-md-12 col-sm-12" data-aos="flip-up">
			<h3>Our Services</h3>
			<p class="serv-p1">Smart Grades is only solution for Students as well as classes</p>
		</div>
		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="col-xs-4 serv-agile1" data-aos="flip-up">
				<i class="fa fa-cog" aria-hidden="true"></i>
				<h4>Edit</h4>
				<p class="serv-p2">Student can customize their own profile.</p>
			</div>
			<div class="col-xs-4 serv-agile2" data-aos="flip-up">
				<i class="fa fa-book" aria-hidden="true"></i>
				<h4>Courses</h4>
				<p class="serv-p2">Various courses are available in different classes. Different options for courses are available.</p>
			</div>
			<div class="col-xs-4 serv-agile3" data-aos="flip-up">
				<i class="fa fa-shield" aria-hidden="true"></i>
				<h4>Other Option</h4>
				<p class="serv-p2">Student can select the classes on beginning. they can even change after the selection.</p>
			</div>
			<div class="clearfix"></div>
			<div class="col-xs-4 serv-agile4" data-aos="flip-up">
				<i class="fa fa-graduation-cap" aria-hidden="true"></i>
				<h4>Results</h4>
				<p class="serv-p2">Student result is displayed in varrois kind of charts and table form based on marks entered.</p>
			</div>
			<div class="col-xs-4 serv-agile5" data-aos="flip-up">
				<i class="fa  fa-location-arrow" aria-hidden="true"></i>
				<h4>Location</h4>
				<p class="serv-p2">Find near by classes through the Smart Grades. Not only near-by, other classes can be searched.</p>
			</div>
			<div class="col-xs-4 serv-agile6" data-aos="flip-up">
				<i class="fa fa-database" aria-hidden="true"></i>
				<h4>Data</h4>
				<p class="serv-p2">Completed course's data is also stored in the profile. it will not be earesed.</p>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /services section -->
<!-- about section -->
<section class="about-agileits" id="about">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-12 about-w3ls1" data-aos="zoom-in">
			<div class="hover01 column">
				<div>
					<figure>
						<img src="images/about-img.jpg" alt="" class="img-responsive">
					</figure>
				</div>
			</div>		
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 about-w3ls2" data-aos="zoom-in">
			<div class="about-w3l">
				<h3><span class="fa fa-diamond" aria-hidden="true"></span> Smart Grades.</h3>	
				<p> Smart Grades was established in 2019 as an final year project of group of three members. The Idea origianally came by persnol experiences of team member in different classes. So, we planned to create a common platform for all the Classes and student. The classes tutor has many functionalities which makes their work even simpler. Admin's task is to manage all the essentials of classes and enrolled students in the particular classes.</p>
				<p>It's a common platform for all the Classes and student. The classes tutor has many functionalities which makes their work even simpler.</p>
				<ul class="about-links">
					<li><a href="#" class="about-link1" data-toggle="modal" data-target="#largeModal">Read More</a></li>
				</ul>
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title w3-agileits agileits-w3layouts w3layouts">About Us</h4>
				</div>
				<div class="modal-body">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<img src="images/about-img.jpg" alt="" class="img-responsive">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<p class="news-info"> Smart Grades was established in 2019 as an final year project of group of three members. The Idea origianally came by persnol experiences of team member in different classes. So, we planned to create a common platform for all the Classes and student. The classes tutor has many functionalities which makes their work even simpler. Admin's task is to manage all the essentials of classes and enrolled students in the particular classes.
				It's a common platform for all the Classes and student. The classes tutor has many functionalities which makes their work even simpler.</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /about section -->
<!-- Staff section  -->
<section class="staff-agileinfo" id="team">
	<div class="container">
		<h3 class="text-center">Our Team</h3>
		<center>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 team-agile1" data-aos="flip-up">
			<div class="view view-eighth">
                <img src="images/team-img1.jpg" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>Sneha Patel</h4>
					<ul class="team-social">
						<li><a href="https://www.facebook.com/profile.php?id=100014296110859" target="_blank"><i class="fa fa-facebook"></i></a></li>
					</ul>
                    <p class="info">Designer</p>
                </div>
            </div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 team-agile2" data-aos="flip-up">
			<div class="view view-eighth">
                <img src="images/team-img2.jpg" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>Parth K. Kamani</h4>
					<ul class="team-social">
						<li><a href="https://www.facebook.com/parthk88" target="_blank"><i class="fa fa-facebook"></i></a></li>
					</ul>
                    <p class="info">Team-Leader & Developer</p>
                </div>
            </div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 team-agile3" data-aos="flip-up">
			<div class="view view-eighth">
                <img src="images/team-img3.jpg" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>Jashraj Karnik</h4>
                    <ul class="team-social">
						<li><a href="https://www.facebook.com/jashraj.karnik" target="_blank"><i class="fa fa-facebook"></i></a></li>
					</ul>
                    <p class="info">Developer</p>
                </div>
            </div>
		</div>
		</center>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /Staff section -->
<!-- subscribe section -->
<section class="subs jarallax">
	<div class="container">
		<div class="col-lg-6 col-md-6 subs-w3ls1" data-aos="zoom-in">
			<h3>Subscribe To Us</h3>
			<p>Subscribe to us for more latest update of new classes registered and other update related to Smart Grades.</p>
		</div>
		<div class="col-lg-6 col-md-6 subs-w3ls1" data-aos="zoom-in">
			<div class="subscribe">
				<form action="addsub.php" method="post">
					<div class="form-group1">
						<input class="form-control" id="mail" name="email" placeholder="Enter Your Email Address" type="email" required>
					</div>
					<div class="form-group2">
						<button class="btn btn-outline btn-lg" type="submit">Subscribe</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /subscribe section -->
<!-- Portfolio section -->
<section class="portfolio-agileinfo" id="portfolio">
	<h3 class="text-center">Our Portfolio</h3>
	<div class="gallery-grids">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist" data-aos="zoom-in">
				<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">All</a></li>
				<li role="presentation"><a href="#teach" role="tab" id="teach-tab" data-toggle="tab" aria-controls="teach">Teaching</a></li>
				<li role="presentation"><a href="#train" role="tab" id="train-tab" data-toggle="tab" aria-controls="train">Training</a></li>
				<li role="presentation"><a href="#learn" role="tab" id="learn-tab" data-toggle="tab" aria-controls="learn">Learning</a></li>
				<li role="presentation"><a href="#award" role="tab" id="award-tab" data-toggle="tab" aria-controls="award">Awards</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img1.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img1.jpg" class="img-responsive" alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Training</h5>
									<p>Experienced Member for Training.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img2.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img2.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Teaching</h5>
									<p>Expert Faculty available in every classes.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img3.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img3.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Learning</h5>
									<p>Different courses are available for student.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img4.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img4.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Learning</h5>
									<p>Specialized Courses are available for student.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img5.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img5.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Learning</h5>
									<p>Specialized Courses are available for student.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img6.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img6.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Teaching</h5>
									<p>Expert Faculty available in every classes.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img7.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img7.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img8.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img8.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Training</h5>
									<p>Experienced Member for Training.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img9.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img9.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img10.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img10.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img11.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img11.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Teaching</h5>
									<p>Expert Faculty available in every classes.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img12.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="images/port-img12.jpg" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="teach" aria-labelledby="teach-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img2.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="2">
								<img src="images/port-img2.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Teaching</h5>
									<p>Expert Faculty available in every classes.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img6.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="2">
								<img src="images/port-img6.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Teaching</h5>
									<p>Expert Faculty available in every classes.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img11.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="2">
								<img src="images/port-img11.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Teaching</h5>
									<p>Expert Faculty available in every classes.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div role="tabpanel" class="tab-pane fade" id="train" aria-labelledby="train-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img1.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="3">
								<img src="images/port-img1.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Training</h5>
									<p>Experienced Member for Training.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img8.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="3">
								<img src="images/port-img8.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Training</h5>
									<p>Experienced Member for Training.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div role="tabpanel" class="tab-pane fade" id="learn" aria-labelledby="learn-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img3.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="4">
								<img src="images/port-img3.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Learning</h5>
									<p>Specialized Courses are available for student.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img4.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="4">
								<img src="images/port-img4.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Learning</h5>
									<p>Specialized Courses are available for student.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img5.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="4">
								<img src="images/port-img5.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Learning</h5>
									<p>Specialized Courses are available for student.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div role="tabpanel" class="tab-pane fade" id="award" aria-labelledby="award-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img7.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/port-img7.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img9.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/port-img9.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img10.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/port-img10.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="images/port-img12.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/port-img12.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Awards</h5>
									<p>Student performance is evaulated for the awards.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- /Portfolio section -->	
<!-- contact section -->
<section class="contact-wthree jarallax" id="contact">
	<div class="container">
		<h3 class="text-center">Contact Us</h3>
		<div class="col-lg-2 col-md-2 col-sm-2" data-aos="zoom-in">
			<img src="images/team-img1.jpg" alt="" class="img-circle img-responsive">
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10" data-aos="zoom-in">
			<h4>Be In Touch With Us</h4>
			<p class="contact-agile">We are always available</p>
		</div>
		<div class="col-lg-12" data-aos="zoom-in">
			<ul class="contact-info">
				<li>
					<i class="fa fa-phone-square" aria-hidden="true"></i>
					<p class="contact-p1">8141483673</p>
					<p class="contact-p2">7990160984</p>
				</li>
				<li>
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<p class="contact-p1"><a href="mailto:info.parthkamani83@gmail.com">info.parthkamani83@gmail.com</a></p>
					<p class="contact-p2"><a href="mailto:smartgrades.alert@gmail.com">smartgrades.alert@gmail.com</a></p>
				</li>
				<li>
					<i class="fa fa-address-book" aria-hidden="true"></i>
					<p class="contact-p1">A.I.T, Nr. Vasant Nagar Society</p>
					<p class="contact-p2">Ahmedabad, Gujarat.</p>
				</li>
			</ul>
		</div>	
		<div class="clearfix"></div>	
		<form action="sendmsg.php" method="post">
            <div class="col-lg-4 col-md-4 col-sm-4" data-aos="zoom-in">    
				<div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" id="name" name="cname" required data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" data-aos="zoom-in">	
                <div class="control-group form-group">
					<div class="controls">
                        <label>Phone Number:</label>
						<input type="tel" class="form-control" id="phone" name="cphone" required data-validation-required-message="Please enter your phone number.">
                    </div>
                </div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" data-aos="zoom-in">			
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" id="email" name="cemail" required data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
			</div>
			<div class="clearfix"></div>
			<div class="col-lg-12" data-aos="zoom-in">	
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" name="cmsg" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
					</div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
			</div>
			<div class="col-lg-12" data-aos="zoom-in">
<button type="submit" class="btn subscrib-btnn btn-danger btn-lg btn-block">Send Message</button>			
                <!--<button type="submit" class="btn btn-primary" formaction="sendmsg.php">Send Message</button>-->
            </div>
			<div class="clearfix"></div>
		</form>	
	</div>
</section>
<!-- /contact section -->
<!-- map section -->
<div class="map" data-aos="zoom-in">
<iframe  class="googlemaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.617405654075!2d72.51905911496935!3d23.111097384908337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e82d324d1558f%3A0x359cebcfc4ad365e!2sAhmedabad+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1555152290856!5m2!1sen!2sin" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- /map section -->
<!-- footer section -->
<section class="footer-wthree">
	<div class="container">
		<div class="col-lg-4 col-md-4 col-sm-12 footer-grid" data-aos="zoom-in">
			<h3>Latest Post</h3>
			<span class="line1"></span>
			<ul class="tweet-agile">
				<li>
					<i class="fa fa-twitter-square" aria-hidden="true"></i>
					<p class="tweet-p1"><a href="mailto:smartgrades.alert@gmail.com">@SmartGrades</a> New Classes added in the list... Classes Name: K.R Institute</p>
					<p class="tweet-p2">Posted 1 days ago.</p>
				</li>
				<li>
					<i class="fa fa-twitter-square" aria-hidden="true"></i>
					<p class="tweet-p1"><a href="mailto:smartgrades.alert@gmail.com">@SmartGrades</a> New course added in J.K Learnings... Course Name: Python</p>
					<p class="tweet-p2">Posted 3 days ago.</p>
				</li>
			</ul>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 footer-grid" data-aos="zoom-in">
			<span class="line4"></span>
			<h3>Latest Pics</h3>
			<span class="line2"></span>
			<ul class="clearfix demo">
				<li><img src="images/footer-pic1.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic2.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic3.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic4.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic5.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic6.jpg" alt="" class="img-responsive"/></li>	
				<li><img src="images/footer-pic7.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic8.jpg" alt="" class="img-responsive"/></li>
				<li><img src="images/footer-pic9.jpg" alt="" class="img-responsive"/></li>
			</ul>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 footer-grid" data-aos="zoom-in">
			<span class="line5"></span>
			<h3>Latest News</h3>
			<span class="line3"></span>
			<ul class="footer-news">
				<li>
					<div class="news-content">
						<a href="#" class="news-header" data-toggle="modal" data-target="#news1"><h4>News From Blog</h4></a>
						<p class="news-p1">Results are Updated for C++ Batch 20 in NIUT, Ahmedabad. </p>
						<p class="news-p2">Posted On Arpil 18, 2019</p>
					</div>
					<div class="news-pic">
						<a href="#" data-toggle="modal" data-target="#news1"><img src="images/news-pic1.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="news-content">
						<a href="#" class="news-header" data-toggle="modal" data-target="#news2"><h4>News From Blog</h4></a>
						<p class="news-p1">Results are Updated for PHP in Abtech, Ahmedabad. </p>
						<p class="news-p2">Posted On April 10, 2019</p>
					</div>
					<div class="news-pic">
						<a class="#" data-toggle="modal" data-target="#news2"><img src="images/news-pic2.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="clearfix"></div>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<span class="line6"></span>
    </div>
	<p class="copyright">© 2019 Smart Grades. All Rights Reserved | Design & Developed by Parth K. Kamani, Jashraj Karnik, Sneha Patel</p>
	<div class="modal fade" id="news1" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title w3-agile agileits-w3layouts w3layouts">Latest News</h4>
				</div>
				<div class="modal-body">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<img src="images/news-img1.jpg" alt="" class="img-responsive">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<p class="news-info">Results are Updated for C++ Batch 20 in NIUT, Ahmedabad. To check the Result, please log in and click under result section.</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="news2" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title w3-agile agileits-w3layouts w3layouts">Latest News</h4>
				</div>
				<div class="modal-body">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<img src="images/news-img2.jpg" alt="" class="img-responsive">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<p class="news-info">Results are Updated for PHP in Abtech, Ahmedabad. To check the Result, please log in and click under result section.</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>		
</section>
<!-- /footer section -->
<!-- back to top -->
<a href="#0" class="cd-top">Top</a>
<!-- /back to top -->	
<!-- js files -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/modernizr.min.js"></script> 
<script src="js/jquery.easing.min.js"></script>
<script src="js/grayscale.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/top.js"></script>
<!-- js for banner section -->
<script src="js/bgfader.js"></script>
<script>
	var myBgFader = $('.header').bgfader([
	'images/banner1.jpg',
	'images/banner2.jpg',
	'images/banner3.jpg',
	'images/banner4.jpg',
	], {
	'timeout': 3000,
	'speed': 3000,
	'opacity': 0.4
	})
	myBgFader.start()
</script>
<!-- /js for banner section -->
<!-- js for parallax effect -->
<script src="js/jarallax.js"></script>
<script type="text/javascript">
    /* init Jarallax */
    $('.jarallax').jarallax({
        speed: 0.5,
        imgWidth: 1366,
        imgHeight: 768
    })
</script>
<!-- /js for parallax effect -->
<!-- js for footer pic lightbox -->
<script src="js/jquery.picEyes.js"></script>
<script>
$(function(){
	//picturesEyes($('li'));
	$('ul.demo li').picEyes();
});
</script>
<!-- /js for footer pic lightbox -->
<!-- js for portfolio lightbox -->
<script src="js/jQuery.lightninBox.js"></script>
<script type="text/javascript">
	$(".lightninBox").lightninBox();
</script>
<!-- /js for portfolio lightbox -->
<script src='js/aos.js'></script>
<script src="js/index.js"></script>
<!-- /js files -->	
</body>
</html>