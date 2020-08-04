<?php
/**
 * Template Name: Test Page
 *
 * @package Shop_Petaluma
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : the_post();

			?>

			<div class="content-wrapper container">
				
				<?php the_content(); ?>

			</div>

			<section class="street-section">

				<div class="street-container container">

					<?php
				 // $term = get_query_var( 'medium' );


					// get array of zones
					$spet_term_args = array(
						'taxonomy' => 'zones',
					);

					$term_query = new WP_Term_Query( $spet_term_args );

					$spet_zones_array = array();
					$spet_names_array = array();
					$i = 0;

					foreach ( $term_query->terms as $term ) {
					    $spet_zones_array[$i] = $term->slug;
					    $spet_names_array[$i] = $term->name;
					    $i++;
					}

					// generate random int within range of array length
					$spet_zone_quan = count($spet_zones_array);
					$spet_zone_index = rand(1, count($spet_zones_array)) - 1;

					// pick the zone slug = that number
					$spet_zone_term = $spet_zones_array[$spet_zone_index];
					$spet_zone_name = $spet_names_array[$spet_zone_index];

			    ?>
					
					<h2><?php echo $spet_zone_name; ?></h2>
					<p class="spet-subhead">Downtown</p>

					<div class="row street-cards-wrapper">

						<?php 


			      $spet_neighbors_args = array(
			        'post_type'       => 'spet_merchant',
			        'order'           => 'DESC',
			        'orderby'         => 'rand',
			        'posts_per_page'  => 7,
			        'tax_query'       => array(
			            array(
			              'taxonomy'  => 'zones',
			              'field'     => 'slug',
			              'terms'     => $spet_zone_term,
			            ),
			          ),
			        );

			      $spet_neighbors = new WP_Query( $spet_neighbors_args );

			      if ( $spet_neighbors->have_posts() ) {

			        while ( $spet_neighbors->have_posts() ) {

			          $spet_neighbors->the_post();

			          $categories = get_the_category();
 
								if ( ! empty( $categories ) ) {
							     $category = $categories[0]->name ;   
								}

								// $img_url = get_the_post_thumbnail_url('full');

								$img_url = get_field('merchant_display_image');

			          ?>

			          <div class="merchant-card">
			          	<div class="photo-wrapper">
			              <a href="<?php the_permalink(); ?>">
			              	<img src="<?php echo $img_url; ?>" alt="">
			              	<span class="home-merchant-card-info-wrapper">
				              	<p class="home-merchant-category"><?php echo $category; ?></p>
				              	<h3><?php the_title(); ?></h3>

				              </span>
			              </a>                  
			            </div>
			          </div>
			          
			        <?php
			        } // endwhile for merchants

			      } else {
			        echo '<p>No merchants have been found.</p>';
			      }; 

			      wp_reset_postdata();

				    ?>
						



					</div>
				</div>
				



			</section>





			

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
