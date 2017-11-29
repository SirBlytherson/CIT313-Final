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
				
			});
			
		</script>
  </body>
</html>