


<?php
	
include('connectivity.php');
session_start();
error_reporting(0);
if(isset($_POST['sub'])){
$user=$_POST['tbuser'];
$pass=$_POST['pfpass'];
$depart=$_POST['depart'];




		

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
			header('location:login.php');
			}
			
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Labautomation</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/labautomation.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
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
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav">
                
                	
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                   
                    	
                  
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <section id="loginformmove" >
    <div class="row">
        <div class="col-md-8 nav-tab-holder">
     
      </div>

      </div>

  <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home1">
          <div class="row">

            <div class="col-md-8 mobile-pull" >
              <article role="login">
              <hr>
                <h3 class="text-center"><i class="fa fa-lock"></i><strong>Login Form</strong></h3>
				<hr>
               	<form role="form" action="" method="post" name="loginform">
           
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
						<button type="submit" name="sub" value="sub" class="btn btn-primary" >Login</button>
					</div>
                   
				</fieldset>
			</form>
                

              </article>
            </div>

     

          </div>
          </div>
          </div>
          </section>
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript/creative.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>