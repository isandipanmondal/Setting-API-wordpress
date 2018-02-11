<?php


function usefull_setup() {

	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'usefull_setup' );




// set setting in general

function add_menu_set_general() {

	add_settings_field( 

		$id = 'header-text', 
		$title = 'Header text', 
		$callback = 'header_display_callback', 
		$page = 'general', 
		$section = 'default', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'general', 
		$option_name = 'header-text', 
		$args = [] 

	);


}

function header_display_callback() { ?>

	<input type="text" name="header-text" class="regular-text" value="<?php echo get_option( $option = 'header-text', $default = false ); ?>">

<?php }

add_action( 'admin_init', 'add_menu_set_general' );


// set setting in writing

function add_menu_set_writing() {

	add_settings_field( 

		$id = 'footer-text', 
		$title = 'Footer copyright', 
		$callback = 'footer_text_callback', 
		$page = 'writing', 
		$section = 'default', 
		$args = [] 
	);

	register_setting( 

		$option_group = 'writing', 
		$option_name = 'footer-text', 
		$args = [] 

	);

}

function footer_text_callback() { ?>

	<input type="text" class="regular-text" name="footer-text" value="<?php echo get_option( $option = 'footer-text', $default = false ); ?>">

<?php }

add_action( 'admin_init', 'add_menu_set_writing' );


// set setting in reding

function add_menu_reading() {

	add_settings_field( 

		$id = 'slider-text', 
		$title = 'Slider text', 
		$callback = 'slider_text_callback', 
		$page = 'reading', 
		$section = 'default', 
		$args = [] 
	);

	register_setting( 

		$option_group = 'reading', 
		$option_name = 'slider-text', 
		$args = []

	);

}

function slider_text_callback() { ?>

	<input type="text" class="regular-text" name="slider-text" value="<?php echo get_option( $option = 'slider-text', $default = false ); ?>">

<?php }

add_action( 'admin_init', 'add_menu_reading' );


// set media item


function add_menu_media() {

	add_settings_field( 

		$id = 'logo-text', 
		$title = 'Logo text', 
		$callback = 'logo_text_callback', 
		$page = 'media', 
		$section = 'default', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'media', 
		$option_name = 'logo-text', 
		$args = [] 

	);

}


function logo_text_callback() { ?>

	<input type="text" name="logo-text" class="regular-text" value="<?php echo get_option( $option = 'logo-text', $default = false ); ?>"> 

<?php }


add_action( 'admin_init', 'add_menu_media' );




// for menu in admin 

function main_admin_menu() {

	add_options_page( 

		$page_title = 'Theme option page', 
		$menu_title = 'Theme option', 
		$capability = 'manage_options', 
		$menu_slug = 'theme_option', 
		$function = 'theme_options_callback' 

	);

}


function theme_options_callback() { ?>
	
	<div class="wrap">
		<h1>This is heading options</h1>
	</div>

<?php }

add_action( 'admin_menu', 'main_admin_menu' );


// for practice

function new_menu_add_admin() {

	add_options_page( 

		$page_title = 'This is option page', 
		$menu_title = 'Setting page', 
		$capability = 'manage_options', 
		$menu_slug = 'setting_page', 
		$function = 'setting_page_callback' 

	);

}

function setting_page_callback() { ?>

	<div class="wrap">
		<h1>This is heading options</h1>
	</div>

<?php }

add_action( 'admin_menu', 'new_menu_add_admin' );


// menu custom setting 
// for appearance submenu


function add_menu_setting_appear() {

	add_theme_page( 

		$page_title = 'Theme setting', 
		$menu_title = 'Theme setting', 
		$capability = 'manage_options', 
		$menu_slug = 'theme_setting.php', 
		$function = 'theme_setting_callbakc' 

	);	

}


function theme_setting_callbakc() { ?>

		<div class="wrap">
			<h1>Hello testing here for all functions</h1>
		</div>	

<?php }


add_action( 'admin_menu', 'add_menu_setting_appear' );






// for tools page

function tools_text_field() {


	// packeting this field 


	add_settings_section( 

		$id = 'slider-text-section', 
		$title = 'All kind of field here', 
		$callback = 'slider_text_section_callback', 
		$page = 'options_page'

	);



	add_settings_field( 

		$id = 'slider-text-new', 
		$title = 'Slider text', 
		$callback = 'slider_text_callback_new', 
		$page = 'options_page', 
		$section = 'slider-text-section', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'options_page', 
		$option_name = 'slider-text-new', 
		$args = [] 

	);

}

function slider_text_section_callback() { ?>
	
	<div class="wrap">
		<p>Would you like to change your text.... Cheers!!!</p>
	</div>

<?php }


function slider_text_callback_new() { ?>

	<input type="text" name="slider-text-new" class="regular-text" value="<?php echo get_option( $option = 'slider-text-new', $default = false ); ?>">

<?php }


add_action( 'admin_init', 'tools_text_field' );


// new page in setting 


function add_page_new_setting() {

	add_options_page( 

		$page_title = 'Options page', 
		$menu_title = 'Options page', 
		$capability = 'manage_options', 
		$menu_slug = 'options_page', 
		$function = 'options_page_callback' 

	);

}


function options_page_callback() { ?>

	<div class="wrap">	
		<h1>There is options page for testing</h1>


		<form action="options.php" method="POST">

			<?php do_settings_sections( $page = 'options_page' ); ?>
			<?php settings_fields( $option_group = 'slider-text-section' ); ?>
			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>

		</form>

		
	</div>

<?php }


add_action( 'admin_menu', 'add_page_new_setting' );



/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------*/



// => create fields 

function create_fields() {


	add_settings_section( 

		$id = 'add_setting_field_sec', 
		$title = 'Contain text', 
		$callback = 'contain_text_new_callback', 
		$page = 'new_menu_page'

	);

	add_settings_field( 

		$id = 'contain-text', 
		$title = 'Contain text', 
		$callback = 'contain_text_callback', 
					'new_menu_page',
		$page = 'add_setting_field_sec', 
		$section = 'default', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'add_setting_field_sec', 
		$option_name = 'contain-text', 
		$args = [] 

	);

}

function contain_text_new_callback() {  

	return;
}

function contain_text_callback() { ?>
	
	<input type="text" name="contain-text" class="regular-text" value="<?php echo get_option( $option = 'contain-text', $default = false ); ?>"> 

<?php }

add_action( 'admin_init', 'create_fields' );


// => create menu in admin page


function admin_new_menu_page() {

	add_menu_page( 

		$page_title = 'New menu', 
		$menu_title = 'New menu', 
		$capability = 'manage_options', 
		$menu_slug = 'new_menu_page', 
		$function = 'new_menu_callback', 
		$icon_url = 'dashicons-menu', 
		$position = 50 

	);

	/*add_submenu_page( 

		'edit.php?post_type=page',
		$page_title = 'New menu', 
		$menu_title = 'New menu', 
		$capability = 'manage_options', 
		$menu_slug = 'new_menu_page', 
		$function = 'new_menu_callback'
		//$icon_url = 'dashicons-menu', 
		//$position = 50 

	);*/

}


function new_menu_callback() { ?>

	<div class="wrap">
		<h1>Hello, Welcome to new menu</h1>

		<?php settings_errors( $setting = '', $sanitize = false, $hide_on_update = false ); ?>

		<form action="options.php" method="POST">

			<?php do_settings_sections( $page = 'new_menu_page' ); ?>
			<?php settings_fields( $option_group = 'add_setting_field_sec' ); ?>

			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>

		</form>

	</div>

<?php }

add_action( 'admin_menu', 'admin_new_menu_page' );



/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/







