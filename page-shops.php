<?php
/**
 * Template Name: Shops Page
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

		<!-- 	<div class="title-section-wrapper">
				<div class="title-container container">
					
					<h1>Shops</h1>

					<p class="spet-subhead">By Categories</p>

				</div> 
			</div> -->

			<?php 

				 $spet_shops_query = get_query_var( 'spetcat' );

				 $spet_cat_id = get_category_by_slug($spet_shops_query);
				 $spet_cat_name = $spet_cat_id->name;

				 $card_id = 0;

				 // var_dump($spet_cat_id);

				 if( $spet_shops_query ) { 

				 	$spet_shops_cat_term = $spet_shops_query;
				 	$spet_shops_label = $spet_cat_name; 

				 } else {

				 	$spet_shops_label = 'All Categories'; 

				 }


			 ?>

			<div class="category-bar-wrapper">
				<div class="category-bar-container container">
					
					<h1 class="category-name" id="shops-title"><?php echo $spet_shops_label; ?></h1>

					<div>
						<!-- <div class="fake-select"></div>
						<select id="selectbox" name="" class="spet-select" onchange="location = this.value;">
						    <option value="#" selected>Select a Category</option>
						    <option value="<?php echo home_url('/shops/?spetcat=shopping'); ?>">Shopping</option>
						    <option value="<?php echo home_url('/shops/?spetcat=restaurant'); ?>">Restaurant</option>
						    <option value="<?php echo home_url('/shops/?spetcat=salon-spa'); ?>">Salon/Spa</option>
						    <option value="<?php echo home_url('/shops/?spetcat=health'); ?>">Health</option>
						    <option value="<?php echo home_url('/shops/?spetcat=tasting-room-tap-room'); ?>">Tasting Room/Tap Room</option>
						    <option value="<?php echo home_url('/shops/?spetcat=arts-experience'); ?>">Arts Experience</option>
						    <option value="<?php echo home_url('/shops/?spetcat=other'); ?>">Other</option>
	
						</select> -->
					</div>

				</div>
			</div>

			<section class="shops-section">
				<div class="shops-container container-fluid">
					

					<div class="row shops-cards-wrapper">

	          <?php 

							$spet_merchants_args = array(
								'post_type'   		=> 'spet_merchant',
								'category_name' 	=> $spet_shops_cat_term,
				        'order'           => 'DESC',
				        'orderby'           => 'rand',
				        'posts_per_page'  => '-1'
				        );

			      $spet_merchants = new WP_Query( $spet_merchants_args );

			      if ( $spet_merchants->have_posts() ) {

			        while ( $spet_merchants->have_posts() ) {

			          $spet_merchants->the_post();

			          $current_id = get_the_ID();

			          if ($merchant_id != $current_id) {

					          $spet_merchants_cats = get_the_category();
		 
										if ( ! empty( $spet_merchants_cats ) ) {
										     $merchant_cat = $spet_merchants_cats[0]->name ;   
										}

										$merchant_logo = get_field('merchant_logo');
										$merchant_description = get_field('merchant_description');
										$merchant_img_url = get_field('merchant_display_image');

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

					          ?>

					          <div class="shops-merchant-card <?php echo $card_class; ?>">

									    	 <a href="<?php the_permalink(); ?>">

							          	<div class="shops-photo-wrapper" style="background-image: url(<?php echo $merchant_img_url; ?>);">

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

						              	<span class="shops-merchant-card-info-wrapper">
							              
							              	<p class="shops-merchant-category"><?php echo $merchant_cat; ?></p>
							              	<h3><?php the_title(); ?></h3>

							              </span>
							            </div>
							          </a>
					          	
					          </div>
			          
			        <?php

					      } // endif for kill current id

			        } // endwhile for neighbors 

			      } else {
			        echo '<p style="padding-left:15px;">No merchants have been found for this category.</p>';
			      }; 

			      wp_reset_postdata();

				    ?>

					</div> <!-- row -->
				</div>

				<?php if ($card_id > 7) : ?>
					<div class="explore-wrapper">

						<button id="sp-load-more">Load More Merchants</button>
					</div>
				<?php  endif; ?>

				<style>
					.shops-merchant-card {
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





		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
