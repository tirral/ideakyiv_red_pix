<?php
/*
Template Name: About us page
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
           <span class="kb_title" itemprop="name">Über uns</span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>

 </div>

 <div class="container-fluid about_us_main_wrapper">
   <div class="row about_us_main_container">
     <div class="col-lg-12 about_us_header_wreapper">
       <h1 class="about_us_header_title"><?php echo get_post_meta( get_the_ID(), 'about_us_metabox_header_section_title', true ); ?></h1>
       <p class="about_us_header_sub_title"><?php echo get_post_meta( get_the_ID(), 'about_us_metabox_header_section_sub_title', true ); ?></p>
     </div>



    <div class="container-fluid about_us_first_section_wrapper">
      <div class="row about_us_first_section" >
        <div class="col-lg-6 about_us_first_section_text">
          <div class="about_us_first_section_text_container">
            <h2><?php echo get_post_meta( get_the_ID(), 'about_us_metabox_section_1_title', true ); ?></h2>
            <p><?php echo get_post_meta( get_the_ID(), 'about_us_metabox_section_1_text', true ); ?></p>
          </div>
        </div>
        <div class="col-lg-6 about_us_first_section_img">
          <div class="about_us_first_section_img_wrapper">
            <img src="<?php echo get_post_meta( get_the_ID(), 'about_us_metabox_section_1_img', true ); ?>" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid about_us_second_section_wrapper">
      <div class="row about_us_second_section" >
        <div class="col-lg-6 about_us_second_section_img">
          <div class="about_us_first_section_img_wrapper">
            <img src="<?php echo get_post_meta( get_the_ID(), 'about_us_metabox_section_1_img', true ); ?>" alt="">
          </div>
        </div>
        <div class="col-lg-6 about_us_second_section_text">
          <div class="about_us_second_section_text_container">
            <h2><?php echo get_post_meta( get_the_ID(), 'about_us_metabox_section_1_title', true ); ?></h2>
            <p><?php echo get_post_meta( get_the_ID(), 'about_us_metabox_section_1_text', true ); ?></p>
        </div>
      </div>
    </div>
   </div>
 </div>
</div>

<?php
get_footer();
