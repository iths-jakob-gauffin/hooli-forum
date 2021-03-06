<?php 
/*
Template Name: Archives
*/
get_header(); 
?>

<div class="main-container">
  <div class="Archive">
    <main class="Archive__Main">
      <?php 
      get_template_part('/templates/blogNav');  
      ?>

      <section class="Archive__Section">
          <div class="Archive__BackgroundImage" style="background: url(
            <?php
              $bgImage = get_field('background_image');
              echo $bgImage['sizes']['blogBackgroundImage'];
            ?>)">
          </div>

        <h1 class="Archive__Title"><?php the_title(); ?></h1>
        <p class="Archive__Subtitle"><?php echo get_field('subtitle'); ?></p>

        <ul class="Archive__List">
            <?php 

            $interviewPosts = new WP_Query( array(
                'posts_per_page' => -1,
                'category_name' => 'intervju'
            ) );

            while($interviewPosts->have_posts()){
                $interviewPosts->the_post();
                ?>
                    <li class="Archive__ListItem">
                        <a href="<?php the_permalink(); ?>" class="Archive__ArticleLink"></a>
                        <article class="Archive__Article">
                            <h3 class="Archive__ArticlePerson">Intervju med <?php echo get_field('person_subject'); ?></h3>
                                <h4 class="Archive__ArticleTitle">
                                    <?php the_title(); ?>
                                </h4>
                            <div class="Archive__Meta">

                                <span class="Archive__Author">Skriven av <?php the_author(); ?></span><span class="Archive__Date">, publicerad <?php the_date(); ?></span>
                            </div>
                            <div class="Archive__Preamble">
                                <?php echo wp_trim_words(get_the_content(), 35);?>
                            </div>
                            <div class="Archive__Arrow">
                                    <i class="fas fa-arrow-right"></i>
                            </div>
                        </article>
                    </li>
                <?php
            }
            wp_reset_postdata();
            ?>
        </ul>
    </section>  

    </main>
    <div class="Archive__AsideWrapper">
      <?php get_template_part('/templates/aside'); ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>