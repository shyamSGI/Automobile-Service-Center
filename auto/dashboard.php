<?php
session_start();
require_once 'header.php'; 
require_once 'sidebar.php'; 


$user['typename'] = $db->query("SELECT typename from employee_type WHERE employee_type_id = '{$user['employee_type_id']} LIMIT 1'")[0]['typename'];
?>

        <!-- Page Content -->
		<div style="margin-left:30px">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">       
                        <h1><?php echo $user['typename']; ?> Dashboard</h1>
                        <?php //require_once 'dashboard-widgets.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
		
		<?php   date_default_timezone_set('Asia/Colombo');
									$sql1= "SELECT id FROM visit_rec";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
									$no=count($arrr);
									//echo $no;
									$sql1= "SELECT service_id FROM services";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
									$sno=count($arrr);
									$sql1= "SELECT part_id FROM parts";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
									$pno=count($arrr);
									
									$sql1= "SELECT customer_id FROM customer";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
									$cno=count($arrr);
									
									$date=date("Y/m/d");
									$time=date("h:i:sa");
		?>
		
		<div class="row statsboxes">
        <div class="stats_title clearfix">
				
					<div class="col-md-12">
					<h2><center>JC AUTO SERVICE STATS</center></h2>
					<br>
					<div class="col-md-6 text-center">
					<h3>Today Customers</h3>
					Vehicles In queue: <?php echo $no; ?>
					</div>
					<div class="col-md-6 text-center">
					<h3>Total Customer base</h3>
                    Total Customers: <?php echo $cno; ?>
					</div>
					</div>

		</div>
		
		
		</div>
		<?php    /////////////////////////////////////////////////////////?>
		
		 <div class="row statsboxes">
        <div class="stats_title">General Stats <?php  echo "DATE: : ".$date;echo ":                   :"; echo "TIME: : ".$time;?></div>
		
        <div class="col-md-12 statsbox statsbox_pat">
                <h3>Vehicles</h3>
                <div class="stats_content">
                    Total Vehicles: <?php echo $no; ?> | 
                   
                </div>
            </div>
     
        
            <div class="col-md-12 statsbox statsbox_rm">
                <h3>Services Available</h3>
                <div class="stats_content">
                    Total Services: <?php echo $sno; ?> | 
                    
                </div>
            </div>
        
        
            <div class="col-md-12 statsbox statsbox_med">
                <h3>Spare parts Available</h3>
                <div class="stats_content">
                    Total Spare parts: <?php echo $pno; ?>
                </div>

            </div>
			
    </div>
		
		
		<center><img src="img/hg.jpg" alt="Mountain View" style="width:1000px;height:300px;" ></center>   
		
		
		
		<?php require_once 'footer.php'; ?>
		
	</div>
			
		
        