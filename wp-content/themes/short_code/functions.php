<?php

	require_once('shortcodes.php');

	function my_default_function() {

		add_theme_support( 'title-tag' );

	}

	add_action( 'after_setup_theme', 'my_default_function' );


	// => customize section here

	function short_code_customizer( $wp_customize ) {


		$wp_customize->add_section('shot_color', 

			array(

				'title' => __('Modify color control', 'shotcode'),
				'discription' => 'Modify theme color',
				'priority'    => 100,
				'capability'  => 'edit_theme_options'
			)

		);

		// => Background color

		$wp_customize->add_setting('shot_background', 

			array(

				'type' => 'theme_mod',
				'default' => '#000'

			)
		);


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'shot_background', 

			array(

				'label' => __('Edit background color', 'shotcode'),
				'section' => 'shot_color',
				'setting' => 'shot_background'
			)

		));


		// => Font color 

		$wp_customize->add_setting('short_font_color', 

			array(

				'type' => 'theme_mod',
				'default' => '#540000'
			)

		);

		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'short_font_color', 

			array(

				'label' => __('Edit font color', 'shortcode'),
				'section' => 'shot_color',
				'setting' => 'short_font_color'
			)

		));


	}


	function shot_code_css_function() { ?>
	
		<style type="text/css">
			body {
				background: <?php echo get_theme_mod( $name = 'shot_background' , $default = false ); ?>;
			}

			.text_color_test {
				color: <?php echo get_theme_mod( $name = 'short_font_color' , $default = false ); ?>;
			}
		</style>

	<?php }


	add_action( 'wp_head', 'shot_code_css_function' );

	add_action( 'customize_register', 'short_code_customizer' );