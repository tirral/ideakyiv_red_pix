<?php
/*
Template Name: Payment  page
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
           <span class="kb_title" itemprop="name">Payment</span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>
 </div>
<div class="container payment_main_wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="payment_main_wrapper_header"><?php echo get_post_meta( get_the_ID(), 'payment_metabox_header_section_title', true ); ?></h1>
      <div class="row tabs_wrapper">
        <div class="col-lg-8">
          <div class="tabs_wrapper_container">
            <div id="reception_wrapper">
             <?php echo wpautop(get_post_meta( get_the_ID(), 'payment_metabox_reception_text', true )); ?>
            </div>
            <div id="payment_wrapper" class="hide_block">
             <?php echo wpautop(get_post_meta( get_the_ID(), 'payment_metabox_payment_text', true )); ?>
            </div>
            <div id="delivery_wrapper" class="hide_block">
             <?php echo wpautop(get_post_meta( get_the_ID(), 'payment_metabox_delivery_text', true )); ?>
            </div>
          </div>
        </div>


        <div class="col-lg-4">

          <div class="tabs_wrapper_header">
            <div id="reception_btn" class="active">
              <div class="tabs_wrapper_header_text">
                <?php echo get_post_meta( get_the_ID(), 'payment_metabox_reception_title', true ); ?>
              </div>
              <div class="tabs_wrapper_header_icon">1</div>
            </div>
            <div id="payment_btn">
              <div class="tabs_wrapper_header_text">
                <?php echo get_post_meta( get_the_ID(), 'payment_metabox_payment_title', true ); ?>
              </div>
              <div class="tabs_wrapper_header_icon">2</div>
            </div>
            <div id="delivery_btn">
              <div class="tabs_wrapper_header_text">
                <?php echo get_post_meta( get_the_ID(), 'payment_metabox_delivery_title', true ); ?>
              </div>
              <div class="tabs_wrapper_header_icon">3</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
