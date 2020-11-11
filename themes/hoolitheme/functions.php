<?php
 
function hooliScripts(){
    //fonts
    wp_enqueue_style( 'googleFonts', '//fonts.googleapis.com/css2?family=Varela+Round&display=swap');

    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all' );
    wp_enqueue_style('style');
 
    wp_enqueue_script('jquery');
    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');

    if(is_home()){
        wp_register_style('extraStyle', get_template_directory_uri() . '/dist/extraStyle.css', [], 1, 'all');
        wp_enqueue_style('extraStyle');
    }
    
}
 
add_action('wp_enqueue_scripts', 'hooliScripts');
//För att kunna ändra style på login-sidan
add_action('login_enqueue_scripts', 'hooliScripts');


add_action('wp_enqueue_scripts', 'hooliScripts');

function hooliThemeFeatures(){
    register_nav_menu( 'customWpForoMenu', 'Custom Wp Foro Menu' );
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
