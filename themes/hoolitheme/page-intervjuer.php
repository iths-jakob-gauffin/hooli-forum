<?php get_header(); ?>

<div class="main-container">
  <div class="Page">
    <main class="Page__Main">
      <?php 
      get_template_part('/templates/blogNav');  
      ?>

      <section class="Page__Section">
          <div class="Page__BackgroundImage" style="background: url(
            <?php
              $bgImage = get_field('background_image');
              echo $bgImage['sizes']['blogBackgroundImage'];
            ?>)">
          </div>

        <h1 class="Page__Title"><?php the_title(); ?></h1>
        <p class="Page__Subtitle">
            <?php 
            // echo var_dump($bgImage); 
            echo get_field('subtitle'); ?>Här hittar du alla intervjuer</p>

        <ul class="Page__List">
            <?php 
            while(have_posts()){
                the_post();
                ?>
                    <li class="Page__ListItem">
                        <a href="" class="Page__ArticleLink"></a>
                        <article class="Page__Article">
                            <h3 class="Page__ArticlePerson">Intervju med <?php echo get_field('person_subject'); ?></h3>
                            <h4 class="Page__ArticleTitle">
                                <?php the_content(); ?>
                            </h4>
                        </article>
                    </li>
                <?php
            }
            ?>
        </ul>
      </section>

    </main>
    <div class="Page__AsideWrapper">
      <?php get_template_part('/templates/aside'); ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>