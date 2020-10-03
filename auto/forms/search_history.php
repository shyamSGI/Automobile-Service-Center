<div class="col-md-12">   
    <h3>Find Vehicle:</h3>
    <form action="Vehicle-history.php?search=true" method="post">
    <div class="searchBox input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
         <input id="text" type="text" class="inputBox form-control" name="searchVal" placeholder="Enter Vehicle Registration Number:" required="" <?php //echo isset($_POST['searchVal']) ? "value=\"{$db->cleanString($_POST['searchVal'])}\"": '' ?>/>
    </div>
	<?php session_start();
	//$_session['searchVal']=$_POST['searchVal'];
	?>
    <div style="margin-top:10px">
        <button type="submit" name="search" class="btn btn-success">Search</button>
    </div>
    </form>   
</div>