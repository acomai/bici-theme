<style>
	
	.flex-container {
	    display: -webkit-flex;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
	}
	
	.desc {
		flex: 0 1 100%;
	}
	
	.img-box, .dati-base {
		flex: 0 1 50%;
	}
	
	.centri, .itinerari, .foto {
		flex: 0 1 50%;
	}
	
	.title {
		color: #dd3333;
	}
	
	.desc-title {
		text-align: center;
	}
	
	@media all and (max-device-width: 480px) and (orientation: portrait) {
    
	    .flex-container {
		    display: -webkit-flex;
	    	display: flex;
	    	flex-direction: column;
	    	flex-wrap: wrap;
	    	align-content: center;
		}
		
		.desc, .dati-base, .centri, .itinerari, .foto, .img-box {
			flex: 0 1 100%;
		}
	}	

</style>
	
<?php
get_header();

/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="main-post-div  col-md-10">
	                <div class="single-page-post-heading">
	                <h1 class="title"><?php the_title(); ?></h1>
	                </div>
	                
	                <div class="flex-container">
	                
	                	<div class="img-box">
	                		<?php the_field('mappa'); ?>
	                	</div>
	                	
	                	<div class="dati-base">
	                		<h3>Dati:</h3>
	                		<p>Tipo percorso: <strong><?php the_field('tipo_percorso'); ?></strong></p>
			                <p>Lunghezza: <strong><?php the_field('km'); ?> km</strong></p> 
			                <p>Dislivello in salita: <strong><?php the_field('dislivello_salita'); ?> metri</strong></p>
			                <p>Dislivello in discesa: <strong><?php the_field('dislivello_discesa'); ?> metri</strong></p>
			                <p>Sterrato: <strong><?php the_field('sterrato_perc'); ?> %</strong></p> 
							<p>Fontanelle: <strong><?php the_field('fontanelle'); ?></strong></p>
							<p>Segnaletica: <?php the_field('segnaletica'); ?></p>
	                	</div>

						<div class="centri">
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
						<!--  </div>
						
						<div class="itinerari">  -->
							<hr />
							<h3>Itinerari che includono il percorso</h3>
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
						
						<div class="foto">
							<hr />
							<h3>Immagini del percorso</h3>
						</div>


		                <div class="content-here">
		                	<hr />
		                	<h3 class="desc-title">Descrizione e tracciato</h3>
		                	<?php  the_content();  ?>
						</div>

		                <div>
			               	<hr />
			               	<h3>Tracciato GPS scaricabile</h3>
			                <?php
				                // limitazione di funzionalità per il file gps
				                
								if( is_user_logged_in() ) {
									// true if user can edit posts
									the_field('gps');
								}else {
									echo 'solo gli utenti registrati possono scaricare i tracciati gpx';
									}
							
							?>
                		</div>
                	</div>
                </div>

            <?php endwhile; 
            get_sidebar();
            get_footer();
            ?>