<?php include('views/elements/header.php');?>

<?php if( isset($posts) && is_array($posts) ) {?>
<div class="container">
	<div class="page-header">
		<h1><?php echo 'Category: '.$title;?></h1>
		<a href="<?php echo BASE_URL.'blog/'; ?>"><button class="btn btn-default">Back to All Categories</button></a>
	</div>
	
	<?php foreach($posts as $p){?>
	<div class="blog-heading <?php echo str_replace(' ','_',$p['category']); ?>">
	<h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>
	<?php if($user->isAdmin()) { ?>
		<p style="float: right;"><a href="<?php echo BASE_URL; ?>addpost/edit/<?php echo $p['pID']; ?>"><span style="text-decoration: underline">edit</span></a></p>
	<?php } ?>
	<h5><?php echo strval($p['last_name'].', '.$p['first_name']).' -- '. date('F d, Y',strtotime($p['date']));?></h5>
	<a href="<?php echo BASE_URL.'blog/category/'.$p['categoryID']; ?>">
		<h5 style="background-color: #FFF; color: #108C96; border-radius: 3px; max-width: 150px; padding: 2px; text-align: center;">
			<?php echo $p['category']; ?>
		</h5>
	</a>
	<div style="margin-top: 15px"><a href="<?php echo BASE_URL; ?>ajax/get_post_content/?pID=<?php echo $p['pID']; ?>" class="btn post-loader" style="background-color: #AD1D28; color: #FFF; font-family: 'Lobster',cursive;">View Entire Post</a></div>
	</div>
<?php }?>
</div>

<?php }?>


<?php include('views/elements/footer.php');?>