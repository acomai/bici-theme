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
                <p>Tipo percorso: <strong><?php the_field('tipo_percorso'); ?></strong> - 
                Lunghezza: <strong><?php the_field('km'); ?> km</strong> - 
                Dislivello in salita: <strong><?php the_field('dislivello_salita'); ?> metri</strong> -
                Dislivello in discesa: <strong><?php the_field('dislivello_discesa'); ?> metri</strong>
                </p>
                <hr />
                <div class="content-here">
                <?php  the_content();  ?>
				<hr />
				<p>Sterrato: <strong><?php the_field('sterrato_perc'); ?> %</strong> - 
				Fontanelle: <strong><?php the_field('fontanelle'); ?></strong></p>
				<p>Segnaletica: <?php the_field('segnaletica'); ?></p>
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
                <hr />
                
                <!-- Elenco dei nodi compresi in questo percorso -->
                <div class="nodo_percorsi">
                <h3>Centri collegati</h3>
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
                	<hr />
                	
                	<!-- Elenco degli itinerari che comprendono questo percorso -->
            		<div class="percorsi_itinerario">
               		 <h3>Itinerari che comprendono il percorso</h3>
						<?php 

						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

						$itinerari = get_posts(array(
							'post_type' => 'act_itinerario',
							'meta_query' => array(
								array(
									'key' => 'percorsi_itinerario', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

						?>
						<?php if( $itinerari): ?>
							<ul>
							<?php foreach( $itinerari as $itinerario ): ?>
								
								<li>
									<a href="<?php echo get_permalink( $itinerario->ID ); ?>">
										
										<?php echo get_the_title( $itinerario->ID ); ?>
									</a> 
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
                	</div>
                </div>

            <?php endwhile; 
            get_sidebar();
            get_footer();
            ?>