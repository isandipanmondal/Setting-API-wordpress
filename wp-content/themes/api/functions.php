<?php

function usefull_function() {

	add_theme_support( 'title-tag' );

}

add_action( 'after_setup_theme', 'usefull_function' );



// extra field in general section

function all_fields_function() {



	add_settings_section( 

		$id = 'logo-text-new-one', 
		$title = 'Logo text', 
		$callback = 'logo_text_new_one_callback',  
		$page = 'menu_page' 

	);

	add_settings_field( 

		$id = 'logo-text' , 
		$title = 'Logo text', 
		$callback = 'logo_text_callback', 
					'menu_page',
		$page = 'logo-text-new-one', 
		$section = 'default', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'logo-text-new-one', 
		$option_name = 'logo-text', 
		$args = [] 

	);

}


function logo_text_new_one_callback() {
	returen;
}

function logo_text_callback() { ?>

	<input type="text" name="logo-text" class="regular-text" value="<?php echo get_option( $option = 'logo-text' , $default = false ); ?>"> 

<?php }

add_action( 'admin_init', 'all_fields_function' );

// extra field in general section end



// new page field start

function new_page_creation() {

	add_options_page( 

		$page_title = 'Menu page', 
		$menu_title = 'Menu page', 
		$capability = 'manage_options', 
		$menu_slug = 'menu_page', 
		$function = 'menu_page_callback' 

	);

}

function menu_page_callback() { ?>
	
	<div class="wrap">
		<h1>This is new menu page</h1>

		<form action="options.php" method="POST">

			<?php do_settings_sections( $page = 'menu_page' ); ?>
			<?php settings_fields( $option_group = 'logo-text-new-one' ); ?>

			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>

		</form>

	</div>

<?php }

add_action( 'admin_menu', 'new_page_creation' );

// new page field end 


// new icon page start


function slider_text_function() {


	add_settings_section( 

		$id = 'general_options_id', 
		$title = 'General options', 
		$callback = null, 
		$page = 'menu_page_two' 

	);


	add_settings_field( 

		$id = 'slider-text-new', 
		$title = 'Slider text new ', 
		$callback = 'slider_text_new_callback', 
		$page = 'menu_page_two', 
		$section = 'general_options_id', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'general_options_id', 
		$option_name = 'slider-text-new',
		$args = [] 

	);



	add_settings_field( 

		$id = 'heading_new_text', 
		$title = 'Heading text', 
		$callback = 'heading_new_text_callback', 
		$page = 'menu_page_two', 
		$section = 'general_options_id', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'general_options_id', 
		$option_name = 'heading_new_text', 
		$args = [] 

	);


	add_settings_field( 

		$id = 'contain_new_text', 
		$title = 'Contain text', 
		$callback = 'contain_new_text_callback', 
		$page = 'menu_page_two',  
		$section = 'general_options_id', 
		$args = [] 

	);

	register_setting( 

		$option_group = 'general_options_id', 
		$option_name = 'contain_new_text', 
		$args = [] 

	);



}


function contain_new_text_callback() { ?>

	<input type="text" name="contain_new_text" class="regular-text" value="<?php echo get_option( $option = 'contain_new_text', $default = false ); ?>"> 

<?php }


function heading_new_text_callback() { ?>

	<input type="text" name="heading_new_text" class="regular-text" value="<?php echo get_option( $option = 'heading_new_text', $default = false ); ?>"> 

<?php }


function slider_text_new_callback() { ?>

	<input type="text" name="slider-text-new" class="regular-text" value="<?php echo get_option( $option = 'slider-text-new', $default = false ); ?>"> 

<?php }

add_action( 'admin_init', 'slider_text_function' );



function add_new_page() {

	add_options_page( 

		$page_title = 'Menu page two', 
		$menu_title = 'Menu page two', 
		$capability = 'manage_options', 
		$menu_slug = 'menu_page_two', 
		$function = 'menu_page_two_callback' 

	);

}

function menu_page_two_callback() { ?>

	<div class="wrap">
		<h1>This is menu two here...</h1>

		<form method="POST" action="options.php">

			<?php do_settings_sections( $page = 'menu_page_two' ); ?>
			<?php settings_fields( $option_group = 'general_options_id' ); ?>
			
			<?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>
			
		</form>

	</div>

<?php }

add_action( 'admin_menu', 'add_new_page' );


// new icon page end


/**
* Theme Options
**/
add_action("admin_menu", "add_theme_menu_item");

function add_theme_menu_item()

{
add_submenu_page("themes.php","General Theme Options","Theme Options","manage_options","csi_theme_options_page","theme_options_page");
}

function theme_options_page(){

?>

<div class="wrap">

<h1>Theme Options</h1>

<form method="post" action="options.php" enctype="multipart/form-data">

<?php

settings_fields("section"); //settings_fields("$option_group");

do_settings_sections("theme-options"); //do_settings_sections( $page );

submit_button();

?>

</form>

</div>

<?php

}

add_action("admin_init", "display_theme_panel_fields");

function display_theme_panel_fields()

{




//add_settings_section( $id, $title, $callback, $page );
add_settings_section(

	"section", 
	"General Settings", 
	null, 
	"theme-options"

);



//register_setting( $option_group, $option_name, $sanitize_callback );
register_setting("section", "edit_phone_number");
register_setting("section", "HeaderLogo", "handle_header_logo_upload");

//add_settings_field( $id, $title, $callback, $page, $section, $args );
add_settings_field("edit_phone_number", "Edit Phone Number", "display_phone_number_element", "theme-options", "section");
add_settings_field("HeaderLogo", "Upload New Header Logo", "display_handle_header_logo_upload", "theme-options", "section");


}


function display_phone_number_element()
{
?>
    <input type="text" name="edit_phone_number" style="width:600px;" id="edit_phone_number" value="<?php echo get_option('edit_phone_number'); ?> " />
<?php
}
function display_handle_header_logo_upload()
{?>
		<input type="file" name="HeaderLogo" id="HeaderLogo"/> 
        <img src="<?php echo get_option('HeaderLogo'); ?>" height="100" width="100">
<?php
}
function handle_header_logo_upload($option) {

	if(!empty($_FILES["HeaderLogo"]["tmp_name"])) {
		$urls = wp_handle_upload($_FILES["HeaderLogo"], array('test_form' => FALSE));
		$temp = $urls["url"];
		return $temp;
	}
	//return $option;
	return get_option('HeaderLogo');
	
}