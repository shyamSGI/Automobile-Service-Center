			 
<?php 
session_start();
?>      
		<?php require 'header.php'; ?>
        <?php require 'sidebar.php'; ?>
		
		
		<?php
			$id=$_GET['single'];
			
			$sql1 = "SELECT * FROM customer WHERE customer_id = '$id'";
				$sq = mysqli_fetch_assoc(mysqli_query($con,$sql1));		
		?>
		<?php
		
		function runMyFunction() {
			$ppid=$_GET['pid'];
		$oppid=$_GET['opid'];
		echo $ppid;
		echo $oppid;
		echo 'I just ran a php function';
		
		//$sql3 = "SELECT * FROM operation WHERE operation_id = '$oppid'";
		//$sql3r=mysqli_fetch_assoc(mysqli_query($con,$sql3));
			//$wer= $sql3r['title'];
			//echo $sql3r['title'];
			
			//$sql3r['price'];
		
		echo $sql4 = "INSERT INTO test (c1, c2) VALUES ('kkk','lll')";
		if(mysqli_query($con,$sql4)){	
			echo "rrrrrrrrrrr";
		}else{echo "eeeeeeeeeeeeee";};
			/////////////
			
			}

		if (isset($_GET['hello'])) {
		runMyFunction();
		
		}
		
		?>
		
		
		<div class="col-md-12" style="margin-left:20px">  
                <h1>Service Details:</h1>
                <br> 
                <div class="row statsboxes">
                    <div class="stats_title clearfix"><span class="pull-left">Customer ID: <?php echo $id; ?></span></div>
						<div class="col-md-3 statsbox">
                            <h3>Customer Name:</h3>
                            <div class="stats_content">
                                <?php echo $sq['cname']; ?>
                            </div>
                        </div>


					   <div class="col-md-3 statsbox">
                            <h3>Vehicle Registration:</h3>
                            <div class="stats_content">
                                <?php echo $sq['vehicle_reg']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>CNIC:</h3>
                            <div class="stats_content">
                                 <?php echo $sq['cnic']; ?>
                            </div>
                        </div>  
                        <div class="col-md-3 statsbox">
                            <h3>Mobile No:</h3>
                            <div class="stats_content">
                                <?php echo $sq['mobileno']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Model:</h3>
                            <div class="stats_content">
                                <?php echo $sq['model']; ?>a
                            </div>
                        </div>

                        <div class="col-md-3 statsbox">
                            <h3>Registration Date:</h3>
                            <div class="stats_content">
                                <?php echo $sq['registration_date']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Brand:</h3>
                            <div class="stats_content">
                                <?php echo $sq['brand']; ?>
                            </div>
                        </div>
                        <div class="col-md-3 statsbox">
                            <h3>Email:</h3>
                            <div class="stats_content">
                                <?php echo $sq['email']; ?>
                            </div>
                        </div>
                        
                 </div>
                 <br>
			
					<?php
					echo "<a href=\"addtocart.php?pay=true&pid=$id\" class=\"btn btn-primary btn-lg\">PAID THE FULL AMOUNT</a>";
					?>
		
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
	<?php 
	echo "<br>";
	echo _________________________________________________________________________;
	echo _________________________________________________________________________;
	echo _________________________________________________________________________;
	?>	
        <!-- Page Content -->
        <div id="page-content-wrapper" style="margin-left:20px">
            <div class="container-fluid">
                <div class="row">
                    
                   
                    
					
					
					<!--  User info  -->
		
                    <div class="col-md-12">   
                   <?php
									$id=$_GET['single'];
									//echo $id;
									
									
									
									$sql1= "SELECT * FROM cart WHERE customer_id=$id";
									$arr1=mysqli_query($con,$sql1);
									$arrr = mysqli_fetch_all($arr1);
							
								  //echo WWWWWWWWWW;
								  $no=0;
                                  $no=count($arrr);
								  //echo $no;
								  
                                  if($no==0) : ?>
                                  <h3>New Invoice</h1>
                                <?php else: ?>
								<div id="reciept"> 
                                  <h1>INVOICE:</h1>
                                  <table class="table table-bordered">
                                   <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Customer_ID</th>
                                    <th>Customer Name</th>
                                    
                                    <th>Service</th>
									<th>Cost</th>
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
                                        
										<td>{$arrr[$i][4]}</td>
										<td>{$arrr[$i][5]}</td>
                                        <td>
                                        
                                        <a href=\"addtocart.php?delete=true&pid=$id&opid={$arrr[$i][3]}&ccid={$arrr[$i][0]}\" class=\"btn btn-danger btn-sm\">Delete</a>
                                        </td>
                                        </tr>";
                                  $i++;
                                }
								$j=0; $k=0;
								while($j<$no)
                                { 
										$k=$k+$arrr[$j][5];
									$j++;
								}
								echo "<h3>::::::::::::::::::::::::::::::::::::::::::</h3>";
								echo "<h2>TOTAL = Rs: ".$k." </h2>";
								echo "<h3>::::::::::::::::::::::::::::::::::::::::::</h3>";
								//echo $k;
								
								//echo ":::::::::::::::::::::";
								
								
								
								
								
                                ?>   
                                </tbody>
                                </table></div>
                                <button type="button" class="btn btn-warning" onclick="PrintElem('reciept');"><span class="glyphicon glyphicon-folder-open pull-right"></span>&nbsp;&nbsp;Print&nbsp;&nbsp;</button> 
                              </div>
							  
							</div>
                      
                        
                   
				

            <?php
									$sql1= "SELECT * FROM customer WHERE customer_id=$id";
									$arr1=mysqli_query($con,$sql1);
									$arr = mysqli_fetch_all($arr1);
			?>        
	            
                    
                <?php endif; ?>
                </div>
            </div>
		 <!-- /#page-content-wrapper -->
