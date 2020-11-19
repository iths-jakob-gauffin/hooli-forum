<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();
        $mapLocation = get_field('map_location');
        
        ?>  
            <div class="main-container">
                <?php echo get_template_part('/templates/blogNav'); ?>
                <div class="single-container">
                    <h1><?php $titeln =  get_the_title(); echo $titeln; ?></h1>
                    <p class="author">Single event Skriven av <?php echo get_the_author(); ?></p>
                    <div class="lines"></div>
                    <p><?php echo get_the_content(); ?></p>
                    <div class="SingleEvent__Map">
                        <!-- <div class="acf-map">
                            <div class="marker" data-lat="<?php echo $mapLocation['lat']; ?>" data-lng="<?php echo $mapLocation['lat']; ?>">       
                            </div>
                        </div> -->
                        <?php 
                        $location = get_field('map_location');
                        if( $location ): ?>
                            <div class="acf-map" data-zoom="16">
                                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                            </div>
                        <?php endif; ?>
                        
                    </div>

                    <div class="links">
                        <a href="<?php echo site_url('/blog');?>">Tillbaka till bloggen</a>
                        <a href="<?php echo site_url('/');?>">Tillbaka till forumet</a>
                    </div>
                </div>
            </div>
        <?php

    }

    ?>

<?php get_footer(); ?>