<?php
/*
Template Name: Contacts page
*/
get_header(); ?>
<?php global $tirral_global; ?>
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
           <span class="kb_title" itemprop="name"><?php the_title() ?></span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>
 </div>

 <div class="container contacts_main_wrapper">
   <div class="row">
     <div class="col-lg-12">
       <h1 class="contacts_main_wrapper_header"><?php the_title() ?></h1>

          <div class="contacts_main_content_item">
            <div class="contacts_main_content_item_conteiner">
              <div class="contacts_main_content_item_conteiner_header"><?php pll_e('Adress'); ?></div>
              <?php $current_language = pll_current_language( 'slug' ); ?>
              <?php  if($current_language == "de"){ ?>
                  <p class="contacts_main_content_item_conteiner_adress"><?php echo $tirral_global['footer-contacts-location-city-de'] ?></p>
              <?php } ?>
              <?php  if($current_language == "en"){ ?>
                  <p class="contacts_main_content_item_conteiner_adress"><?php echo $tirral_global['footer-contacts-location-city-en'] ?></p>
              <?php } ?>
            </div>
            <div class="contacts_main_content_item_conteiner">
              <div class="contacts_main_content_item_conteiner_header">Email</div>
              <div class="contacts_main_content_item_conteiner_email"><?php echo $tirral_global['footer-contacts-mail-address-1'] ?></div>
              <div class="contacts_main_content_item_conteiner_email"><?php echo $tirral_global['footer-contacts-mail-address-2'] ?></div>
            </div>
          </div>

          <div class="contacts_main_content_item">
            <div class="contacts_main_content_item_conteiner">
              <div class="contacts_main_content_item_conteiner_header"><?php pll_e('Phone'); ?></div>
              <div class="contacts_main_content_item_conteiner_phone"><?php echo $tirral_global['location-block-tel-1'] ?></div>
              <div class="contacts_main_content_item_conteiner_phone"><?php echo $tirral_global['location-block-tel-2'] ?></div>
            </div>
            <div class="contacts_main_content_item_conteiner">
              <div class="contacts_main_content_item_conteiner_header"><?php pll_e('Social network'); ?></div>
              <div class="contacts_main_content_item_conteiner_social">
                <a  href="<?php echo $tirral_global['footer-social-link-1'] ?>" class="contacts_main_content_item_conteiner_social facebook" target="_blank"></a>
                <a  href="<?php echo $tirral_global['footer-social-link-2'] ?>" class="contacts_main_content_item_conteiner_social twitter" target="_blank"></a>
                <a  href="<?php echo $tirral_global['footer-social-link-3'] ?>" class="contacts_main_content_item_conteiner_social instagram" target="_blank"></a>
                <a  href="<?php echo $tirral_global['footer-social-link-4'] ?>" class="contacts_main_content_item_conteiner_social youtube" target="_blank"></a>
              </div>
            </div>
          </div>
            <div class="contacts_main_wrapper_btn_wrapper">
                <a href="#" class="contacts_main_wrapper_btn"><?php pll_e('CONSULTATION'); ?></a>
            </div>
       </div>
   </div>
 </div>

<?php
get_footer();
