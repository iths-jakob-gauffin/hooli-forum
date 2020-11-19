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

        <h1 class="Archive__Title Archive__Title--Green"><?php the_title(); ?></h1>
        <p class="Archive__Subtitle"><?php echo get_field('subtitle'); ?></p>

        <ul class="Archive__List">
            <?php 

            $interviewPosts = new WP_Query( array(
                'posts_per_page' => -1,
                'post_type' => 'event'
            ) );

            while($interviewPosts->have_posts()){
                $interviewPosts->the_post();
                $date = new DateTime(get_field('event_date'));
                $time = new DateTime(get_field('event_time'));
                ?>
                    <li class="Archive__ListItem Archive__ListItem--Green">
                        <a href="<?php the_permalink(); ?>" class="Archive__ArticleLink"></a>
                        <article class="Archive__Article">
                            <h3 class="Archive__ArticlePerson">Konsert <?php echo get_field('person_subject'); ?></h3>
                                <h4 class="Archive__ArticleTitle">
                                    <?php the_title(); ?>
                                </h4>
                            <div class="Archive__Preamble">
                                <?php echo wp_trim_words(get_the_content(), 7);?>
                            </div>
                            <div class="Archive__CategoryWrapper Archive__CategoryWrapper--Green">
                                <span class="Archive__Location">Plats: <?php echo get_field('event_location'); ?></span>
                                <span class="Archive__EventDate">Tid: <?php echo $date->format('d M') . ' ' . $time->format('H:i'); ?> </span>
                                
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