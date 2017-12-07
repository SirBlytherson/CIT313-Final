<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
    <h1>Add Post</h1>
  </div>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>addpost/<?php if(isset($task)) echo $task; ?>" method="post" id="post-form">
          <label>Title</label>
          <input id="title" type="text" class="span6" name="post_title" value="<?php if(isset($title)) echo $title?>">
          <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>"/>
		  <label>Category</label>
          <select id="category" class="span6" name="categoryID"><option selected disabled value>-- Select Category --</option>
			<?php
				$list = new Category();
				$i = 1;
				$categories = $list->getCategories();
				foreach($categories as $category) {
					$selected = '';
					if($category["categoryID"] === $categoryID) { $selected = ' selected'; }
					echo '<option value="'.$category["categoryID"].'"'.$selected.'>'.$category["name"].'</option>';
				}
			?>
		  </select>
     			<label id="content-label">Content</label>
          <textarea id="post-content" name="post_content" style="width:556px;height: 200px"><?php if(isset($content)) echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php if(isset($pID)) { echo $pID; } ?>"/>
		  <input type="hidden" name="uID" value="<?php echo $user->uID; ?>"/>
          <button id="add-submit" class="btn btn-primary" >Submit</button>
        </form>
		<script>
			$(document).ready(function(){
				$('#title').on('change', function() {
					console.log($(this).attr('value'));
					if($(this).attr('value') == '') {
						$(this).css('border','1px solid #F00');
					} else {
						$(this).css('border','0');
					}
				});		
				$('#category').on('change', function() {
					console.log($(this).attr('value'));
					if($(this).attr('value') == '') {
						$(this).css('border','1px solid #F00');
					} else {
						$(this).css('border','0');
					}
				});
				$('#post-content').on('change', function() {
					console.log($(this).text());
					if($(this).text() == '') {
						$(this).css('border','1px solid #F00');
					} else {
						$(this).css('border','0');
					}
				});
				$('#add-submit').click(function(e){
					e.preventDefault();
					var form = $('#post-form');
					
					var title = $('#title').attr('value');
					var category = $('#category').attr('value');
					var text = $('#post-content').attr('value');
					
					var error = '';
					
					if(title !== '' &&
						category !== '' &&
						text !== ''
					) {
						form.submit();
					} else {
						if(title == '') {
							error = error.concat("Title is empty.\n");
							$('#title').css('border','1px solid #F00');
						} else {
							$('#title').css('border','0');
						}
						if(category == '') {
							error = error.concat("Category is empty.\n");
							$('#category').css('border','1px solid #F00');
						} else {
							$('#category').css('border','0');
						}
						if(text == '') {
							error = error.concat("Content is empty.\n");
							$('#post-content').css('border','1px solid #F00');
						} else {
							$('#post-content').css('border','0');
						}
					}
				});
			});
		</script>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

