<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <div class="main-container">
        <header class="Header">
            
            <div class="Header__ImageWrapper">
                <a href="<?php echo site_url('/')?>" title="Tillbaka till startsidan"></a>
                <img src="<?php echo get_theme_file_uri('/dist/images/Musikfolk.svg'); ?>" alt="Musikfolk logotype" class="Header__Image">
            </div>

            <nav class="Header__Nav">
                <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'customWpForoMenu'
                        ) )
                ?> 
            </nav>

            <div class="Header__SearchField">
                <div class="wpf-search-form">
                    <form class="Header__Form" action="http://hooliforum.local/community/" method="get">
                        <input id="wpForoSearch" class="wpf-search-field Header__Input" name="wpfs" type="text" value="" style="margin-right:10px;">
                        <label class="Header__SearchLabel" for="wpForoSearch">
                            <i class="fas fa-search Header__Icon" aria="hidden"></i>
                        </label>
                    </form>
                </div>
            </div>

        </header>
    </div>
    
