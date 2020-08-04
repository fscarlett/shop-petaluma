<?php
/**
 * Template Name: Stories Page
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
					
					<h1>Inspirational Stories</h1>

					<p class="spet-subhead">the subhead</p>

				</div> 
			</div>

			<div class="category-bar-wrapper">
				<div class="category-bar-container container">
					
					<p class="category-name">All Stories</p>

				</div>
			</div>

			<section class="stories-section">
				<div class="stories-container container">
					

					<div class="row stories-cards-wrapper">

						<?php 

						// $term = get_query_var( 'medium' );
	          $term = 'Kentucky';

						$spet_stories_args = array(
								'post_type'   		=> 'post',
								// 'category_name' 	=> 'kittens',
				        'order'           => 'DESC',
				        'posts_per_page'  => '-1'
				        );

						$spet_stories = new WP_Query( $spet_stories_args );

			      if ( $spet_stories->have_posts() ) {

			        while ( $spet_stories->have_posts() ) {

			          $spet_stories->the_post();
						 ?>

						 <div class="stories-card col-md-4">
			          	<div class="photo-wrapper">
			              <a href="<?php the_permalink(); ?>">
			              	<?php the_post_thumbnail('large'); ?>
			              </a>                  
			            </div>
			            <p class="stories-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			          </div>
			          
			        <?php
			        } // endwhile for storiess

			      } else {
			        echo '<p>No articles have been found.</p>';
			      }; 

			      wp_reset_postdata();

				    ?> 

					</div> <!-- row -->
				</div> 
			</section>





		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
