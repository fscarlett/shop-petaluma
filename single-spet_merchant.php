<?php
/**
 * The template for displaying single Merchant custom post type
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

			$merchant_id = get_the_ID(); // also used below for neighbors

		// https://wordpress.stackexchange.com/questions/130947/get-term-slug-of-current-post
			$terms = get_the_terms( $post->ID, 'zones' );
				if ( !empty( $terms ) ){
				    // get the first term
				    $term = array_shift( $terms );
				    // echo $term->slug;
				}

			$categories = get_the_category();
 
			if ( ! empty( $categories ) ) {
			     $category = $categories[0]->name ;   
			}
		?>

			<!-- <div class="title-section-wrapper">
				<div class="title-container container">
					
					<p class="content-type-name">Shops</p>

					<p class="spet-subhead">By Categories</p>

				</div> 
			</div> -->

			<div class="category-bar-wrapper">
				<div class="category-bar-container container">
					
					<p class="category-name"><?php echo $category; ?></p>

				</div>
			</div>

			<div class="content-wrapper">
				<div class="content-container container">


		<?php
			 // $term = get_query_var( 'medium' );
          // $term = 'Kentucky';

         $logo = get_field('merchant_logo');
         $primary_products = get_field('primary_products');
         $services = get_field('merchant_services');
         $discounts = get_field('merchant_discounts');
         $address = get_field('merchant_address');
         $hours = get_field('merchant_hours');
         $phone = get_field('merchant_phone');
         $email = get_field('merchant_email');
         $website = get_field('merchant_website');
         $website_label = get_field('merchant_website_label');
         if(!$website_label) { $website_label = get_field('merchant_website'); }
         $socials = get_field('social_media');
         $merchant_image = get_field('merchant_display_image');


    ?>

			    <?php if ($merchant_image) : ?>

		    		<div class="merchant-image-mob">

		    				<div class="merchant-image-wrapper" style="background-image: url(<?php echo $merchant_image; ?> )"></div>
		    			
		    		</div>

		    	<?php endif; ?>

			    <div class="row">
			    	<div class="col-lg-2">
		    			<?php if ( $logo ) : ?>

				    		<div class="merchant-logo-wrapper merchant-logo-desk">

						    		<img src="<?php echo $logo; ?>" alt="<?php the_title(); ?> Logo">
				    				
					    	</div>

		    			<?php endif; ?>

		    			

			    	</div>

			    	<div class="col-lg-10 merchant-info-wrapper">
			    		<div class="row">
			    			<div class="col-12">
			    				<h1><?php the_title(); ?></h1>

			    				<?php if ($primary_products) { ?>
				    				<p class="merchant-subhead"><?php the_field('primary_products'); ?></p>
				    			<?php } ?>

			    				<p class="merchant-description"><?php the_field('merchant_description'); ?></p>

			    				<?php if ($services) { ?>
				    				<p class="merchant-label">Current Services / Restrictions</p>
				    				<p><?php the_field('merchant_services'); ?></p>
				    			<?php } ?>

				    			<?php if ($discounts) { ?>
				    				<p class="merchant-label">Discount Offerings</p>
				    				<p><?php the_field('merchant_discounts'); ?></p>
				    			<?php } ?>

				    			<?php if ($services || $discounts) { ?>

					    			<div class="merchant-nap-border"></div>

					    		<?php } ?>
			    				
			    			</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-sm-6">

			    				<?php if ($address) { ?>
				    				<p class="merchant-label">Address</p>
				    				<p><?php the_field('merchant_address'); ?></p>
				    			<?php } ?>

				    			<?php if ($hours) { ?>
				    				<p class="merchant-label">Hours</p>
				    				<p><?php the_field('merchant_hours'); ?></p>
				    			<?php } ?>

				    			<?php if ($socials) { ?>
				    				<p class="merchant-label">Connect</p>
				    				<div class="merchant-socials-wrapper">
				    					<?php if( have_rows('social_media') ): ?>

				    						<?php while( have_rows('social_media') ): the_row(); 

				    							$social_icon = get_sub_field('social_icon');
													$social_url = get_sub_field('social_url');

													$fa_icon = 'fa-facebook-square';

													if ($social_icon == 'facebook') { $fa_icon = 'fa-facebook-square'; }
													if ($social_icon == 'twitter') { $fa_icon = 'fa-twitter-square'; }
													if ($social_icon == 'instagram') { $fa_icon = 'fa-instagram'; }  
													if ($social_icon == 'youtube') { $fa_icon = 'fa-youtube'; }  
													if ($social_icon == 'yelp') { $fa_icon = 'fa-yelp-square'; }

												?>

												 <?php if( $social_url ): ?>
														<a href="<?php echo $social_url; ?>" target="_blank" rel="noreferrer"><i class="fa <?php echo $fa_icon; ?>"></i></a>
												 <?php endif; ?>


				    						<?php endwhile; ?>

				    					<?php endif; ?>
				    				</div>
				    			<?php } ?>
			    				

			    			</div>
			    			<div class="col-sm-6">
			    				
			    				<?php if ($phone) { ?>
				    				<p class="merchant-label">Phone</p>
				    				<p><a href="tel:<?php the_field('merchant_phone'); ?>"><?php the_field('merchant_phone'); ?></a></p>
				    			<?php } ?>

				    			<?php if ($email) { ?>
				    				<p class="merchant-label">email</p>
				    				<p class="shrink-me-15"><a href="mailto:<?php the_field('merchant_email'); ?>"><?php the_field('merchant_email'); ?></a></p>
				    			<?php } ?>

				    			<?php if ($website) { ?>
				    				<p class="merchant-label">website</p>
				    				<p class="shrink-me-15"><a href="<?php the_field('merchant_website'); ?>" target="_blank" rel="noreferrer"><?php echo $website_label; ?></a></p>
				    			<?php } ?>

			    			</div>
			    		</div>

			    		<?php if ($merchant_image) { ?>

				    		<div class="row merchant-image-desk">

				    			<div class="col-sm-12">
				    				<div class="merchant-image-wrapper" style="background-image: url(<?php echo $merchant_image; ?> )"></div>
				    			</div>
				    			
				    		</div>

				    	<?php } ?>


			    	</div>
			    	
			    </div>

			  </div>
			</div>

			<div class="merchant-share-wrapper">
				<div class="merchant-share-container container">

					<div class="merchant-share-website-wrapper">

	    			<?php if ($website) { ?>

							<a href="<?php the_field('merchant_website'); ?>" target="_blank" rel="noreferrer">Visit the <?php the_title(); ?> website</a>

						<?php } ?>

					</div>

					<div class="merchant-share-icons-wrapper">
						<span>SHARE </span>

						<?php // echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
						<?php echo do_shortcode('[addtoany buttons="facebook,twitter,email"]'); ?>
						


						<!-- <a href="https://facebook.com" target="_blank" rel="noreferrer"><i class="fa fa-facebook-square"></i></a> -->
						<!-- <a href="https://twitter.com" target="_blank" rel="noreferrer"><i class="fa fa-twitter-square"></i></a> -->
						<!-- <a href="https://instagram.com" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a> -->
						<!-- <a href="https://facebook.com" target="_blank" rel="noreferrer"><i class="fa fa-envelope"></i></a> -->
					</div>
				</div>
			</div>			

      
      <div class="neighbors-wrapper">

      	 <div class="container">
          <h2>Meet our neighbors <?php // echo $term; ?> </h2>
          <p class="spet-subhead"><?php echo $term->name ?></p>
        </div>

        <div class="neighbors container">
        	<div class="row">

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
			              'terms'     => $term,
			            ),
			          ),
			        );

			      $neighbors_counter = 0;

			      $spet_neighbors = new WP_Query( $spet_neighbors_args );

			      if ( $spet_neighbors->have_posts() ) {

			        while ( $spet_neighbors->have_posts() ) {

			          $spet_neighbors->the_post();

			          $current_id = get_the_ID();

			          if ($merchant_id != $current_id && $neighbors_counter < 6) {

					        	$neighbors_counter++;

					          $spet_neighbors_cats = get_the_category();
		 
										if ( ! empty( $spet_neighbors_cats ) ) {
										     $neighbor_cat = $spet_neighbors_cats[0]->name ;   
										}

										// $neighbor_logo = get_field('merchant_logo');
										// $neighbor_description = get_field('merchant_description');
										$neighbor_image = get_field('merchant_display_image');

					          ?>


					          <div class="neighbor-merchant-card col-md-6 col-lg-4">
					          	<a href="<?php the_permalink(); ?>">

						          	<div class="neighbor-merchant-container" style="background-image: url(<?php echo $neighbor_image; ?>);">

									    		<span class="neighbor-merchant-card-info-wrapper">

						              	<p class="home-merchant-category"><?php echo $neighbor_cat; ?></p>
						              	<h3><?php the_title(); ?></h3>

						              </span>

										    </div>
										  </a>
					          </div>


			        <?php

					      } // endif for kill current id

			        } // endwhile for neighbors 

			      } else {
			        echo '<p>No merchants have been found.</p>';
			      }; 

			      wp_reset_postdata();

				    ?> 
					</div>
        </div>
      </div>

			
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
