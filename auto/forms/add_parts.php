<?php 
if(isset($_POST['add_medicine_submit'])): 

$error = NULL;

$already_exists = $db->query("SELECT title from parts where title = '{$db->cleanString($_POST['name'])}'");

if(count($already_exists) > 0)
    $error = 'A part with provided name is already exists, please try again.';
if(!$error) {
    $add_medicine = $db->query("INSERT INTO parts (title,model,manufacturer,country, description, price) VALUES ('{$db->cleanString($_POST['name'])}','{$db->cleanString($_POST['model'])}','{$db->cleanString($_POST['manufac'])}','{$db->cleanString($_POST['country'])}', '{$db->cleanString($_POST['description'])}', '{$db->cleanString($_POST['price'])}')",true);
}

if(!$error) {
    echo '<div class="alert alert-success">Part added successfully</div><a href="parts.php" class="btn btn-default">Go Back</a>';
} else {
    echo '<div class="alert alert-danger">'. $error .'</div><a href="parts.php?action=add" class="btn btn-default">Go Back</a>';
}



else:
?>
<form action="parts.php?action=add" method="post">
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
    <input id="text" type="text" class="form-control" name="name" placeholder="Part Name" required>
  </div>
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
    <input id="text" type="text" class="form-control" name="model" placeholder="Part model" required>
  </div> 
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
    <input id="text" type="text" class="form-control" name="manufac" placeholder="Part Manufacturer" required>
  </div>
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
    <input id="text" type="text" class="form-control" name="country" placeholder="Manufactured country" required>
  </div>  
  <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
    <input id="text" type="text" class="form-control" name="description" placeholder="Description" required>
  </div>
   <div class="formdiv2 input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="text" type="number" class="form-control" name="price" placeholder="Price" required>
  </div>
  
   
   <div class="formdiv2">
  <button type="submit" class="btn btn-default" name="add_medicine_submit">Add Part</button>
  </div>
</form>
<?php 
endif;
?>