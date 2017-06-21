<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
	
	.flex-container {
	    display: -webkit-flex;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
	}
	
	.dati-base, .strutture, .arrivare, .servizi, .percorsi, .itinerari, .img-block, .wrap-text-image {
		padding: 30px 0px 0px 20px;
		display: flex;
  		justify-content: space-between;
	}
	
	.end-box{
  		height: 40px;
  		width: 120px;
  		align-self: flex-end;
  		border-bottom: 2px solid #dd3333;
  		border-right: 2px solid #dd3333;
	}

	.dati-base{
  		font-size: 1.80em;
	}
	
	.dati-base, .strutture, .wrap-text-image, .vuoto {
		flex: 0 1 100%;
	}
	
	.vuoto {
		height: 20px;
	}
	
	.servizi, .img-block, .itinerari, .arrivare, .percorsi {
  		flex: 0 1 50%;
	}
	
	.img{
  		width: 400px;
  		height: 300px;
	}
	
	.img-foto{
  		width: 400px;
  		height: 300px;
  		float: left;
  		margin-right: 1em;
	}
	
	.percorsi, .mappa, .meteo, .desc, .wrap-text-image {
  		/* background-color: lightyellow; */
	}
	
	.dati-base, .wrap-text-image, .strutture {
  		 background-color: #f3f3f3; 
	}
	
	.title {
		color: #dd3333;
	}
	
	/* @media all and (max-device-width: 480px) and (orientation: portrait) {
    
	    .flex-container {
		    display: -webkit-flex;
	    	display: flex;
	    	flex-direction: column;
	    	flex-wrap: wrap;
	    	align-content: center;
		}
		
		.dati-base, .strutture, .wrap-text-image {
		flex: 1 1 100%;
	}
	
	.desc, .servizi, .img-block, .eventi, .servizi, .arrivare, .percorsi {
  		flex: 0 1 100%;
	}
		*/
	}	

</style>

<?php get_header();

/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="content-area col-md-10">
                 <!--  -->
                <div class="single-page-post-heading">
                <h1 class="title"><?php the_title(); ?></h1>
                </div>
                <div class="flex-container">
		                <div class="dati-base">
		                	<div>
			                	<div>
					                <p><?php _e( 'Provincia', 'sydney-child' );?>: <strong><?php the_field('provincia'); ?></strong> - 
					                <?php _e( 'Altitudine', 'sydney-child' );?>: <strong><?php the_field('altitudine'); ?></strong> m. 
					                - <?php _e( 'Abitanti', 'sydney-child' );?> <strong><?php the_field('abitanti'); ?></strong></p>
					                <p><?php _e( 'Informazioni turistiche', 'sydney-child' );?>: <?php echo get_field('centro_servizi'); ?></p>
				                </div>
			                </div>
			                <div class="end-box"></div>
		                </div>
	                
	                <!-- Link ai percorsi del nodo -->
					<div class="percorsi">
						<div>
							<h3><i class="fa fa-map-signs"></i> <?php _e( 'Percorsi di ', 'sydney-child' );?> <?php the_title(); ?></h3>
							<?php 
								$posts = get_field('nodo_percorsi');
								if( $posts ): ?>
									<ul>
									<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				   						 <li>
					   						 <?php 
						   						  // test da implementare per visualizzare icone appropriate al tipo_percorso
						   						  // ed alla difficoltà
						   						  $tipo = get_field('tipo_percorso', $p->ID);
						   						  if ( $tipo == 'bici' || $tipo == 'bike') {
						   						  	echo '<i class="fa fa-bicycle fa-2x"></i>';
						   						  } else {
						   						  	echo '<i class="fa fa-blind fa-2x"></i>';
						   						  }
					   						  ?>
					   						 <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
					   						  - km: <?php echo the_field('km', $p->ID); ?> - 
					   						  <?php  echo the_field('difficolta', $p->ID); ?>				   						  
					   						  
				   						 </li>
									<?php endforeach; ?>
									</ul>
							<?php endif; ?>
						</div>
						
						<div class="end-box"></div>
						
	                </div>
	                
	                <div class="itinerari">
						<div>
							<h3><i class="fa fa-map"></i> <?php _e( 'Itinerari di più giorni', 'sydney-child' );?></h3>
							<?php 
								$posts = get_field('nodo_itinerari');
								if( $posts ): ?>
									<ul>
									<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></li>
									<?php endforeach; ?>
									</ul>
							<?php endif; ?>
						</div>
						
						<div class="end-box"></div>
						
					</div>
					
					<div class="vuoto">
						<p>  </p>
					</div>
	                
                	<div class="wrap-text-image">
                		<div>
		                	<div class="img-foto">
				                <?php
				                	// mostra immagine rappresentativa del nodo, se esiste
				                	if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} 
									
								?>
							</div>
							<div class="content-here desc">
			                	<?php  the_content();  ?>
							</div>
						</div>
						<div class="end-box"></div>
					</div>
				
					<div class="arrivare">
						<div>
							<h3><i class="fa fa-bus"></i> <?php _e( 'Arrivare a ', 'sydney-child' );?> <?php the_title(); ?></h3>
							<p><?php 
							// test per provare una limitazione di funzionalità in base al ruolo utente
							if( current_user_can('edit_posts') ) {
								// true if user can edit posts
								the_field('arrivare');
							}
							
							 ?></p>
						 </div>
						 <div class="end-box"></div>
	                </div>
	                
	                <div class="img-block mappa">
						<div class="img" >
							<?php the_field('mappa_nodo'); ?>
						</div>
						<!--   <div class="end-box"></div> -->
					</div>
					
	                
	                <div class="vuoto">
						<p>  </p>
					</div>
	                
	                <div class="strutture">
	                	<div>
							<h3><i class="fa fa-bed"></i> <i class="fa fa-cutlery"></i> <?php _e( 'Mangiare e dormire a ', 'sydney-child' );?><?php the_title(); ?></h3>
							<p><?php the_field('mangiare_dormire'); ?></p>
						</div>
						<div class="end-box"></div>
					</div>
				
                
                <!-- Link ai servizi acquistabili come 'product' tramite Woocommerce -->				
	                
	                <div class="servizi">
						<div>
							<h3><i class="fa fa-tags"></i> <?php _e( 'Servizi a ', 'sydney-child' );?> <?php the_title(); ?></h3>
							<?php 
								$posts = get_field('nodo_servizi');
								if( $posts ): ?>
									<ul>
									<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a> <?php echo the_field('km', $p->ID); ?></li>
									<?php endforeach; ?>
									</ul>
							<?php endif; ?>
						</div>
						<div class="end-box"></div>
	                </div>
                
	                <div class="img-block meteo">
	                	<div>
			                <div class="img">
								<p><?php the_field('meteo'); ?></p>
			                </div>
		                </div>
		                <!--  <div class="end-box"></div>-->
	                </div>
	                
                </div>
                
			</div>
            <?php endwhile; 
            get_sidebar();
            get_footer();
?>
            
