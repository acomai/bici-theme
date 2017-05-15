<style>
	
	.flex-container {
	    display: -webkit-flex;
    	display: flex;
    	background-color: lightgrey;
    	flex-direction: row;
    	flex-wrap: wrap;
	}
	
	.inner-flex-container {
	    display: -webkit-flex;
    	display: flex;
    	background-color: lightyellow;
    	flex-direction: row;
    	flex-wrap: wrap;
    	self-align: stretch;
	}

	.dati-base{
  		font-size: 1.15em;
  		/* margin: auto; */
  		flex: 0 1 100%;
  		height: 40px;
  		margin: 20px;
  		padding: 5px 20px;
	}
	
	.img{
  		width: 400px;
  		height: 300px;
	}
	
	.desc{
  		flex: 0 1 50%;
	}
	
	.arrivare{
  		background-color: lightyellow;
  		border-style: solid;
    	border-width: medium;
  		border-color: lightgrey;
  		flex: 1 1 50%;
  		padding: 5px 20px;
	}
	
	.percorsi{
  		background-color: lightyellow;
  		flex: 1 1 50%;
  		padding: 5px 20px;
	}
	
	.eventi{
  		background-color: lightpink;
  		flex: 0 1 50%;
  		padding: 5px 20px;
	}
	
	.servizi{
  		flex: 1 1 30%;
  		padding: 5px 20px;
	}
	
	.strutture{
  		flex: 1 1 100%;
  		background-color: lightblue;
  		padding: 5px 20px;
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
					</div>
	                
                	<div class="img">
		                <?php
		                	// mostra immagine rappresentativa del nodo, se esiste
		                	if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} 
							
						?>
					</div>
				
                <hr />
	                <div class="content-here desc">
	                <?php  the_content();  ?>
					</div>

				
				<hr />
					<div>
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
	                <div class="inner-flex-container">
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
            
