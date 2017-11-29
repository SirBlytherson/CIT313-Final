<?php include('views/elements/header.php');?>
<div class="container">
<div class="page-header">
<?php
if((!isset($message) || $message == null) && isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
if(isset($message) && $message){ ?>
	<div class="alert alert-<?php if(strpos($message, 'Incorrect') !== false) { echo 'danger'; } else { echo 'success'; } ?>">
	<button type="button" class="close" data-dismiss="alert">×</button>
<?php if(isset($message)) echo $message?>
	</div>
<?php }?>
<h1>Post Manager</h1>
	<div>
		<br>
		<ul style="list-style-type: none">
			<li style="display: inline-block"><a href="<?php echo BASE_URL; ?>addpost/"><button class="btn btn-primary btn-sm">Add Post</button></a></li>
			<li style="display: inline-block"><a href="<?php echo BASE_URL; ?>category/"><button class="btn btn-primary btn-sm">Manage Categories</button></a></li>
		</ul>
	</div>
	<br><br>
</div>

<?php
foreach($posts as $post) {
?>
	<div>
		<h3><?php echo $post['title'] ?></h3>
		<ul style="list-style-type: none">
			<li style="display: inline-block"><a href="<?php echo BASE_URL; ?>blog/post/<?php echo $post['pID']; ?>"><button class="btn btn-primary btn-sm">View</button></a></li>
			<li style="display: inline-block"><a href="<?php echo BASE_URL; ?>addpost/edit/<?php echo $post['pID']; ?>"><button class="btn btn-primary btn-sm">Edit</button></a></li>
			<li style="display: inline-block"><button id="<?php echo $post['pID']; ?>" class="btn btn-primary btn-sm delete-post">Delete</button></li>
		</ul>
		<hr>
	</div>
<?php
}
?>
</div>
<?php include('views/elements/footer.php');?>