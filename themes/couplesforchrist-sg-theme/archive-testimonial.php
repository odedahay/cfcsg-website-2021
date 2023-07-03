<?php 

get_header(); 
?>

    <!-- Breadcrumbs-->
    <?php pageBanner(array(
            'title' => 'CFC Testimonials'
        )); ?>

    <!-- Main Cont-->
    
    <section class="section section-md">
        <div class="container">
            <div class="row row-50 justify-content-center justify-content-lg-between">
                    <?php 
                        while ( have_posts() ) {
                            the_post(); ?>
                            <div class="col-md-6">
                                <blockquote class="quote-modern quote-modern-big">
                                    <svg class="quote-modern-mark" width="39" height="40" viewBox="0 0 39 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 25.2632C0 17.6608 0.924444 11.8713 2.77333 7.89474C4.62222 3.91813 7.91556 1.28655 12.6533 0L15.6 4.38597C12.48 5.78947 10.3422 7.83626 9.18667 10.5263C8.14667 13.0994 7.62667 17.1345 7.62667 22.6316H14.7333V40H0V25.2632ZM23.4 25.2632C23.4 17.6608 24.3244 11.8713 26.1733 7.89474C28.0222 3.91813 31.3156 1.28655 36.0533 0L39 4.38597C35.88 5.78947 33.7422 7.83626 32.5867 10.5263C31.5467 13.0994 31.0267 17.1345 31.0267 22.6316H38.1333V40H23.4V25.2632Z"></path>
                                    </svg>
                                    <div class="quote-modern-text">
                                    <p><?php  
                                        if(has_excerpt()){
                                            the_excerpt(); 
                                        } else{
                                            echo wp_trim_words(get_the_content(), 36);
                                        }?> 
                                    </p>
                                    <a class="button button-sm button-new-primary-outline button-winona low-20" href="<?php the_permalink(); ?>">
                                        <div class="content-original">Read More</div>
                                        <div class="content-dubbed">Read More</div>
                                    </a>
                                    </div>
                                    <div class="quote-modern-meta">
                                    <div class="quote-modern-avatar">
                                        <?php 
                                            if(has_post_thumbnail()){
                                                the_post_thumbnail('main-testimonial');
                                            }else{ ?>
                                                <img src="<?php echo get_theme_file_uri('images/testimonials-person-1-48x48.jpg');?>" alt="" width="300" height="300"/>
                                            <?php } 
                                        ?>  
                                    </div>
                                    <div class="quote-modern-info">
                                        <a href="<?php the_permalink(); ?>">
                                            <cite class="quote-modern-cite"><?php the_title(); ?></cite>
                                            <p class="quote-modern-caption"><?php the_field('designation'); ?></p>
                                        </a>
                                    </div>
                                    </div>
                                </blockquote>
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