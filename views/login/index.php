<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
   <h1>Login</h1>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-<?php if(strpos($message, 'Incorrect') !== false) { echo 'danger'; } else { echo 'success'; } ?>">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php if(isset($message)) echo $message?>
    </div>
  <?php }?>
   <?php if(isset($numbers)) echo $numbers ?>
  </div>
  <form action="<?php echo BASE_URL?>login/do_login/<?php if(isset($task)) echo $task?>" method="post" onsubmit="editor.post()">
          <label for="username">Username/E-mail Address:&nbsp;<span style="color: #F00;">*</span></label>
          <input class="text" type="text" class="span6" name="email" value="" required max-length="50">
		  <label for="password">Password:&nbsp;<span style="color: #F00;">*</span></label>
          <input class="txt" type="Password" class="span6" name="password" value="" required max-length="50"><br>
          <button id="submit" type="submit" class="btn btn-primary" >Log In</button>
   </form>
   <p style="font-size: 50%"><span style="color: #F00;">*</span> indicates required field</p>
		  
</div>
<?php include('views/elements/footer.php');?>

