<?php
date_default_timezone_set('Asia/Karachi');
$Hour = date('G');
if ( $Hour >= 5 && $Hour <= 11 ) {
    $greeting = "Good Morning";
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    $greeting = "Good Afternoon";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $greeting = "Good Evening";
}

$user = $_SESSION['user'];

?>
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <div class="logo"></div>
                    </a> 
                    <div id="logged-in-info">
                        <span><?php echo $greeting . ' ' . $user['fname']; ?>! <br> <small>You're logged as '<?php echo $user['username']; ?>'</small><br><?php echo $user['typename']; ?></span> <a class="btn btn-danger" href="do_logout.php" role="button">Logout</a>
                    </div>
                </li>
                <?php
                    echo '<li><a href="dashboard.php">Dashboard</a></li>';
                
                    
                
                    if(in_array($user['typename'],['Administrator']))
                        echo '<li><a href="customer.php">Customers</a></li>';
                
                
                    if(in_array($user['typename'],['Administrator']))
                        echo '<li><a href="Vehicle-history.php">Vehicle History</a></li>';
                
                    if(in_array($user['typename'],['Administrator']))
                        echo '<li><a href="parts.php">Add Parts</a></li>';
                
                    if(in_array($user['typename'],['Administrator']))
                        echo '<li><a href="services.php">Add Services</a></li>';
				
				if(in_array($user['typename'],['Administrator']))
                        echo '<li><a href="inqueue.php">In Queue</a></li>';
					
					if(in_array($user['typename'],['Administrator']))
                        echo '<li><a href="sales.php">View Sales</a></li>';
                ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
