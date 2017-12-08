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
	<a href="<?php echo BASE_URL.'blog/category/'.$categoryID; ?>">
		<h5 style="background-color: #FFF; color: #108C96; border-radius: 3px; max-width: 150px; padding: 5px; text-align: center;">
			<?php echo $category; ?>
		</h5>
	</a>
	  </div>

	<?php echo $content;?>

	<h3>Comments:</h3>
	<div id="comments"></div>
</div>

<?php include('views/elements/footer.php');?>