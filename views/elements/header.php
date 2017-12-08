<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MVC Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo BASE_URL?>views/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo BASE_URL?>views/css/bootstrap-responsive.css" rel="stylesheet">
	
	<?php if($user->isAdmin()) { ?>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>application/plugins/tinyeditor/tinyeditor.css">
	<?php } ?>
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo BASE_URL; ?>">MVC Pro</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo BASE_URL; ?>">Home</a></li>
              <li><a href="<?php echo BASE_URL; ?>blog/">Blog</a></li>
              <li><a href="<?php echo BASE_URL; ?>members/">Members</a></li>
              <li><a href="<?php echo BASE_URL; ?>weather/">Weather</a></li>
			</ul>
			<?php if(isset($_SESSION['uID'])) { ?>
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $user->getUserName(); ?><b class="caret"></b>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo BASE_URL; ?>members/profile/">My Profile</a></li>
							<?php if($user->isAdmin()) { ?>
								<li><a href="<?php echo BASE_URL; ?>category/">Manage Categories</a></li>
								<li><a href="<?php echo BASE_URL; ?>manager/">Manage Posts</a></li>
								<li><a href="<?php echo BASE_URL; ?>hr/">Manage Users</a></li>
							<?php } ?>
							<li><a href="<?php echo BASE_URL; ?>login/logout/">Log Out</a></li>
						</ul>
					</li>
				</ul>
			<?php } else { ?>
				<ul class="nav pull-right">
					<li><a href="<?php echo BASE_URL?>login/">Login</a></li>
					<li><a href="<?php echo BASE_URL?>register/">Register</a></li>
				</ul>
			<?php } ?>
			<script src="<?php echo BASE_URL; ?>/views/js/jquery.js"></script>
			
			<script>
				$(document).ready(function() {
					var navsObj = $('.nav li');
					var navs = $.map(navsObj, function(value, index) {
						return value;
					});
					var hrefs = [];
					navs.forEach(function(nav, index) {
						var kid = $(nav).children().filter('a');
						$(nav).removeClass('active');
						if(kid.attr('href') == '<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>') {
							$(nav).addClass('active');
						}
					});
				});
			</script>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>