<?php 

get_header(); 
?>

    <!-- Breadcrumbs-->
    <?php pageBanner(array(
            'title' => 'CFC SocMin'
        )); ?>

    <!-- Main Cont-->

    <!-- <section class="section section-sm pb-0">
        <div class="container">
          <div class="row row-50 justify-content-center justify-content-lg-between flex-lg-row-reverse">
                <div class="col-md-10 col-lg-6 col-xl-5 align-self-center">
                    <h3>Welcome! We love God!</h3>
                    <h5>We aim to express our love of Jesus Christ by living the will of the Father.</h5>
                    <p>Our church is a perfect place for all local residents to come in with their families and join for a prayer and a newfound peace of mind and soul. Farite is built on a core set of beliefs, in which we have unity and on which we base our fundamental decisions.

                    </p>
                <div class="button-outer">
                    <a class="button button-lg button-primary button-winona" href="about.html">
                      <div class="content-original">Learn more</div>
                      <div class="content-dubbed">Learn more</div>
                    </a>
                </div>
            </div>
            <div class="col-md-10 col-lg-6 text-center">
                <img src="https://ld-wt73.template-help.com/tf/farite_v2/images/single-service-01-570x364.jpg" alt="" width="539" height="598">
            </div>
          </div>
        </div>

        <br>
            <br>
      </section> -->
      <section class="section section-lg text-center bg-gray-100">
        <div class="container">
          <h3>Our Activities</h3>
          <div class="row row-50 row-xxl-70 offset-top-6 justify-content-center justify-content-lg-start">
          <?php while ( have_posts() ) { the_post(); ?>

            <div class="col-md-10 col-lg-6">
                <!-- Profile Creative-->
                <article class="profile-creative">
                    
                        <figure class="profile-creative-figure">
                            <a href="<?php the_permalink(); ?>">
                            <?php 
                                if(has_post_thumbnail()){
                                    the_post_thumbnail('main-testimonial');
                                }else{ ?>

                                    <img class="profile-creative-image" src="https://ld-wt73.template-help.com/tf/farite_v2/images/team-1-170x172.png" alt="" width="170" height="172">
                                <?php } 
                            ?>  
                            </a>
                        </figure>
                
                    
                    <div class="profile-creative-main">
                        <h5 class="profile-creative-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>

                        <?php echo wp_trim_words(get_the_content(), 40); ?>
                
                    </div>
                </article>
            </div>

            <?php } ?>

            <!-- <div class="col-12">
              <div class="button-outer">
                  <a class="button button-lg button-primary button-winona" href="#"><div class="content-original">View all Team</div><div class="content-dubbed">View all Team</div>
                </a>
                </div>
            </div> -->
            <div class="pagination"> 
            <?php echo paginate_links(); ?>           
        </div> 

          </div>
        </div>
      </section>

    
<?php get_footer(); ?>