<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raymondvoyage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		// else :
		// 	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
		<div class="entry-meta">
			<?php
				
				
				?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="blog">
	<div class="entry-content">
		<div class="flex">
				<div class="w50">
				<?php the_post_thumbnail('large'); ?>
			</div>
			<div class="w50">
				<div>
					<h1>
						<?php the_title();?>
					</h1>
				</div>
				<div class="date-author mb-1">
					Le <?php the_date('d/m/Y');?>
					<span class="bold">Par : <?php the_author();?></span>
				</div>
			
				<div class="border">
					<?php the_excerpt();?>
				</div>
				
			</div>
		</div>
		
			
		
		<p>
			<?php the_content(); ?>
		</p>

		
	

	</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->