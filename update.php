 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Patrol Car</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>
<div class="container" style="width:900px">
<?php
		include "header.php";
	?>
  <section class="mt-3">
    <form>
      <div class="form-group row">
        <label for="patrolCarId" class="col-sm-4 form-label">Patrol Car Number</label>
        <div class="col-sm-8">
			<span>
				SJX665W
				<input type="hidden" id="patrolCarId" name="patrolCarId" value="SJX665W">
			</span>
        </div>
      </div>
		<div class="form-group row">
        <label for="contactNo" class="col-sm-4 form-label">Patrol Car Status</label>
        <div class="col-sm-8">
			<select id="carStatus" class="form-control" name="carStatus">
			<option value="">Select</option>
			<option value="On Site">On Site</option>
			<option value="Available">Available</option>

			</select>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-4 col-sm-8">
		   <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
        </div>
      </div>
    </form>
  </section>
<?php
		include "footer.php";
	?>
</div>
<script src="js/jquery-3.4.1.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
