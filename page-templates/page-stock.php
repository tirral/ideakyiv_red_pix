<?php
/*
Template Name: Stock page
*/
get_header(); ?>

<div class="container">
  <div class="breadcrumbs_wrapper">
       <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
          <a href="<?php echo get_home_url(); ?>/" itemprop="item">
             <span class="home_page" itemprop="name">Home</span>
             <meta itemprop="position" content="1">
           </a>
         </span>
         <span class="kb_sep"></span>
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
           <span class="kb_title" itemprop="name">Stock</span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>
 </div>
 

 <div class="container-fluid stock_first_section_wrapper">
   <div class="row stock_first_section" >
     <div class="col-lg-6 stock_first_section_text">
        <div class="countdown countdown-container container">
            <div class="clock row">
                <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-days" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-days type-time">DAYS</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

                <div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-hours" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-hours type-time">HOURS</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

                <div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-minutes" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-minutes type-time">MINUTES</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

                <div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-seconds" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-seconds type-time">SECONDS</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->
            </div><!-- /.clock -->
        </div><!-- /.countdown-wrapper -->
     </div>
   </div>
 </div>



 <?php
 get_footer();
?>
 <script type="text/javascript">  
jQuery(window).on("load", function () {
   $(".countdown").final_countdown({
    start: 1362139200,
    end: 1388461320,
    now: 1387461319,
  });
});

</script> 