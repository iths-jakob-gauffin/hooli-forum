<?php get_header(); ?>
    <?php 
    
    while(have_posts()){
        the_post();

        // $posta = $post->post_type;

        // echo $posta;
        
        ?>  
            <div class="main-container">
                <div class="single">
                    <h1 class="HomePage__Title"><?php $titeln =  get_the_title(); echo $titeln; ?></h1> 
                    <p class="HomePage__Text"><?php echo get_the_content(); ?></p>   
                    <div class="links">
                        <a href="<?php echo site_url('/blog');?>">Tillbaka till blog</a>
                        <a href="<?php echo site_url('/');?>">Tillbaka till hemsidan</a>
                    </div>
                </div>
            </div>
        <?php

    }

    ?>

<?php get_footer(); ?>