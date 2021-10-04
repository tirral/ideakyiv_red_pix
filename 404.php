<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ideakyiv
 */

get_header();
 ?>

<div class="error404_main_wrapper">
	<div class="error404_main_wrapper_number">400</div>
	<div class="error404_main_wrapper_text_lg"><?php pll_e('ERROR'); ?></div>
	<div class="error404_main_wrapper_text"><?php pll_e('SORRY THE PAGE NOT FOUND'); ?></div>
  <a  href="/" class="error404_main_wrapper_btn"><?php pll_e('BACK TO HOME'); ?></a>
</div>
<?php
get_footer();
