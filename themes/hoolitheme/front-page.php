<?php get_header(); ?> 

    <?php 
        while(have_posts()){
            the_post();

            // echo the_title();
            
            ?>  
            <h1 style="font-size: 1rem">test</h1>
                <div class="main-container">
                    <main class="content">
                        <?php echo the_content(); ?>
                    </main>
                </div>
            <?php
        }
    ?>

<?php get_footer(); ?>