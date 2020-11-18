<?php get_header(); ?>

<div class="main-container">
  <div class="Page">
    <main class="Page__Main">
      <?php 
      get_template_part('/templates/blogNav');  
      ?>

      <article class="Page__Article">
          <div class="Page__BackgroundImage" style="background: url(
            <?php
              $bgImage = get_field('background_image');
              echo $bgImage['url'];
            ?>)">
          </div>
          
        <h1 class="Page__Title"><?php the_title(); ?></h1>
      </article>

    </main>
    <div class="Page__AsideWrapper">
      <?php get_template_part('/templates/aside'); ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>