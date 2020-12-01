<style>
head,
body {
    background-color: lightcyan
}

.card {
    cursor: pointer
}

.hd {
    font-size: 25px;
    font-weight: 550
}

.card.hover,
.card:hover {
    box-shadow: 0 20px 40px rgba(0, 0, 0, .2)
}

.img {
    margin-bottom: 35px;
    -webkit-filter: drop-shadow(5px 5px 5px #222);
    filter: drop-shadow(5px 5px 5px #222)
}

.card-title {
    font-weight: 600
}

button.focus,
button:focus {
    outline: 0;
    box-shadow: none !important
}

.ft {
    margin-top: 25px
}

.chk {
    margin-bottom: 5px
}

.rck {
    margin-top: 20px;
    padding-bottom: 15px
}


/*header*/


.fixed-nav-bar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background-color:#000;
  min-height: 100px;
  padding: 0 25px;
  box-sizing: border-box;
  background-color: rgba(255,255,255,0.02);
  box-shadow: 0 0 15px 2px rgba(0,0,0,0.5);
  z-index: 100;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transition: 0.35s ease;
  transition: 0.35s ease;
}
.fixed-nav-bar .logo {
  position: absolute;
  left: 40px;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  text-transform: uppercase;
  color: #ccc;
  font-size: 28px;
  font-weight: 300;
  cursor: pointer;
}
.fixed-nav-bar .logo span {
  color: #e78533;
  font-weight: 600;
}
.fixed-nav-bar.scrolled {
  min-height: 60px;
  background-color: #fdfdfd;
  box-shadow: 0 0 30px 3px rgba(0,0,0,0.6);
}
.fixed-nav-bar.scrolled .logo {
  color: #000;
}
.fixed-nav-bar.scrolled .menu-button-label .white-bar {
  background-color: #000;
}
.the-bass {
  position: fixed;
  height: 0px;
  width: 360px;
  right: 0;
  top: 100px;
  background-color: rgba(0,0,0,0.7);
  -webkit-transition: 0.35s ease, height 0.35s 0.3s ease;
  transition: 0.35s ease, height 0.35s 0.3s ease;
  z-index: 90;
}
.the-bass.scrolled {
  top: 60px;
}

</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <div class="fixed-nav-bar nav-dark bg-dark">
    <div class="logo"><span>
धर्मेश्वर हार्डवेयर</span> एंड सप्लायर्स <br><small style="color: #fff;">गोदावरी नगरपालिका-०८ , स्याउलेबजार, कैलाली </small></div>
    <div class="logo" style="margin-left: 80%; "><small ><a href="<?php echo base_url('auth/login') ?>" style="color:#fff;">Login</a></small> </div>
</div>



<!-- slider -->

<style type="text/css">
  
  .slider, 
.slider > div {
    /* Images default to Center Center. Maybe try 'center top'? */
    background-position: center center;
    display: block;
    width: 100%;
    height: 800px;
     /*height: 100vh; */
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
    background-color: #000;
    overflow: hidden;
    -moz-transition: transform .4s;
    -o-transition: transform .4s;
    -webkit-transition: transform .4s;
    transition: transform .4s;
}

.slider > div {
    position: absolute;
}

.slider > i {
    color: #5bbd72;
    position: absolute;
    font-size: 60px;
    margin: 20px;
    top: 40%;
    text-shadow: 0 10px 2px #223422;
    transition: .3s;
    width: 30px;
    padding: 10px 13px;
    background: #fff;
    background: rgba(255, 255, 255, .3);
    cursor: pointer;
    line-height: 0;
    box-sizing: content-box;
    border-radius: 3px;
    z-index: 4;
}

.slider > i svg {
    margin-top: 3px;
}

.slider > .left {
    left: -100px;
}
.slider > .right {
    right: -100px;
}
.slider:hover > .left {
    left: 0;
}
.slider:hover > .right {
    right: 0;
}

.slider > i:hover {
    background:#fff;
    background: rgba(255, 255, 255, .8);
    transform: translateX(-2px);
}

.slider > i.right:hover {
    transform: translateX(2px);
}

.slider > i.right:active,
.slider > i.left:active {
    transform: translateY(1px);
}

.slider:hover > div {
    transform: scale(1.01);
}

.hoverZoomOff:hover > div {
    transform: scale(1);
}

.slider > ul {
    position: absolute;
    bottom: 10px;
    left: 50%;
    z-index: 4;
    padding: 0;
    margin: 0;
    transform: translateX(-50%);
}

.slider > ul > li {
    padding: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    list-style: none;
    float: left;
    margin: 10px 10px 0;
    cursor: pointer;
    border: 1px solid #fff;
    -moz-transition: .3s;
    -o-transition: .3s;
    -webkit-transition: .3s;
    transition: .3s;
}

.slider > ul > .showli {
    background-color: #7EC03D;
    -moz-animation: boing .5s forwards;
    -o-animation: boing .5s forwards;
    -webkit-animation: boing .5s forwards;
    animation: boing .5s forwards;
}

.slider > ul > li:hover {
    background-color: #7EC03D;
}

.slider > .show {
    z-index: 1;
}

.hideDots > ul {
    display: none;
}

.showArrows > .left {
    left: 0;
}

.showArrows > .right {
    right: 0;
}

.titleBar {
    z-index: 2;
    display: inline-block;
    background: rgba(0,0,0,.5);
    position: absolute;
    width: 100%;
    bottom: 0;
    transform: translateY(100%);
    padding: 20px 30px;
    transition: .3s;
    color: #fff;
}

.titleBar * {
    transform: translate(-20px, 30px);
    transition: all 700ms cubic-bezier(0.37, 0.31, 0.2, 0.85) 200ms;
    opacity: 0;
}

.titleBarTop .titleBar * {
    transform: translate(-20px, -30px);
}

.slider:hover .titleBar,
.slider:hover .titleBar * {
    transform: translate(0);
    opacity: 1;
}

.titleBarTop .titleBar {
    top: 0;
    bottom: initial;
    transform: translateY(-100%);
}

.slider > div span {
    display: block;
    background: rgba(0,0,0,.5);
    position: absolute;
    bottom: 0;
    color: #fff;
    text-align: center;
    padding: 0;
    width: 100%;
}


@keyframes boing {
    0% {
        transform: scale(1.2);
    }
    40% {
        transform: scale(.6);
    }
    60% {
        transform: scale(1.2);
    }
    80% {
        transform: scale(.8);
    }
    100% {
        transform: scale(1);
    }
}

/* -------------------------------------- */

#slider2 {
    max-width: 30%;
    margin-right: 20px;
}

