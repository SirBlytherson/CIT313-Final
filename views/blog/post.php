<?php include('views/elements/header.php');?>

<?php
if(is_array($post) ) {
	extract($post);
} ?>

<div class="container">
	<div class="page-header">

	<h1><?php echo $title;?></h1>
		<?php if($user->isAdmin()) { ?>
		<p style="float: right;"><a href="<?php echo BASE_URL; ?>addpost/edit/<?php echo $pID; ?>"><span style="text-decoration: underline">edit</span></a></p>
		<?php } ?>
	<h5><?php echo strval($last_name.', '.$first_name).' -- '. date('F d, Y',strtotime($date));?></h5>
	  </div>

	<?php echo $content;?>

	<h3>Comments:</h3>
	<div id="comments"></div>
</div>

<?php include('views/elements/footer.php');?>