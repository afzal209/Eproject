<?php 
	include('connectivity.php');
	if(isset($_GET['txt'])){
		$search=$_GET['txt'];
		
		if($search!=""){
			$searchquery=mysqli_query($con,"select productname from market where productname like '$search%'");
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
		}


?>