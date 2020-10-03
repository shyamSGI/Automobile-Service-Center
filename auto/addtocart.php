			 
<?php 
session_start();
?>        <?php require 'header.php'; ?>
        <?php require 'sidebar.php'; ?>
		
		
		
		<?php if(isset($_GET['hello'])): ?>
			<?php
			$ppid=$_GET['pid'];
		$oppid=$_GET['opid'];
		echo $ppid;
		echo $oppid;
		$sql12 = "SELECT * FROM customer WHERE customer_id = '$ppid'";
		$sql12r=mysqli_fetch_assoc(mysqli_query($con,$sql12));
		
		$sql3 = "SELECT * FROM services WHERE service_id = '$oppid'";
		$sql3r=mysqli_fetch_assoc(mysqli_query($con,$sql3));
		////$sql3r['price'];;
		$sql4 = "INSERT INTO cart (customer_id, customer_name, service_id, service, cost) VALUES ($ppid,'$sql12r[cname]',$oppid,'$sql3r[title]','$sql3r[price]')";
		if(mysqli_query($con,$sql4)){	
			echo "Successfull";
		}else{echo "error";};
		
		
		header("location:action.php?single=$ppid");           
									
			?>
			
			
			<?php elseif(isset($_GET['parts_add'])): ?>
			<?php
			$ppid=$_GET['pid'];
		$oppid=$_GET['opid'];
		echo $ppid;
		echo $oppid;
		$sql12 = "SELECT * FROM customer WHERE customer_id = '$ppid'";
		$sql12r=mysqli_fetch_assoc(mysqli_query($con,$sql12));
		
		$sql3 = "SELECT * FROM parts WHERE part_id = '$oppid'";
		$sql3r=mysqli_fetch_assoc(mysqli_query($con,$sql3));
		////$sql3r['price'];;
		$sql4 = "INSERT INTO cart (customer_id, customer_name, service_id, service, cost) VALUES ($ppid,'$sql12r[cname]',$oppid,'$sql3r[title]','$sql3r[price]')";
		if(mysqli_query($con,$sql4)){	
			echo "Successfull";
		}else{echo "error";};
		
		
		header("location:action.php?single=$ppid");           
									
			?>
   
   
		<?php elseif(isset($_GET['delete'])): ?>
			<?php 
				$ppid=$_GET['pid'];
		$oppid=$_GET['opid'];
			$ccid=$_GET['ccid'];
		////$sql3r['price'];;
		$sql5 = "DELETE FROM cart WHERE customer_id=$ppid AND id=$ccid";
		$sql5r=mysqli_query($con,$sql5);
		header("location:action.php?single=$ppid");
			?>
		<?php elseif(isset($_GET['pay'])): ?>
			<?php // pay/////////////////////////////////////////////////
				$ppid=$_GET['pid'];
		//$total=$_GET['total'];
									$sql1= "SELECT * FROM cart WHERE customer_id=$ppid";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
							
								
								  $no=0;
                                  $no=count($arrr);
								$j=0; $k=0;
								while($j<$no)
                                { 
										$k=$k+$arrr[$j][5];
									$j++;
								}
								
								echo $k;
								
								
								
		$sql3 = "SELECT * FROM customer WHERE customer_id = '$ppid'";
		$sql3r=mysqli_fetch_assoc(mysqli_query($con,$sql3));
		////$sql3r['price'];
		///////////////////
								$j=0;	
							while($j<$no)
                                { 
								$service=$arrr[$j][4];
		$sql8 = "INSERT INTO vehicle_history (customer_id, date, customer_name, vehicle_reg, service) VALUES ('$ppid', now(), '$sql3r[cname]', '$sql3r[vehicle_reg]', '$service')";
		$sql8r=mysqli_query($con,$sql8);
							$j++;
								}		
		$sql6 = "INSERT INTO sales (date, customer_id, customer_name, amount) VALUES (now(),$ppid,'$sql3r[cname]',$k)";
		$sql6r=mysqli_query($con,$sql6);
		$sql7 = "DELETE FROM cart WHERE customer_id=$ppid";
		$sql7r=mysqli_query($con,$sql7);
		$sql7 = "DELETE FROM visit_rec WHERE customer_id=$ppid";
		$sql7r=mysqli_query($con,$sql7);
		if(mysqli_query($con,$sql7)){
              echo '<div class="alert alert-success">Paid Successfully <a class="btn btn-default" href="dashboard.php">Go Back</a></div>';
					}
					else{
				echo '<div class="alert alert-success">ERROR <a class="btn btn-default" href="dashboard.php">Go Back</a></div>';
					}
		
		//header("location:action.php?single=$ppid");
		
			// pay/////////////////////////////////////////////////
			?>
        <?php elseif(isset($_GET['delete_inq'])): ?>
			<?php
			$del_id=$_GET['qid'];
			$sql5 = "DELETE FROM visit_rec WHERE customer_id=$del_id";
			$sql5r=mysqli_query($con,$sql5);
			header("location:inqueue.php");
			
			?>
   
   
   
		<?php else: ?>
			<?php 
			
			?>
   
		<?php end; ?>
		

		
		<?php 
								
									
		function runMyFunction() {
		$ppid=$_GET['pid'];
		$oppid=$_GET['opid'];
		echo $ppid;
		echo $oppid;
				echo 'I just ran a php function';	
			header("location:action.php?single=$ppid");	
					}				
		
		
				
		?>
		
		
		<?php endif;?>
		<?php require_once 'footer.php'; ?>