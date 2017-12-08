<?php include('views/elements/header.php');?>

<div class="container">
<h2>Member Manager</h2>
<hr>
<ul style="list-style-type: none">
<?php foreach($users as $u){


$admin = '';

if($u['user_type'] == 1) {
	$admin = ' visibility: hidden;';
}

$approved = '';

if($u['active'] == 1) {
	$approved = ' visibility: hidden';
}

?>


	<li id="<?php echo $u['uID']; ?>-row">
		<ul style="list-style-type: none; color: #FFF">
			<li style="display: inline-block; width: 100px;" id="<?php echo $u['uID']; ?>-name"><?php echo $u['first_name'].' '.$u['last_name']; ?></li>
			<li style="display: inline-block;"><button style="<?php echo $approved; ?>" class="approve-btn btn btn-success" id="<?php echo $u['uID']; ?>-approve"><span style="width: 10px;" class="glyphicon glyphicon-ok"></span>Approve</button></li>
			<li style="display: inline-block;"><button style="<?php echo $admin; ?>" class="remove-btn btn btn-error" id="<?php echo $u['uID']; ?>-remove"><span style="width: 10px;" class="glyphicon glyphicon-remove"></span>Remove</button></li>
		</ul><br>
	</li>
<?php } ?>
</div>
<?php include('views/elements/footer.php');?>