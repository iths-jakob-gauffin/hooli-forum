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

    /// mergea sökning
    $defaults = [
        'fields'                 => 'ids',
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
        'cache_results'          => false
    ];

    $event_args = [
        'posts_per_page' => 1,
        'post_type' => 'event'
    ];

    $post_args = [
        'posts_per_page' => 2,
        'post_type' => 'post',
        'category_name' => 'intervju'
    ];

    $event_query = get_posts(array_merge($defaults, $event_args));
    $post_query = get_posts(array_merge($defaults, $post_args));
    
    $post_ids = array_merge($event_query, $post_query);
    
    $final_args = [
        'post_type' => ['post', 'event'],
        'post__in' => $post_ids,
        'orderby' => 'post__in',
        'order' => 'ASC'
    ];

    //denna ihopslagna sökning kan man nu loopa
    // $mergedSearch = new WP_Query($final_args);

    
    $categoryColors = array(
        'nyheter' => 'Blue',
        'recension' => 'Yellow',
        'intervju' => 'Pink'
    );

    function getParentName($categoryArray){
        foreach($categoryArray as $category){
            if($category->category_parent == 0){
                return strtolower($category->name);        
            };
        };
        return;
    };

    TODO:
    $newsPosts = new WP_Query(array(
        'posts_per_page' => 5,
        'category_name' => 'nyheter'
        // 'meta_key' => 'event_date',
        // 'orderby' => 'meta_value_num',
        // 'order' => 'ASC',
        // 'meta_query' => array(
        //     array(
        //         'key' => 'event_date',
        //         'compare' => '>=',
        //         'value' => date('Ymd'),
        //         'type' => 'numeric'
        //     )
        // )
    ));
    // echo var_dump($newsPosts);
    // echo var_dump(get_post(array(
    //     'posts_per_page' => 5,
    //     'category_name' => 'nyheter'
    // )));

    // echo var_dump(get_posts(array(
    //     'posts_per_page' => 1,
    //     'category_name' => 'nyheter'
    // )));

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
                        <section class="<?php   
                            if(has_category()){
                                $parentCategoryName = getParentName(get_the_category());
                                $cssModifier = $parentCategoryName;        
                                echo 'Blog__Preamble Blog__Preamble--' . $categoryColors[$cssModifier];            
                            }else{
                                echo 'Blog__Preamble';
                            };
                        ?>">
                            <div class="Blog__Label"><?php 
                            echo strtoupper($parentCategoryName);
                            ?></div>
                            <h2 class="Blog__PostTitle"><a href="<?php the_permalink(); ?>"><?php 
                            the_title(); ?></a></h2> 
                            <div class="Blog__Text">
                            <?php 
                            $content = get_the_content(); 
                            echo wp_trim_words( $content, 20); 
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
                                    'value' => $today,
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
                        $reviewPosts = new WP_Query(array(
                            'posts_per_page' => 2,
                            'category_name' => 'recension'
                        ));

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

                        while($reviewPosts->have_posts()){
                            $reviewPosts->the_post(); 
                            ?>
                                <li class="Aside__ReviewItem">
                                    <a href="<?php the_permalink(); ?>" class="Aside__ReviewLink"></a>
                                    <div class="Aside__Wrapper">
                                        <img src="<?php the_post_thumbnail_url( 'asideReview' ); ?>" alt="BYT UT" class="Aside__ReviewImage">
                                        <div class="Aside__ReviewTextWrapper">
                                            <div class="Aside__TopWrapper">
                                                <h3 class="Aside__ReviewAuthor"><?php echo get_field('review_author'); ?></h3>
                                                <span class="Aside__EventExcerpt"><?php echo wp_trim_words(get_the_excerpt(), 13, '..."');?></span>
                                            </div>
                                            <div class="Aside__BottomWrapper">
                                                <!-- <span class="Aside__ReviewHeadline">Recension:</span> -->
                                                <ul class="Aside__ReviewCategoryList">
                                                    <?php 
                                                        foreach(get_the_category() as $category){
                                                            if($category->category_parent != 0){?>
                                                            <li class="Aside__ReviewCategory"><?php echo $category->name; ?></li>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

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

                        $newsPosts = get_posts(array(
                            'posts_per_page' => -1,
                            'category_name' => 'nyheter'
                        ));
                        
                        foreach($newsPosts as $news){
                            ?>
                            <li class="Aside__NewsItem">
                                <a href="<?php the_permalink(); ?>" class="Aside__NewsLink"></a>
                                <div class="Aside__NewsTextWrapper">
                                    <h4 class="Aside__NewsTitle"><?php echo $news->post_title; ?></h4>        
                                    <div class="Aside__NewsPreamble">
                                        <?php echo wp_trim_words($news->post_content, 10, "..."); ?>
                                    </div>
                                    <div class="Aside__Published">
                                        <?php 
                                        $dateToEcho = new DateTime($news->post_date);
                                        echo $dateToEcho->format('d M - h:i'); 
                                        ?>
                                    </div>
                                </div>
                                <div class="Aside__NewsIconWrapper">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </li>
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