.row2Wrap {
    display: flex;
}

.content {
    padding: 50px;
    margin-bottom: 100px;
}

html {
    height: 100%;
    box-sizing: border-box;
}
*, *:before, *:after {
    box-sizing: inherit;
}
h1, h2, h3 {
    font-family: 'Crimson Text', sans-serif;
    font-weight: 100;
}
body {
    font: 15px 'Titillium Web', Arial, sans-serif;
   /* background: radial-gradient(#121212, #000);
    height: 100%;*/
    /*color: #aaa;*/
    margin: 0;
    padding: 0;
}

.content {
    padding: 10px 15vw;
}

</style>
<!-- Slider 1 -->
<div class="slider" id="slider1" >
    <!-- Slides -->
    <div style="background-image:url(<?php echo base_url(); ?>assets/dist/img/in1.png)"></div>
    <div style="background-image:url(<?php echo base_url(); ?>assets/dist/img/in2.png)"></div>
    
    <div style="background-image:url(<?php echo base_url(); ?>assets/dist/img/i3.jpeg)"></div>
    <div style="background-image:url(<?php echo base_url(); ?>assets/dist/img/i4.jpeg)"></div>
    <!-- The Arrows -->
    <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
    <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
    <!-- Title Bar -->
    <span class="titleBar">
        <h1>Dharmeshwor Hardware & Suppliers</h1>
    </span>
</div>

<br>


<script type="text/javascript">
  
