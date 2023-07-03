<?php get_header(); 
    
    while(have_posts()) { ?>
        <?php the_post(); ?>

      <!-- Breadcrumbs-->
      <?php pageBanner(array(
          'title' => 'CFC Social Ministry',
          'parent' => 'All SocMin',
          'parentlink' => site_url('/testimonials')
      )); ?>
      <section class="section section-md">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-8">
                <article class="post-creative">
                  <h3 class="post-creative-title"><?php the_title(); ?></h3>
                  <ul class="post-creative-meta pb-2">
                    <li>
                        <span class="icon mdi mdi-calendar-clock"></span>
                        <time><?php the_time('n M Y'); ?></time>
                    </li>
                    <li><span class="icon mdi mdi-tag-multiple"></span>
                            <?php $terms = get_the_terms( $post->ID , 'activity' );
                            foreach ( $terms as $term ) {
                                echo $term->name;
                            } ?>
                </li>
                  </ul>
                  <?php 
                      if( has_post_thumbnail()) { 
                        the_post_thumbnail();
                      } 
                  ?>
                  <?php the_content(); ?>
                  
                </article>
          
            </div>
            <div class="col-lg-4">              
            <article class="profile-thin">
                <div class="profile-thin-main">
                <p class="profile-thin-title text-left">Recent Posts</p>
                <hr class="mb-3 mt-3">
                <?php 
                    $tetimonialsDisplay =  new WP_Query(array(
                        'post_type' => 'social_ministry',
                        'posts_per_pate' => 5,
                    ));
                    
                    while($tetimonialsDisplay->have_posts()){
                        $tetimonialsDisplay->the_post();?>
                    <div class="quote-modern-meta my-2">
                        <div class="quote-modern-avatar">
                            <?php 
                                if(has_post_thumbnail()){
                                    the_post_thumbnail('frontpage-testimonial');
                                }else{ ?>
                                    <img src="<?php echo get_theme_file_uri('images/testimonials-person-1-48x48.jpg');?>" alt="" width="100" height="100"/>
                                <?php } 
                            ?>  
                        </div>
                        <div class="quote-modern-info">
                            <a href="<?php the_permalink(); ?>">
                                <cite class="quote-modern-cite"><?php the_title(); ?></cite>
                            </a>
                        </div>
                    </div>
                    <?php  } wp_reset_postdata(); ?>            
                </div>
            </article>      
            </div>
        </div>
      </section>

      <?php } ?>

<?php get_footer(); ?>

