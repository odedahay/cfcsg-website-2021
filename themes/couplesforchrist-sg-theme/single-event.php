
<?php get_header(); 
    
    while(have_posts()) { ?>
        <?php the_post(); ?>

        <!-- Breadcrumbs-->
        <?php pageBanner(array(
            'title' => 'Event Section',
            'parent' => 'Event Home',
            'parentlink' => get_post_type_archive_link('event')
        )); ?>

        <section class="section section-sm">
            <div class="container">
                <div class="row row-50 justify-content-center justify-content-lg-between">
                    <div class="ccol-lg-6 col-xl-5">
                        <div class="inset-right-3">
                            <article class="post-creative">
                                <h3 class="post-creative-title"><?php the_title(); ?></h3>
                                
                                <h5>
                                        <?php //the_time('n M Y'); ?>
                                        <?php //the_field('event_time'); ?>
                                        <?php $eventDate = new DateTime(get_field('event_date')); ?>

                                        <div class="object-inline">
                                            <span class="icon icon-md mdi mdi-calendar-clock pt-1"></span>
                                            
                                            <span><?php echo $eventDate->format('l') ; ?>, <?php echo $eventDate->format('d') .' '. $eventDate->format('M') .' '. $eventDate->format('Y'); ?> </span>
                                    
                                        </div>

                                    <div class="object-inline">
                                        <span class="icon icon-md mdi mdi-clock pt-1"></span>
                                        <span style="color:#E2443B;"><?php the_field('event_time'); ?> to  <?php the_field('event_end_time'); ?> </span>

                                    </div> 
                                
                                </h5>
                                <!-- -->
                                <hr class="mt-4 mb-4">
                            
                                <?php the_content(); ?>

                            </article>   
                        </div>
                    </div>
                   
                    <?php if( has_post_thumbnail()) { ?>
                        <div class="col-lg-6">
                        <?php the_post_thumbnail(); ?>   
                        </div>
                    <?php } ?>
                </div>


            </div>
            <?php $relatedOrganisation = get_field('related_organisation'); ?>
            <?php if($relatedOrganisation){ ?>

                <div class="container pt-5">
                    <h4 class="text-left pb-3">Related Events:</h4>
                    <hr>
                    <div class="row">
                        <?php foreach($relatedOrganisation as $organisation){ ?>
                            <div class="col-md-3 pb-4">
                                <div class="profile-creative-main">
                                    <h5 class="profile-creative-title">
                                        <a href="<?php echo get_the_permalink($organisation); ?>">
                                        <div class="object-inline">
                                            <span class="icon icon-md mdi mdi-bell-ring-outline bell-size-2x"></span>
                                           <?php echo get_the_title($organisation); ?>
                                        </div>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        <?php }?>
                        
                    </div>
                </div>
            <?php } ?>
        </section>

    <?php } ?>

<?php get_footer(); ?>

