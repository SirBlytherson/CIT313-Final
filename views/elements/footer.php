   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL?>views/js/bootstrap.min.js"></script>
	
<?php if($user->isAdmin()) { ?>
    <script src="<?php echo BASE_URL?>application/plugins/tinyeditor/tiny.editor.packed.js"></script>
    <script>
			var editor = new TINY.editor.edit('editor', {
				id: 'tinyeditor',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});
			

		</script>
		
<?php } ?>
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
				
				$('#home-weather').ready(function(){
					$.ajax({
						url:'<?php echo BASE_URL; ?>ajax/get_local_weather/',
						method:'GET',
						success:function(data) {
							$('#home-weather').html(data);
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
					
					console.log($('#first_name'));
					
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
						console.log(error);
					}
				});/**/
			});
			
		</script>
  </body>
</html>