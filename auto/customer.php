<?php 
session_start();
?>

<?php
		   define('HOST','localhost');
        define('USER','root');
       	define('PASS','');
	define('DB','jcauto');
	
        $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
    error_reporting(0);    

?>

 <?php require_once 'header.php'; ?>
        <?php require_once 'sidebar.php'; ?>

        <!-- If Add Button Is Pressed -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'add'): ?>
                    
                    <div class="col-md-12">   
                        <h1>Add New Vehicle</h1>

                            <?php include 'forms/add_customer.php'; ?>
                        
                    </div>
                    
                <!-- If View All/Search Button Is Pressed -->
                <?php elseif(isset($_GET['action']) && $_GET['action'] == 'view_all'): ?>
                


                    <div class="col-md-12"> 
                        <?php if($_GET['action'] == 'view_all') echo '<h1>All Customers</h1>'; ?>
                       <?php
                         
                          $q="select customer_id, vehicle_reg,cname,cnic,mobileno from customer";
                          $arr=$db->query($q);
                          $no=0;
                          $no=count($arr);
                          if($no==0) { ?>
                          <h3>No Result Found</h3>
                        <?php } else { ?>
                          <?php (isset($_GET['action']) && $_GET['action'] != 'view_all') ? '<h3>Search Results:</h3>' : ''; ?>
                          <table class="table table-bordered">
                           <thead>
                          <tr>
                            <th>Customer Id</th>
                            <th>Vehicle Registration</th>
                            <th>Customer Name</th>
                            <th>CNIC</th>
                            <th>Mobile No.</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $i=0;
                        while($i<$no)
                        { 
                          echo "<tr>
                                <td>{$arr[$i]['customer_id']}</td>
                                <td>{$arr[$i]['vehicle_reg']}</td>
                                <td>{$arr[$i]['cname']}</td>
                                <td>{$arr[$i]['cnic']}</td>
                                <td>{$arr[$i]['mobileno']}</td>
                                <td>
                                <a href=\"customer.php?action=single_view&id={$arr[$i]['customer_id']}\" class=\"btn btn-primary btn-sm\">View</a>";
                            if($user['typename'] == 'Administrator')
                                echo "<a href=\"customer.php?action=single_delete&id={$arr[$i]['customer_id']}\" class=\"btn btn-danger btn-sm\">Delete</a>
                                </td>
                                </tr>";
                          $i++;
                        }
                        ?>  
                        </tbody>
                        </table>
                  </div>
                <?php } ?>
                    
            <?php elseif(isset($_GET['action']) && $_GET['action'] == 'create_new_visitrecord'): 
                    $idid=$_GET['id'];
					$sql1 = "SELECT * FROM customer WHERE customer_id = '$idid'";
				$customer = mysqli_fetch_assoc(mysqli_query($con,$sql1));
				$cus=$customer['cname'];
				$veh=$customer['vehicle_reg'];
                 $sql2="INSERT INTO visit_rec (customer_name, vehicle_reg, in_time, customer_id, state) VALUES ('$cus', '$veh', now(), '$idid', 1);"; 
				 //$sql2="INSERT INTO test (c1, c2) VALUES ('kd','lk');"; 
					//$sqlr=mysqli_query($con,$sql2);
					echo $idid;
					if(mysqli_query($con,$sql2)){
              echo '<div class="alert alert-success">Visit Record Created Successfully <a class="btn btn-default" href="customer.php">Go Back</a></div>';
					}
					else{
				echo '<div class="alert alert-success">ERROR <a class="btn btn-default" href="customer.php">Go Back</a></div>';
					}
			
			?>

                    
                    
                    
                    
                    
            <?php elseif(isset($_GET['action']) && $_GET['action'] == 'single_view'):
                $customer_id = $db->cleanString($_GET['id']);
              //  $customer = $db->query("SELECT * FROM customer p, address a WHERE p.customer_id = '{$customer_id}' AND a.address_id = p.address_id LIMIT 1")[0];
				$sql1 = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
				$customer = mysqli_fetch_assoc(mysqli_query($con,$sql1));
			/////////////////
			
				
			//echo $check['position'];
			//$pos=$check['position'];
			//echo $pos;
			
			/////////////////
			//print $customer[vehicle_reg];
			?>
			<?php echo $customer_id; 
			$qwe=$customer['vehicle_reg'];
			?>
			<?php echo $qqq; ?>
             <div class="col-md-12">  
                <h1>Customer Details:</h1>
                <br> 
                <div class="row statsboxes">
                    <div class="stats_title clearfix"><span class="pull-left">Customer Id: <?php echo $customer_id; ?></span></div>
                        <div class="col-md-3 statsbox">
                            <h3>Customer Name:</h3>
                            <div class="stats_content">
                                <?php echo $customer['vehicle_reg']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>CNIC:</h3>
                            <div class="stats_content">
                                 <?php echo $customer['cnic']; ?>
                            </div>
                        </div>  
                        <div class="col-md-3 statsbox">
                            <h3>Mobile No:</h3>
                            <div class="stats_content">
                                <?php echo $customer['mobileno']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Vehicle Model:</h3>
                            <div class="stats_content">
                                <?php echo $customer['model']; ?>
                            </div>
                        </div>

                        <div class="col-md-3 statsbox">
                            <h3>Registration Date:</h3>
                            <div class="stats_content">
                                <?php echo $customer['registration_date']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Brand:</h3>
                            <div class="stats_content">
                                <?php echo $customer['brand']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Email:</h3>
                            <div class="stats_content">
                                <?php echo $customer['email']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Date of Birth:</h3>
                            <div class="stats_content">
                                <?php echo $customer['dob']; ?>
                            </div>
                        </div>
                 </div>
                 <br>
                 <a href="customer.php?action=create_new_visitrecord&id=<?php echo $customer_id; ?>" class="btn btn-primary btn-lg">Create New Visit Record</a>
            </div>
            <?php elseif(isset($_GET['action']) && $_GET['action'] == 'single_edit'):
                $customer_id = $db->cleanString($_GET['id']);
            ?>
            <div class="col-md-12"> 
                <h1>Update Customer:</h1>
                <?php require_once 'forms/edit_customer.php'; ?>
            </div>
            <?php elseif(isset($_GET['action']) && $_GET['action'] == 'single_delete'):
                $customer_id = $db->cleanString($_GET['id']);
                // single delete
                    /* 
                        checking if room alloted, visit record exists
                    */
                    // room
                    $db->query("UPDATE room SET customer_id = NULL WHERE customer_id = '{$customer_id}'", true);
                    
                    $precriptions = $db->query("SELECT presc_id FROM precription_rec WHERE customer_id = '{$customer_id}'");
                   
                    $precriptions_count = count($precriptions);
                    for($i = 0; $i < $precriptions_count; $i++) {
                        $db->query("DELETE FROM presc_med WHERE presc_id = '{$precriptions[$i]['presc_id']}'",true);
                    }
                    $db->query("DELETE FROM precription_rec WHERE customer_id = '{$customer_id}'",true);
                    
                    $db->query("DELETE FROM medical_record WHERE customer_id = '{$customer_id}'",true);
                    
                    // visit record
                    $db->query("DELETE FROM visit_record WHERE customer_id = '{$customer_id}'",true);
                    
                    
                $q = $db->query("DELETE FROM customer WHERE customer_id = '{$customer_id}'", true);
                if($q) {
                    echo '<div class="alert alert-success">customer with ID ' . $customer_id . ' deleted successfully</div><a href="customers.php" class="btn btn-default">Go Back</a>';
                } else {
                    echo '<div class="alert alert-danger">Error occured, please try again.</div><a href="customers.php" class="btn btn-default">Go Back</a>';
                }
            ?>


             <?php else: ?>
                    <!--Main Page-->
            <div class="col-md-12">   
                <h1>Customers</h1>
                <br>
                <div class="row">
                    <a href="customer.php?action=add" class="btn btn-lg btn-success">Add New Customer</a>
                    <a href="customer.php?action=view_all" class="btn btn-lg btn-primary">View All Customers</a>
                </div>

            </div>

            <?php endif; ?>
        </div>
    </div>
<!-- /#page-content-wrapper -->

<?php require_once 'footer.php'; ?>