<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- add boostrap css link -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- add a style.css link -->
<link rel="stylesheet" typr="text/css" href="css/style.css">
<title>Temperature Converter</title>
</head>
<body>
<?php 
// function to calculate converted temperature
function convertTemp($temp,$unit1,$unit2){
	switch ($unit1) {
		case 'celsius':

			if ($unit1 == "celsius" and $unit2 == "farenheit"){
				$F = $_POST['originaltemp'] * 9/5 + 32;
				return $F;
			} // end if

			if ($unit1 == "celsius" and $unit2 == "kelvin"){
				$K = $_POST['originaltemp'] + 273.15;
				return $K;
			} // end if

		case 'farenheit':
			if ($unit1 == "farenheit" and $unit2 == "celsius"){
				$C = ($_POST['originaltemp'] - 32 ) * 5/9;
				return $C;
			} // end if

			if ($unit1 == "farenheit" and $unit2 == "kelvin"){
				$K = ($_POST['originaltemp'] + 459.67) * 5/9;
				return $K;
			} // end if	

		case 'kelvin':
			if ($unit1 == "kelvin" and $unit2 == "celsius"){
				$C = $_POST['originaltemp'] - 273.15;
				return $C;
			} // end if

			if ($unit1 == "kelvin" and $unit2 == "farenheit"){
				$F = $_POST['originaltemp'] * 9/5 - 459.67;
				return $F;
			} // end if

		default:
			if ($unit1 == $unit2){
				return $temp;
			}
	} // end switch

} // end function

#CHECK TO SEE IF FORM WAS SUBMITTED
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$originalTemperature = $_POST['originaltemp'];
	$originalUnit= $_POST['originalunit'];
	$conversionUnit = $_POST['conversionunit'];
	$convertedTemp = convertTemp($originalTemperature,$originalUnit,$conversionUnit);
} // end if

if (isset($_POST['originalunit'])){
	$originalUnit = $_POST['originalunit'];
} else {
	// looks like the form wasn't being posted
	$originalUnit = "";
} // end if

if (isset($_POST['conversionunit'])){
	$conversionUnit = $_POST['conversionunit'];
} else {
  	// looks like the form wasn't being posted
	$conversionUnit = "";
} // end if
?>


<div class="container-fluid bg-primary">
	<div class="row">
		<h1 class="col-12 mt-4">Temperature Converter</h1>
	</div> <!--end of row-->

	<div class="row mb-4">		
		<h4 class="col-12 mt-2 mb-5" >CTEC 127 - PHP with SQL 1</h4>
	</div> <!--end of row-->
</div> <!--end container -->

<div class="container container1 bg-warning pt-2 mt-5 mb-5">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form1">
		
		<div class="row">	
			<div class="col-6">	 
				<div class="form-group">
					<label for="temp">Temperature</label>
					<input type="text" value="<?php if (isset($_POST['originaltemp'])) echo $_POST['originaltemp'];?>" name="originaltemp" size="7" maxlength="7" id="temp" class="form-control" required>
				</div><!-- end form group -->
			</div><!-- end col -->
		
		<div class="col-6">
			<div class="form-group">
				<label for="originalunit">Select</label>
				<select name="originalunit" id="originalunit" class="form-control">
					<option value="--Select--"<?php if($originalUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
					<option value="celsius"<?php if($originalUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
					<option value="farenheit"<?php if($originalUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
					<option value="kelvin"<?php if($originalUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
				</select>
			</div><!-- end form group -->
	</div><!-- end col -->
		</div><!-- end row -->
	<div class="row">	
			<div class="col-6">	 
				<div class="form-group">
					<label for="convertedtemp">Converted Temperature</label>
					<input type="text" value="<?php if (isset($_POST['originaltemp'])) echo round($convertedTemp, 1);?>" 
					name="convertedtemp" size="7" maxlength="7" id="convertedtemp" class="form-control" readonly>
			</div><!-- end form group -->
		</div><!-- end col -->
		<div class="col-6">
			<div class="form-group">
				<label for="conversionunit">Select</label>		
				<select name="conversionunit" id="conversionunit" class="form-control">
					<option value="--Select--"<?php if($conversionUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
					<option value="celsius"<?php if($conversionUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
					<option value="farenheit"<?php if($conversionUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
					<option value="kelvin"<?php if($conversionUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
				</select>
			</div> <!-- end form group -->
		</div> <!-- end col -->
	</div> <!-- end row -->
		<div class="row mb-5">
			<div class="col-3">			
				<input type="submit" value="Convert"  class="btn btn-primary form-control mt-3 mb-3"/> 
			</div><!-- end of col-->
		</div> <!-- end of row -->
	</form>
</div> <!-- end of container -->

<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="jumbotron bg-info"> 
				<h1 class="display-4">Temprature Conversion</h1> 
					<p class="lead"></p>
					<p>Celsius to Fahrenheit = T(°C) × 9/5 + 32</p>
					<p>Celsius to Kelvin = T(°C) + 273.15</p>
					<p>Fahrenheit to Celsius = (T(°F) - 32) × 5/9</p>
					<p>Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9</p>
					<p>Kelvin to Fahrenheit = T(K) × 9/5 - 459.67</p>
					<p>Kelvin to Celsius = T(K) - 273.15</p>
					<hr class="my-2"> 
					<p class="lead"> <a class="btn btn-primary btn-lg" href="#" role="button">Some action</a> </p> 
			</div>
		</div>
		<div class="col-6">
			<div class="jumbotron bg-info"> 
				<h1 class="display-4">The History of Temprature</h1> 
					<p class="lead">The kelvin is the primary unit of temperature measurement in the physical sciences, but is often used in conjunction with the degree Celsius, which has the same magnitude. The definition implies that absolute zero (0 K) is equivalent to −273.15 °C (−459.67 °F).</p>
				
					<hr class="my-2"> 
					<p class="lead"> <a class="btn btn-primary btn-lg" href="#" role="button">Some action</a> </p> 
			</div>
		</div>
	</div>
</div>


					
					
					
					
					

<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</html>