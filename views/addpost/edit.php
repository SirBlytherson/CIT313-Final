<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1>Edit Post</h1>'
  </div>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?><?php echo "addpost/"; if(isset($task)) { echo $task; } ?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?php if(isset($title)) echo $title?>">
          <label for="date">Date</label>
          <input type="text" name="date" value="<?php if(isset($date)) { echo $date; } else { echo date("Y-m-d H:i:s"); } ?>"/>
		  <label>Category</label>
          <select class="span6" name="categoryID"><option disabled selected value>-- Select Category --</option>
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
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"><?php if(isset($content)) echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php if(isset($pID)) { echo $pID; } ?>"/>
		  <input type="hidden" name="uID" value="<?php echo $user->uID; ?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>        
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

