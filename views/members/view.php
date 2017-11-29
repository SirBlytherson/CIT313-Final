<?php include('views/elements/header.php');?>

<?php
$u = (array)$u;
if(is_array($u)) {
	extract($u);
}?>

<div class="container">
	<div class="page-header">

<h1><?php echo 'Member '.$uID;?></h1>
  </div>
<?php echo strval($first_name.' '.$last_name)?><br>
<?php echo '<a href="mailto:'.$email.'">'.$email.'</a>';?>

</div>

<?php include('views/elements/footer.php');?>