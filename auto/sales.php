<?php 
session_start();
?>

 <?php require_once 'header.php'; ?>
        <?php require_once 'sidebar.php'; ?>

        <!-- If Add Button Is Pressed -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
           <div class="col-md-12"> 
						<a href="report.php" class="btn btn-lg btn-success">Print Sales Reports</a>
                       <?php
                         
                          $id=$_GET['single'];
									echo $id;
									
									
									//echo WWWWWWWWWW;
									$sql1= "SELECT * FROM sales";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
							
								 // echo WWWWWWWWWW;
								  $no=0;
                                  $no=count($arrr);
								  //echo $no;
								  
                                  if($no==0) : ?>
                                  <h3>No Records Found</h1>
                                <?php else: ?>
                                  <h1>SALES:</h1>
                                  <table class="table table-bordered">
                                   <thead>
                                  <tr>
                                    <th>No:</th>
                                    <th>Date</th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
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
										<td>Rs:{$arrr[$i][4]}</td>
										
                                        
                                        </tr>";
                                  $i++;
                                }
								
					
								
								
                                ?>  
                                </tbody>
                                </table>
                                
                              </div>

   
   

            
            <?php endif; ?>
        </div>
    </div>
<!-- /#page-content-wrapper -->

<?php require_once 'footer.php'; ?>