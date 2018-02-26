	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
                    $(document).ready(function() {
	$('#searchtfid').keyup(function() {
 	$('#searchresult').html(' ');
		$.ajax({
			type:'GET',
			url:'ajaxx.php',
			data:{txt:$('#searchtfid').val()},
			success: function(data){
				var d=data.split(' ');
				var name="<ul>";
				for(i=0;i<d.length-1;i++){
					name+="<li><a href='#' onclick=display('"+d[i]+"')>"+d[i]+"</a></li>";
					}
					name+="</ul>";
					$('#searchresult').append(name);
				}
			});      
    });   

					});
function
 display(name){
	 document.getElementById('searchtfid').value=name;
	 document.getElementById('searchresult').innerHTML="";
	 
	 
	 }



	</script>


<?php
include('connectivity.php');

$sql=mysqli_query($con,"select count(id) from market");
$row=mysqli_fetch_row($sql);
$rows=$row[0];


$page_row=4;
$last=ceil($rows/$page_row);

if($last<1){
$last=1;
}
$pagenum=1;
if(isset($_GET['pn'])){
$pagenum=$_GET['pn'];

}

if($pagenum<1){
$pagenum=1;}
else if($pagenum>$last){
$pagenum=$last;

}
$limit='limit '.($pagenum-1)*$page_row." , ".$page_row; 
if(isset($_POST['searchbtid'])){
	$value=$_POST['searchtfid'];
	$query=mysqli_query($con,"select * from market where productname='$value' $limit  ");
	}
	
else{

$query=mysqli_query($con,"select * from market $limit ");

}
$pagetxt2=$pagenum." of ".$last;
$control='';
	if($last!=1){
		if($pagenum>1){
		$prev=$pagenum-1;
		$control.='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$prev.'">prev</a>&nbsp';
	





		for($i=$pagenum-4;$i<$pagenum;$i++){
		if($i>0){
		$control.='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>&nbsp';

			}
			
		}		

		}


		$control.=' '.$pagenum.'&nbsp;';
		
		
		
		
		
		for($i=$pagenum+1;$i<=$last;$i++){
		$control.='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>&nbsp';

		
		if($i>=$pagenum+4){
			break;
			}
		}
		if($pagenum<$last-4){
			$control.="....".$last.'&nbsp;';
	}
		
		if($pagenum!=$last){
			$next=$pagenum+1;
			$control.='&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">next</a>';
			}

}





$list='';
?>


	
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
#pag_control {
	list-style:none;
	
	margin-right:60px;
	
}
#pag_control {
	padding-left:0px;
	margin-left: 20px;
	
	margin-top:20px;
	display:inline-block;
	
}
#pag_control {
	border:2px solid #000;
	text-align:center;
	margin: 0px auto;
	text-decoration:none;
	display: block;
	color:#464646;
	padding:10px;
	background:#000;
	-webkit-transition: color 1s;
	transition: color 1s;
}
#pag_control  a:hover {
	border:2px solid #464646;
	color:#000;
}
#pag_control  a.activepage {
	border:2px solid #464646;
	color:#000;
}
#searchresult{
        display: block;
        border-left: 0.1px solid #373737;
        border-right: 0.1px solid #373737;
        border-bottom: 0.1px solid #373737;
        position:absolute;
		
	
       
}
#searchresult ul {
        margin-top:0px;
		margin-bottom:0px;
        padding: 0;
        list-style: none;
	
}
#searchresult li{
        display:block;
        clear:both;
		
}
#searchresult a {
        width:450px;
		
        display: block;
        padding: .2em .3em;
        text-decoration: none;
        color: #6c6c6c;
        background-color: #d9d9d9;
        text-align: left;
}
#searchresult a:hover{
        color: #FFF;
        background-color: #23bab5;
        background-image: none;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Market - Labautomation</title>

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
                  
                          <li>
                  
                       <a href="#search" id="search">Search</a>
                           <!--<a>  <form role="form" method="post" action="market.php">
                        
                          			<input type="search" id="searchtfid" id="search_tk" class="form-control"/>
                                   <div id="searchresult"></div>
                                    
                        			<input type="submit"  value="Show" name="searchbtid"   id="btn_move" class="btn"/>
                            
                        </form>
                        </a>-->
                    </li>     
                        	
                  
                     
                            
                            
                     
                      
                </ul>
                
            </div>
            
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <section id="show" class="modal fade" >
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
              <article role="login" >
                <h3 class="text-center"><i class="fa fa-file"></i>Search Product</h3>
				
               	<form role="form" action="" method="post" name="loginform" enctype="multipart/form-data">
                <span id="close" onClick="close" class="glyphicon glyphicon-remove-circle pull-right"></span> 
				<fieldset>
				
					
					<div class="form-group" >
							
						<input type="search" name="searchtfid" id="searchtfid" required class="form-control"  />
                        <div id="searchresult"></div>
					</div>
                    
                   
					<input type="submit" name="searchbtid"  id="search_move"value="Search Product" class="btn btn-info btn-lg"/>	
                     
				</fieldset>
			</form>
                

              </article>
              </div>
              </div>
              </div>
            </div>

     

          </div>
          <!-- end of row -->
        </div>
        <!-- end of home -->


  
  <!-- Trigger the modal with a button -->
</section>
 
    <div class="container">

        <div class="row" >
			
           
			    <div class="col-lg-12" id="hdepart" >
                <h1 class="page-header" id="radioname"></h1>
                <?php

				while($rowes=mysqli_fetch_array($query)){	


?>

            <div   class="col-lg-3 col-md-4 col-xs-6 thumb"  >
            	<h3 id="radioname"><?php  echo $rowes['productname'];?></h3>
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="data:image;base64,<?php  echo $rowes['image'];?>" alt="">
                </a>
              
              
            ?>    

            </div>


           
		   <?php
				}
		   
		   ?>

</div>


              </div>
                         	<p ><?php echo $pagetxt2; ?></p>

<div id="pag_control" >
<?php
echo $control;

?>
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
	<script src="css/style.css"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>