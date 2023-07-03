<?php 

get_header(); 
?>

    <!-- Breadcrumbs-->
    <?php pageBanner(array(
            'title' => 'Upcoming CFC Events'
        )); ?>

       <!-- Main Cont-->
       
       <section class="section section-md">
           
        <div class="container">
          <!-- <div class="row row-50 row-xxl-70"> -->
          
          <div class="row row-50 row-xxl-70 offset-top-6 justify-content-center justify-content-lg-start">
            <?php 
                while ( have_posts() ) {
                    the_post(); ?>
                    <div class="col-md-10 col-lg-10">
                        <!-- Profile Creative-->
                        <article class="profile-creative">
                            <a href="<?php the_permalink(); ?>"> 
                                <?php $eventDate = new DateTime(get_field('event_date')); ?>
                                <time class="post-light-time" datetime="<?php echo $eventDate->format('Y'); ?>">
                                    <span class="post-light-time-big"><?php echo $eventDate->format('d') ?></span>
                                    <span class="post-light-time-small"><?php echo $eventDate->format('M') .' '. $eventDate->format('Y'); ?></span>
                                </time>
                            </a>
                            <div class="profile-creative-main">
                                <h5 class="profile-creative-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="object-inline">
                                    <span class="icon icon-md mdi mdi-clock pt-1"></span>
                                    <span style="color:#E2443B; margin-left:3px"><?php the_field('event_time'); ?> to  <?php the_field('event_end_time'); ?> </span>
                                </div>
                                <div class="profile-creative-contacts margin-top-10">
                                    <p><?php 
                                        if(has_excerpt()){
                                            the_excerpt(); 
                                        } else{
                                        echo wp_trim_words(get_the_content(), 16);
                                        }?>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
            <?php } ?>
            <!-- Post Modern-->
          </div>
          <section class="section section-sm">
            <h6 class="mt-5">Looking for a recap of past events? 
                <a class="button button-sm button-primary-outline button-winona" href="<?php echo site_url('/past-events');?>">Check out our past events archive</a>
                </h6>
          </section>
          <div class="pagination"> 
            <?php echo paginate_links(); ?>           
          </div> 
        </div>
      </section>

<?php get_footer(); ?>