<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>"> 

	<?php wp_head(); ?>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<h3><a href="#"><?php echo get_option( $option = 'logo-text' , $default = false ); ?></a></h3>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo get_option( $option = 'slider-text-new' , $default = false ); ?></h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo get_option( $option = 'heading_new_text', $default = false ) ?></h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo get_option( $option = 'contain_new_text', $default = false ) ?></h2>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p><?php echo get_option( $option = 'copy_right_new_text', $default = false ); ?></p>
			</div>
		</div>
	</div>


	<?php wp_footer(); ?>	
</body>
</html>