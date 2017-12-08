<?php
	$url = $_SERVER['REQUEST_URI'];
	$url = str_split($_SERVER['REQUEST_URI']);
	$p = $url[count($url)-1];
	if(isset($_SESSION['uID'])) { ?>
		<form action="<?php echo BASE_URL?>blog/add_comment/" method="post">
		  <label for="commentText">Leave a comment:</label>
          <textarea id="tinyeditor" name="commentText" style="width:556px;height: 200px" placeholder="Leave a Comment..." required></textarea>
          <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>"/>
          <input type="hidden" name="postID" value="<?php echo $p; ?>"/>
		  <input type="hidden" name="uID" value="<?php echo $user->uID; ?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>
	<?php } else { ?>
		<a href="<?php echo BASE_URL; ?>login/"><button class="btn" style="margin-left: 0px;">Login to leave a comment...</button></a></p>
	<?php } ?>
<?php
foreach($response as $comment) {
	?>
	<?php if($user->isAdmin()) { ?>
		<form action="<?php echo BASE_URL?>blog/remove_comment/" method="post" style="float: right;">
			<input type="hidden" name="postID" value="<?php echo $comment['postID']; ?>" />
			<input type="hidden" name="commentID" value="<?php echo $comment['commentID']; ?>" />
			<button id="submit" type="submit" class="btn btn-primary">Remove Comment</button>
		</form>
	<?php } ?>
	<p><span style="font-size: 20px;"><?php echo $comment['first_name'].' '.$comment['last_name']; ?></span>&nbsp;<br><?php echo $comment['date']; ?></p>
	<p><?php echo $comment['commentText']; ?></p>
	<hr>
	<?php
}
?>