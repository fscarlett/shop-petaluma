<?php
/**
 * Template Name: Home Page
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

					// to use in Explore button
					$spet_alt_zone_index = rand(1, count($spet_zones_array)) - 1;

					if($spet_zone_index != $spet_alt_zone_index) {
						$spet_next_term = $spet_zones_array[$spet_alt_zone_index];
						$spet_next_name = $spet_names_array[$spet_alt_zone_index];
					} elseif ( $spet_alt_zone_index != 0) {
						$spet_next_term = $spet_zones_array[$spet_alt_zone_index -1];
						$spet_next_name = $spet_names_array[$spet_alt_zone_index -1];
					} else {
						$spet_next_term = $spet_zones_array[$spet_alt_zone_index +1];
						$spet_next_name = $spet_names_array[$spet_alt_zone_index +1];
					}

					$explore_url = '/streets/?zone=' . $spet_next_term;


			    ?>
					
					<h1><?php echo $spet_zone_name; ?></h1>
					<!-- <p class="spet-subhead">Downtown</p> -->

					<div class="row street-cards-wrapper">

						<?php 


			      $spet_neighbors_args = array(
			        'post_type'       => 'spet_merchant',
			        'order'           => 'DESC',
			        'orderby'         => 'rand',
			        'posts_per_page'  => '-1',
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
								$closed = get_field('temporarily_closed');
								$service = get_field('service_badge');
								$offers = get_field('special_offer_badge');

								// for the Load More stuff
								$card_id++;
								$card_class = '';

								if ( $card_id > 0 && $card_id <= 7 ) { $card_class = 'sp-card-group-1 sp-card-display'; }
								if ( $card_id > 7 && $card_id <= 21 ) { $card_class = 'sp-card-group-2'; }
								if ( $card_id > 21 && $card_id <= 35 ) { $card_class = 'sp-card-group-3'; }
								if ( $card_id > 35 && $card_id <= 49 ) { $card_class = 'sp-card-group-4'; }
								if ( $card_id > 49 && $card_id <= 63 ) { $card_class = 'sp-card-group-5'; }
								if ( $card_id > 63 && $card_id <= 77 ) { $card_class = 'sp-card-group-6'; }
								if ( $card_id > 77 && $card_id <= 98 ) { $card_class = 'sp-card-group-7'; }
								if ( $card_id > 98 && $card_id <= 112 ) { $card_class = 'sp-card-group-8'; }

								// var_dump($service);

			          ?>

			          <div class="merchant-card <?php echo $card_class; ?>">
		              <a href="<?php the_permalink(); ?>">

			          	<div class="photo-wrapper" style="background-image: url(<?php echo $img_url; ?>);">

			          		<!-- <?php if ( $closed ) { ?>
			          			<div class="spet-badge spet-closed-badge">Closed</div>
			          		<?php } ?> -->

			          		<!-- <?php if ( $service ) { ?>
			          			<div class="spet-badge spet-service-badge">COVID-19 Services</div>
			          		<?php } ?> -->

			          		<!-- <?php if ( $offers && !$service) { ?>
			          			<div class="spet-badge spet-offers-badge" style="top: 30px;">Special Offers</div>
			          		<?php } ?> -->

			          		<?php if ( $offers ) { ?>
			          			<div class="spet-badge spet-offers-badge" style="top: 30px;">Special Offers</div>
			          		<?php } ?>

			          		<!-- <?php if ( $offers && $service) { ?>
			          			<div class="spet-badge spet-offers-badge">Special Offers</div>
			          		<?php } ?> -->
			          		
			              	<span class="home-merchant-card-info-wrapper">
				              	<p class="home-merchant-category"><?php echo $category; ?></p>
				              	<h3><?php the_title(); ?></h3>

				              </span>
			            </div>
			          </a>
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


				<!-- <div class="explore-wrapper">
					<a href="<?php // echo get_site_url(null, $explore_url); ?>">Explore <?php // echo $spet_next_name; ?></a>
				</div> -->
				
				<?php if ($card_id > 7) : ?>
					<div class="explore-wrapper">

						<button id="sp-load-more">Load More Merchants</button>
					</div>
				<?php  endif; ?>

				<style>
					.merchant-card {
						display: none;
					}
      		.sp-card-display {
      			display: block;
      		}

      	</style>

				<script>
					// Load More stuff

					var group1 = document.querySelectorAll('.sp-card-group-1');
					var group2 = document.querySelectorAll('.sp-card-group-2');
					var group3 = document.querySelectorAll('.sp-card-group-3');
					var group4 = document.querySelectorAll('.sp-card-group-4');
					var group5 = document.querySelectorAll('.sp-card-group-5');
					var group6 = document.querySelectorAll('.sp-card-group-6');
					var group7 = document.querySelectorAll('.sp-card-group-7');
					var group8 = document.querySelectorAll('.sp-card-group-8');

					var exploreWrapper = document.querySelector('.explore-wrapper');

					var shownCards;
					var nowGroup;

					var cardGroups = [group1, group2, group3, group4, group5, group6, group7, group8];
					var clickNumber = 0;

					var loadButton = document.getElementById('sp-load-more');

					loadButton.addEventListener('click', function() {

						clickNumber++;

						shownCards = document.querySelectorAll('.sp-card-display');

						nowGroup = cardGroups[clickNumber];

						// if (shownCards) {
						// 	for (var i = 0; i < shownCards.length; ++i) {
						// 	  shownCards[i].classList.remove('sp-card-display');
						// 	  console.log(shownCards[i]);
						// 	}
						// }

						if (nowGroup) {
							for (var i = 0; i < nowGroup.length; ++i) {
							  nowGroup[i].classList.add('sp-card-display');
							}
						} 
							
						if (nowGroup.length < 7) {	
							exploreWrapper.style.display = 'none';
						}

					});
					
				</script>



			</section>





			

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
