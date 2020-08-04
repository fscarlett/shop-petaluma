<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shop_Petaluma
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>

			<div class="title-section-wrapper">
				<div class="title-container container">
					
					<p class="content-type-name">Inspirational stories</p>

					<p class="spet-subhead">the subhead</p>

				</div> 
			</div>

			<div class="category-bar-wrapper">
				<div class="category-bar-container container">
					
					<p class="category-name">Category name</p>

				</div>
			</div>

			<div class="content-wrapper">
				<div class="content-container container">

					<h1><?php the_title(); ?></h1>

					<p>maybe an excerpt here? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit corrupti neque commodi fuga impedit officia sit magni ea eveniet ullam.</p>

					<div class="featured-image-wrapper">
						<?php the_post_thumbnail('large'); ?>
					</div>

					<?php the_content(); ?>

					<?php 

					// get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'shop-petaluma' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'shop-petaluma' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;
					?>

				</div>
			</div>

			<div class="share-wrapper">
				<div class="share-container container">
					<span>SHARE</span>
					<a href="https://facebook.com" target="_blank" rel="noreferrer">icon</a>
					<a href="https://twitter.com" target="_blank" rel="noreferrer">icon</a>
					<a href="https://instagram.com" target="_blank" rel="noreferrer">icon</a>
					<a href="https://facebook.com" target="_blank" rel="noreferrer">icon</a>
				</div>
			</div>

			<section class="related-section">
				<div class="related-container container">
					<h2>Related Articles</h2>
					<p>Subhead</p>

					<div class="row">
						
						<?php 

			      $spet_related_args = array(
			        'post_type'       => 'post',
			        'order'           => 'DESC',
			        'posts_per_page'  => '6',
			        
			        );

			      $spet_related = new WP_Query( $spet_related_args );

			      if ( $spet_related->have_posts() ) {

			        while ( $spet_related->have_posts() ) {

			          $spet_related->the_post();

			          ?>

			          <div class="related-card col-md-4">
			          	<div class="photo-wrapper">
			              <a href="<?php the_permalink(); ?>">
			              	<?php the_post_thumbnail('large'); ?>
			              </a>                  
			            </div>
			            <p class="related-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			          </div>
			          
			        <?php
			        } // endwhile for relateds

			      } else {
			        echo '<p>No related articles have been found.</p>';
			      }; 

			      wp_reset_postdata();

				    ?> 
					</div>
				</div> 
			</section>

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
