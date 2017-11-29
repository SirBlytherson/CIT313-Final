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
<h1>Category Manager</h1>
	<div>
		<br>
		<ul style="list-style-type: none">
			<li style="display: inline-block"><a href="<?php echo BASE_URL; ?>manager/"><button class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i>Back to Post Manager</button></a></li>
		</ul>
	</div>
	<br><br>
</div>
<h3>Categories</h3>
<ul class="categories-toplist" style="list-style-type: none;">
<?php
foreach($categories as $category) {
?>
	<li>
		<ul style="list-style-type: none" cid="<?php echo $category['categoryID']; ?>">
			<li class="non-edit" style="display: inline-block">
				<ul style="list-style-type: none">
					<li style="display: inline-block">
						<p style="width: 200px;" id="name-<?php echo $category['categoryID']; ?>"><?php echo $category['name']; ?></p>
					</li>
					<li style="display: inline-block">
						<button class="btn-sm btn-primary btn-edit">Edit</button>
					</li>
				</ul>
			</li>
			<li class="edit" style="display: inline-block">
				<form class="cat-edit-form" method="post" action="<?php echo BASE_URL; ?>category/edit_category/">
					<ul style="list-style-type: none">
						<li style="display: inline-block">
							<input type="text" style="width: 186px;" name="name" id="input-<?php echo $category['categoryID']; ?>" value="<?php echo $category['name']; ?>" />
							<input type="hidden" name="categoryID" id="id-<?php echo $category['categoryID']; ?>"value="<?php echo $category['categoryID']; ?>" />
						</li>
						<li style="display: inline-block">
							<button type="submit" class="btn-sm btn-primary btn-save">Save</button>
						</li>
					</ul>
				</form>
			</li>
			<li style="display: inline-block">
				<button id="<?php echo $category['categoryID']; ?>" class="btn-sm btn-primary btn-cat-remove">Remove</button>
			</li>
			<li style="display: inline-block">
				<p id="message-<?php echo $category['categoryID']; ?>"></p>
			</li>
		</ul>
	</li>
<?php
}
?>
	<li id="add-cat-form-li">
		<form class="add-category-form" method="post" action="<?php echo BASE_URL; ?>category/add_category">
			<ul class="cat-add" style="list-style-type: none;">
				<li style="display: inline-block;"><input name="name" type="text" style="width: 186px" id="add-input" placeholder="Add a category..." /></li>
				<li style="display: inline-block;"><button type="submit" class="btn-sm btn-default cat-add">Add</button></li>
			</ul>
		</form>
	</li>
</ul>
</div>

<?php include('views/elements/footer.php');?>