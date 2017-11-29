<?php include('views/elements/header.php');?>

<?php if( isset($posts) && is_array($posts) ) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($posts as $p){?>
	<h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>
	<?php if($user->isAdmin()) { ?>
		<p style="float: right;"><a href="<?php echo BASE_URL; ?>addpost/edit/<?php echo $p['pID']; ?>"><span style="text-decoration: underline">edit</span></a></p>
	<?php } ?>
	<h5><?php echo strval($p['last_name'].', '.$p['first_name']).' -- '. date('F d, Y',strtotime($p['date']));?></h5>
	<div style="margin-top: 15px"><a href="<?php echo BASE_URL; ?>ajax/get_post_content/?pID=<?php echo $p['pID']; ?>" class="btn post-loader">View Entire Post</a></div>
<?php }?>
</div>

<?php }?>


<?php include('views/elements/footer.php');?>