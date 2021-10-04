<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideakyiv
 */
 ?>
<!doctype html>
 <html <?php language_attributes(); ?>>
 <head>
 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="profile" href="https://gmpg.org/xfn/11">
 	<?php wp_head(); ?>
 </head>

 <?php if( is_front_page() ) { ?>
    <body class="archive post-type-archive post-type-archive-product logged-in admin-bar theme-store_rp woocommerce woocommerce-page woocommerce-js hfeed customize-support">
 <?php } else { ?>
 	<body <?php body_class(); ?>>
 <?php } ?>

 <?php wp_body_open(); ?>
 <div id="page" class="site">

 <div class="container-fluid header_container">
 	<div class="row header_wrapper">
  	<div class="col-lg-12 header_top_wrapper_content">
      <div class="burger burger-header">
          <div class="burger__line line-first"></div>
          <div class="burger__line line-second"></div>
          <div class="burger__line line-third"></div>
      </div>
      <div class="header_wrapper_logo">
	 			<a href="<?php echo get_home_url(); ?>"></a>
	 		</div>
	 		<div class="header_wrapper_menu">
	 			<nav id="site-navigation" class="main-navigation">
	 				<?php
	 				wp_nav_menu(
	 					array(
	 						'theme_location' => 'menu-1',
	 						'menu_id'        => 'primary-menu',
	 					)
	 				);?>
	 			</nav>
	 		</div>
      <div class="header_wrapper_icon_wrapper">
        <div class="header_wrapper_lang">
          <div class="header_wrapper_lang_shevron"></div>
        	<div class="lang">
  	 				<div class="language_flag_wrapper">
  	   				<?php $current_language = pll_current_language( 'slug' ); ?>
            	<div class="current_flag">
              <?php  if($current_language == "de"){ ?>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAABLElEQVR4AY2QgUZEQRSGz9ydmzbYkBWABBJYABHEFhJ6m0WP0DMEQNIr9AKrN8ne2Tt3Zs7MOdOZmRBEv+v34Tvub9R6fdNlAzU+snSME/wdjbjbbJ6EiEg6BA8102QbjKNpoMzw8v6qD/sOALbbT2MC1NgaAWOKOgxf5czY+4dbAX2G/THzcozLrvPV85IQyqVz0rvg2p9Pei4HjzSsiFbV4JgyhhxCjpGdZ0RhdikLB9/b8Qig7MkpSovR7Cp59q6CazaNFiTt4J82o6uvdMVwTsztKTXZod4jgOJJuqNAjFyGrBR8gM6XwKfIC4KanBSTZ0rClKh08D9DFh3egW7ebH7NcRDQWrz9rM2Ne+mDOXB2mZJ8agL19nwxR2iZXGm1gDbQKhDjd4yHb2oW/KR8xHicAAAAAElFTkSuQmCC" alt="Deutsch" width="20" height="14" style="width: 20px; height: 14px;">
              <?php  } ?>
              <?php  if($current_language == "en"){ ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAMAAABBPP0LAAAAmVBMVEViZsViZMJiYrf9gnL8eWrlYkjgYkjZYkj8/PujwPybvPz4+PetraBEgfo+fvo3efkydfkqcvj8Y2T8UlL8Q0P8MzP9k4Hz8/Lu7u4DdPj9/VrKysI9fPoDc/EAZ7z7IiLHYkjp6ekCcOTk5OIASbfY/v21takAJrT5Dg6sYkjc3Nn94t2RkYD+y8KeYkjs/v7l5fz0dF22YkjWvcOLAAAAgElEQVR4AR2KNULFQBgGZ5J13KGGKvc/Cw1uPe62eb9+Jr1EUBFHSgxxjP2Eca6AfUSfVlUfBvm1Ui1bqafctqMndNkXpb01h5TLx4b6TIXgwOCHfjv+/Pz+5vPRw7txGWT2h6yO0/GaYltIp5PT1dEpLNPL/SdWjYjAAZtvRPgHJX4Xio+DSrkAAAAASUVORK5CYII=" alt="English" width="20" height="14" style="width: 20px; height: 14px;">
               <?php  } ?>
              </div>
              <div class="language_flag_container">
  	   					<?php	if(function_exists('pll_the_languages')){
  	   							pll_the_languages(array(  'show_flags' => 1,  'show_names' => 0, 'hide_current'=> 0 ));
  	   						} ?>
  	   				</div>
  	   			</div>
  	 			</div>
  	 		</div>
        <div class="header_wrapper_search_icon_container"></div>

        <?php if($_COOKIE["cuctom_user_login"] == 'login'){ ?>
        <a  href="/order/" class="header_wrapper_cabinet_icon_container_login"><?php pll_e('Kabinett'); ?></a>
        <?php } else { ?>
        <div class="header_wrapper_cabinet_icon_container"><?php pll_e('Kabinett'); ?></div>
        <?php } ?>

        <?php if($_COOKIE["cuctom_user_login"] == 'login'){ ?>
          <!-- GET ULIST FAVORITE PRODUCT ID START  -->
          <?php
          $cuctom_user_id =  $_COOKIE["cuctom_user_login_id"];
          $products_id = array();
          $results_product_ids = $wpdb->get_results("SELECT *  FROM  custom_users_favourite WHERE user_id='$cuctom_user_id'"); ?>
          <!-- GET ULIST FAVORITE PRODUCT ID END  -->
          <?php if(!empty($results_product_ids)){ ?>
              <a  href="/personal-cabinet-favorits/" class="header_wrapper_favorite_icon_container isset_product"></a>
          <?php } else  { ?>
             <a  href="/personal-cabinet-favorits/" class="header_wrapper_favorite_icon_container not_isset_product"></a>
          <?php } ?>
        <?php } else { ?>
        <div class="header_wrapper_favorite_icon_container"></div>
        <?php } ?>
        <div class="header_wrapper_basket_icon_container">
          <div class="s-header__basket-wr woocommerce">
          <?php
          global $woocommerce;?>
          <!-- <a href="<?php // echo $woocommerce->cart->get_cart_url() ?>" class="basket-btn basket-btn_fixed-xs"> -->
          <span class="basket-btn__label"></span>
          <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
          <span class="basket-btn__total_wrapper">
            <span class="basket-btn__total"><?php echo sprintf($woocommerce->cart->cart_contents_total); ?> </span><span class="basket-btn__sym"> €</span>
          </span>
          <!-- </a> -->
          </div>
        </div>
        <div class="header_wrapper_search_content">
          <form id="search" class="search_article_wrapper">
             <input  type="text"  name="answer" placeholder="<?php pll_e('Finden Produkt'); ?>"   id="search_article_wrapper_input">
             <input type="submit" value="<?php pll_e('Suche'); ?>" id="search_article_wrapper_btn" disabled></p>
          </form>
          <div id="city_load_more_out" style="color: #000">
        </div>
        </div>
      </div>
		</div>
    <div class="col-lg-12 header_taxonomy_list_container">
      <nav>
        <ul class="topmenu">
    <?php
      $cat_args = array('orderby' => 'name', 'order' => 'asc', 'hide_empty' => false, 'childless'  => 0, 'child_of'   => 0, 'parent' => 0,);
      $product_categories = get_terms( 'product_cat', $cat_args );
      if( !empty($product_categories) ){
            foreach ($product_categories as $key => $category) {
             if($category->term_id != 22){ ?>

               <li class="menu_main_item">
                 <a href="<?php echo get_term_link($category); ?>" class="active menu_main_item_link">
                   <img class="menu_main_item_img" src="<?php echo z_taxonomy_image_url($category->term_id); ?>" alt="">
                   <span><?php echo $category->name; ?></span>
                 </a>

                 <?php
                 $term_id = $category->term_id;
                 $taxonomy_name = 'product_cat';
                 $termchildren = get_term_children( $term_id, $taxonomy_name );
                 if($termchildren){
                   echo '<ul class="submenu">';
                 }
                 foreach ( $termchildren as $child ) {
                     $term = get_term_by( 'id', $child, $taxonomy_name ); ?>
                       <li><a href="<?php echo get_term_link( $child, $taxonomy_name ) ?>"><?php echo $term->name ?></a></li>
                <?php }
                if($termchildren){
                  echo '</ul>';
                } ?>

               </li>
          <?php } } } ?>
        </ul>
      </nav>
    </div>
 	</div>
 </div>
 <style media="screen">
   .lang-item-ru{
     display: none;
   }
 </style>
