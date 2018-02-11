<?php


function basic_requirement() {

	add_theme_support( 'title-tag' );

}

add_action( 'after_setup_theme', 'basic_requirement' );


function site_all_fields() {


	// set setting package 

	add_settings_section( 

		$id = 'menu_page_package_1', 
		$title = 'General setting section', 
		$callback = null, 
		$page = 'menu_page_1' 

	);


	add_settings_field( 

		$id = 'add_logo_sec', 
		$title = 'Logo text',  
		$callback = 'add_logo_sec_callback', 
		$page = 'menu_page_1', 
		$section = 'menu_page_package_1', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'menu_page_package_1', 
		$option_name = 'add_logo_sec', 
		$args = [] 

	);

	add_settings_field( 

		$id = 'add_slider_text', 
		$title = 'Slider text', 
		$callback = 'add_slider_text_callback', 
		$page = 'menu_page_1', 
		$section = 'menu_page_package_1', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'menu_page_package_1', 
		$option_name = 'add_slider_text', 
		$args = [] 

	);


}

function add_logo_sec_callback() { ?>

	<input type="text" name="add_logo_sec" class="regular-text" value="<?php echo get_option( $option = 'add_logo_sec', $default = false ); ?>"> 

<?php }


function add_slider_text_callback() { ?>
	
	<input type="text" name="add_slider_text" class="regular-text" value="<?php echo get_option( $option = 'add_slider_text' , $default = false ); ?>"> 

<?php }


add_action( 'admin_init', 'site_all_fields' );


/*
* => New page using API setting
* => New page is Menu 1
*/

function for_new_page_add() {

	add_options_page( 

		$page_title = 'Menu page 1', 
		$menu_title = 'Menu page 1', 
		$capability = 'manage_options', 
		$menu_slug = 'menu_page_1', 
		$function = 'menu_page_1_callback' 

	);

}


function menu_page_1_callback() { ?>

	<div class="wrap">
		<h1>Hello, Menu page 1</h1>
	
		<form action="options.php" method="POST">
			
			<?php do_settings_sections( $page = 'menu_page_1' ); ?>
			<?php settings_fields( $option_group = 'menu_page_package_1' ); ?>

			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>
			
		</form>


	</div>

<?php }

add_action( 'admin_menu', 'for_new_page_add' );


/*
* => New menu page
* => Page name options page
*/


function header_container(){

	// => social packaging here 

	add_settings_section( 

		$id = 'opt_social_package', 
		$title = 'Social network section', 
		$callback = null, 
		$page = 'options_page' 

	);


	// => facebook

	add_settings_field( 

		$id = 'mycustomeditor', 
		$title = 'Facebook', 
		$callback = 'face_fun_callback', 
		$page = 'options_page', 
		$section = 'opt_social_package', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'opt_social_package', 
		$option_name = 'mycustomeditor', 
		$args = [] 

	);


	// => Twitter

	add_settings_field( 

		$id = 'opt_social_2', 
		$title = 'Twitter', 
		$callback = 'twitter_fun_callback', 
		$page = 'options_page', 
		$section = 'opt_social_package', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'opt_social_package', 
		$option_name = 'opt_social_2', 
		$args = [] 

	);

	// => Google plus

	add_settings_field( 

		$id = 'opt_social_3', 
		$title = 'Google', 
		$callback = 'google_fun_callback', 
		$page = 'options_page', 
		$section = 'opt_social_package', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'opt_social_package', 
		$option_name = 'opt_social_3', 
		$args = [] 

	);

}


function face_fun_callback() { ?>
	
<?php $content = get_option("mycustomeditor");
$editor_id = 'mycustomeditor';

wp_editor( $content, $editor_id );
?>
<?php }

function twitter_fun_callback() { ?>
	
	<input type="text" name="opt_social_2" class="regular-text" value="<?php echo get_option( $option = 'opt_social_2', $default = false ); ?>"> 

<?php }

