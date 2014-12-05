<?php
/**
 * Template Name: Archive Portfolio
 */
?>

<?php get_header(); // Loads the header.php template. ?>
    <section class="container" id="main-container">
    	<div class="row">
			
    		<div class=" span8 offset2 portfolio-description">

				<article >
					<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>
					<?php get_template_part( 'menu', 'portfolio' ); ?>

				</article><!-- .hentry -->
			</div>
			<!-- End portfolio-description -->

        	<div class="span12" id="content-wrapper">

				<?php 
				// $terms = get_terms( 'portfolio', array(
				//     'orderby'    => 'count',
				//     'hide_empty' => 0
				// ) );	
				$post_type = get_post_type(); // find out CPT name
				$taxonomies = get_object_taxonomies($post_type); // Find taxonomies
				$tax = $wp_query->get_queried_object();

				$loop = new WP_Query(
					array(
						'post_type'      => $post_type,
						'posts_per_page' => 8,
						'portfolio' => $tax->slug
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