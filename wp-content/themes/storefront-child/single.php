<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="col-full">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_type() );
				the_post_navigation();
			endwhile; 
		?>

		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();