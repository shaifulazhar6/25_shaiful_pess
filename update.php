<?php
	require_once "db.php";
	$isBtnSearchClicked = isset($_POST["btnSearch"]);
	$car = null;
	$statuses = [];
	if($isBtnSearchClicked == true) {
		$carId = $_POST["patrolCarId"];
		//echo "You have search car id:" . $carId;
	$sql = "SELECT * FROM `patrolcar` WHERE 'patrolcar_id' = '" . $carId . "'";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$result = $conn->query($sql);
	if($row = $result->fetch_assoc()) {
		$carId = $row["patrolcar_id"];
		$statusId = $row["patrolcar_status_id"];
		$car = ["id"=>$carId,"statusId"=>$statusId];
	}
		
		$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		$sql = "SELECT * FROM patrolcar_status";
		$result = $conn->query($sql);
		$incidentTypes = [];
		while($row = $result->fetch_assoc()){
			$id = $row["patrolcar_status_id"];
			$title = $row["patrolcar_status_desc"];
			$status = ["id"=>$id, "title"=>$title];
			array_push($statuses,$status);
		}
		
		$conn->close();
		
	}

	$updateSucess = false;
	
		
?>

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
		<?php
			if($car !=null) {
				echo "<div class=\"form-group row\">
        <label for=\"patrolCarId\" class=\"col-sm-4 form-label\">Patrol Car Number</label>
        <div class=\"col-sm-8\">
			<span>
				" . $car["id"] . "
				<input type=\"hidden\" id=\"patrolCarId\" name=\"patrolCarId\" value=\"" . $car["id"] . "\">
			</span>
        </div>
      </div>
		<div class=\"form-group row\">
        <label for=\"contactNo\" class=\"col-sm-4 col-form-label\">Patrol Car Status</label>
        <div class=\"col-sm-8\">
			<select id=\"carStatus\" class=\"form-control\" name=\"carStatus\">
			<option value=\"\">Select</option>
			";
			$selected = "";
			foreach($statuses as $status) {
				if($status["id"] == $car["statusId"]) {
					$selected = " selected=\"selected\"";
				}
				echo "<option value=\"" . $status["id"] . "\" " . $selected . ">". $status["title"] . "</option>";
				$selected = "";
			}
			echo 
			"
			</select>
        </div>
      </div>
	  
      <div class=\"form-group row\">
        <div class=\"offset-sm-4 col-sm-8\">
		   <button type=\"submit\" class=\"btn btn-primary\" name=\"submit\" id=\"submit\">Update</button>
        </div>
      </div>";
			}
		else {
			echo  "<div class=\"form-group row\">
        <div class=\"offset-sm-4 col-sm-12\">
			No record found.
        </div>
      </div>";
		}
		?>

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
