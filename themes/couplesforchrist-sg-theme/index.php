<?php 

get_header(); ?>

    <!-- Breadcrumbs-->
    <?php pageBanner(array(
          'title' => 'All Latest News'
      )); ?>

       <!-- Main Cont-->
       <section class="section section-lg">
        <div class="container">
          <div class="row row-50 row-xxl-70">
            <?php 
                while ( have_posts() ) {
                    the_post(); ?>
                    <div class="col-md-6 scaleFadeInWrap">
                        <!-- Post Modern-->
                        <div class="">
                            <article class="post-modern">
                                <a class="post-modern-media" href="<?php the_permalink(); ?>">
                                  <?php 
                                  if(has_post_thumbnail()){
                                      the_post_thumbnail('latesNews-home');
                                  }else{ ?>
                                      <img src="<?php echo get_theme_file_uri('images/grid-blog-1-571x353.jpg')?>" alt="" width="571" height="353"/>
                                  <?php } ?> 
                                </a>
                                <h4 class="post-modern-title">
                                    <a class="underlined" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <ul class="post-modern-meta">
                                    <li>by <span class="author-style"><?php the_author_posts_link(); ?></span></li>
                                    <li><time datetime="2020"><?php the_time('n M Y'); ?></time></li>
                                    <li><?php echo get_the_category_list(', ');?></li>
                                </ul>
                                <?php the_excerpt(); ?>
                            </article>
                        </div>
                    </div>
            <?php } ?>
            <!-- Post Modern-->
          </div>
         
          <div class="pagination"> 
            <?php echo paginate_links(); ?>         
          </div> 
        </div>
      </section>

<?php get_footer(); ?>