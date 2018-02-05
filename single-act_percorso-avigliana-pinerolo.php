<style>
	
	.flex-container {
	    display: -webkit-flex;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
	}
	
	.dati-base, .centri, .foto, .itinerari, .img-box {
		padding: 30px 0px 0px 20px;
		display: flex;
  		justify-content: space-between;
	}
	
	.desc, .foto, .vuoto {
		flex: 0 1 100%;
	}
	
	.desc, .foto, .content-here {
		background-color: #f3f3f3;
	}
	
	.vuoto {
		height: 20px;
	}
	
	.img-box, .dati-base {
		flex: 0 1 50%;
	}
	
	.centri, .itinerari {
		flex: 0 1 50%;
	}
	
	.dati-tracciato{
  		font-size: 1.20em;
	}
	
	.title {
		color: #dd3333;
	}
	
	.desc-title {
		text-align: center;
	}
	
	.end-box{
  		height: 40px;
  		width: 120px;
  		align-self: flex-end;
  		border-bottom: 2px solid #dd3333;
  		border-right: 2px solid #dd3333;
	}
	
	.thumb {
		padding: 10px;
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
	                <h1 class="title"><?php the_title(); ?> prova AviPin</h1>
	                </div>
	                
	                <div class="flex-container">
	                
	                	<div class="img-box">
	                		<div>
	                			<?php the_field('mappa'); ?>
	                		</div>
	                		<div class="end-box"></div>
	                	</div>
	                	
	                	<div class="dati-base">
	                		<div>
	                		<h3><?php _e( 'Dati', 'sydney-child' );?>:</h3>
		                		<p><?php _e( 'Tipo percorso', 'sydney-child' );?>: <strong><?php the_field('tipo_percorso'); ?></strong></p>
				                <p><?php _e( 'Lunghezza', 'sydney-child' );?>: <strong><?php the_field('km'); ?> km</strong></p>
				                <p><?php _e( 'Difficoltà', 'sydney-child' );?>: <strong><?php the_field('difficolta'); ?></strong></p>
				                <p><?php _e( 'Dislivello in salita', 'sydney-child' );?>: <strong><?php the_field('dislivello_salita'); ?> m</strong></p>
				                <p><?php _e( 'Dislivello in discesa', 'sydney-child' );?>: <strong><?php the_field('dislivello_discesa'); ?> m</strong></p>
				                <p><?php _e( 'Sterrato', 'sydney-child' );?>: <strong><?php the_field('sterrato_perc'); ?> %</strong></p> 
								<p><?php _e( 'Fontanelle', 'sydney-child' );?>: <strong><?php the_field('fontanelle'); ?></strong></p>
								<p><?php _e( 'Segnaletica', 'sydney-child' );?>: <strong><?php the_field('segnaletica'); ?></strong></p>
							</div>
							<div class="end-box"></div>
	                	</div>
	                	
	                <div class="vuoto">
						<p>  </p>
					</div>
	                	
	                	<div class="foto">
							<div>
								<h3><?php _e( 'Immagini del percorso', 'sydney-child' );?></h3>
							</div>
							<div>
							<br/>
							<br/>
							<br/>
								<?php 
	
								$images = get_field('immagini');
								
								if( $images ): ?>
								    <!--  <ul> -->
								        <?php foreach( $images as $image ): ?>
								           <!-- <li> -->
								                <a href="<?php echo $image['url']; ?>">
								                     <img class="thumb" src="<?php echo $image['sizes']['thumbnail']; ?>" title="<?php echo $image['caption']; ?>" alt="<?php echo $image['alt']; ?>" />
								                </a>
								           <!-- </li> -->
								        <?php endforeach; ?>
								    <!--</ul> -->
								<?php endif; ?>
							</div>
							<div class="end-box"></div>
						</div>

						<div class="centri">
							<div>
								<h3><?php _e( 'Centri collegati', 'sydney-child' );?></h3>
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
							<div class="end-box"></div>
						</div>
						
						<div class="itinerari">
							<div>
								<h3><?php _e( 'Itinerari che includono il percorso', 'sydney-child' );?></h3>
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
							<div class="end-box"></div>
						</div>
						
						<div class="vuoto">
							<p>  </p>
						</div>


		                <div class="content-here">
		                	<hr />
		                	<h3 class="desc-title"><?php _e( 'Descrizione', 'sydney-child' );?></h3>
		                	<?php  the_content();  ?>
						</div>

		                <div>
			               	<hr />
			               	<h3><?php _e( 'Tracciato', 'sydney-child' );?></h3>
			                <?php

							// check if the repeater field has rows of data
							if( have_rows('tracciato') ):
							
							 	// loop through the rows of data
							    while ( have_rows('tracciato') ) : the_row();
							
							        // display a sub field value
							        ?><p class="dati-tracciato"><?php
							        the_sub_field('step');
							        echo " - ";
							        the_sub_field('stepdesc');
							        //echo '<br />';
							        ?></p><?php
							
							    endwhile;
							
							else :
							
							    // no rows found
							
							endif;
							
							?>
                		</div>
                	</div>
                </div>

            <?php endwhile; 
            get_sidebar();
            get_footer();
            ?>