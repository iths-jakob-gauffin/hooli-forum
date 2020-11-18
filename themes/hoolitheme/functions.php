<?php
 
function hooliScripts(){
    //fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Varela+Round&display=swap', false);

    //font-awesome
    wp_enqueue_style('fontawesome5', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', array(), null );

    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all' );
    wp_enqueue_style('style');
 
    wp_enqueue_script('jquery');
    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');

    // Add extra css on certain pages to remove unwanted breadcrumbs and title in wpForo    
    $url = home_url( add_query_arg( null, null ));

    if(is_front_page() OR $url === site_url('community/') OR $url === site_url('community/senaste-inlaggen/')){
        wp_register_style('notFrontPageOrCommunityOrSenasteInlagg', get_template_directory_uri() . '/dist/notFrontPageOrCommunityOrSenasteInlagg.css', [], 1, 'all');
        wp_enqueue_style('notFrontPageOrCommunityOrSenasteInlagg');

    }

    // These commands gets all profile-urls, to then check to show/hide wpforo statistics and breadcrumb
    global $wpforo;
    $current_user_id = get_current_user_id();
    $profileUrlWithUsername = $wpforo->member->get_profile_url( $current_user_id );
    $truncatedUrl = substr($profileUrl, 0, strpos($profileUrlWithUsername, "profile")); 
    $profileUrl = $truncatedUrl . 'profile/';
    $accountUrl = $truncatedUrl . 'account/';
    $activityUrl = $truncatedUrl . 'activity/';
    $subscriptionsUrl = $truncatedUrl . 'subscriptions/';
    $allProfileUrls = [$profileUrl, $accountUrl, $activityUrl, $subscriptionsUrl];

    $currentUrl = home_url( add_query_arg( null, null ));

    function checkIfProfileUrl($arrayOfUrls, $currentUrl){
        foreach ($arrayOfUrls as $url) {
            if(strpos($currentUrl, $url) !== false){
                return true;
            }
        };
        return false;
    };

    //Om det inte är frontpage OCH om currentUrl inte är en av profilsidorna
    if(!is_front_page() AND !checkIfProfileUrl($allProfileUrls, $currentUrl)){
        wp_register_style('hideStatistics', get_template_directory_uri() . '/dist/hideStatistics.css', [], 1, 'all');
        wp_enqueue_style('hideStatistics');
    } else{
        wp_register_style('removeBreadcrumb', get_template_directory_uri() . '/dist/removeBreadcrumb.css', [], 1, 'all');
        wp_enqueue_style('removeBreadcrumb');
    }

    if ($url === site_url('community/?foro=signin')) {
        wp_register_script('addTopBorder', get_template_directory_uri() . '/src/addTopBorder.js', ['jquery'], 1, true);
        wp_register_script('editInnerText', get_template_directory_uri() . '/src/editInnerText.js', ['jquery'], 1, true);
        wp_enqueue_script('addTopBorder');
        wp_enqueue_script('editInnerText');
    }

    if ($url === site_url('community/?foro=signup')) {
        wp_register_script('addTopBorder', get_template_directory_uri() . '/src/addTopBorder.js', ['jquery'], 1, true);
        wp_enqueue_script('addTopBorder');

    }

    if ($url === site_url('/wp-login.php') || $url === site_url('/wp-login.php?loggedout=true&wp_lang=en_US' || $url === site_url('http://foghorn.se/iths/hooliforum/wp-login.php?loggedout=true&wp_lang=sv_SE'))) {
        wp_register_script('addTopBorder', get_template_directory_uri() . '/src/addTopBorder.js', ['jquery'], 1, true);
        wp_register_script('addPlaceholder', get_template_directory_uri() . '/src/addPlaceholder.js', ['jquery'], 1, true);
        wp_enqueue_script('addTopBorder');

    }

    $word = "profile";
    if (strpos($url, $word)) {
        wp_register_script('changeColorRatingBar', get_template_directory_uri() . '/src/changeColorRatingBar.js', ['jquery'], 1, true);
        wp_enqueue_script('changeColorRatingBar');

    }


}
 
add_action('wp_enqueue_scripts', 'hooliScripts');
//För att kunna ändra style på login-sidan
add_action('login_enqueue_scripts', 'hooliScripts');

function hooliThemeFeatures(){
    register_nav_menu( 'customWpForoMenu', 'Custom Wp Foro Menu' );
    register_nav_menu( 'customWpForoMenuLoggedIn', 'Custom Wp Foro Menu LOGGED IN' );

    add_theme_support( 'post-thumbnails');

    //Resize all imported images
    add_image_size( 'blogPresentation', 711, 470, true );
    add_image_size( 'asideEvent', 250, 90, true );
    add_image_size( 'asideReview', 100, 100, true );

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
//Redirecta subscribers som loggar in till hemsidan

function redirectToFrontend(){
    $ourMember = wp_get_current_user();

    if(count($ourMember->roles) == 1 AND $ourMember->roles[0] == 'subscriber'){
        wp_redirect(site_url('/'));
        exit;
    }
}
add_action('admin_init', 'redirectToFrontend');


