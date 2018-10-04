 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Get a Chance to Win Prizes Online - iLoveMyOffers UK</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="description" content="Get a chance to win prizes online for free with iLoveMyOffers UK! Win free cash £££, gift cards, gift hampers. New prizes every month - register today!!">
        <meta name="keywords" content="win prizes online">
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116178580-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag()
            {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-116178580-1');
        </script>
    </head>

    <body>

        <header id="header">
            <div class="container-fluid">

                <div id="logo" class="pull-left">
                    <!--  <h1><a href="#intro" class="scrollto">WinPrizes</a></h1>-->
                    <a href="/"><img src="<?php echo base_url();?>assets/img/logo.png" alt="iLoveMyOffers" title="" /></a>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/">Home</a></li>
                        <li><a href="#featured">Featured prizes</a></li>
                        <li><a href="#portfolio">Win Prizes</a></li>
                        <li><a href="winners.html">Winners</a></li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="contactus.html">Contact Us</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->
<style>
#facts {
    /*  background: url("../img/gift1.jpg") center top no-repeat fixed;*/
    /*    background-size: cover;*/
    padding: 160px 0 30px 0;
    position: relative;
}
    </style>    
        <main id="main">
            <?php if($set_frontend[0]->showhide_hero_img === '0')  :?>
                <section id="facts"  style="background: url('<?php echo base_url();?>assets/img/gift1.jpg') center top no-repeat fixed;padding: 160px 0 30px 0;position: relative;" class="wow fadeIn">
            <?php else                                           :?>
                <section id="facts"  style="background: url('<?php echo $this->config->item('image_url');?>uploads/campaign/hero_image/<?php echo $set_frontend[0]->hero_image; ?>') center top no-repeat fixed;padding: 160px 0 30px 0;position: relative;" class="wow fadeIn">    
                
            <?php endif;                                         ?>
                <div class="container">
                    
                    <header class="carousel-header">
                        <h1>Free Competitions To<br>Win Prizes Online</h1>
                        <p> <?php echo $set_frontend[0]->campaign_text ?></p>
                    </header>
                </div>
            </section>

            <!-- #facts -->

            <section id="featured" class="wow fadeIn">
                <div class="container">

                    <header class="section-header">
                        <h3 class="section-title">FEATURED PRIZES</h3>
                    </header>
        

                    <div class="row portfolio-container">
        <?php foreach ($set_frontend as $campaign_details)  :?>                    
                        <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="<?php echo base_url();?>assets/img/portfolio/topshop.jpg" class="img-fluid" alt="">
                                    <a href="http://localhost/client_side/index.php/campaign/Campaign_target/campaign_click/<?php echo $campaign_details->capp_set_id ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>              
                                </figure>

                                <div class="portfolio-info">
                                    <h4><a href="">Win £50 Topshop Vouchers</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>
        <?php endforeach;  ?>                
                        
        <!--                
                        <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="<?php // echo $this->config->item("image_url");?> img/portfolio/sainsburys.jpg" class="img-fluid" alt="">
                                    <a href="sainsburys-gift-card.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="sainsburys-gift-card.php">Win £100 Sainsburys Gift Card</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/asda.jpg" class="img-fluid" alt="">
                                    <a href="asda-gift-card.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>              </figure>

                                <div class="portfolio-info">
                                    <h4><a href="asda-gift-card.php">Win £25 ASDA Gift Card</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>
        -->                
                    </div>

                </div>
            </section>


            <section id="portfolio"  class="section-bg" >
                <div class="container">

                    <header class="section-header">
                        <h3 class="section-title">WIN PRIZES</h3>
                    </header>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".filter-app">Cash & Vouchers</li>
                                <li data-filter=".filter-card">For Him</li>
                                <li data-filter=".filter-web">For Her</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row portfolio-container">

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/argos.jpg" class="img-fluid" alt="">
                                    <a href="win-kurt-geiger-shoes.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>              </figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-kurt-geiger-shoes.php">Win Kurt-Geiger Shoes</a></h4>
                                    <p>For Her</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/50cash.jpg" class="img-fluid" alt="">
                                    <a href="50-cash.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="50-cash.php">Win £50 Cash Weekly</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/sainsburys.jpg" class="img-fluid" alt="">
                                    <a href="sainsburys-gift-card.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="sainsburys-gift-card.php">Win £100 Sainsburys Gift Card</a></h4>
                                    <p>For Him</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/amazon.jpg" class="img-fluid" alt="">
                                    <a href="win-clarins-hamper.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>              </figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-clarins-hamper.php">Win a £50 clarins's Hamper</a></h4>
                                    <p>For Her</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/cadbury1.jpg" class="img-fluid" alt="">
                                    <a href="win-cadbury-chocolate.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-cadbury-chocolate.php">Win Cadbury Chocolate to Share</a></h4>
                                    <p>For Her</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/argos-bq.jpg" class="img-fluid" alt="">
                                    <a href="win-bq-gift-voucher.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>              </figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-bq-gift-voucher.php">Win £100 B&Q Gift Voucher</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/tesco.jpg" class="img-fluid" alt="">
                                    <a href="win-tesco-gift-card.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-tesco-gift-card.php">Win Tesco Gift Card</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/waitrose.jpg" class="img-fluid" alt="">
                                    <a href="win-waitrose-gift-card.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-waitrose-gift-card.php">Win £100 Waitrose Gift Card</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="img/portfolio/itunes1.jpg" class="img-fluid" alt="">
                                    <a href="win-itunes-gift-card.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>				</figure>

                                <div class="portfolio-info">
                                    <h4><a href="win-itunes-gift-card.php">Win £50 iTunes Gift Card</a></h4>
                                    <p>Cash & Vouchers</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

            <!-- #portfolio -->
            <section id="clients" class="wow fadeInUp">
                <div class="container">

                    <header class="section-header">
                        <h3>Chance to Win Prizes Online</h3>
                    </header>
                    <p class="text-dark text-center">
                        Want to experience the joy of winning? Want to grab the opportunity of getting something for FREE without having to spend a dime? Then iLoveMyOffers is the right place to be! Because you can now get a chance to win prizes online!</p>

                    <p class="text-dark text-center">Well, yes! iLoveMyOffers is presenting you with the chance of a lifetime! From enviable gift cards to the latest gadgets, gizmos, and games, from amazing grooming kits to fancy phones, from awesome TVs to brilliant cameras, this website is offering you just about anything and everything, only for you to WIN!</p>

                    <!--<p class="text-center"><a href="#" class="btn-lg btn-success btn ">Play Now</a></p>-->

                </div>
            </section>


            <!--<section id="clients" class="wow fadeInUp">
              <div class="container">
        
                <header class="section-header">
                  <h3>RECENT WINNERS</h3>
                </header>
        
                <div class="owl-carousel clients-carousel">
                        <div><label class="text-center">Won Cadbury Chocolate to Share</label>
                  <img src="img/portfolio/cadbury.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center">Won A Bouquet Of Flowers</label>
                  <img src="img/portfolio/Bouquet.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center">Won £50 Ray-Ban Vouchers</label>
                  <img src="img/portfolio/rayban.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center">Won £50 New Look Vouchers</label>
                  <img src="img/portfolio/newlook.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center"> Won £ 50 Aldo Vouchers&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <img src="img/portfolio/Aldo.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center">Won £50 iTunes Vouchers</label>
                  <img src="img/portfolio/iTunes.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center">Won £50 Netflix Vouchers</label>
                  <img src="img/portfolio/netflix.jpg" class="img-fluid" alt=""></div>
                          <div><label class="text-center">Won Ticketmaster Vouchers</label>
                  <img src="img/portfolio/ticketmaster.jpg" class="img-fluid" alt=""></div>
                </div>
        
              </div>
            </section>-->



        </main>


        <!--<footer id="footer">
          <div class="footer-top">
            <div class="container">
              <div class="row">
      
                <div class="col-lg-4 col-md-6 footer-info">
                  <h3>WinPrizes</h3>
                  <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                              <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita.</p>
                </div>
      
                <div class="col-lg-4 col-md-6 footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
                    <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
                    <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
                    <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
                    <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
                  </ul>
                </div>
      
                <div class="col-lg-4 col-md-6 footer-contact">
                  <h4>Contact Us</h4>
                  <p>
                    Street Name Here <br>
                    State Name, Pin 535022<br>
                    Country Name <br>
                    <strong>Phone:</strong> +91 0000 0000 00<br>
                    <strong>Email:</strong> info@winprizes.com<br>
                  </p>
      
                  <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  </div>
      
                </div>
      
      
              </div>
            </div>
          </div>
      
          <div class="container">
            <div class="copyright">
              &copy; Copyright <strong> WinPrizes</strong>. All Rights Reserved
            </div>
          </div>
        </footer>-->


        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row footer-info">
                        <div class="col-md-5 text-left" id="copyright">&copy; 2015 - 2018 iLoveMyOffers.co.uk , All rights reserved.</div>
                        <div class="col-md-7 text-right" id="footer_link">
                            <div class="footer_social_icons">
                                <a href="aboutus.html">About Us </a> |  <a href="contactus.html">Contact Us </a> | <a href="http://www.versogroup.co.uk/privacy-policy.html" target="_blank">Privacy Policy </a> | 
                                <a href="terms.html">Terms &amp; Conditions</a> | <a href="unsubscribe.html">Unsubscribe</a>
                            </div>
                        </div>
                    </div>

                    <div class="footer-info">
                        <p style="font-size:small;">I Love MY Offers is an independent rewards program for consumers and is not affiliated with, sponsored by or endorsed by any of the listed products or retailers. Trademarks, service marks, logos, and/or domain names (including, without limitation, the individual names of products and retailers) are the property of their respective owners.</p>
                        <p style="font-size:small;">Notification Statement: I Love MY Offers is owned and operated by Verso Group UK Ltd. The information that you provide will be handled by Verso Group. By submitting a completed survey, you agree that Verso Group may use your email address to (i) send information and promotions from I Love My Offers (ii) send information and promotions concerning third party products and services (iii) supply your contact information and survey responses to companies so that they may use them to contact you by mail, phone and email to send offers (iv) promote services based on your preferences. You can gain access to your personal information at any time by contacting us <a href="contactus.html">here</a> or by post to Verso Group UK Ltd, Cleedan House, 42 Coldharbour Lane, Harpenden, AL5 4UN</p>
                    </div>
                </div>
            </div>
        </footer>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/jquery/jquery-migrate.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/superfish/hoverIntent.js"></script>
        <script src="<?php echo base_url();?>assets/lib/superfish/superfish.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/wow/wow.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/waypoints/waypoints.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/counterup/counterup.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/isotope/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/lightbox/js/lightbox.min.js"></script>
        <script src="<?php echo base_url();?>assets/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
        <!-- Contact Form JavaScript File -->
        <script src="contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script src="<?php echo base_url();?>assets/js/main.js"></script>

    </body>
</html>
