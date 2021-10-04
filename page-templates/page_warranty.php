<?php
/*
Template Name: Warranty page
*/
get_header(); ?>
<div class="container">
  <div class="breadcrumbs_wrapper">
       <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
          <a href="<?php echo get_home_url(); ?>/" itemprop="item">
             <span class="home_page" itemprop="name"></span>
             <meta itemprop="position" content="1">
           </a>
         </span>
         <span class="kb_sep"></span>
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
           <span class="kb_title" itemprop="name">Warranty</span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>
 </div>
 <div class="container warranty_main_wrapper">
   <div class="row">
     <div class="col-lg-12">
       <h1 class="warranty_main_wrapper_header"><?php echo get_post_meta( get_the_ID(), 'warranty_metabox_header_section_title', true ); ?></h1>
       <ul class="accordion">
         <?php  $entries = get_post_meta( get_the_ID() , 'warranty_metabox_counter', true );
          if (!empty($entries)) {
           foreach ( (array) $entries as $key => $entry ) {
               $warranty_metabox_counter_value =  '';
               $warranty_metabox_counter_text =  '';
               $warranty_metabox_counter_value = ( $entry['warranty_metabox_counter_value'] );
               $warranty_metabox_counter_text = ( wpautop( $entry['warranty_metabox_counter_text'] ));?>
               <li>
                 <a><?php echo $warranty_metabox_counter_value ?></a>
                 <div class="accordion_content">
                     <?php echo $warranty_metabox_counter_text ?>
                 </div>
               </li>
         <?php }}?>
       </ul>
     </div>
   </div>
 </div>
<?php
get_footer();