(function($) {
  "use strict";
  $.fn.sliderResponsive = function(settings) {
    
    var set = $.extend( 
      {
        slidePause: 5000,
        fadeSpeed: 800,
        autoPlay: "on",
        showArrows: "off", 
        hideDots: "off", 
        hoverZoom: "on",
        titleBarTop: "off"
      },
      settings
    ); 
    
    var $slider = $(this);
    var size = $slider.find("> div").length; //number of slides
    var position = 0; // current position of carousal
    var sliderIntervalID; // used to clear autoplay
      
    // Add a Dot for each slide
    $slider.append("<ul></ul>");
    $slider.find("> div").each(function(){
      $slider.find("> ul").append('<li></li>');
    });
      
    // Put .show on the first Slide
    $slider.find("div:first-of-type").addClass("show");
      
    // Put .showLi on the first dot
    $slider.find("li:first-of-type").addClass("showli")

     //fadeout all items except .show
    $slider.find("> div").not(".show").fadeOut();
    
    // If Autoplay is set to 'on' than start it
    if (set.autoPlay === "on") {
        startSlider(); 
    } 
    
    // If showarrows is set to 'on' then don't hide them
    if (set.showArrows === "on") {
        $slider.addClass('showArrows'); 
    }
    
    // If hideDots is set to 'on' then hide them
    if (set.hideDots === "on") {
        $slider.addClass('hideDots'); 
    }
    
    // If hoverZoom is set to 'off' then stop it
    if (set.hoverZoom === "off") {
        $slider.addClass('hoverZoomOff'); 
    }
    
    // If titleBarTop is set to 'on' then move it up
    if (set.titleBarTop === "on") {
        $slider.addClass('titleBarTop'); 
    }

    // function to start auto play
    function startSlider() {
      sliderIntervalID = setInterval(function() {
        nextSlide();
      }, set.slidePause);
    }
    
    // on mouseover stop the autoplay
    $slider.mouseover(function() {
      if (set.autoPlay === "on") {
        clearInterval(sliderIntervalID);
      }
    });
      
    // on mouseout starts the autoplay
    $slider.mouseout(function() {
      if (set.autoPlay === "on") {
        startSlider();
      }
    });

    //on right arrow click
    $slider.find("> .right").click(nextSlide)

    //on left arrow click
    $slider.find("> .left").click(prevSlide);
      
    // Go to next slide
    function nextSlide() {
      position = $slider.find(".show").index() + 1;
      if (position > size - 1) position = 0;
      changeCarousel(position);
    }
    
    // Go to previous slide
    function prevSlide() {
      position = $slider.find(".show").index() - 1;
      if (position < 0) position = size - 1;
      changeCarousel(position);
    }

    //when user clicks slider button
    $slider.find(" > ul > li").click(function() {
      position = $(this).index();
      changeCarousel($(this).index());
    });

    //this changes the image and button selection
    function changeCarousel() {
      $slider.find(".show").removeClass("show").fadeOut();
      $slider
        .find("> div")
        .eq(position)
        .fadeIn(set.fadeSpeed)
        .addClass("show");
      // The Dots
      $slider.find("> ul").find(".showli").removeClass("showli");
      $slider.find("> ul > li").eq(position).addClass("showli");
    }

    return $slider;
  };
})(jQuery);


 
//////////////////////////////////////////////
// Activate each slider - change options
//////////////////////////////////////////////
$(document).ready(function() {
  
  $("#slider1").sliderResponsive({
  // Using default everything
    // slidePause: 5000,
    // fadeSpeed: 800,
    // autoPlay: "on",
    // showArrows: "off", 
    // hideDots: "off", 
    // hoverZoom: "on", 
    // titleBarTop: "off"
  });
  
  $("#slider2").sliderResponsive({
    fadeSpeed: 300,
    autoPlay: "off",
    showArrows: "on",
    hideDots: "on"
  });
  
  $("#slider3").sliderResponsive({
    hoverZoom: "off",
    hideDots: "on"
  });
  
}); 



</script>
  


<div class='the-bass container-fluid mx-auto mt-5 mb-5 col-12' style="text-align: center; ">
    <div class="hd" >
