<?php include('views/elements/header.php');?>

<?php if( isset($users) && is_array($users) ) {?>

<div class="container">
<div class="page-header">

<h1>Members</h1>
  </div>

	<?php foreach($users as $u){?>
		<a href="<?php echo BASE_URL.'members/view/'.$u['uID']; ?>"><h3><?php echo $u['email'];?></h3></a>
		<?php echo strval($u['first_name'].' '.$u['last_name'])?><br>
		<?php echo '<a href="mailto:'.$u['email'].'">'.$u['email'].'</a>';?>
<?php }?>
</div>

<?php }?>


<?php include('views/elements/footer.php');?>