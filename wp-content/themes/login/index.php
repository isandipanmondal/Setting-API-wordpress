<?php  
	global $wpdb;
	$url = get_template_directory_uri();

?>


<?php

	
	if (isset($_POST['submit'])) {

		/*echo "<pre>";
		var_dump($_POST);
		exit();*/
		
		$name =  $wpdb->escape(trim($_POST['name']));
		$email = $wpdb->escape(trim($_POST['email']));
		$phone = $wpdb->escape(trim($_POST['phone']));
		$city =  $wpdb->escape(trim($_POST['city']));
		$post =  $wpdb->escape(trim($_POST['postal']));
		$add =   $wpdb->escape(trim($_POST['address']));
		$password = $wpdb->escape(trim($_POST['password']));


		if ( is_email( $email ) ) {
      
			$userdata = array(
			    'user_login'  =>  $name,
			    'user_email'    =>  $email,
			    'user_pass'   =>  $password  // When creating an user, `user_pass` is expected.
			);

			$user_id = wp_insert_user( $userdata ) ;

			update_user_meta( $user_id, 'phone', $phone );
			update_user_meta( $user_id, 'city', $city );
			update_user_meta( $user_id, 'postal', $post );
			update_user_meta( $user_id, 'address', $add  );

			//On success
			if ( ! is_wp_error( $user_id ) ) {

			    echo "User created : ". $user_id;

			}

			} else {

				echo "Not a valid email address given";

			}
		
	}


?>


<!DOCTYPE HTML>
<html>
<head>
<title>Dual Registration Form Responsive Widget Template | Home :: w3layouts</title>



<link href="<?php echo $url ?>/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Dual Registration Form  Responsive, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Kotta+One' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--web-fonts-->
</head>
<body>
		<!---header-->
		<div class="header">
			<h1><?php echo get_option( 'hedding-text', $default = true ) ?></h1>
		</div>
		<!--header-->


		<!--main-->
			<div class="main">
				<div class="main-section">
				<div class="registration-section">
					<h2>register or sign in</h2>
					<div class="social-icons">
						<a href="#"><i class="icon"></i><span>Sign in with twitter</span></a>
						<a href="#"><i class="icon1"></i><span>Sign in with facebook</span></a>
						<a href="#"><i class="icon2"></i><span>Sign in with google +</span></a>
					</div>
					<div class="register-form">
					<div class="login-form">


					<!-- <form>
						<input type="text" placeholder="User name">
						<input type="password" placeholder="Password">
						<span><input type="checkbox">Remember Me</span>
						<input type="submit" value="login">
					</form> -->
					<?php
					 $current_user = wp_get_current_user();
				    /**
				     * @example Safe usage: $current_user = wp_get_current_user();
				     * if ( !($current_user instanceof WP_User) )
				     *     return;
				     */
				    echo 'Username: ' . $current_user->user_login . '<br />';
				    echo 'User email: ' . $current_user->user_email . '<br />';
				    echo 'User first name: ' . $current_user->user_firstname . '<br />';
				    echo 'User last name: ' . $current_user->user_lastname . '<br />';
				    echo 'User display name: ' . $current_user->display_name . '<br />';
				    echo 'User ID: ' . $current_user->ID . '<br />';

					?>


					<p><?php// wp_loginout(); ?>
					<?php if(is_user_logged_in()):?>
						<a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
					<?php endif; ?>
					</p>

					
					<?php 

					$args = array(
						'echo'           => true,
						'remember'       => true,
						'redirect'       => site_url( 'home' ),
						'form_id'        => 'loginform',
						'id_username'    => 'user_login',
						'id_password'    => 'user_pass',
						'id_remember'    => 'rememberme',
						'id_submit'      => 'wp-submit',
						'label_username' => __( 'Username or Email Address' ),
						'label_password' => __( 'Password' ),
						'label_remember' => __( 'Remember Me' ),
						'label_log_in'   => __( 'Log In' ),
						'value_username' => '',
						'value_remember' => false
					);
					wp_login_form( $args ); ?>


					</div>
					<div class="registration-form">

					<form action="" method="POST" autocomplete="off">
						<input type="text" placeholder="User name" name="name">
						<input type="text" placeholder="Email" name="email" id="email_check">
						<input type="button" id="email_check_ajax" value="Check">
						<span class="ajax_msg"></span>
						<input type="text" placeholder="Phone" name="phone">
						<input type="text"  name="city" placeholder="City">
						<input type="text"  name="postal" placeholder="Postal code">
						<textarea id="test-area" type="text" name="address" placeholder="Address" cols="31" rows="5"></textarea>
						<input type="password" placeholder="Password" name="password">
						<input type="submit" value="submit" name="submit" id="submit_btn">
						
					</form>


					</div>
					<div class="clear"></div>
					</div>
					<p>forgot your password? click<a href="#"> here </a></p>
				</div>
			</div>
			<div class="footer">
			<p><?php echo get_option( 'copyright_text', $default = true ) ?></p>
		</div>

		<!--main-->

</body>
</html>





<script type="text/javascript">

	jQuery("#email_check_ajax").click(function(e){
    	
    	var email = jQuery("#email_check").val();

    	jQuery.ajax({

            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: 'POST',
            data: {
                action: "email_check","email":email
            },
            
            success: function (data, textStatus, jqXHR) {
                console.log(data);

                if(data == "Email-exists"){
                	jQuery(".ajax_msg").text("Email already exists, Use another one");

                } else {
                	jQuery(".ajax_msg").text("");
                }

            }
        });

	});
	
</script>