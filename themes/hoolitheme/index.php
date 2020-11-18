<?php get_header(); ?>
    <div class="main-container">
        <div class="Blog">
            <main class="Blog__Main">
                <?php echo get_template_part('/templates/blogNav'); ?>
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

            <div class="Blog__AsideWrapper">
                <?php echo get_template_part('/templates/aside'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