<?php 	echo ____________________________________________________________________________;
		echo ____________________________________________________________________________;
		echo ____________________________________________________________________________;
?>
       	
			
   <table> <tr> <td>   				<!--  invoice  -->
<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
				
					<div class="col-md-12">  
<?php
		//require 'header.php';
      //require 'sidebar.php';
		echo "<div > <table> <tr> <td>";
			
									$sql1= "SELECT * FROM services";
									$arr1=mysqli_query($con,$sql1);
									$arr = mysqli_fetch_all($arr1);
							
								  //echo WWWWWWWWWW;
								  $no=0;
                                  $no=count($arr);
								  //echo $no;
								  
                                  if($no==0){
                                  echo 'No Service Found';
								  }	
							   else{
                                 echo "<h1>All Services:</h1>
                                  <table class=table table-bordered>
                                   <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Name of service</th>
                                    <th>Cost</th>
                                    <th>Description</th>
                                    <th>Details</th>
                                  </tr>
                                </thead>
                                <tbody> ";
                               
                                $i=0;
                                while($i<$no)
                                { 
                                  echo "<tr>
                                        <td>{$arr[$i][0]}</td>
                                        <td>{$arr[$i][1]}</td>
                                        <td>{$arr[$i][2]}</td>
                                        <td>{$arr[$i][3]}</td>
										<td>{$arr[$i][4]}</td>
                                        <td>
                                        <a href=\"addtocart.php?hello=true&pid=$id&opid={$arr[$i][0]}\" class=\"btn btn-warning btn-sm\">ADD</a>
										
                                        
                                        </td>
                                        </tr>";
                                  $i++;
							   }
							   
							   echo "</tbody>
                                </table>";
							   }	
				//echo "</div> </table></td> </tr> ";
								
?></td>
<td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
<?php
		//require 'header.php';
      //require 'sidebar.php';
		//echo "<div> <table> <tr> <td>";
			
									$sql1= "SELECT * FROM parts";
									$arr1=mysqli_query($con,$sql1);
									$arr = mysqli_fetch_all($arr1);
							
								  //echo WWWWWWWWWW;
								  $no=0;
                                  $no=count($arr);
								  //echo $no;
								  
                                  if($no==0){
                                  echo 'No Parts Found';
								  }	
							   else{
                                 echo "<h1>All Parts:</h1>
                                  <table class=table table-bordered>
                                   <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Name of parts</th>
                                    <th>Cost</th>
                                    <th>Description</th>
                                    <th>Details</th>
                                  </tr>
                                </thead>
                                <tbody> ";
                               
                                $i=0;
                                while($i<$no)
                                { 
                                  echo "<tr>
                                        <td>{$arr[$i][0]}</td>
                                        <td>{$arr[$i][1]}</td>
                                        <td>{$arr[$i][2]}</td>
                                        <td>{$arr[$i][3]}</td>
										<td>{$arr[$i][4]}</td>
                                        <td>
                                        <a href=\"addtocart.php?parts_add=true&pid=$id&opid={$arr[$i][0]}\" class=\"btn btn-warning btn-sm\">ADD</a>
										
                                        
                                        </td>
                                        </tr>";
                                  $i++;
							   }
							   
							   echo "</tbody>
                                </table>";
							   }	
				echo "</div> </td></tr></table>  ";
								
?></td></tr></table>
	

</div></div></div></div>
                    <!--  invoice vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv  -->
					
<script>
	    function PrintElem(elem)
    {
      var mywindow = window.open('', 'PRINT', 'height=400,width=800');


        mywindow.document.write('<html><head><title>' + document.title  + '</title>');

        mywindow.document.write("</head><link rel='stylesheet' href='css/bootstrap.min.css'><body >");
      mywindow.document.write('<h2>' + document.title  + '</h2>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('<h5>This is computer genarated Invoice for the Vehicle Service </h5>');
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;

        }
</script>
					
					
<?php require_once 'footer.php'; ?>