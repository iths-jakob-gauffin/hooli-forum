<aside class="Blog__Aside">
<button id="testKlick">klicka</button>
  <section class="Blog__AsideEvents">
    <div class="Blog__AsideTitleWrapper">
      <h2 class="Blog__AsideTitle Blog__AsideTitle--Green">Kommande events</h2>
    </div>
      
    <ul class="Blog__AsideEventList">
      <?php 
          $today = date('Ymd');
          
          $eventPosts = new WP_Query(array(
              'posts_per_page' => 4,
              'post_type' => 'event',
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => array(
                  array(
                      'key' => 'event_date',
                      'compare' => '>=',
                      'value' => $today,
                      'type' => 'numeric'
                  )
              )
          ));

          while($eventPosts->have_posts()){
              $eventPosts->the_post(); 
              
              $date = new DateTime(get_field('event_date'));
              //Få ut klockslag
              // $time = new DateTime(get_field('event_time'));
              // echo $time->format('H:i');
              

              ?>
                <li class="Blog__AsideEventItem" style="background: url('<?php the_post_thumbnail_url('asideEvent'); ?>')">
                  <a href="<?php the_permalink(); ?>" class="Blog__AsideEventLink"></a>
                    <div class="Blog__DateContainer">
                      <span class="Blog__Date">
                        <?php echo $date->format('d'); ?>
                      </span>
                      <span class="Blog__Month">
                        <?php echo $date->format('M'); ?>
                      </span>
                    </div>
                    <div class="Blog__EventNameWrapper">
                      <p class="Blog__EventName"><?php the_title();?></p>
                    </div>
                </li>
          <?php
          }
        wp_reset_postdata();
      ?>
      </ul>
  </section>
  <section class="Blog__AsideEvents">
    <div class="Blog__AsideTitleWrapper">
      <h2 class="Blog__AsideTitle Blog__AsideTitle--Yellow">Senaste recensionerna</h2>
    </div>
      
    <ul class="Blog__AsideEventList">
      <?php 
        $reviewPosts = new WP_Query(array(
            'posts_per_page' => 2,
            'category_name' => 'recension'
        ));

        $eventPosts = new WP_Query(array(
          'posts_per_page' => 4,
          'post_type' => 'event',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
              array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => date('Ymd'),
                  'type' => 'numeric'
              )
          )
        ));

        while($reviewPosts->have_posts()){
          $reviewPosts->the_post(); 
        ?>
          <li class="Aside__ReviewItem">
            <a href="<?php the_permalink(); ?>" class="Aside__ReviewLink"></a>
            <div class="Aside__Wrapper">
              <img src="<?php the_post_thumbnail_url( 'asideReview' ); ?>" alt="BYT UT" class="Aside__ReviewImage">
                <div class="Aside__ReviewTextWrapper">
                  <div class="Aside__TopWrapper">
                    <h3 class="Aside__ReviewAuthor"><?php echo get_field('review_author'); ?></h3>
                    <span class="Aside__EventExcerpt"><?php echo wp_trim_words(get_the_excerpt(), 10, '...');?></span>
                  </div>
                  <div class="Aside__BottomWrapper">
                    <ul class="Aside__ReviewCategoryList">
                      <?php 
                        foreach(get_the_category() as $category){
                          if($category->category_parent != 0){?>
                              <li class="Aside__ReviewCategory"><?php echo $category->name; ?></li>
                            <?php
                          }
                        }
                        ?>
                    </ul>
                  </div>
                </div>
            </div>
          </li>
        <?php
          }
          wp_reset_postdata();  
        ?>
    </ul>
  </section>
  <section class="Blog__AsideEvents">
    <div class="Blog__AsideTitleWrapper">
      <h2 class="Blog__AsideTitle Blog__AsideTitle--Blue">Senaste nyheterna</h2>
    </div>
      
    <ul class="Blog__AsideEventList">
    <?php 

      $newsPosts = get_posts(array(
        'posts_per_page' => -1,
        'category_name' => 'nyheter'
      ));
          
      foreach($newsPosts as $news){
      ?>
        <li class="Aside__NewsItem">
            <a href="<?php the_permalink($news->ID); ?>" class="Aside__NewsLink"></a>
          <div class="Aside__NewsTextWrapper">
            <h4 class="Aside__NewsTitle"><?php echo $news->post_title; ?></h4>        
            <div class="Aside__NewsPreamble">
              <?php echo wp_trim_words($news->post_content, 10, "..."); ?>
            </div>
            <div class="Aside__PublishedWrapper">
              <div class="Aside__Published">
                <?php 
                  $dateToEcho = new DateTime($news->post_date);
                  echo $dateToEcho->format('d M - h:i'); 
                ?>
              </div>
            </div>
          </div>
          <div class="Aside__NewsIconWrapper">
            <i class="fas fa-arrow-right"></i>
          </div>
        </li>
        <?php
      }    
      wp_reset_postdata();
      ?>
    </ul>
  </section>
</aside>
