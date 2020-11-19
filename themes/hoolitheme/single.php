<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();

        // $posta = $post->post_type;

        // echo $posta;
        
        ?>  
            <div class="main-container">
                <?php echo get_template_part('/templates/blogNav'); ?>
                <div class="single-container">
                    <h1><?php $titeln =  get_the_title(); echo $titeln; ?></h1>
                    <p class="author">Skriven av <?php echo get_the_author(); ?></p>
                    <div class="lines"></div>
                    <p><?php echo get_the_content(); ?></p>
                    <div class="img-container">
                        <img src="<?php the_post_thumbnail_url()?>" alt="">
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