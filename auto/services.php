<?php 
session_start();
?>        <?php require_once 'header.php'; ?>
        <?php require_once 'sidebar.php'; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'add') : ?>
                    
                    <div class="col-md-12">   
                        <h1>Add New Services</h1>

                            <?php include 'forms/add_service.php'; ?>
                        
                    </div>

                    <?php elseif(isset($_GET['action']) && $_GET['action'] == 'view_all') : ?>
                    <div class="col-md-12">   
                        <?php
                                  $q="select service_id,title,price,estimated_time,description from services";
                                  $arr=$db->query($q);
                                  $no=0;
                                  $no=count($arr);
                                  if($no==0) : ?>
                                  <h3>No Services Found</h1>
                                <?php else: ?>
                                  <h1>All Services:</h1>
                                  <table class="table table-bordered">
                                   <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Estimated Time</th>
                                    <th>Description</th>
                                    <th>Option</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                <?php
                                $i=0;
                                while($i<$no)
                                { 
                                  echo "<tr>
                                        <td>{$arr[$i]['title']}</td>
                                        <td>{$arr[$i]['price']}</td>
                                        <td>{$arr[$i]['estimated_time']}</td>
                                        <td>{$arr[$i]['description']}</td>
                                        <td>
                                        
                                        <a href=\"services.php?single_delete=true&id={$arr[$i]['service_id']}\" class=\"btn btn-danger btn-sm\">Delete</a>
                                        </td>
                                        </tr>";
                                  $i++;
                                }
                                ?>  
                                </tbody>
                                </table>
                                
                              </div>

                            <?php endif; ?>
                        
                    </div>
					
					<?php elseif(isset($_GET['single_delete'])):
							$service_id = $db->cleanString($_GET['id']);
              
                    
                $q = $db->query("DELETE FROM services WHERE service_id = '{$service_id}'", true);
				
                if($q) {
                    echo '<div class="alert alert-success">Service with ID ' . $service_id . ' deleted successfully</div><a href="parts.php" class="btn btn-default">Go Back</a>';
                } else {
                    echo '<div class="alert alert-danger">Error occured, please try again.</div><a href="parts.php" class="btn btn-default">Go Back</a>';
                }
					?>
					
					
					
					
   <?php elseif(isset($_GET['action']) && $_GET['action'] == 'view_all') : ?>                 
                    
                    <?php else: ?>
                    <div class="col-md-12">   
                        <h1>SERVICES</h1>
                        <br>
                        <div class="row">
                            <a href="services.php?action=add" class="btn btn-lg btn-success">Add New Service</a>
                            <a href="services.php?action=view_all" class="btn btn-lg btn-primary">View All Services</a>
                        </div>
                            
                    </div>
                    
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        <?php require_once 'footer.php'; ?>