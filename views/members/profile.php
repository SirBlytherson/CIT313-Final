<?php include('views/elements/header.php'); ?> 

<div class="container">
   <h1>My Profile</h1>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php if(isset($message)) echo $message?>
    </div>
  <?php }?>
  <style>input { padding: 10px; }</style>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>profile/update/<?php if(isset($task)) echo $task ?>" method="post" id="update-form">
          <fieldset>
			<label for="first_name">First Name: <font color="#FF0000">*</font></label>
			<input id="first_name" name="first" value="<?php echo $u['first_name']; ?>" maxlength="20" required="first_name" type="text">
			<br>
						
			<label for="last_name">Last Name: <font color="#FF0000">*</font></label>
			<input class="txt" id="last_name" name="last" value="<?php echo $u['last_name']; ?>" maxlength="20" required="last_name" type="text">
			<br>
			 
			<label for="email">E-mail Address: <font color="#FF0000">*</font></label>
			<input class="txt" id="email" name="email" value="<?php echo $u['email']; ?>" maxlength="100" required="email" type="text">
			<br>

			<label for="pwd">Password: <font color="#FF0000">*</font></label>
			<input class="txt" id="pwd" name="pwd" value="" maxlength="100" type="password">
			<br>
			
			<label for="conPwd">Confirm Password: <font color="#FF0000">*</font></label>
			<input class="txt" id="conPwd" name="conPwd" value="" maxlength="100" type="password">
			<br>

			<input name="uID" value="<?php echo $u['uID']; ?>" type="hidden">
			<input name="active" value="<?php echo $u['active']; ?>" type="hidden">
			 
			<button id="update-submit" class="btn btn-primary">Update</button>
			</fieldset>
        </form>
		<a href="<?php echo BASE_URL; ?>members/">Back to Members</a>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

