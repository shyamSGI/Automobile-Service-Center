<?php 
if(isset($_POST['add_service_submit'])): 

$error = NULL;

$already_exists = $db->query("SELECT title from services where title = '{$db->cleanString($_POST['name'])}'");

if(count($already_exists) > 0)
    $error = 'An service with provided name is already exists, please try again.';
if(!$error) {
    $add_medicine = $db->query("INSERT INTO services (title, price, estimated_time, description) VALUES ('{$db->cleanString($_POST['name'])}', '{$db->cleanString($_POST['price'])}', '{$db->cleanString($_POST['estimated_time'])}', '{$db->cleanString($_POST['description'])}')",true);
}

if(!$error) {
    echo '<div class="alert alert-success">Service added successfully</div><a href="services.php" class="btn btn-default">Go Back</a>';
} else {
    echo '<div class="alert alert-danger">'. $error .'</div><a href="services.php?action=add" class="btn btn-default">Go Back</a>';
}



else:
?>
<form action="services.php?action=add" method="post">

  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-minus"></i></span>
    <input id="text" type="text" class="form-control" name="name" placeholder="Service Name">
  </div>
    
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
    <input id="text" type="text" class="form-control" name="description" placeholder="Description" required>
  </div>
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="text" type="number" class="form-control" name="price" placeholder="Cost">
  </div>
 
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
    <input id="text" type="text" class="form-control" name="estimated_time" placeholder="Estimated Time">
  </div>
  
   <div class="formdiv2">
  <button type="submit" class="btn btn-default" name="add_service_submit">Add Service</button>
  </div>
</form>
<?php 
endif;
?>