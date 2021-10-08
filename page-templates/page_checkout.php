<?php
/*
Template Name: Page checkout
*/
get_header(); ?>


<div class="container home_page_main_container">
  <div class="row home_page_main_wrapper">
<div class="col-lg-12">

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
           <span itemprop="item">
             <span class="kb_title"><?php pll_e('Оформление заказа'); ?></span>
           <meta itemprop="position" content="2">
         </span>
         </span>
     </div>
   </div>

  <?php
  if ( have_posts() ) :
    if ( is_home() && ! is_front_page() ) : ?>
      <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?> </h1>
      </header>
      <?php
    endif;
    /* Start the Loop */
    while ( have_posts() ) :
      the_post();
      /*
       * Include the Post-Type-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Type name) and that will be used instead.
       */
    get_template_part( 'template-parts/content', get_post_type() );
    endwhile;
    the_posts_navigation();
  else :
    get_template_part( 'template-parts/content', 'none' );
  endif;
  ?>
</div>
</div>
</div>

<style media="screen">
.col-1, .col-2 {
    -ms-flex: 0 0 100% !important;
    flex: 0 0 100% !important;
    max-width: 100% !important;
}
  .form-row{
    display: block !important;
  }
</style>

<?php
get_footer();
