<?php

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
			else if($rad == 'manufacturing'){
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
	header('location:contact.php');
	
	}
	
	else if($depart == 'test'){
		header('location:testing.php');
		}
		else if($depart == 'cpri'){
		echo "<script>alert('Login with Cpri Department')</script>";
			}
		echo "<script>alert('user and pass is correct')</script>";
		}
		else{
			echo "<script>alert('user and pass is uncorrect')</script>";
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

    <title>About - Labautomation</title>

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
<div class="container" >

<div class="container">

 
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
                <h3 class="text-center"><i class="fa fa-lock"></i>Login form</h3>
				
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
                    <div class="radio" id="radio" class="form-group">
                    <label for="radio"  id="radl">Manufacturing Department</label>
						<input type="radio" name="depart"  class="form-control"  id="radi" value="manufacturing" />
                    </div>
                    <div class="radio" id="radio1" class="form-group">
                    <label for="radio" id="radl1">Testing Department</label>
						<input type="radio" name="depart"   class="form-control" id="radi1" value="test"/>
                    </div>
                    <div class="radio" id="radio2" class="form-group">
                    <label for="radio" id="radl2">Cpri Department</label>
						<input type="radio" name="depart"   class="form-control" id="radi2" value="cpri"/>
                    </div>

					<div class="form-group">
						<input type="submit" name="sub" value="sub" class="btn btn-primary" id="myBtn1"/>
					</div>
                      <button type="button" class="btn btn-info btn-lg" id="myBtn">signup here</button>
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
              		<h3 class="text-center"><i class="fa fa-lock"></i> Create Department Account</h3>
    		  
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
                  <input type="submit" class="btn btn-success btn-block"  value="sub" id="btsub" name="subs">
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
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">About
                        <strong>LABAUTOMATION</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/newslider1.png" alt="">
                </div>
                <div class="col-md-6">
                    <p>This is a great place to introduce your company or project and describe what you do.</p>
                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Our
                        <strong>Team</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/newsliderp3.png" alt="">
                    <h3>                        Manufacturing 
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/newsliderp4.png" alt="">
                    <h3>
                        Testing
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/newsliderp2.png" alt="">
                    <h3>Cpri
                     
                    </h3>
                </div>
                <div class="clearfix"></div>
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
</body>

</html>
