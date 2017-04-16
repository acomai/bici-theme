<?php
get_header();

/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="main-post-div">
                <div class="single-page-post-heading">
                <h1><?php the_title(); ?></h1>
                </div>
                <div class="content-here">
                <?php  the_content();  ?>
                <p>Lunghezza in Km: <?php the_field('km'); ?></p>
				<p>% sterrato: <?php the_field('sterrato_perc'); ?></p>
				<p>Dislivello salita in metri: <?php the_field('dislivello_salita'); ?></p>
				<p>Tipo percorso: <?php the_field('tipo_percorso'); ?></p>
				<p>Segnaletica: <?php the_field('segnaletica'); ?></p>
				<p>Fontanelle: <?php the_field('fontanelle'); ?></p>
				<p>Mappa: <?php the_field('mappa'); ?></p>
				<!--  
				
				<?php 
				/*
				$image = get_field('mappa');
				
				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


				</p>
				<?php endif; 
				*/
				?>
				-->
                </div>
                
                <h3>Città nodo collegate</h3>
						<?php 

						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

						$nodi = get_posts(array(
							'post_type' => 'act_nodo',
							'meta_query' => array(
								array(
									'key' => 'nodo_percorsi', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

						?>
						<?php if( $nodi ): ?>
							<ul>
							<?php foreach( $nodi as $nodo ): ?>
								
								<li>
									<a href="<?php echo get_permalink( $nodo->ID ); ?>">
										
										<?php echo get_the_title( $nodo->ID ); ?>
									</a> 
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
                
                </div>

            <?php endwhile; 
            get_sidebar();
            get_footer();
            ?>