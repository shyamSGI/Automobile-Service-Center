<?php 
session_start();
?>        <?php require_once 'header.php'; ?>
        <?php require_once 'sidebar.php'; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    
                   
                    
					
					
					

                    <div class="col-md-12">   
                   <?php
									//echo WWWWWWWWWW;
									$sql1= "SELECT * FROM visit_rec WHERE state=1";
									$arr1=mysqli_query($con,$sql1);
									$arr = mysqli_fetch_all($arr1);
									
			
									//echo $row[0]['c2'];
			
									
									//if($arr=mysqli_query($con,$sql1))
								//	{
								//		$arr1=mysqli_fetch_array(mysqli_query($con,$sql1));
								//		print $arr1[c1];
								//		print $arr1['c2'];
									//$arr=mysqli_query($con,$sql1);
								//	}
									//print $arr1['c1'];
									//	print $arr1['c2'];
                                  //$q="select operation_id,title,price,estimated_time,description from operation";
                                 // $arr=$db->query($q);
                                 
								 //echo $arr;
								  //echo WWWWWWWWWW;
								  $no=0;
                                  $no=count($arr);
								 // echo $no;
								  
                                  if($no==0) : ?>
                                  <h3>No Vehicles to Service</h1>
                                <?php else: ?>
                                  <h1>All Operation:</h1>
                                  <table class="table table-bordered">
                                   <thead>
                                  <tr>
                                    <th>NO</th>
                                    <th>Customer Name</th>
                                    <th>Vehicle Registration Number</th>
                                    <th>Date and Time</th>
                                    <th>Customer ID</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                <?php
                                $i=0;
                                while($i<$no)
                                { 
                                  echo "<tr>
                                        <td>{$arr[$i][0]}</td>
                                        <td>{$arr[$i][1]}</td>
                                        <td>{$arr[$i][2]}</td>
                                        <td>{$arr[$i][3]}</td>
										<td>{$arr[$i][6]}</td>
                                        <td>
                                        <a href=\"action.php?single={$arr[$i][6]}\" class=\"btn btn-warning btn-sm\">Take Action</a>
										
                                        <a href=\"addtocart.php?delete_inq=true&qid={$arr[$i][6]}\" class=\"btn btn-danger btn-sm\">Delete</a>
                                        </td>
                                        </tr>";
                                  $i++;
                                }
								
								
                                ?>  
                                </tbody>
                                </table>
                                
                              </div>

                      
                        
                    </div>
                    
					
               
                   
                    
                <?php endif; ?>
                </div>
            </div>
      
        <!-- /#page-content-wrapper -->

        <?php require_once 'footer.php'; ?>
	
		<!-- ////////////////////////////////////////////////////////////////////////// -->