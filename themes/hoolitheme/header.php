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
            <!-- <h1 class="Header__Title">Hej</h1> -->
            <div class="Header__ImageWrapper">
                <a href="<?php echo site_url('/')?>"></a>
                <img src="<?php echo get_theme_file_uri('/dist/images/Musikfolk.svg'); ?>" alt="Musikfolk logotype" class="Header__Image">
            </div>

        </header>
    </div>
    
