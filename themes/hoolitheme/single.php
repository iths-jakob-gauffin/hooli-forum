<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();

        // $posta = $post->post_type;

        // echo $posta;
        
        ?>
            <h1>Här är single.php</h1>
            <h2 class="HomePage__Title"><?php $titeln =  get_the_title(); echo $titeln; ?></h2> 
            <p class="HomePage__Text"><?php echo get_the_content(); ?></p>   

            <a href="<?php echo site_url('/blog');?>">Tillbaka till blog</a>
            <a href="<?php echo site_url('/');?>">Tillbaka till hemsidan</a>

        <?php

    }

    ?>

<?php get_footer(); ?>