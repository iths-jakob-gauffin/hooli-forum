<?php
 
function hooliScripts(){
    //fonts
    wp_enqueue_style( 'googleFonts', '//fonts.googleapis.com/css2?family=Varela+Round&display=swap');

    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all' );
    wp_enqueue_style('style');
 
    wp_enqueue_script('jquery');
    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');

    // Add extra css on certain pages to remove unwanted breadcrumbs and title in wpForo    
    $url = home_url( add_query_arg( null, null ));

    if(is_front_page() OR $url === site_url('community/') OR $url === site_url('community/senaste-inlaggen/') ){
        wp_register_style('extraStyle', get_template_directory_uri() . '/dist/extraStyle.css', [], 1, 'all');
        wp_enqueue_style('extraStyle');
    }

    if ($url === site_url('community/?foro=signin')) {
        wp_register_script('addTopBorder', get_template_directory_uri() . '/src/addTopBorder.js', ['jquery'], 1, true);
        wp_register_script('editInnerText', get_template_directory_uri() . '/src/editInnerText.js', ['jquery'], 1, true);

        wp_enqueue_script('editInnerText');
    }

    if ($url === site_url('community/?foro=signup')) {
        wp_register_script('addTopBorder', get_template_directory_uri() . '/src/addTopBorder.js', ['jquery'], 1, true);

    }

    if ($url === site_url('/wp-login.php')) {
        wp_register_script('addTopBorder', get_template_directory_uri() . '/src/addTopBorder.js', ['jquery'], 1, true);
        wp_register_script('addPlaceholder', get_template_directory_uri() . '/src/addPlaceholder.js', ['jquery'], 1, true);
    }

}
 
add_action('wp_enqueue_scripts', 'hooliScripts');
//För att kunna ändra style på login-sidan
add_action('login_enqueue_scripts', 'hooliScripts');


add_action('wp_enqueue_scripts', 'hooliScripts');

function hooliThemeFeatures(){
    register_nav_menu( 'customWpForoMenu', 'Custom Wp Foro Menu' );
    register_nav_menu( 'customWpForoMenuLoggedIn', 'Custom Wp Foro Menu LOGGED IN' );

}

add_action('after_setup_theme', 'hooliThemeFeatures');


//Ändrar loggan på login-sidan
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/Musikfolk.svg);
            height:65px;
            width:320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
    //Redirecta subscribers som loggar in till hemsidan

    function redirectToFrontend(){
        $ourMember = wp_get_current_user();
    
        if(count($ourMember->roles) == 1 AND $ourMember->roles[0] == 'subscriber'){
            wp_redirect(site_url('/'));
            exit;
        }
    }
    add_action('admin_init', 'redirectToFrontend');
