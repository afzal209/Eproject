<?php
include('connectivity.php');
$status='pending';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
		$insert=mysqli_query($con,"insert into cpri(productname,image,status) select productname,image,status from testing where id=$id");
	 	
	if($insert){
			$update=mysqli_query($con,"update testing set status='$status'");
			}
	
	if($update)
	{
	$delete=mysqli_query($con,"delete from testing where id=$id");
	}
	else{
		echo "<script>alert('error')</script>";
		}
		
	
	if($delete){
		header('location:testing.php');
		}
	}
	?>
    <?php
	$status='reject';
	
if(isset($_GET['id1'])){
	$id1=$_GET['id1'];
	
		$backinsert=mysqli_query($con,"insert into manufacturing(productname,image,status)  select productname,image,status from testing where id=$id1");
	 	
		if($backinsert){
			$updateback=mysqli_query($con,"update manufacturing set status='$status'");
			}
	
	if($updateback)
	{
	$backdelete=mysqli_query($con,"delete from testing where id=$id1");
	}
	else{
		echo "<script>alert('error')</script>";
		}
	
	
	if($backdelete){
		header('location:testing.php');
		}
	}



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         

?>

    <?php
	/*include('connectivity.php');
	if(isset($_POST['searchtfid'])){
		$search=$_POST('searchtfid');
		
		if($search!=""){
			$searchquery=mysqli_query($con,"select productname from testing where productname like '$search%'");
			$data=array();
			$i=0;
			while($row=mysqli_fetch_array($searchquery)){
				$data[$i]=$row['productname'];
				
				$i++;
				}
			for($j=0;$j<$i;$j++){
				echo $data[$j]." ";
				}	
			}
		}*/
    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testing - Labautomation</title>

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
                <?php
				session_start();
				if($_SESSION['username']!="" && $_SESSION['radio']!=""){
                ?>
                	
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                 
                    	
                    <li class="control-label" >
                    	<a >WELCOME:<?php echo $_SESSION['username'];?></a>
                    </li>
                    <li>
                    	<a href="logout.php">Logout</a>
                    </li>
                <?php
				}
				else{
					header('location:login.php');
					}
                ?>    
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
			
           
			    <div class="col-lg-12" id="hdepart" >
                <h1 class="page-header" id="radioname"><?php echo $_SESSION['radio']?></h1>
                
            </div>


           
		   <?php
		   $select=mysqli_query($con,"select * from testing");
while($row=mysqli_fetch_array($select)){
	
$id=$row['id'];
$id1=$row['id']

?>
<?php

	?>
            <div   class="col-lg-3 col-md-4 col-xs-6 thumb" id="searchresult" >
            	<h3 id="radioname"><?php echo $row['productname'];?></h3>
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="data:image;base64,<?php  echo $row['image'];?>" alt="">
                </a>
                <h1 style="color:#000"><?php echo $row['status']?></h1>
                <a href="testing.php?id=<?php echo $id;?>"><button <?php if ($row['status'] == 'reject'){ ?> disabled <?php   } ?> onclick="addtocart(<?php echo $row["id"]?>)" class="btn btn-primary">PROCEED</button></a>
                <a href="testing.php?id1=<?php echo $id1;?>"><button class="btn btn-danger">Reject</button></a>
                 </div>
                <?php
	}

                ?>
                </div>
              </div>
          <h1 class="page-header"></h1>
        </div>
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>