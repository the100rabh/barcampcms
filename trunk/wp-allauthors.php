<?php
/**
 * Used to be the page which displayed the registration form.
 *
 * This file is no longer used in WordPress and is
 * deprecated.
 *
 * @package WordPress
 * @deprecated Use wp_register() to create a registration link instead
 */

require('./wp-load.php');


 get_header(); ?>

<style>
#authorlist li{ padding:10px;border-bottom:1px solid #ccc;margin-bottom:3px;list-style-type: none}
#authorlist img{ border:1px solid #999;clear:none}

#authorlist ol { list-style-type: none } 
#authorlist ul { list-style-type: none }
</style>

<div id="content">

	<div id="contentleft">
	<h1>All Authors in BCB</h1>
		<div id="authorlist">
       	<?php if (function_exists('wp_all_authors')) { ?><?php wp_all_authors('show_fullname=1&optioncount=0&hide_empty=0&exclude_admin=1'); ?><?php } ?>
		</div>
	</div>
	
<?php include(TEMPLATEPATH."/l_author_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>
