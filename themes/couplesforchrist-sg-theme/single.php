<?php get_header(); 
    
    while(have_posts()) { ?>
        <?php the_post(); ?>

      <!-- Breadcrumbs-->
      <?php pageBanner(array(
          'title' => 'Latest News',
          'parent' => 'Latest News Home',
          'parentlink' => site_url('/latest-news')
      )); ?>

      <section class="section section-md">
        <div class="container">
          <div class="row row-50">
          <div class="col-lg-8">
                <article class="post-creative">
                  <h3 class="post-creative-title"><?php the_title(); ?></h3>
                  <ul class="post-creative-meta pb-2">
                    <li><span class="icon mdi mdi-calendar-clock"></span>
                      <time><?php the_time('n M Y'); ?></time>
                    </li>
                    <li><span class="icon mdi mdi-tag-multiple"></span><?php echo get_the_category_list(', ');?></li>
                  </ul>
                 
                  <?php the_content(); ?>
                  
                </article>
                
            </div>
            <div class="col-lg-4">              
                <?php get_sidebar();?>             
            </div>
        </div>
      </section>

      <?php } ?>

<?php get_footer(); ?>

