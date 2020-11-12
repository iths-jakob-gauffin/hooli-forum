<?php get_header(); ?>

    <?php 
        while(have_posts()){
            the_post();

            ?>  
                <div class="main-container">
                    <main class="content">
                        <?php echo the_content();
                        ?>
                    </main>
                </div>
            <?php
        }
    ?>

<?php get_footer(); ?>
