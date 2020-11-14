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
                        $eventPosts = new WP_Query(array(
                            'posts_per_page' => 1,
                            'post_type' => 'event'
                        ));
                        while($eventPosts->have_posts()){
                            $eventPosts->the_post(); ?>
                            <li class="Blog__AsideEventItem" style="background: url('<?php the_post_thumbnail_url('asideEvent'); ?>')">
                                <a href="<?php the_permalink(); ?>" class="Blog__AsideEventLink"></a>
                                <div class="Blog__DateContainer">
                                    <span class="Blog__Date">24</span>
                                    <span class="Blog__Month">
                                        Nov
                                    </span>
                                </div>
                                <p class="Blog__EventName">Action Bronson</p>
                            </li>

                        <?php
                        }
                        
                    ?>
                    </ul>
                </section>
            </aside>
        </div>
    </div>

<?php get_footer(); ?>
