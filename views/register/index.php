<?php include('views/elements/header.php');?> 

<div class="container">
   <h1>Register</h1>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php if(isset($message)) echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>register/addUser<?php if(isset($task)) echo $task ?>" method="post" onsubmit="editor.post()">
          <fieldset>
			<legend>Register Today!</legend>
			<label for="first_name">First Name: <font color="#FF0000">*</font></label>
			<input id="first_name" name="first_name" value="" maxlength="20" required="first_name" type="text">
			<br>
						
			<label for="last_name">Last Name: <font color="#FF0000">*</font></label>
			<input class="txt" id="last_name" name="last_name" value="" maxlength="20" required="last_name" type="text">
			<br>
			 
			<label for="email">E-mail Address: <font color="#FF0000">*</font></label>
			<input class="txt" id="email" name="email" value="" maxlength="100" required="email" type="text">
			<br>

			<label for="password">Password: <font color="#FF0000">*</font></label>
			<input class="txt" id="password" name="password" value="" maxlength="100" required="password" type="password">

			<br>

			<input name="uID" value="" type="hidden">
			 
			<button id="submit" type="submit" class="btn btn-primary">Sign Up</button>
			</fieldset>
        </form>
		<a href="<?php echo BASE_URL; ?>">Back to home page</a>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

