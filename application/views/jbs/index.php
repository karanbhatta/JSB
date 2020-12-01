
<html lang="en">

<head>
    <style type="text/css">/*---------------------
  Latest Product
-----------------------*/
.product {
  display: block;
  width: 100%;
  margin-bottom: 30px;
  position: relative;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  -webkit-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  transition: all 0.3s ease;
  border: 1px solid #f0f0f0; }
  @media (max-width: 991.98px) {
    .product {
      margin-bottom: 30px; } }
  .product .img-prod {
    position: relative;
    display: block;
    overflow: hidden; }
    .product .img-prod .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      content: '';
      opacity: 0;
      background: #82ae46;
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease; }
    .product .img-prod span.status {
      position: absolute;
      top: 0;
      left: 0;
      padding: 2px 10px;
      color: #fff;
      font-weight: 300;
      background: #82ae46;
      font-size: 12px; }
    .product .img-prod img {
      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      -ms-transform: scale(1);
      -o-transform: scale(1);
      transform: scale(1);
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease; }
    .product .img-prod:hover img, .product .img-prod:focus img {
      -webkit-transform: scale(1.1);
      -moz-transform: scale(1.1);
      -ms-transform: scale(1.1);
      -o-transform: scale(1.1);
      transform: scale(1.1); }
  .product .img {
    display: block;
    height: 500px; }
  .product .icon {
    width: 60px;
    height: 60px;
    background: #fff;
    opacity: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    transition: all 0.3s ease; }
    .product .icon span {
      color: #000000; }
  .product:hover .icon {
    opacity: 1; }
  .product:hover .img-prod .overlay {
    opacity: 0; }
  .product .text {
    background: #fff;
    position: relative;
    width: 100%; }
    .product .text h3 {
      font-size: 14px;
      margin-bottom: 5px;
      font-weight: 300;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-family: "Poppins", Arial, sans-serif; }
      .product .text h3 a {
        color: #000000; }
    .product .text p.price {
      margin-bottom: 0;
      color: #82ae46;
      font-weight: 400; }
      .product .text p.price span.price-dc {
        text-decoration: line-through;
        color: #b3b3b3; }
      .product .text p.price span.price-sale {
        color: #82ae46; }
    .product .text .pricing {
      width: 100%;
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease; }
    .product .text .bottom-area {
      position: absolute;
      bottom: 15px;
      left: 0;
      right: 0;
      opacity: 0;
      -moz-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      -webkit-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      transition: all 0.3s ease; }
      .product .text .bottom-area a {
        color: #fff;
        width: 100%;
        background: #82ae46;
        width: 40px;
        height: 40px;
        margin: 0 auto;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%; }
      .product .text .bottom-area .m-auto {
        margin: 0 auto; }
  .product:hover {
    -webkit-box-shadow: 0px 7px 15px -5px rgba(0, 0, 0, 0.07);
    -moz-box-shadow: 0px 7px 15px -5px rgba(0, 0, 0, 0.07);
    box-shadow: 0px 7px 15px -5px rgba(0, 0, 0, 0.07); }
    .product:hover .pricing {
      opacity: 0; }
    .product:hover .text .bottom-area {
      opacity: 1; }

.product-details h3 {
  font-size: 30px;
  font-weight: 400; }

.product-details .price span {
  font-size: 30px;
  color: #000000; }

.product-details button i {
  color: #000000; }

.product-details .quantity-left-minus {
  background: transparent;
  padding: 0 15px; }

.product-details .quantity-right-plus {
  background: transparent;
  padding: 0 15px; }

.product-details button, .product-details .form-control {
  height: 40px !important;
  text-align: center;
  border: 1px solid rgba(0, 0, 0, 0.1) !important;
  color: #82ae46;
  padding: 10px 20px;
  background: transparent !important;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  -ms-border-radius: 0;
  border-radius: 0;
  font-size: 14px; }
  .product-details button:hover, .product-details button:focus, .product-details .form-control:hover, .product-details .form-control:focus {
    text-decoration: none;
    outline: none; }

.product-details .form-group {
  position: relative; }
  .product-details .form-group .form-control {
    padding-right: 40px;
    color: #000000;
    background: transparent !important; }
    .product-details .form-group .form-control::-webkit-input-placeholder {
      /* Chrome/Opera/Safari */
      color: #4d4d4d; }
    .product-details .form-group .form-control::-moz-placeholder {
      /* Firefox 19+ */
      color: #4d4d4d; }
    .product-details .form-group .form-control:-ms-input-placeholder {
      /* IE 10+ */
      color: #4d4d4d; }
    .product-details .form-group .form-control:-moz-placeholder {
      /* Firefox 18- */
      color: #4d4d4d; }
  .product-details .form-group .icon {
    position: absolute;
    top: 50%;
    right: 20px;
    font-size: 14px;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    color: #000000; }
    .product-details .form-group .icon span {
      color: #000000; }
    @media (max-width: 767.98px) {
      .product-details .form-group .icon {
        right: 10px; } }
  .product-details .form-group .select-wrap {
    position: relative; }
    .product-details .form-group .select-wrap select {
      font-size: 13px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      text-transform: uppercase;
      letter-spacing: 2px; }
</style>
     
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Jay Shree Bhauneli Trade And Suppliers</title>
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">">
    
    <!--====== Favicon Icon ======-->
   
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
    
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="assets/css/responsive.css">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="spin">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">
                            <!--  <a href="#"><img src="assets/images/jsblogo.png" alt=""></a> -->
                            <h5>जय श्री भौनेली ट्रेड एंड सप्लायर्स </h5>

                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a data-scroll-nav="0" href="#home">होमपेज</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#product">उत्पादनहरू</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#home">हाम्रोबारे </a>
                                </li>
                                <li class="nav-item">
                                     <a data-scroll-nav="0" href="#team">हाम्रो समूह</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#footer">सम्पर्क</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="<?php echo base_url('auth/login') ?>">लग - इन
</a>
                                </li>
                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
    
    <section id="home" class="slider-area pt-100">
        <div class="container-fluid position-relative">
            <div class="slider-active">
                <div class="single-slider">
                    <div class="slider-bg">
                        <div class="row no-gutters align-items-center ">
                            <div class="col-lg-4 col-md-5">
                                <div class="slider-product-image d-none d-md-block">
                                    <img src="assets/images/slider/1.jpg" alt="Slider">
                                    <div class="slider-discount-tag">
                                        
                                    </div>
                                </div> <!-- slider product image -->
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="slider-product-content">
                                    <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s">हामीलाई विश्वास किन?</h1>
                                    <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">बिगत २ बर्ष देखि हामि तपाईहरु लाई गुणस्तरिय तरकारी तथा फलफुल सुपथ मुल्यमा तपाई हरुको पसल सम्म पुराउने विश्वासिलो माध्यम बन्दै र तपाई हरु को आफ्नै सामग्रीहरु ढुवानी गर्दै आएका छौ।</p>
                                    <a class="main-btn" href="#" data-animation="fadeInUp" data-delay="1.5s"><i class="lni-chevron-right"></i></a>
                                </div> <!-- slider product content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single slider -->

                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="assets/images/slider/3.jpg" alt="Slider">
                                        <div class="slider-discount-tag">
                                           
                                        </div>
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>हामीलाई विश्वास किन?</span></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">बिगत २ बर्ष देखि हामि तपाईहरु लाई गुणस्तरिय तरकारी तथा फलफुल सुपथ मुल्यमा तपाई हरुको पसल सम्म पुराउने विश्वासिलो माध्यम बन्दै र तपाई हरु को आफ्नै सामग्रीहरु ढुवानी गर्दै आएका छौ।</p>
                                        <a class="main-btn" href="#" data-animation="fadeInUp" data-delay="1.5s"> <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->

                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="assets/images/slider/2.jpg" alt="Slider">
                                        <div class="slider-discount-tag">
                                            
                                        </div>
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>हामीलाई विश्वास किन?</span></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">बिगत २ बर्ष देखि हामि तपाईहरु लाई गुणस्तरिय तरकारी तथा फलफुल सुपथ मुल्यमा तपाई हरुको पसल सम्म पुराउने विश्वासिलो माध्यम बन्दै र तपाई हरु को आफ्नै सामग्रीहरु ढुवानी गर्दै आएका छौ।</p>
                                        <a class="main-btn" href="#contact" data-animation="fadeInUp" data-delay="1.5s">हामीलाई सम्पर्क गर्नुहोस <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->
            </div> <!-- slider active -->
            <div class="slider-social">
                <div class="row justify-content-end">
                    <div class="col-lg-7 col-md-6">
                        <ul class="social text-right">
                            <li><a href="https://www.facebook.com/%E0%A4%9C%E0%A4%AF-%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80-%E0%A4%AD%E0%A5%8C%E0%A4%A8%E0%A5%87%E0%A4%B2%E0%A5%80-%E0%A4%9F%E0%A5%8D%E0%A4%B0%E0%A5%87%E0%A4%A1%E0%A4%B8-%E0%A4%8F%E0%A4%82%E0%A4%A1-%E0%A4%B8%E0%A4%AA%E0%A5%8D%E0%A4%B2%E0%A4%BE%E0%A4%AF%E0%A4%B0%E0%A5%8D%E0%A4%B8-100529875161893"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- container fluid -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   

 

    
    <section class="ftco-section" id="product">
        <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">उत्पादनहरू</span>
            
          </div>
        </div>          
        </div>
        <div class="container">
            <div class="row">
                      <?php foreach ($result as $row):?>

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="<?= $row['image'] ?>" alt="">
                           
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#"><?= $row['name'] ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="price-sale">NRs. &nbsp;<?= $row['price'] ?>&nbsp; per &nbsp; <?= $row['sku'] ?></span></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                        <?php endforeach; ?>

               
            </div>
        </div>
    </section>
   

    <!--====== TEAM PART START ======-->
    
    <section id="team" class="team-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-25">
                        <h3 class="title mb-15">हाम्रो विज्ञ टोली</h3>
                      
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                      <?php foreach ($emp as $row):?>


                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="<?= $row['picture'] ?>"
                             alt="Team">
                        </div>
                        <div class="team-content mt-30">
                            <h4 class="title mb-10"><a href="#"><?= $row['name'] ?></a></h4>
                            <span><?= $row['post'] ?></span>
                            <ul class="social mt-15">
                                <li><a href="https://www.facebook.com/jayant.bhatt.547"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single temp -->
                </div>
<?php endforeach ?>
               
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEAM PART ENDS ======-->

    
   

    <!--====== CONTACT PART START ======-->
    
    <section id="contact" class="contact-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-title text-center">
                        <h2 class="title">सम्पर्कमा रहनुहोस्</h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            <div class="contact-box mt-70">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">सम्पर्क जानकारी</h4>
                            <ul>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                           <p>+977-986 211 4444</p>
                                            <p>+977-984 897 1700</p>
                                            <p>+977-986 310 2452</p>
                                            <p>+977-986 575 5724</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>contact@bhauneli.com</p>
                                            <p>bhauneli111@gmail.com</p>                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-home"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>अत्तरिया -०१ गो न पा सब्जिमनडि कैलाली </p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="contact-form"  method="post" data-toggle="validator">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form form-group">
                                            <input type="text" name="name" placeholder="तपाईंको नाम प्रविष्ट गर्नुहोस्" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form form-group">
                                            <input type="email" name="email" placeholder="तपाईंको ईमेल प्रविष्ट गर्नुहोस्"  data-error="Valid email is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <textarea name="message" placeholder="तपाईंको सन्देश प्रविष्ट गर्नुहोस्" data-error="Please,leave us a message." required="required"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">अब सम्पर्क गर्नुहोस्</button>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- row -->
                    </div> 
                </div> <!-- row -->
            </div> <!-- contact box -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    
    <section id="footer" class="footer-area">
        <div class="container">
            <div class="footer-widget pt-75 pb-120">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <div class="footer-logo mt-40">
                            <a href="#">
                             <h5>जय श्री भौनेली ट्रेड एंड सप्लायर्स </h5>
                            </a>
                            <p class="mt-10">बिगत २ बर्ष देखि हामि तपाईहरु लाई  गुणस्तरिय  तरकारी  तथा फलफुल सुपथ मुल्यमा  तपाई हरुको पसल सम्म पुराउने विश्वासिलो माध्यम बन्दै  र तपाई हरु को आफ्नै सामग्रीहरु ढुवानी  गर्दै आएका छौ।<p>
                            <ul class="footer-social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">हाम्रा सेवाहरु:
</h5>
                            <ul>
                                <li><a href="#">१: सामग्री ढुवानी सेवा  </a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">मद्दत</h5>
                            <ul>
                                <li><a href="#">उत्पादनहरू</a></li>
                                <li><a href="#">हाम्रोबारे</a></li>
                               
                                <li><a href="#">हामीलाई सम्पर्क गर्नुहोस</a></li>
                                <li><a href="#">गोपनीयता नीति</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-7">
                        <div class="footer-info mt-50">
                            <h5 class="f-title">सम्पर्क जानकारी </h5>
                            <ul>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>फोन नम्बर:</span>
                                        <div class="footer-info-content">
                                            <p>+977-986 211 4444</p>
                                            <p>+977-984 897 1700</p>
                                            <p>+977-986 310 2452</p>
                                            <p>+977-986 575 5724</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>ईमेल :</span>
                                        <div class="footer-info-content">
                                            <p>contact@bhauneli.com</p>
                                            <p>bhauneli111@gmail.com</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>ठेगाना :</span>
                                        <div class="footer-info-content">
                                            <p>अत्तरिया -०१ गो न पा सब्जिमनडि कैलाली  </p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright pt-15 pb-15">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>Powered BY: <a href="www.sysflame.com" rel="nofollow">Sysflame</a></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!--  footer copyright -->
        </div> <!-- container -->
    </section>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    
    
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    
    
    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    
    <!--====== nav js ======-->
    <script src="assets/js/jquery.nav.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="assets/js/jquery.nice-number.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
