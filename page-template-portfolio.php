<?php
/**
 * Template Name: Portfolio
 */
?>

<?php get_header(); // Loads the header.php template. ?>
    <section class="container" id="main-container">
    	<div class="row">

    		<div class=" span8 offset2 portfolio-description">
				<?php get_template_part( 'breadcrumbs' ); // Loads the breadcrumbs.php template. ?>
				
        		<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<article >

							<?php if ( !is_front_page() ) { ?>
								<header class="entry-header">
									<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) ); ?>
								</header><!-- .entry-header -->
							<?php } ?>

							<div class="entry-content clearfix">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'chun' ) . '</span>', 'after' => '</p>' ) ); ?>
							</div><!-- .entry-content -->

							<?php get_template_part( 'menu', 'portfolio' ); ?>

						</article><!-- .hentry -->

					<?php endwhile; ?>

				<?php endif; ?>

			</div>
			<!-- End portfolio-description -->

        	<div class="span12" id="content-wrapper">

				<?php $loop = new WP_Query(
					array(
						'post_type'      => 'portfolio_item',
						'posts_per_page' => 8,
					)
				); ?>
			
				<div class="content" id="container">

					<?php if ( $loop->have_posts() ) : ?>

						<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

							<?php get_template_part( 'content', get_post_type() ); ?>

						<?php endwhile; ?>

					<?php endif; ?>
				</div>

        	</div>
			<!-- End .span8 #content-wrapper -->
		</div>
		<!-- End .row -->
	</section>
	<!-- End #main-container -->
<?php get_footer(); // Loads the footer.php template. ?>