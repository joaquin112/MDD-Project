<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo $this->config->item('base_url'); ?>stylesheets/base.css">
	<link rel="stylesheet" href="<?php echo $this->config->item('base_url'); ?>stylesheets/skeleton.css">
	<link rel="stylesheet" href="<?php echo $this->config->item('base_url'); ?>stylesheets/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo $this->config->item('base_url'); ?>images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $this->config->item('base_url'); ?>images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('base_url'); ?>images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('base_url'); ?>images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->
	
	<div class="container">

	<h1 class="remove-bottom"><?php echo $title; ?></h1>
	
	
	<ul id="navigation">  <li><a href="<?php echo $this->config->item('base_url'); ?>">Home</a></li>   
	<li><a href="<?php echo $this->config->item('base_url'); ?>top">Top</a></li>     <li>
	<a href="<?php echo $this->config->item('base_url'); ?>submit">Submit</a></li><li><a href = '<?php echo $this->config->item('base_url'); ?>contact'>Contact Us</a></li><?php if (!$this->tank_auth->is_logged_in()) { ?><li><a href = '<?php echo $this->config->item('base_url'); ?>login'>login</a>
	
	<li><a href = '<?php echo $this->config->item('base_url'); ?>signup'>signup</a></li><?php } else {?> <li><a href = '<?php echo $this->config->item('base_url'); ?>users/<?php echo $this->tank_auth->get_user_id(); ?>'>My Profile</a></li> <?} ?><li><a href = '<?php echo $this->config->item('base_url'); ?>subscribe'>Subscribe</a></li><li><a href = '<?php echo $this->config->item('base_url'); ?>users'>User List</a></li>
	</ul>
	
		
	<hr />
	
		<?php if (!$isHomepage) { ?>
		
		<div class="twelve columns">
			<?php echo $content; ?>
		</div>


		<?php } else { echo $content; }?>

	</div><!-- container -->
	
	<div id = 'footer'>
	
		PositiveThoughts - All Rights Reserved | <a href = '<?php echo $this->config->item('base_url'); ?>documentation'>Documentation</a> | <a href = '<?php echo $this->config->item('base_url'); ?>tos'>TOS</a>
	
	</div>


<!-- End Document
================================================== -->

<script type = "text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type = "text/javascript" src="<?php echo $this->config->item('base_url'); ?>js/main.js"></script>

<script type = "text/javascript" src="<?php echo $this->config->item('base_url'); ?>js/jquery.rateit.min.js"></script>

</body>
</html>