किन मानिसहरूले हामीमाथि विश्वास गर्छन्</div>
    <p><small class="text-muted">सधैं तपाईलाई सोचे भन्दा बढी र उत्तम सेवा प्रदान </small></p>
    <div class="row" style="justify-content: center">
        <div class="card col-md-3 col-12">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i4.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> पेन्ट्स
 </div>
                    
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i5.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> तारहरु
</div>
                    
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i6.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> काठको रंग
 </div>
                    
                </div>
            </div>
        </div>

        <div class="card col-md-3 col-12">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i7.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> जस्ता पाता </div>
                    
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i8.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> सिमेन्ट </div>
                    
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i9.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> इस्पात/आइरन रोड्स र पीपीएस
 </div>
                    
                </div>
            </div>
        </div>

        <div class="card col-md-3 col-12">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i10.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> प्लाईबोर्ड
 </div>
                    
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i11.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> फलामका किलाहरू </div>
                    
                </div>
            </div>
        </div>

        <div class="card col-md-3 col-12">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i12.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> फलामको डण्ड
 </div>
                    
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img width="280px;" height="250px;" class="img" src="<?php echo base_url(); ?>assets/dist/img/i13.jpeg" />
                    <div class="shadow"></div>
                    <div class="card-title"> सिमेन्ट </div>
                    
                </div>
            </div>
        </div>
    </div>
    <footer >
        <div class="card border-0" style="background-color: #E7E3E2;">
            <div class="card-body px-5">
                <div class="row justify-content-around mb-0 pt-5 ">
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12 my-auto">
                        <ul class="list-unstyled mt-md-3 mt-5">
                            <li>
                                <p class="mb-4">Contact us for more </p>
                            </li>
                            <li>
                                <div class="card card-1 border-0">
                                    <div class="card-body p-0 pl-3">
                                      <h6 class="mb-3">Dharmeshwor Hardware & Suppliers<br>Godawari Municipality-08<br>Syaule Bazar, Kailali</h6>
                                         <small>9847177979</small><br> <small>9843694513</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12 my-auto">
                        <ul class="list-unstyled mt-md-3 mt-5">
                            <li>
                                <p class="mb-4">Contact us for more</p>
                            </li>
                            <li>
                                <div class="card card-1 border-0">
                                    <div class="card-body p-0 pl-3">
                                        <h6 class="mb-3"></h6> <small>deuba.gopal2017@gmail.com</small><br> <small>9812528680</small><br> <small>091506051</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
       
    </footer>
</div>

<style type="text/css">


 li {
     margin-top: 8px;
     margin-bottom: 8px
 }

 input {
     border-radius: 2px !important;
     background: transparent !important;
     color: #FFFFFF !important
 }

 input:focus {
     -moz-box-shadow: none !important;
     -webkit-box-shadow: none !important;
     box-shadow: none !important;
     outline-width: 0;
     border-color: #FFFFFF !important
 }

 li:first-child {
     font-size: 20px !important;
     font-weight: bold
 }

 small {
     font-size: calc(12px + (14 - 12) * ((100vw - 360px) / (1600 - 360))) !important
 }

 p {
     font-size: calc(14px + (16 - 14) * ((100vw - 360px) / (1600 - 360))) !important;
     color: rgb(78, 77, 77) !important
 }


 .btn {
     border-radius: 50px
 }

 .card-1 {
     border-left: 3px solid green !important;
     border-radius: 0
 }



 hr.colored {
     height: 8px;
     background: linear-gradient(to left, rgba(196, 222, 138, 1) 0%, rgba(196, 222, 138, 1) 12.5%, rgba(245, 253, 212, 1) 12.5%, rgba(245, 253, 212, 1) 25%, rgba(255, 208, 132, 1) 25%, rgba(255, 208, 132, 1) 37.5%, rgba(242, 122, 107, 1) 37.5%, rgba(242, 122, 107, 1) 50%, rgba(223, 157, 185, 1) 50%, rgba(223, 157, 185, 1) 62.5%, rgba(192, 156, 221, 1) 62.5%, rgba(192, 156, 221, 1) 75%, rgba(95, 156, 217, 1) 75%, rgba(95, 156, 217, 1) 87.5%, rgba(94, 190, 227, 1) 87.5%, rgba(94, 190, 227, 1) 87.5%, rgba(94, 190, 227, 1) 100%)
 }

 .fa {
     padding: calc(10px + (10 - 10) * ((100vw - 360px) / (1600 - 360))) !important;
     font-size: calc(15px + (20 - 15) * ((100vw - 360px) / (1600 - 360))) !important;
     width: calc(30px + (38 - 30) * ((100vw - 360px) / (1600 - 360))) !important;
     text-align: center;
     text-decoration: none;
     border-radius: 50px !important;
     margin: 6px !important
 }

 a {
     text-decoration: none !important
 }

 .fa-facebook {
     background: #3B5998;
     color: white
 }

 .fa:hover {
     background-color: transparent !important
 }

 .fa-twitter {
     background: #55ACEE;
     color: white
 }

 .fa-instagram {
     background: #3f729b;
     color: white
 }

 .fa-linkedin {
     background: #0e76a8;
     color: white
 }

 .form-row {
     position: relative;
     left: calc(30px + (50 - 30) * ((100vw - 320px) / (1600 - 320)))
 }

 @media screen and (max-width: 726px) {
     .form-row {
         position: relative;
         left: 0px !important
     }
 }

 @media screen and (max-width: 1143px) {
     .card-0 {
         background: none
     }
 }

</style>
 
    
   
