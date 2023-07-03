<?php get_header(); 
    
    while(have_posts()) { ?>
        <?php the_post(); ?>

      <!-- Breadcrumbs-->
      <?php pageBanner(array(
          'title' => 'CFC Testimonials',
          'parent' => 'All Testimonials',
          'parentlink' => site_url('/testimonials')
      )); ?>

      <section class="section section-md">
        <div class="container">
          <div class="row row-50">
          <div class="col-lg-8">
                <!-- Profile -->
                <article class="profile-creative">
                    <figure class="profile-creative-figure">
                        <?php 
                            if( has_post_thumbnail()) { 
                                the_post_thumbnail();
                            } 
                        ?>
                        <!-- <img class="profile-creative-image" src="images/team-1-170x172.png" alt="" width="170" height="172"> -->
                    </figure>
                    <div class="profile-creative-main">
                        <p class="mb-3"><span class="icon mdi mdi-calendar-clock"></span>
                        <time><?php the_time('n M Y'); ?></time></p>
                        <h3 class="post-creative-title mb-3"><?php the_title(); ?></h3>
                        <p class="quote-modern-caption"><?php the_field('designation'); ?></p>
                    </div>
                </article>
                <blockquote class="quote-modern quote-modern-big mt-5">
                    <svg class="quote-modern-mark" width="39" height="40" viewBox="0 0 39 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 25.2632C0 17.6608 0.924444 11.8713 2.77333 7.89474C4.62222 3.91813 7.91556 1.28655 12.6533 0L15.6 4.38597C12.48 5.78947 10.3422 7.83626 9.18667 10.5263C8.14667 13.0994 7.62667 17.1345 7.62667 22.6316H14.7333V40H0V25.2632ZM23.4 25.2632C23.4 17.6608 24.3244 11.8713 26.1733 7.89474C28.0222 3.91813 31.3156 1.28655 36.0533 0L39 4.38597C35.88 5.78947 33.7422 7.83626 32.5867 10.5263C31.5467 13.0994 31.0267 17.1345 31.0267 22.6316H38.1333V40H23.4V25.2632Z"></path>
                    </svg>
                    <div class="quote-modern-text">
                        <p><?php the_content(); ?></p>
                    </div>
                </blockquote>
          
            </div>
            <div class="col-lg-4">              
                <article class="profile-thin">
                    <div class="profile-thin-main">
                        <p class="profile-thin-title text-left">Testimonials</p>
                        <hr class="mb-4" style="margin-top:15px">
                        <?php 
                            $tetimonialsDisplay =  new WP_Query(array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => 5,
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
                    <div class="mt-4 text-left">
                    <a class="button-winona" href="https://couplesforchrist.org.sg/testimonials">
                        <div class="content-original"><i class="mdi mdi-arrow-right"></i> View all testimonials</div>
                        <div class="content-dubbed"><i class="mdi mdi-arrow-right"></i> View all testimonials</div>
                    </a>
                    </div>
                </article>      
            </div>
        </div>
      </section>

      <?php } ?>

<?php get_footer(); ?>

