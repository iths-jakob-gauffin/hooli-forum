<?php get_header(); ?>
<<<<<<< HEAD
<?php 
  
  while(have_posts()){
    the_post();

    echo the_title();
    echo the_content();
  }
  ?>

<?php get_footer(); ?>
=======
    <?php 
    
    while(have_posts()){
        the_post();

        // $posta = $post->post_type;

        // echo $posta;
        
        ?>

            <h1 class="HomePage__Title"><a href="<?php the_permalink(); ?>"><?php $titeln =  get_the_title(); echo $titeln . " Detta är index.php"; ?></a></h1> 
            <div class="HomePage__Text"><?php echo get_the_content(); ?></div>   

        <?php

    }

    ?>

<?php get_footer(); ?>
>>>>>>> main
