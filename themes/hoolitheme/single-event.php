<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();
        $mapLocation = get_field('map_location');
        
        ?>  
            <div class="main-container">
                <?php echo get_template_part('/templates/blogNav'); ?>
                <div class="SingleEvent">
                        <div class="SingleEvent__BackgroundImage" style="background: url(<?php  echo get_field('background_image')['url']; ?>)"></div>
                        
                        <div class="SingleEvent__ContentWrapper">
                            <div class="SingleEvent__CategoryWrapper">
                                <h3 class="SingleEvent__Category"><?php echo get_the_category()[0]->name; ?></h3>
                                <div class="SingleEvent__Line"></div>
                            </div>

                            <div class="SingleEvent__TextWrapper">
                                <div class="SingleEvent__Inner">
                                    <h1 class="SingleEvent__Artist"><?php the_title(); ?></h1>
        
                                    <div class="SingleEvent__Meta">
                                        <span class="SingleEvent__Date"><?php 
                                        $date = new DateTime(get_field('event_date'));
                                        echo $date->format('d M'); ?></span>
                                        <span class="SingleEvent__Location"><?php echo get_field('event_location'); ?></span>
                                        <span class="SingleEvent__Time"><?php 
                                        $time = new DateTime(get_field('event_time'));
                                        echo $time->format('H:i'); ?></span>
                                    </div>
                                </div>

                                <div class="SingleEvent__ParagraphWrapper">
                                    <p><?php echo get_the_content(); ?></p>
                                </div>
                            </div>

                            <div class="SingleEvent__MapWrapper">
                                <?php 
                                $location = get_field('map_location');
                                if( $location ): ?>
                                    <div class="acf-map" data-zoom="16">
                                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                                        <div class="SingleEvent__MapText">
                                            <h3 class="SingleEvent__MapTitle"><?php the_title(); ?></h3>
                                            <p class="SingleEvent__MapTime">
                                                <?php 
                                                $date = new DateTime(get_field('event_date'));
                                                echo $date->format('d M, ');
                                                $time = new DateTime(get_field('event_time'));
                                                echo $time->format('H:i');
                                                ?>
                                            </p>
                                            <div class="SingleEvent__MapAdress">
                                                <?php 
                                                echo '<p>' . $location['name'] . '</p>';
                                                // echo '<p>' . $location['street_name'] . '</p>';
                                                echo '<p>' . $location['street_name'] . ' ' . $location['street_number'] . '</p>';
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <h5><?php echo var_dump($location); ?></h5> -->
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
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