\<?php

if(isset($_POST['subs'])){
	include('connectivity.php');
$fname=$_POST['tbsfn'];
$lname=$_POST['tbsln'];
$user=$_POST['tbsun'];
$pass=$_POST['pfsp'];
$cpass=$_POST['pfscp'];
$phone=$_POST['tbspl'];
$dat=$_POST['dtsdat'];
$rad=$_POST['rsde'];

$insert=mysqli_query($con,"insert into registration (firstname,lastname,username,password,cpassword,phone,date,radio) values('$fname','$lname','$user','$pass','$cpass',$phone,'$dat','$rad')");
$move=mysqli_query($con,"insert into login select username,password,radio from registration");
if($insert){
	if($pass==$cpass){
		if($rad == 'manufacturing'){
			header('location:manufacturing.php');
			}
			else if($rad == 'testing'){
			header('location:testing.php');
			}
			else if($rad == 'cpri'){
			header('location:cpri.php');
			}
				
				}
				else{
					echo "<script>alert('password not same')</script>";
					}
	
	}
		else{
			echo "<script>alert('account not create')</script>";
			}
			
	
	
  	
	
}

?>

	<?php
	

session_start();
error_reporting(0);
if(isset($_POST['sub'])){
$user=$_POST['tbuser'];
$pass=$_POST['pfpass'];
$depart=$_POST['depart'];


include('connectivity.php');

		

$select=mysqli_query($con,"select username,radio from login where username='$user' and radio='$depart'");


$nuser;
$ndepart;

while($row=mysqli_fetch_array($select)){
	$nuser=$row['username'];
	$ndepart=$row['radio'];
	$_SESSION['username']=$nuser;
	$_SESSION['radio']=$ndepart;
	
	}
	
	if($user==$nuser && $depart==$ndepart){
		if($depart == 'manufacturing'){
	header('location:manufacturing.php');
	
	}
	
	else if($depart == 'test'){
		header('location:testing.php');
		}
		else if($depart == 'cpri'){
		header('location:cpri.php');
			}
		
		}
		else{
			echo "<script>alert('username and password are not same')</script>";
			}
			
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index - Labautomation</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/labautomation.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">LABAUTOMATION</div>
    

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">LABAUTOMATION</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                    <a href="market.php">Market</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                    	<a href="#sign" id="sign">Sign up</a>
                    </li>
                    <li>
                    	<a href="#login" id="login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
<section id="show1" class="modal fade" >




 
<div class="col-md-12 col-lg-offset-2">
    <div class="login-signup">
      <div class="row">
        <div class="col-md-8 nav-tab-holder">
     
      </div>

      </div>

      
	  
	  

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
          <div class="row">

            <div class="col-md-8 mobile-pull">
              <article role="login">
              <hr>
                <h3 class="text-center"><i class="fa fa-lock"></i><strong>Login Form</strong></h3>
				<hr>
               	<form role="form" action="" method="post" name="loginform">
                <span id="close" onClick="close" class="glyphicon glyphicon-remove-circle pull-right"></span> 
				<fieldset>
					<legend>Login</legend>
			
					
					<div class="form-group">
						<label for="name">Username</label>
						<input type="text" name="tbuser" placeholder="Your Username" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="pfpass" placeholder="Your Password" required class="form-control" />
					</div>
                    <div  id="radio" class="form-group">
                    <label for="radio"  id="radl">Manufacturing Department</label>
						<input type="radio" name="depart"  class="form-control"  id="radi" value="manufacturing" />
                    </div>
                    <div  id="radio1" class="form-group">
                    <label for="radio" id="radl1">Testing Department</label>
						<input type="radio" name="depart"   class="form-control" id="radi1" value="test"/>
                    </div>
                    <div  id="radio2" class="form-group">
                    <label for="radio" id="radl2">Cpri Department</label>
						<input type="radio" name="depart"   class="form-control" id="radi2" value="cpri"/>
                    </div>

					<div class="form-group">
						<button type="submit" name="sub" value="sub" class="btn btn-primary" >Login</button>
					</div>
                      <button type="button" class="btn btn-info btn-lg" id="myBtn">Signup here</button>
				</fieldset>
			</form>
                

              </article>
            </div>

     

          </div>
          <!-- end of row -->
        </div>
        <!-- end of home -->


  
  <!-- Trigger the modal with a button -->
</section>

<div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      
      
        <div class="modal-body">
        	<div class="row" >

        
            	<article role="login" id="heightchange">
                <hr>
              		<h3 class="text-center"><i class="fa fa-lock"></i> Create Department Account</h3>
    		  <hr>
             			<form role="form" action="" method="post" name="signupform">
			 <!-- Text input-->
			 

						<div class="form-group">
							<label class="col-md-5 control-label">First Name</label>
							<div class="col-md-7">
							<input type="text" placeholder="Enter first Name" class="form-control" name="tbsfn" required />
							<span class="text-danger"></span>
							</div>          	
						</div>
						<br>
                        <br>
                        <br>
<!-- Text input-->
						<div class="form-group">
 							<label class="col-md-5 control-label">Last Name </label>
 							<div class="col-md-7">
 							<input type="text"  placeholder="Enter Last Name" class="form-control"  name="tbsln" required/>
							</div>
						</div>
                        <br>
                        <br>

  <!-- Text input-->
						<div class="form-group">
							<label class="col-md-5 control-label">Username</label>
							<div class="col-md-7">
							<input type="text" placeholder="Enter Username" class="form-control"  name="tbsun" required/>
							<span class="text-danger"></span>        
							</div>              
						</div>
                        <br>
                        <br>
      <!-- Text input-->
                        <div class="form-group">
                        	<label class="col-md-5 control-label">Password </label>
                        	<div class="col-md-7">
                        	<input type="password"  placeholder="Password"  class="form-control"  name="pfsp" required/>
                        	<span class="text-danger"></span> 
                        	</div>
                        </div>         
                        
                          <br>
                          <br>    <!-- Text input-->
                        <div class="form-group">
                        	<label class="col-md-5 control-label">Confirm Password </label>
                        	<div class="col-md-7">
                        	<input type="password"  placeholder="Confirm Password"  class="form-control"  name="pfscp" required/>
                        	<span class="text-danger"></span>
                        	</div>
                        </div>         
                        
                            <br>
                            <br>			
                        <div class="form-group">
                        	<label class="col-md-5 control-label"> Phone No</label>
                        	<div class="col-md-7">
                        	<input type="tel" class="form-control" id="tbphone"  placeholder="Enter Phone Number" name="tbspl" required />
                        	</div>
                        </div>  		
                            <br>
                            <br>                  
                        <div class="form-group">
                        	<label class="col-md-5 control-label">Date Of Brith</label>
                        	<div class="col-md-7">
                        	<input type="datetime-local" class="form-control" id="com_add"  name ="dtsdat" />
                        	</div>
                        </div> 
                         <br>                       
                        <br>
                         <div class="radio" class="form-group">
                         	<label class="col-md-5 control-label" id="lrmanu">Manufacturing Department</label>
                         	<div class="col-md-7">
                        	<input type="radio" class="form-control" id="rmanu"  name ="rsde"  value="manufacturing" />
                        	</div>
                        </div> 
                        <div class="radio" class="form-group">
                         	<label class="col-md-5 control-label" id="lrtest">Testing Department</label>
                         	<div class="col-md-7">
                        	<input type="radio" class="form-control" id="rtest"  name ="rsde"  value="test"/>
                        	</div>
                        </div> 
                        <div class="radio" class="form-group">
                         	<label class="col-md-5 control-label" id="lrcpri">Cpri Department</label>
                         	<div class="col-md-7">
                        	<input type="radio" class="form-control" id="rcpri"  name ="rsde"   value="cpri"/>
                        	</div>
                        </div> 

                <div class="form-group" id="buttonmerg" >
                  <input type="submit" class="btn btn-success btn-block"  value="Sign Up" id="btsub" name="subs">
                </div>

				
		  	  

              </form>
          
         

            	</article>
        

 
        		</div>
        	</div>
        
     
      
    </div>
  </div>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/Slider5.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/Slider3.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/Slider2.png" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">LABAUTOMATION</h1>
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Build a website
                        For Devices
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/newslides.png" alt="">
                    <hr class="visible-xs">
                    <p>s a multi-disciplinary strategy to research, develop, optimize and capitalize on technologies in the laboratory that enable new and improved processes. Laboratory automation professionals are academic, commercial and government researchers, scientists and engineers who conduct research and develop new technologies to increase productivity, elevate experimental data quality, reduce lab process cycle times, or enable experimentation that otherwise would be impossible.</p>
                    <p>The most widely known application of laboratory automation technology is laboratory robotics. More generally, the field of laboratory automation comprises many different automated laboratory instruments, devices (the most common being autosamplers), software algorithms, and methodologies used to enable, expedite and increase the efficiency and effectiveness of scientific research in laboratories.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">What is
                        Special About por website
                    </h2>
                    <hr>
                    <p>The application of technology in today's laboratories is required to achieve timely progress and remain competitive. Laboratories devoted to activities such as high-throughput screening, combinatorial chemistry, automated clinical and analytical testing, diagnostics, large scale biorepositories, and many others, would not exist without advancements in laboratory automation.</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript/creative.min.js"></script>
    <script src="css/style.css"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
