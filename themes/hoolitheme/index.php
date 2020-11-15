<?php get_header(); ?>
    <div class="main-container">
        <div class="Blog">
            <main class="Blog__Main">
                <nav class="Blog__Nav">
                    <a href="<?php esc_url(site_url('/')); ?>" class="Blog__Title">Bloggen</a>
                    <ul class="Blog__NavList">
                        <li class="Blog__NavItem">
                            <a href="<?php esc_url(site_url('/events')); ?>" class="Blog__NavLink"></a>
                            <span class="Blog__NavLinkText Blog__NavLinkText--Pink">Intervjuer</span>
                        </li>
                        <li class="Blog__NavItem">
                            <a href="<?php esc_url(site_url('/events')); ?>" class="Blog__NavLink"></a>
                            <span class="Blog__NavLinkText Blog__NavLinkText--Green">Events</span>
                        </li>
                        <li class="Blog__NavItem">
                            <a href="<?php esc_url(site_url('/events')); ?>" class="Blog__NavLink"></a>
                            <span class="Blog__NavLinkText Blog__NavLinkText--Yellow">Recensioner</span>
                        </li>
                        <li class="Blog__NavItem">
                            <a href="<?php esc_url(site_url('/events')); ?>" class="Blog__NavLink"></a>
                            <span class="Blog__NavLinkText Blog__NavLinkText--Blue">Nyheter</span>
                        </li>
                    </ul>
                </nav>
    <?php 
    
    while(have_posts()){
        the_post();
        ?>
            <article class="Blog__Post">
                <a href="<?php the_permalink(); ?>" class="Blog__SinglePostLink"></a>

                <div class="Blog__BackgroundImageWrapper">

                    <div class="Blog__BackgroundImage" style="background-image: url(<?php 
                    the_post_thumbnail_url( 'backgroundPresentation' );
                    ?>)">
                    </div>      
                        <section class="Blog__Preamble">
                            <div class="Blog__Label"><?php the_category(); ?></div>
                            <h2 class="Blog__PostTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
                            <div class="Blog__Text">
                            <?php $content = get_the_content(); 
                            echo wp_trim_words( $content, 13); 
                            ?><a href="<?php the_permalink(); ?>" class="Blog__ReadMoreLink">Läs mer</a></div>   
                        </section>
                </div>
                
            </article>
            
            <?php
    }

    ?>
            </main>
            <aside class="Blog__Aside">
                <section class="Blog__AsideEvents">
                    <div class="Blog__AsideTitleWrapper">
                        <h2 class="Blog__AsideTitle Blog__AsideTitle--Green">Kommande events</h2>
                    </div>
                    
                    <ul class="Blog__AsideEventList">
                    <?php 
                        $today = date('Ymd');
                        
                        $eventPosts = new WP_Query(array(
                            'posts_per_page' => 4,
                            'post_type' => 'event',
                            'meta_key' => 'event_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'event_date',
                                    'compare' => '>=',
                                    'value' => date('Ymd'),
                                    'type' => 'numeric'
                                )
                            )
                        ));

                        while($eventPosts->have_posts()){
                            $eventPosts->the_post(); 
                            
                            $date = new DateTime(get_field('event_date'));
                            //Få ut klockslag
                            // $time = new DateTime(get_field('event_time'));
                            // echo $time->format('H:i');
                            

                            ?>
                            <!-- <div class="Blog__ListItemWrapper"> -->
                                <li class="Blog__AsideEventItem" style="background: url('<?php the_post_thumbnail_url('asideEvent'); ?>')">
                                    <a href="<?php the_permalink(); ?>" class="Blog__AsideEventLink"></a>
                                    <div class="Blog__DateContainer">
                                        <span class="Blog__Date">
                                        <?php echo $date->format('d'); ?>
                                        </span>
                                        <span class="Blog__Month">
                                            <?php echo $date->format('M'); ?>
                                        </span>
                                    </div>
                                    <div class="Blog__EventNameWrapper">
                                        <p class="Blog__EventName"><?php the_title();?></p>
                                    </div>
                                </li>
                            <!-- </div> -->

                        <?php
                        }
                        wp_reset_postdata();
                        
                    ?>
                    </ul>
                </section>
                <section class="Blog__AsideEvents">
                    <div class="Blog__AsideTitleWrapper">
                        <h2 class="Blog__AsideTitle Blog__AsideTitle--Yellow">Senaste recensionerna</h2>
                    </div>
                    
                    <ul class="Blog__AsideEventList">
                    <?php 
                        $today = date('Ymd');
                        
                        $eventPosts = new WP_Query(array(
                            'posts_per_page' => 4,
                            'post_type' => 'event',
                            'meta_key' => 'event_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'event_date',
                                    'compare' => '>=',
                                    'value' => date('Ymd'),
                                    'type' => 'numeric'
                                )
                            )
                        ));

                        while($eventPosts->have_posts()){
                            $eventPosts->the_post(); 
                            
                            $date = new DateTime(get_field('event_date'));
                            //Få ut klockslag
                            // $time = new DateTime(get_field('event_time'));
                            // echo $time->format('H:i');
                            

                            ?>
                            <!-- <div class="Blog__ListItemWrapper"> -->
                                <li class="Blog__AsideEventItem" style="background: url('<?php the_post_thumbnail_url('asideEvent'); ?>')">
                                    <a href="<?php the_permalink(); ?>" class="Blog__AsideEventLink"></a>
                                    <div class="Blog__DateContainer">
                                        <span class="Blog__Date">
                                        <?php echo $date->format('d'); ?>
                                        </span>
                                        <span class="Blog__Month">
                                            <?php echo $date->format('M'); ?>
                                        </span>
                                    </div>
                                    <div class="Blog__EventNameWrapper">
                                        <p class="Blog__EventName"><?php the_title();?></p>
                                    </div>
                                </li>
                            <!-- </div> -->

                        <?php
                        }
                        wp_reset_postdata();
                        
                    ?>
                    </ul>
                </section>
                <section class="Blog__AsideEvents">
                    <div class="Blog__AsideTitleWrapper">
                        <h2 class="Blog__AsideTitle Blog__AsideTitle--Blue">Senaste nyheterna</h2>
                    </div>
                    
                    <ul class="Blog__AsideEventList">
                    <?php 
                        $today = date('Ymd');
                        
                        $eventPosts = new WP_Query(array(
                            'posts_per_page' => 4,
                            'post_type' => 'event',
                            'meta_key' => 'event_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'event_date',
                                    'compare' => '>=',
                                    'value' => date('Ymd'),
                                    'type' => 'numeric'
                                )
                            )
                        ));

                        while($eventPosts->have_posts()){
                            $eventPosts->the_post(); 
                            
                            $date = new DateTime(get_field('event_date'));
                            //Få ut klockslag
                            // $time = new DateTime(get_field('event_time'));
                            // echo $time->format('H:i');
                            

                            ?>
                            <!-- <div class="Blog__ListItemWrapper"> -->
                                <li class="Blog__AsideEventItem" style="background: url('<?php the_post_thumbnail_url('asideEvent'); ?>')">
                                    <a href="<?php the_permalink(); ?>" class="Blog__AsideEventLink"></a>
                                    <div class="Blog__DateContainer">
                                        <span class="Blog__Date">
                                        <?php echo $date->format('d'); ?>
                                        </span>
                                        <span class="Blog__Month">
                                            <?php echo $date->format('M'); ?>
                                        </span>
                                    </div>
                                    <div class="Blog__EventNameWrapper">
                                        <p class="Blog__EventName"><?php the_title();?></p>
                                    </div>
                                </li>
                            <!-- </div> -->

                        <?php
                        }
                        wp_reset_postdata();
                        
                    ?>
                    </ul>
                </section>
            </aside>
        </div>
    </div>

<?php get_footer(); ?>
