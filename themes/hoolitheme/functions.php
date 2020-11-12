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

}

add_action('wp_enqueue_scripts', 'hooliScripts');

function hooliThemeFeatures(){
    register_nav_menu( 'customWpForoMenu', 'Custom Wp Foro Menu' );
    register_nav_menu( 'customWpForoMenuLoggedIn', 'Custom Wp Foro Menu LOGGED IN' );

}

add_action('after_setup_theme', 'hooliThemeFeatures');

    //Redirecta subscribers som loggar in till hemsidan

    function redirectToFrontend(){
        $ourMember = wp_get_current_user();
    
        if(count($ourMember->roles) == 1 AND $ourMember->roles[0] == 'subscriber'){
            wp_redirect(site_url('/'));
            exit;
        }
    }
    add_action('admin_init', 'redirectToFrontend');