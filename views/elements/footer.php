   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL?>views/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function() {
				$('.edit').css('display','none');
				$('.post-loader').click(function(event) {
					event.preventDefault();
					var el = $(this);		
					$.ajax({
						url:el.attr('href'),
						method:'GET',
						success:function(data) {
							el.parent().append(data);
							el.remove();
						},
					});
				});
				$('.zip-submit').submit(function(event) {
					event.preventDefault();
					var el = $(this);
					$.ajax({
						url:'<?php echo BASE_URL; ?>ajax/get_weather/'.concat($('#zip').val()),
						method:'POST',
						success:function(data) {
							$('#wx .page-header h1').text('Weather For '.concat($('#zip').val()));
							$('#wo').remove();
							el.parent().append(data);
						},
					});
				});
				$('#comments').ready(function() {
					var el = $(this);
					$.ajax({
						url:'<?php echo BASE_URL; ?>ajax/get_comments/'.concat(<?php if(isset($pID)) { echo $pID; } ?>),
						method:'GET',
						success:function(data) {
							$('#comments').html(data);
						}
					});
				});
				$('.delete-link').click(function(event) {
					event.preventDefault();
				});
				$('.delete-post').click(function(event) {
					event.preventDefault();
					var el = $(this);
					
					$.ajax({
						url:'<?php echo BASE_URL; ?>manager/remove_post/'.concat($(el).attr('id')),
						method:'POST',
						success:function(data) {
							$(el).parent().parent().parent().remove();
						}
					});
				});
				$('.btn-cat-remove').click(function(event) {
					event.preventDefault();
					var el = $(this);
					
					$.ajax({
						url:'<?php echo BASE_URL; ?>category/remove_category/'.concat($(el).attr('id')),
						method:'POST',
						success:function(data) {
							el = $(el).parent().parent();
							$(el).html(data);
							var index = 0;
							var interval = setInterval(function() {
								index += 1;
								if(index >= 2) {
									clearInterval(interval);
									$(el).parent().html('');
								}
							}, 5000);
						}
					});
				});
				$('.btn-edit').click(function(event) {
					event.preventDefault();
					var el = $(this);
					var top = $(el).parent().parent().parent().parent().attr('cid');
					$('[cid='.concat(top,'] .non-edit')).css('display','none');
					$('[cid='.concat(top,'] .edit')).css('display','inline-block');
				});
				
				$('.btn-save').click(function(event) {
					event.preventDefault();
					var el = $(this);
					var top = $(el).parent().parent().parent().parent().parent().attr('cid');
					$('[cid='.concat(top,'] .non-edit')).css('display','inline-block');
					$('[cid='.concat(top,'] .edit')).css('display','none');
					
					$(el).parent().parent().parent().submit();				
				});
				
				$('.weather-sidebar').ready(function(){
					$.ajax({
						url:'<?php echo BASE_URL; ?>ajax/get_local_weather/',
						method:'GET',
						success:function(data) {
							console.log(data);
							console.log($('.weather-sidebar'));
							$('.weather-sidebar').html(data);
						},
					});
				});
				$('#first_name').on('change', function() {
					if(this.value() == '') {
						this.css('border','1px solid #F00');
					} else {
						this.css('border','0');
					}
				});					
				$('#last_name').on('change', function() {
					if(this.value() == '') {
						this.css('border','1px solid #F00');
					} else {
						this.css('border','0');
					}
				});				
				$('#email').on('change', function() {
					if(this.value() == '') {
						this.css('border','1px solid #F00');
					} else {
						this.css('border','0');
					}
				});				
				$('#pwd').on('change', function() {
					if(this.value() == '') {
						this.css('border','1px solid #F00');
					} else {
						this.css('border','0');
					}
				});				
				$('#conPwd').on('change', function() {
					if(this.value() !== $('#pwd').value()) {
						this.css('border','1px solid #F00');
					} else if(this.value() == '') {
						this.css('border','1px solid #F00');
					} else {
						this.css('border','1px solid #000');
					}
				});
				$('#registration-submit').click(function(e){
					e.preventDefault();
					var form = $('#registration-form');
					
					var error = '';
					
					if($('#first_name').attr('value') !== '' &&
						$('#last_name').attr('value') !== '' &&
						$('#email').attr('value') !== '' &&
						$('#pwd').attr('value') !== '' &&
						$('#conPwd').attr('value') !== '' &&
						$('#pwd').attr('value') == $('#conPwd').attr('value')
					) {
						form.submit();
					} else {
						if($('#first_name').attr('value') == '') {
							error = error.concat("First name is empty.\n");
							$('#first_name').css('border','1px solid #F00');
						} else {
							$('#first_name').css('border','0');
						}
						if($('#last_name').attr('value') == '') {
							error = error.concat("Last name is empty.\n");
							$('#last_name').css('border','1px solid #F00');
						} else {
							$('#last_name').css('border','0');
						}
						if($('#email').attr('value') == '') {
							error = error.concat("Email is empty.\n");
							$('#email').css('border','1px solid #F00');
						} else {
							$('#email').css('border','0');
						}
						if($('#pwd').attr('value') == '') {
							error = error.concat("Password is empty.\n");
							$('#pwd').css('border','1px solid #F00');
						} else {
							$('#pwd').css('border','0');
						}
						if($('#conPwd').attr('value') == '') {
							error = error.concat("Confirm password is empty.\n");
							$('#conPwd').css('border','1px solid #F00');
						} else {
							$('#conPwd').css('border','0');
						}
						if($('#conPwd').attr('value') !== $('#pwd').attr('value')) {
							error = error.concat("Confirm password must match password.\n");
							$('#pwd').css('border','1px solid #F00');
							$('#conPwd').css('border','1px solid #F00');
						}
						alert(error);
					}
				});
				$('#update-submit').click(function(e){
					e.preventDefault();
					var form = $('#update-form');
					
					var error = '';
					
					if($('#first_name').attr('value') !== '' &&
						$('#last_name').attr('value') !== '' &&
						$('#email').attr('value') !== '' &&
						$('#pwd').attr('value') == $('#conPwd').attr('value')
					) {
						form.submit();
					} else {
						if($('#first_name').attr('value') == '') {
							error = error.concat("First name is empty.\n");
							$('#first_name').css('border','1px solid #F00');
						} else {
							$('#first_name').css('border','0');
						}
						if($('#last_name').attr('value') == '') {
							error = error.concat("Last name is empty.\n");
							$('#last_name').css('border','1px solid #F00');
						} else {
							$('#last_name').css('border','0');
						}
						if($('#email').attr('value') == '') {
							error = error.concat("Email is empty.\n");
							$('#email').css('border','1px solid #F00');
						} else {
							$('#email').css('border','0');
						}
						if($('#conPwd').attr('value') !== $('#pwd').attr('value')) {
							error = error.concat("Confirm password must match password.\n");
							$('#pwd').css('border','1px solid #F00');
							$('#conPwd').css('border','1px solid #F00');
						}
						alert(error);
					}
				});
				$('#title').on('change', function() {
					if($(this).attr('value') == '') {
						$(this).css('border','1px solid #F00');
					} else {
						$(this).css('border','0');
					}
				});		
				$('#category').on('change', function() {
					if($(this).attr('value') == '') {
						$(this).css('border','1px solid #F00');
					} else {
						$(this).css('border','0');
					}
				});
				$('#post-content').on('change', function() {
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
					
					var error = "The form is incomplete.\n";
					
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
						alert(error);
					}
				});
				$('.approve-btn').click(function(e) {
					e.preventDefault();
					
					var btn = this;
					var uID = $(this).attr('id').replace('-approve','');
					
					$.ajax({
						url:'<?php echo BASE_URL; ?>hr/approve/'.concat(uID),
						method:'POST',
						success:function(data) {
							$(btn).css('visibility','hidden');
						}
					});
				});
				$('.remove-btn').click(function(e) {
					e.preventDefault();
					
					var btn = this;
					var uID = $(this).attr('id').replace('-remove','');
					
					$.ajax({
						url:'<?php echo BASE_URL; ?>hr/remove/'.concat(uID),
						method:'POST',
						success:function(data) {
							var name = $('#'.concat(uID,'-name')).text();//.replace('-name','');
							$('#'.concat(uID, '-row')).text(name.concat(' has been removed.'));
							$('#'.concat(uID, '-row')).addClass('alert');
							var index = 0;
							var interval = setInterval(function(){
								if(index == 5) {
									clearInterval(interval);
									$('#'.concat(uID, '-row')).remove();
								}
								index += 1;
							}, 1000);
						}
					});
				});
			});			
		</script>
  </body>
</html>