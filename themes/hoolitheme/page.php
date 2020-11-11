<?php get_header(); ?>

    <?php 
        while(have_posts()){
            the_post();

            // echo the_title();
            
            ?>  
                <div class="main-container">
                    <main class="content">
                        <?php echo the_content(); 
                            echo get_field('under_titel');
                            // echo var_dump(get_field('background_image'));

                        ?>
                        <img src="<?php 
                        $image = get_field('background_image');
                        echo $image['sizes']['våregenstorlek'];
                        // echo $image->url;
                        
                        
                        ?>">
                    </main>
                </div>
            <?php
        }
    ?>

<?php get_footer(); ?>
