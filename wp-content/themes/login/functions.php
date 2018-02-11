<?php

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );


function extra_user_profile_fields( $user ) { ?>

    <h3><?php _e("Extra profile information", "blank"); ?> <hr></h3>

    <table class="form-table">
    <tr>
        <th><label for="phone"><?php _e("Phone"); ?></label></th>
        <td>
            <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" />
            <span class="description"><?php _e("Please enter your address."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="city"><?php _e("City"); ?></label></th>
        <td>
            <input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text"> 
            <span class="description"><?php _e("Please enter your city."); ?></span>
        </td>
     </tr>

    <tr>
        <th><label for="postal code"><?php _e( "Postal code" ); ?></label></th>
        <td>
            <input type="text" name="postal" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( $field = 'postal', $user->ID ) ); ?>">
            <span class="description"><?php _e( "Please enter your postal code" ); ?></span>
        </td>
    </tr>

    <tr>
        <th><label><?php _e("Address") ?></label></th>
        <td>
            <textarea type="text" name="address" placeholder="Address" rows="5"><?php echo esc_attr( get_the_author_meta( $field = 'address', $user->ID  ) ); ?></textarea>
            <br>
            <span class="description"><?php _e( "Please enter your address here" ) ?></span>
        </td>
    </tr>

    </table>

    <hr>

<?php }


add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }

    update_user_meta( $user_id, 'phone', $_POST['phone'] );
    update_user_meta( $user_id, 'city', $_POST['city'] );
    update_user_meta( $user_id, 'postal', $_POST['postal'] );
    update_user_meta( $user_id, 'address', $_POST['address'] );
}







/*------------*/

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page() {
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 

    'Custom Menu Page Title', 
    'Custom Page', 
    'manage_options', 
    'custom.php', 
    '', 
    'dashicons-welcome-widgets-menus', 
    90 

);

}


add_action('admin_menu', 'wpdocs_register_my_custom_submenu_page');
 
function wpdocs_register_my_custom_submenu_page() {

    add_submenu_page(
        'custom.php',
        'My Custom Submenu Page',
        'My Custom Submenu Page',
        'manage_options',
        'my-custom-submenu-page',
        'wpdocs_my_custom_submenu_page_callback' 
    );
}
 
function wpdocs_my_custom_submenu_page_callback() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
        echo '<h2>My Custom Submenu Page</h2>';
    echo '</div>';
}




/*------------*/



/*function register_new_menu() {

    add_menu_page( 

        $page_title = 'Custom menu page title', 
        $menu_title = 'New menu', 
        $capability = 'manage_options', 
        $menu_slug = 'custom-new.php', 
        $function = '', 
        $icon_url = 'dashicons-welcome-widgets-menus', 
        $position = 100

    );
}

add_action( 'admin_menu', 'register_new_menu' );


function register_new_submenu() {

    add_submenu_page( 

        $parent_slug = 'custom-new.php', 
        $page_title = 'Submenu custom', 
        $menu_title = 'All option', 
        $capability = 'manage_options', 
        $menu_slug = 'my-custom-submenu-page', 
        $function = 'submenu_cus_callback' 
        
    );


}



function submenu_cus_callback() { ?>

    <div class="wrap">
        <div id="icon-tools" class="icon32"></div>
        <h2>This is my customize menu</h2>
    </div>    

<?php }*/



/*add_action( 'admin_menu', 'register_menu_page' );

function register_menu_page() {

    add_options_page( 

        $page_title = 'The Options', 
        $menu_title = 'The Options', 
        $capability = 'manage_options', 
        $menu_slug = 'theme-options', 
        $function = 'display_theme_options'

    );

}

function display_theme_options() {
    var_dump('Display HTML content for the theme options');
}*/




/*add_action( 'admin_init', 'add_some_text' );

function add_some_text() {

    add_settings_field( 

        $id = 'copyright_text', 
        $title = 'Copyright text', 
        $callback = 'copyright_callback', 
        $page = 'general', 
        $section = 'default', 
        $args = []

    );

    register_setting( 

        $option_group = 'general', 
        $option_name = 'copyright_text', 
        $args = []

    );

}

function copyright_callback() { ?>

    <input type="text" name="copyright_text" class="widefat" value="<?php echo get_option( 'copyright_text', $default = true ); ?>">

<?php }



//It is for setting page 

add_action( 'admin_menu' , 'set_setting_page' );

function set_setting_page() {

    add_options_page( 

        $page_title = 'Theme options', 
        $menu_title = 'Theme options', 
        $capability = 'manage_options', 
        $menu_slug  = 'theme_options', 
        $function = 'theme_display_callback' 

    );

}


function theme_display_callback() { ?>

    <h1>Any kind of fields will be here</h1>

<?php }*/



//Menu add in general option


add_action( 'admin_init', 'fields_function' );


function fields_function() {


    // packaging into another place 

    add_settings_section( 

        $id = 'header_options', 
        $title = 'Header Options', 
        $callback = 'header_options_callback', 
        $page = 'theme_options' 

    );

    // admin page display
    add_settings_field( 

        $id = 'header_options', 
        $title = 'Headder text', 
        $callback = 'headdin_callback', 
                    'theme_options',
        $page = 'st_theme_options', 
        $section = 'default', 
        $args = [] 

    );

    // save into data base
    register_setting( 

        $option_group = 'st_theme_options', 
        $option_name = 'header_options', 
        $args = [] 

    );

}

function header_options_callback() { ?>
    
    <p>This is heading option</p>

<?php }

function headdin_callback() { ?>

    

<?php }

// add menu in menubar


add_action( 'admin_menu', 'new_admin_menu' );


function new_admin_menu() {

    add_menu_page( 

        $page_title = 'Theme options', 
        $menu_title = 'Theme options', 
        $capability = 'manage_options', 
        $menu_slug = 'st_theme_options', 
        $function = 'theme_options_callback', 
        $icon_url = 'dashicons-schedule', 
        $position = 50

    );

}

function theme_options_callback() { ?>

    <h1>Here will be all fields</h1>
    <input type="text" name="hedding-text" class="regular-text" value="<?php echo get_option( 'hedding-text', $default = true ); ?>"> 


    <form action="options.php" method="POST">

        <?php do_settings_sections( 'st_theme_options' ); ?>
        <?php settings_fields( 'header_options' ); ?>
        <?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ); ?>
        
    </form>

<?php }



// new hook from sourav doc


function email_check(){
    
    $email = $_POST['email'];

    if ( email_exists( $email ) ) {
        echo "Email-exists";
    }
    
    wp_die();
}

add_action( 'wp_ajax_email_check', 'email_check' );    
// If called from admin panel
add_action( 'wp_ajax_nopriv_email_check', 'email_check' );



