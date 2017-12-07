<?php include('views/elements/header.php');?>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<?php
    if((!isset($message) || $message == null) && isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
      unset($_SESSION['message']);
    }
	?>
	  <?php if(isset($message) && $message){ ?>
		<div class="alert alert-<?php if(strpos($message, 'Incorrect') !== false) { echo 'danger'; } else { echo 'success'; } ?>">
		<button type="button" class="close" data-dismiss="alert">×</button>
			<?php if(isset($message)) echo $message?>
		</div>
	  <?php }?>
	</div>
</div>

<div class="row">
	<h1 class="col-md-12">Latest News from <?php echo $rss_title; ?></h1>
</div>
  
<div class="row">
	<div class="col-md-9 col-lg-9 col-sm-3 col-xs-3">
		<?php
		foreach ($rss_feed as $article) {
			if($article->title) {
		?>
		  <div>
			<h4><a href="<?php echo $article->guid; ?>"><?php echo $article->title?></a><?php echo ' ('.date('F j, Y, g:i a',strtotime($article->pubDate)).')'; ?></h4>
			<p><?php echo $article->description; ?></p><br>
		  </div>
		<?php
			}
		}
		?>
	</div>
</div>
</div>
<?php include('views/elements/footer.php');?>
