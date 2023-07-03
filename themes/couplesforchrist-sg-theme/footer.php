

<!-- Page Footer-->
<footer class="section footer-standard bg-gray-800">
        <div class="footer-standard-main">
          <div class="container">
            <div class="row row-50">
              <!-- <div class="col-lg-4">
                <div class="inset-right-1">
                  <h4 class="font-weight-normal">About Us</h4>
                  <p class="big">Couples for Christ (CFC) is a Catholic movement intended for the renewal and strengthening of Christian family life.</p>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box-1">
                  <h4 class="font-weight-normal">Contact Information</h4>
                  <ul class="list-sm">
                    <li class="object-inline big"><span class="icon icon-md mdi mdi-map-marker text-white"></span><a class="footer-link" href="https://goo.gl/maps/ggBWuKQLKXK2yYou5" taget="_blank">2 Highland Rd, <br> Singapore 549102</a></li>
                    <li class="object-inline big"><span class="icon icon-md mdi mdi-phone text-white"></span><a class="footer-link" href="tel:#"> +65 6284 1880</a></li>
                    <li class="object-inline big"><span class="icon icon-md mdi mdi-send text-white"></span><a class="footer-link" href="mailto:cfc@catholic.org.sg">Email Us:<br>cfc@catholic.org.sg</a></li>
                    <li class="object-inline big"><span class="icon icon-md mdi mdi-email text-white"></span><a class="footer-link" href="<?php echo esc_url(site_url('contact-us')); ?>">Send us: Make Enquiry</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <h4 class="font-weight-normal">Social Media</h4>
                <nav class="list-sm">
                <div class="group group-xs text-left pt-1">
                <a class="icon icon-sm icon-creative mdi mdi-facebook" href="https://www.facebook.com/CouplesforChristSingapore" target="_blank"></a>
                    <a class="icon icon-sm icon-creative mdi mdi-instagram" href="#"></a>
                    <a class="icon icon-sm icon-creative mdi mdi-youtube-play" href="https://www.youtube.com/channel/UCadoTsHOgVeO3qWgMHKI3Jg" target="_blank"></a>
                </div>
                    <!-- <ul>
                      <li id="" class="bject-inline big">
                        <a class="icon icon-sm icon-creative mdi mdi-facebook" href="#"></a>
                      </li>
                      <li id="" class="bject-inline big">
                        <a class="icon icon-sm icon-creative mdi mdi-instagram" href="#"></a>
                      </li>
                      <li id="" class="bject-inline big">
                        <a class="icon icon-sm icon-creative mdi mdi-youtube-play" href="#"></a>
                      </li> -->
                          <?php 
                            //wp_nav_menu(array(
                              //'theme_location' => 'footerMainLink'
                          //));
                          ?>
                    </ul>
                </nav>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <h4 class="font-weight-normal">Other Links</h4>
                <nav class="list-sm">
                    <?php 
                      wp_nav_menu(array(
                        'theme_location' => 'footerQuickLink'
                    ));
                    ?>
                    <!-- <li class="object-inline big">
                      <span class="icon icon-md mdi mdi-arrow-right text-white"></span>
                      <a class="footer-link" href="#">Global CFC</a></li>
                     -->
                  </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="footer-standard-aside text-center text-md-left">
            <p class="rights big"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><a href="privacy-policy.html">Privacy Policy</a></p>
          </div>
        </div>
      </footer>
    </div>
    
    <?php wp_footer(); ?>

    <!-- Global Mailform Output-->
    <!-- <div class="snackbars" id="form-output-global"></div> -->
    <!-- Javascript-->
   
  </body>
</html>