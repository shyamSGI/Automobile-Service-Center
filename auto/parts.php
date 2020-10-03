<?php
session_start();
?>
        <?php require_once 'header.php'; ?>
        <?php require_once 'sidebar.php'; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'add') : ?>
                    
                    <div class="col-md-12">   
                        <h1>Add New Parts</h1>

                            <?php include 'forms/add_parts.php'; ?>
                        
                    </div>
                    
                    <?php elseif(isset($_GET['action']) && $_GET['action'] == 'view_all') : ?>
                        <div class="col-md-12">   

                            <?php
                                  $q="select * from parts";
                                  $arr=$db->query($q);
                                  $no=0;
                                  $no=count($arr);
                                  if($no==0) : ?>
                                  <h3>No Parts Found</h1>
                                <?php else: ?>
                                  <h1>All PARTS:</h1>
                                  <table class="table table-bordered">
                                   <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>Manufacturer</th>
                                    <th>Country</th>
                                    <th>Decription</th>
                                    <th>Price</th>
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
                                        <td>{$arr[$i]['model']}</td>
                                        <td>{$arr[$i]['manufacturer']}</td>
                                        <td>{$arr[$i]['country']}</td>
                                        <td>{$arr[$i]['description']}</td>
                                        <td>{$arr[$i]['price']}</td>
                                        <td>
                                        
                                        <a href=\"parts.php?single_delete=true&id={$arr[$i]['part_id']}\" class=\"btn btn-danger btn-sm\">Delete</a>
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
							$part_id = $db->cleanString($_GET['id']);
              
                    
                $q = $db->query("DELETE FROM parts WHERE part_id = '{$part_id}'", true);
				
                if($q) {
                    echo '<div class="alert alert-success">Part with ID ' . $part_id . ' deleted successfully</div><a href="parts.php" class="btn btn-default">Go Back</a>';
                } else {
                    echo '<div class="alert alert-danger">Error occured, please try again.</div><a href="parts.php" class="btn btn-default">Go Back</a>';
                }
					?>
						
						
						
						
						
						
						
						
						

                        
                    <?php else: ?>
                    <div class="col-md-12">   
                        <h1>PARTS</h1>
                        <br>
                        <div class="row">
                            <a href="parts.php?action=add" class="btn btn-lg btn-success">Add New Parts</a>
                            <a href="parts.php?action=view_all" class="btn btn-lg btn-primary">View All Parts</a>
                        </div>
                    </div>
                    
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        <?php require_once 'footer.php'; ?>