			 
<?php 
session_start();
?>        <?php require 'header.php'; ?>
        <?php require 'sidebar.php'; ?>
		
		
		
		<?php if(isset($_GET['search'])): ?>
			
			<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">


<!--Find show all visit records-->

                
                <div class="col-md-12">  
				 
                <?php
			//	echo $_POST['searchVal'];
				$sval=$_POST['searchVal'];
                 $q="select customer_id,brand,model,cname,mobileno from customer where vehicle_reg='$sval'";
                  $vArr=$db->query($q);
                  $no=0;
                  $no=count($vArr);
                  if($no==0){
				//	echo $no;
				//  echo count($vArr);
				  echo "<h3>No Result Found</h3>";
				  }
				 else{
			//	echo $no;
                 $q="select visit_rec_id,time_in,time_out from visit_record where patient_id={$_POST['searchVal']} order by visit_rec_id desc";
                  $visitArr=$db->query($q);
                  $no=0;
                  $no=count($visitArr); 
                  $i=0;
				 $x=$no-1;
				 }
                 ?>
                

                  <h1>Service Record History</h1>
                        <div class="row statsboxes">
                            <div class="stats_title clearfix"><span class="pull-left">Vehicle Stats:</span><span class="pull-right">Total No Of Visits: <?php echo "{$no}" ?> </span></div>
                             <div class="col-md-3 statsbox">
                                <h3>Vehicle Registration:</h3>
                                <div class="stats_content">
                                    <?php echo "{$_POST['searchVal']}" ?>
                                </div>
                            </div>
							<div class="col-md-3 statsbox statsbox_doc">
                                <h3>Customer Name:</h3>
                                <div class="stats_content">
                                    <?php echo "{$vArr[$i]['cname']}" ?>
                                </div>
                            </div>
                            
							<div class="col-md-3 statsbox statsbox_doc">
                                <h3>Brand Name:</h3>
                                <div class="stats_content">
                                    <?php echo "{$vArr[$i]['brand']}" ?>
                                </div>
                            </div>
							<div class="col-md-3 statsbox statsbox_doc">
                                <h3>Vehicle Model:</h3>
                                <div class="stats_content">
                                    <?php echo "{$vArr[$i]['model']}" ?>
                                </div>
                            </div>
                            <div class="col-md-3 statsbox">
                                <h3>Service Record No:</h3>
                                <div class="stats_content">
                                    10
                                </div>
                            </div>
                            <div class="col-md-3 statsbox">
                                <h3>Mobile No:</h3>
                                <div class="stats_content">
                                    <?php echo "{$vArr[$i]['mobileno']}" ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div></div><?php header("location:Vehicle-history.php?history=true");   ?>
			<!--  history display//////////////////////////////////////////////////////////////////////   -->
			
		<?php
                         
                          $id=$_GET['single'];
								//	echo $id;
									
									
									//echo WWWWWWWWWW;
									$sql1= "SELECT * FROM vehicle_history";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
							
								 // echo WWWWWWWWWW;
								  $no=0;
                                  $no=count($arrr);
								  //echo $no;
								  
                                  if($no==0) { echo "<h3>No Records Found</h1>";  }  
								  
								  else{ ?>
                                  <h1>Service history:</h1>
                                  <table class="table table-bordered">
                                   <thead>
                                  <tr>
                                    <th>No:</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Vehicle Registration Number</th>
                                    <th>Service</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                <?php
                                $i=0;
                                while($i<$no)
                                { 
                                  echo "<tr>
                                        <td>{$arrr[$i][0]}</td>
                                        <td>{$arrr[$i][1]}</td>
                                        <td>{$arrr[$i][2]}</td>
                                        <td>{$arrr[$i][3]}</td>
										<td>{$arrr[$i][4]}</td>
										
                                        
                                        </tr>";
                                  $i++;
                                }
								
					
								  }
								
                                ?>  
                                </tbody>
                                </table>
			
			
			<!--  history display//////////////////////////////////////////////////////////////////////   -->
		
                         
                          
								  
                              
                              
			
			<?php
	         
			//	echo "all run";
			 
			 
			 
			///////////////////////////////////////////////////////////////////////////////////////////						
			?>
   
   
		<?php elseif(isset($_GET['delete'])): ?>
			<?php 
		
			?>
		<?php elseif(isset($_GET['pay'])): ?>
		<?php 
			?>
        <?php elseif(isset($_GET['delete_inq'])): ?>
			<?php
		
			
			?>
   
   
   
		<?php else: require_once 'forms/search_history.php';?>
			<?php 
		
			?>
   
		<?php end; ?>
		

		
		<?php 
								
	
		?>
		
		
		<?php endif;?>
		<?php require_once 'footer.php'; ?>