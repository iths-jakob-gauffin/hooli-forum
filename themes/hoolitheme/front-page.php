<?php get_header(); ?>
<<<<<<< HEAD
<?php 
  
  while(have_posts()){
    the_post();

    <?php 
        while(have_posts()){
            the_post();

            // echo the_title();
            
            ?>  
=======
    <?php 
        while(have_posts()){
            the_post();

            // echo the_title();
            
            ?>  
            <h1 style="font-size: 1rem">test</h1>
>>>>>>> main
                <div class="main-container">
                    <main class="content">
                        <?php echo the_content(); ?>
                    </main>
                </div>
            <?php
        }
    ?>

<?php get_footer(); ?>
