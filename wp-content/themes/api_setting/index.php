<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>"> 

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<?php wp_head(); ?>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="" class="logo"><?php echo get_option( $option = 'add_logo_sec', $default = false ); ?></a>
			</div>

			<div class="col-md-8">
				<span><?php echo get_option( $option = 'opt_social_1', $default = false ); ?></span>
				<span><?php echo get_option( $option = 'opt_social_2', $default = false ); ?></span>
				<span><?php echo get_option( $option = 'opt_social_3', $default = false ); ?></span>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="slider">
					<?php echo get_option( $option = 'add_slider_text', $default = false ); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div>
					<?php echo get_option( $option = 'left_text_con', $default = false ) ?>
				</div>
			</div>

			<div class="col-md-6">
				<div>
					<?php// echo get_option( $option = 'add_slider_text', $default = false ); ?>
				</div>
			</div>
		</div>
	</div>
	
	


	<?php wp_footer(); ?>
</body>
</html>