function google_fun_callback() { ?>
	
	<input type="text" name="opt_social_3" class="regular-text" value="<?php echo get_option( $option = 'opt_social_3', $default = false ); ?>"> 

<?php }




add_action( 'admin_init', 'header_container' );


/*
* => API Setting 
* => Page Opt menu 1
*/


function opt_menu_1_setting() {

	add_settings_section( 

		$id = 'left_text_con', 
		$title = 'Text contain', 
		$callback = null, 
		$page = 'sub_opt_1'
	);

	add_settings_field( 

		$id = 'left_text_con', 
		$title = 'Left text', 
		$callback = 'left_text_con_callback', 
		$page = 'sub_opt_1', 
		$section = 'left_text_con', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'left_text_con', 
		$option_name = 'left_text_con', 
		$args = [] 

	);


}

function left_text_con_callback() { ?>

	<input type="text" name="left_text_con" class="regular-text" value="<?php echo get_option( $option = 'left_text_con', $default = false ); ?>"> 

<?php }


add_action( 'admin_init', 'opt_menu_1_setting' );





function cus_new_menu_page() {

	add_menu_page( 

		$page_title = 'options page', 
		$menu_title = 'Options page', 
		$capability = 'manage_options', 
		$menu_slug = 'options_page', 
		$function = 'options_page_callback', 
		$icon_url = 'dashicons-feedback', 
		$position = 59 

	);

	add_submenu_page( 

		$parent_slug = 'options_page', 
		$page_title = 'sub opt - 1', 
		$menu_title = 'Opt menu 1', 
		$capability = 'manage_options', 
		$menu_slug = 'sub_opt_1', 
		$function = 'sub_opt_1_callback' 

	);

	add_submenu_page( 

		$parent_slug = 'options_page', 
		$page_title = 'sub opt - 2', 
		$menu_title = 'Opt menu 2', 
		$capability = 'manage_options', 
		$menu_slug = 'sub_opt_2', 
		$function = 'sub_opt_2_callback' 

	);

}


function options_page_callback() { ?>

	<div class="wrap">
		<h1>Welcome to options page</h1>

		<form action="options.php" method="POST">
			
			<?php do_settings_sections( $page = 'options_page' ); ?>
			<?php settings_fields( $option_group = 'opt_social_package' ); ?>
			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>

		</form>
	</div>

<?php }


function sub_opt_1_callback() { ?>

	<div class="wrap">
		<h1>Welcome to options sub page 1</h1>

		<form action="options.php" method="POST">

			<?php do_settings_sections( $page = 'sub_opt_1' ); ?>
			<?php settings_fields( $option_group = 'left_text_con' ); ?>
			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>
			
		</form>

	</div>

<?php }

function sub_opt_2_callback() { ?>

	<div class="wrap">
		<h1>Welcome to options sub page 2</h1>
	</div>

<?php }


add_action( 'admin_menu', 'cus_new_menu_page'  );



add_action( 'customize_register' , 'munter_options' );

function munter_options( $wp_customize ) {
	// Footer Sections added here
	$wp_customize->add_section( 'munter_footer_options', 
	array(
		'title'       => __( 'Slider Settings', 'munter' ),
		'priority'    => 100,
		'capability'  => 'edit_theme_options',
		'description' => __('Change footer background color.', 'munter'), 
		) 
	);
		//Footer settings added here
	$wp_customize->add_setting( 'footer_bg_color',
	array(
		'type' => 'theme_mod',
		'default' => 'f1f1f1'
		)
	);
	//Footer controls  added here
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color',
	array(
		'label'    => __( 'Edit slider text color', 'munter' ), 
		'section'  => 'munter_footer_options',
		'settings' => 'footer_bg_color'  
	) 
));

}


//Footer Background Color Customizer Function
function munter_css_customizer(){
?>
<style type="text/css">
.slider{
	color:<?php echo get_theme_mod('footer_bg_color');?>;
}
</style>
<?php
}
//Action For Footer Background
add_action('wp_head','munter_css_customizer');