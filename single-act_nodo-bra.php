<style>
	
	.flex-container {
	    display: -webkit-flex;
    	display: flex;
    	/* background-color: lightgrey; */
    	flex-direction: row;
    	flex-wrap: wrap;
    	align-content: space-around;
	}
	
	.eventi{
  		display: flex;
  		justify-content: space-between;
	}
	
	.in-eventi{
  		height: 40px;
  		width: 60px;
  		align-self: flex-end;
  		border-bottom: 2px solid #dd3333;
  		border-right: 2px solid #dd3333;
	}
	
	.dati-base, .strutture, .desc, .arrivare, .servizi, .percorsi, .eventi, .img-block {
		padding: 5px 0px 0px 5px;
	}

	.dati-base{
  		font-size: 1.15em;
  		height: 40px;
	}
	
	.dati-base, .strutture, .wrap-text-image {
		flex: 0 1 100%;
	}
	
	.desc, .servizi, .img-block, .eventi, .servizi, .arrivare, .percorsi {
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
	
	.img-block{
		justify-content: center;
	}
	
	.percorsi, .mappa, .meteo, .desc, .wrap-text-image {
  		background-color: lightyellow;
  		border-style: solid;
    	border-width: medium;
  		border-color: #f3f3f3;
	}
	
	.eventi, .foto, .arrivare, .servizi {
  		background-color: #f3f3f3;
  		border-style: solid;
    	border-width: medium;
  		border-color: #f3f3f3;
	}
	
	@media all and (max-device-width: 480px) and (orientation: portrait) {
    
	    .flex-container {
		    display: -webkit-flex;
	    	display: flex;
	    	flex-direction: column;
	    	flex-wrap: wrap;
	    	align-content: center;
		}
		
		.dati-base, .strutture, .wrap-text-image {
		flex: 0 1 100%;
	}
	
	.desc, .servizi, .img-block, .eventi, .servizi, .arrivare, .percorsi {
  		flex: 0 1 100%;
	}
		
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
                <h1><?php the_title(); ?> - pagina esclusiva per Bra - flexbox</h1>
                </div>
                <div class="flex-container">
	                <div class="dati-base">
		                Provincia: <strong><?php the_field('provincia'); ?></strong> - 
		                Altitudine: <strong><?php the_field('altitudine'); ?></strong> metri s.l.m. 
		                - Abitanti: <strong><?php the_field('abitanti'); ?></strong> - 
		                <a href="<?php echo get_field('centro_servizi'); ?>">Centro servizi</a>
	                </div>
	                
	                <!-- Link ai percorsi del nodo -->
					<div class="percorsi">
						<h3>Percorsi di <?php the_title(); ?></h3>
						<?php 
							$posts = get_field('nodo_percorsi');
							if( $posts ): ?>
								<ul>
								<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
			   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a> - km: <?php echo the_field('km', $p->ID); ?></li>
								<?php endforeach; ?>
								</ul>
						<?php endif; ?>
	                </div>
	                
	                <div class="eventi">
						<h3>Prossimi eventi a <?php the_title(); ?></h3>
						
						<div class="in-eventi">
			
						</div>
					
					</div>
	                
                	<div class="wrap-text-image">
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

	                

				
				<hr />
					<div class="img-block mappa">
						<div class="img" >
						<?php the_field('mappa_nodo'); ?>
						</div>
					</div>
					
					<div class="arrivare">
						<h3>Arrivare a <?php the_title(); ?></h3>
						<p><?php 
						// test per provare una limitazione di funzionalità in base al ruolo utente
						if( current_user_can('edit_posts') ) {
							// true if user can edit posts
							the_field('arrivare');
						}
						
						 ?></p>
	                </div>
	                
	                <div class="strutture">
						<h3>Mangiare e dormire a <?php the_title(); ?></h3>
						<p><?php the_field('mangiare_dormire'); ?></p>
					</div>
				
                
                <!-- Link ai servizi acquistabili come 'product' tramite Woocommerce -->				
	                
	                <div class="servizi">
						<h3>Servizi a <?php the_title(); ?></h3>
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
                
	                <div class="img-block meteo">
		                <div class="img">
							<p><?php the_field('meteo'); ?></p>
		                </div>
	                </div>
	                
                </div>
                
			</div>
            <?php endwhile; 
            get_sidebar();
            get_footer();
?>
            
