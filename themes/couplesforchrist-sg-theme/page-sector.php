<?php get_header();

    while(have_posts()){
        the_post();  
        $theParent = wp_get_post_parent_id(get_the_ID()); 
        ?>

        <!-- Breadcrumbs-->
        <?php pageBanner(array(
            'parent' => $theParent
        )); ?>
        
        <!-- New Layout-->
        <?php the_content(); ?>

        <!-- <section class="section section-md">
            <div class="container">
                <div class="row row-50">
                    
                    <div class="col-lg-12">
                        <article class="post-creative">
                            <h2 class="post-creative-title"><?php //the_title(); ?></h2>
                          
                          
                        </article>
                    </div>
                    
                
                </div>
            </div>
        </section> -->
    
    <?php }

    get_footer();
?>