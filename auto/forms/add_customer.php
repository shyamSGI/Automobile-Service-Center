<?php 
//require 'class.db.php';
if(isset($_POST['add_customer_submit'])):
$error = NULL;

$already_exists = $db->query("SELECT email, cnic from customer WHERE email = '{$db->cleanString($_POST['first_name'])}' OR cnic = '{$db->cleanString($_POST['first_name'])}'");
   
    if(count($already_exists))
        $error = 'An customer with provided email or cnic is already exists, please try again.';
    
    if(!$error) {
        /*$db->query("INSERT INTO address (houseno, streetno, city, province, zipcode, country)
                values ('{$db->cleanString($_POST['house_no'])}', '{$db->cleanString($_POST['street_no'])}', '{$db->cleanString($_POST['city'])}', '{$db->cleanString($_POST['province'])}', '{$db->cleanString($_POST['zip_code'])}', '{$db->cleanString($_POST['country'])}')",true);

        $address_id = $db->query("SELECT address_id FROM address ORDER BY address_id desc LIMIT 1")[0]['address_id'];
		*/
        $q = $db->query("INSERT INTO customer (vehicle_reg, brand, model, cname, dob, cnic, email, mobileno, remark, registration_date)
		 VALUES ('$_POST[first_name]', '$_POST[brand]', '$_POST[model]', '$_POST[cname]', '$_POST[dob]', '$_POST[cnic_no]', '$_POST[email]', '$_POST[phone_no]','$_POST[remarks]',now())",true);
		
		
		//$sql1="INSERT INTO customer (vehicle_reg, brand, model, cname, dob, cnic, email, mobileno, remark, registration_date)
	//	VALUES ('$_POST[first_name]', '$_POST[brand]', '$_POST[model]', '$_POST[cname]', '$_POST[dob]', '$_POST[cnic_no]', '$_POST[email]', '$_POST[phone_no]','$_POST[remarks]',now())";
		//$arr1=mysqli_query($con,$sql1);
		
	
		
		//$qw=$_POST['first_name'];
		//	echo $qw;
		//	$we=$_POST['brand'];
		//	echo $we;
			
			
	    //$q = $db->query("INSERT INTO test (c1) VALUES('$_POST[first_name]')",true);
	
	}
	
	
if(!$error) {
    echo '<div class="alert alert-success">Customer added successfully</div><a href="customer.php" class="btn btn-default">Go Back</a>';
} else {
    echo '<div class="alert alert-danger">'. $error .'</div><a href="customer.php?action=add" class="btn btn-default">Go Back</a>';
}
else: 
?>


<form action="customer.php?action=add" method="post">
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="first_name" placeholder="Vehicle Registration Number">
  <h2> ex: EP-CBA-1234</h2>
  </div>
 
  <div class="formdiv2 input-group">
        <label for="emp_type">Brand:</label>
		<input id="text" type="text" class="form-control" name="brand" placeholder="Brand" required>
      </div>
  <
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="icon-car"></i></span>
    <input id="text" type="text" class="form-control" name="model" placeholder="Model" required>
  </div>
  
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="cname" placeholder="Customer Name">
  </div>
    
        <div class='input-group date formdiv2' id='datetimepicker1'>
         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type='text' class="form-control" name="dob" placeholder="Date of Birth" />
        </div>
      <div class="formdiv2 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input id="text" type="text" class="form-control" name="cnic_no" placeholder="NIC Number" required>
      </div>
   <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
  </div>
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
    <input id="text" type="number" class="form-control" name="phone_no" placeholder="Phone Number" required>
  </div>
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="	glyphicon glyphicon-comment"></i></span>
    <input id="text" type="text" class="form-control" name="remarks" placeholder="Remarks">
  </div>
  
  
  <!--<div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="	glyphicon glyphicon-warning-sign"></i></span>
    <input id="text" type="number" class="form-control" name="phone_no2" placeholder="Emergence Phone Number" required>
  </div>-->
 
   <!-- <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input id="text" type="number" class="form-control" name="house_no" placeholder="House No." required>
  </div>
    <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
    <input id="text" type="number" class="form-control" name="street_no" placeholder="Street No." required>
  </div>
  
   
  
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
    <input id="text" type="text" class="form-control" name="country" placeholder="Country" required>
  </div>
  
   <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
    <input id="text" type="text" class="form-control" name="province" placeholder="Address" required>
  </div>-->
  <!-- <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
    <input id="text" type="number" class="form-control" name="zip_code" placeholder="Zip Code" required>
  </div>-->
   
   <div class="formdiv2">
      <button type="submit" class="btn btn-success" name="add_customer_submit">Add Vehicle</button>
      <button type="reset" class="btn btn-default">Reset</button>
  </div>
</form>

<?php
endif;
?>