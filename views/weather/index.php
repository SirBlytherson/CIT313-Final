<?php include('views/elements/header.php');?>
<div class="container">
	<div class="">
		<?php
			if((!isset($message) || $message == null) && isset($_SESSION['message'])) {
			  $message = $_SESSION['message'];
			  unset($_SESSION['message']);
			}
		?>
		<?php if(isset($message) && $message){ ?>
			<div class="alert alert-<?php if(strpos($message, 'Incorrect') !== false) { echo 'danger'; } else { echo 'success'; } ?>">
			<button type="button" class="close" data-dismiss="alert">×</button>
		<?php if(isset($message)) echo $message; ?>
			</div>
		<?php }?>
	</div>
</div>
<div class="container" id="wx">
	<div class="page-header">
		<h1>Weather</h1>
	</div>
	<form method="post" class="zip-submit" <?php /* action="<?php echo BASE_URL; ?>ajax/get_weather/" */ ?>>
		<label for="zip">Enter Your Zip Code</label>
		<input type="text" name="zip" id="zip" required="zip" />
		<br />
		<button type="submit" class="btn">Load Results</button>
	</form>
</div>
<?php /*
<?php if(!isset($result) || !$result) { ?>
<div class="container" id="wx">
	<div class="page-header">
		<h1>Weather</h1>
	</div>
	<form method="post" class="zip-submit" <?php /* action="<?php echo BASE_URL; ?>ajax/get_weather/"  ?>>
		<label for="zip">Enter Your Zip Code</label>
		<input type="text" name="zip" id="zip" required="zip" />
		<br />
		<button type="submit" class="btn">Load Results</button>
	</form>
</div>
<?php } else { ?>
<div class="container">
	<div class="page-header">
	
	<h1>Weather for <?php echo $weather->zip; ?></h1>
  </div>
  <h4>Today's High: <?php echo $weather->forecast->day_max_temp; ?><sup>&deg;</sup> F</h4>
  <h4>Today's Low: <?php echo $weather->forecast->night_min_temp; ?><sup>&deg;</sup> F</h4>
</div>
<?php } ?>
*/ ?>
<?php include('views/elements/footer.php');?>
