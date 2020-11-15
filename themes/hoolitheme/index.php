<?php get_header(); ?>
    <div class="main-container">
        <div class="Blog">
            <main class="Blog__Main">
                <h1 class="Blog__Title">Bloggen</h1>
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
                <h2>asiden</h2>
                <section class="Blog__AsideEvents">
                    
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
