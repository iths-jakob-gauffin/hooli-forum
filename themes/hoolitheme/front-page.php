<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();

        // $posta = $post->post_type;

        // echo $posta;
        
        ?>

            <h1 class="HomePage__Title"><?php $titeln =  get_the_title(); echo $titeln . 'FRONTPAGESIDAN NU'; ?></h1> 
            <div class="HomePage__Text">
                <?php the_content(); ?>
            </div>   
            <a href="<?php echo site_url('/blog'); ?>">Till bloggen</a>

        <?php

    }

    ?>

<?php get_footer(); ?>
