<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();

        // $posta = $post->post_type;

        // echo $posta;
        
        ?>

            <h1 class="HomePage__Title"><a href="<?php the_permalink(); ?>"><?php $titeln =  get_the_title(); echo $titeln . " Hälsningar från page.php"; ?></a></h1> 
            <div class="HomePage__Text"><?php the_content(); ?></div>   

        <?php

    }

    ?>

<?php get_footer(); ?>
