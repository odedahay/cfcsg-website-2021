<?php 

get_header(); ?>

    <!-- Bread Crumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php echo get_theme_file_uri('images/breadcrumbs-image-1.jpg') ?>);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
                <h6 class="breadcrumbs-custom-subtitle title-decorated">&nbsp;</h6>
                <h1 class="breadcrumbs-custom-title author-style">
                <?php the_archive_title();
                    // if(is_category()) {
                    //     echo 'Category: '; single_cat_title(); ?>
                <?php //} 
                    // if(is_author()){
                    //     echo 'Post by '; the_author(); ?> 
                <?php //} ?>
                </h1>
            </div>
            <?php
                $theParent = wp_get_post_parent_id(get_the_ID());
                if($theParent){ ?>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="<?php echo get_permalink($theParent); ?>">Back to <?php echo get_the_title($theParent); ?></a></li>
                    <li class="active"><?php the_title(); ?></li>
                </ul>
            <?php } else{ ?>
                <ul class="breadcrumbs-custom-path">
                    <li></li>
                </ul>
            <?php } ?>
          </div>
        </div>
      </section>

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
                                <a class="post-modern-media" href="single-blog-post.html">
                                <img src="<?php echo get_theme_file_uri('images/grid-blog-1-571x353.jpg')?>" alt="" width="571" height="353"/>
                                </a>
                                <h4 class="post-modern-title">
                                    <a class="underlined" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <ul class="post-modern-meta">
                                    <li>by <span class="author-style"><?php the_author_posts_link(); ?></span></li>
                                    <li><time><?php the_time('n M Y'); ?></time></li>
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