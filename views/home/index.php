<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
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
	<h1>Latest News from <?php echo $rss_title; ?></h1>
  </div>
  <?php
    foreach ($rss_feed as $article) {
      ?>
      <div class="page-header">
        <h4><a href="<?php echo $article->guid; ?>"><?php echo $article->title?></a><?php echo ' ('.date('F j, Y, g:i a',strtotime($article->pubDate)).')'; ?></h4>
        <p><?php echo $article->description; ?></p>
      </div>
      <?php
    }
  ?>
</div>
<?php include('views/elements/footer.php');?>
